<?php

namespace Netrunnerdb\BuilderBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class SuggestionsCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
        ->setName('nrdb:suggestions')
        ->setDescription('Compute and save the suggestions matrix')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        ini_set('memory_limit', '1G');
        $webdir = $this->getContainer()->get('kernel')->getRootDir() . "/../web";
        
        $runner = $this->getSuggestionsForSide(1);
        file_put_contents($webdir."/runner.json", json_encode($runner));
        
        $corp = $this->getSuggestionsForSide(2);
        file_put_contents($webdir."/corp.json", json_encode($corp));
        
        $output->writeln('done');
    }

    private function getAllPairs($arr)
    {
        $pairs = array();
        for($i=0; $i<count($arr); $i++) {
            for($j=$i+1; $j<count($arr); $j++) {
                $pairs[] = array(intval($arr[$j]['card_id']), intval($arr[$i]['card_id']));
            }
        }
        return $pairs;
    }
    
    /**
     * returns a matrix where each point x,y is
     * the probability that the cards x and y
     * are seen together in a deck
     * also returns an array of card codes
     * x and y are private indexes, not card.id
     */
    private function getSuggestionsForSide($side_id)
    {
        $matrix = array();
    
        /* @var $dbh \Doctrine\DBAL\Driver\PDOConnection */
        $dbh = $this->getContainer()->get('doctrine')->getConnection();
    
        $cardsByIndex = $dbh->executeQuery(
                "SELECT
				c.id,
                c.code,
                count(*) nbdecks
                from card c
                join deckslot d on d.card_id=c.id
                where c.side_id=?
                group by c.id, c.code
                order by c.id", array($side_id))->fetchAll();

        $cardIndexById = array();
        foreach($cardsByIndex as $index => $card) {
            $cardIndexById[intval($card['id'])] = $index;
        }
        $cardCodesByIndex = array();
        foreach($cardsByIndex as $index => $card) {
            $cardCodesByIndex[$index] = $card['code'];
        }
    
        foreach($cardsByIndex as $index => $card) {
            $matrix[$index] = $index ? array_fill(0, $index, 0) : array();
        }
    
        $decks = $dbh->executeQuery(
                "SELECT
				d.id
                from deck d
                where d.side_id=?
                order by d.id", array($side_id))->fetchAll();
    
        $stmt = $dbh->prepare(
                "SELECT
				d.card_id
                from deckslot d
                where d.deck_id=?
                order by d.card_id");
    
        foreach($decks as $deck_id) {
            $stmt->bindValue(1, $deck_id['id']);
            $stmt->execute();
            $slots = $stmt->fetchAll();
            $pairs = $this->getAllPairs($slots);
            /*
             * $pairs holds all the pairs of card_id seen in deck_id
            * but $matrix is indexed by INDEX, not ID
            */
            foreach($pairs as $pair) {
                $index1 = $cardIndexById[$pair[0]];
                $index2 = $cardIndexById[$pair[1]];
                $matrix[$index1][$index2] = $matrix[$index1][$index2] + 1;
            }
        }
        
        /*
         * now we have to weight the cards. The numbers in $matrix are the number of decks
         * that include both x and y cards, so they are relative to the commonness of both
         * cards.
         * the choice made is to show the probability of the conjonction based on the least
         * common card. So that uncommon cards have the same weight in the suggestions as
         * common cards.
         */
        
        for($i=0; $i<count($matrix); $i++) {
            for($j=0; $j<$i; $j++) {
                $nbdecks = min($cardsByIndex[$i]['nbdecks'], $cardsByIndex[$j]['nbdecks']);
                $matrix[$i][$j] = round($matrix[$i][$j] / $nbdecks * 100);
            }
        }
        
        return array(
        	"index" => $cardCodesByIndex,
                "matrix" => $matrix
        );
    }
    
}