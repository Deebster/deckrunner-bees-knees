<?php

namespace Netrunnerdb\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 */
class Card
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $ts;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $titleFr;

    /**
     * @var string
     */
    private $titleDe;

    /**
     * @var string
     */
    private $titleEs;

    /**
     * @var string
     */
    private $titlePl;

    /**
     * @var string
     */
    private $titleIt;

    /**
     * @var string
     */
    private $keywords;

    /**
     * @var string
     */
    private $keywordsFr;

    /**
     * @var string
     */
    private $keywordsDe;

    /**
     * @var string
     */
    private $keywordsEs;

    /**
     * @var string
     */
    private $keywordsPl;

    /**
     * @var string
     */
    private $keywordsIt;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $textFr;

    /**
     * @var string
     */
    private $textDe;

    /**
     * @var string
     */
    private $textEs;

    /**
     * @var string
     */
    private $textPl;

    /**
     * @var string
     */
    private $textIt;

    /**
     * @var integer
     */
    private $advancementCost;

    /**
     * @var integer
     */
    private $agendaPoints;

    /**
     * @var integer
     */
    private $baseLink;

    /**
     * @var integer
     */
    private $cost;

    /**
     * @var integer
     */
    private $factionCost;

    /**
     * @var string
     */
    private $flavor;

    /**
     * @var string
     */
    private $flavorFr;

    /**
     * @var string
     */
    private $flavorDe;

    /**
     * @var string
     */
    private $flavorEs;

    /**
     * @var string
     */
    private $flavorPl;

    /**
     * @var string
     */
    private $flavorIt;

    /**
     * @var string
     */
    private $illustrator;

    /**
     * @var integer
     */
    private $influenceLimit;

    /**
     * @var integer
     */
    private $memoryUnits;

    /**
     * @var integer
     */
    private $minimumDeckSize;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var integer
     */
    private $strength;

    /**
     * @var integer
     */
    private $trashCost;

    /**
     * @var boolean
     */
    private $uniqueness;

    /**
     * @var boolean
     */
    private $limited;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $decklists;

    /**
     * @var \Netrunnerdb\CardsBundle\Entity\Pack
     */
    private $pack;

    /**
     * @var \Netrunnerdb\CardsBundle\Entity\Type
     */
    private $type;

    /**
     * @var \Netrunnerdb\CardsBundle\Entity\Faction
     */
    private $faction;

    /**
     * @var \Netrunnerdb\CardsBundle\Entity\Side
     */
    private $side;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->decklists = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ts = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ts
     *
     * @param \DateTime $ts
     * @return Card
     */
    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts
     *
     * @return \DateTime
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Card
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Card
     */
    public function setTitle($title, $locale = "en")
    {
        if($locale == "en") $this->title = $title;
        if($locale == "fr") $this->titleFr = $title;
        if($locale == "de") $this->titleDe = $title;
        if($locale == "es") $this->titleEs = $title;
        if($locale == "pl") $this->titlePl = $title;
        if($locale == "it") $this->titleIt = $title;
        
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle($locale = "en", $strict = false)
    {
        $res = $this->title;
        if($locale == "fr") $res = $this->titleFr || $strict ? $this->titleFr : $res;
        if($locale == "de") $res = $this->titleDe || $strict ? $this->titleDe : $res;
        if($locale == "es") $res = $this->titleEs || $strict ? $this->titleEs : $res;
        if($locale == "pl") $res = $this->titlePl || $strict ? $this->titlePl : $res;
        if($locale == "it") $res = $this->titleIt || $strict ? $this->titleIt : $res;
        return $res;
    }

    /**
     * Set titleFr
     *
     * @param string $titleFr
     * @return Card
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    /**
     * Get titleFr
     *
     * @return string
     */
    public function getTitleFr()
    {
        return $this->titleFr;
    }

    /**
     * Set titleDe
     *
     * @param string $titleDe
     * @return Card
     */
    public function setTitleDe($titleDe)
    {
        $this->titleDe = $titleDe;

        return $this;
    }

    /**
     * Get titleDe
     *
     * @return string
     */
    public function getTitleDe()
    {
        return $this->titleDe;
    }

    /**
     * Set titleEs
     *
     * @param string $titleEs
     * @return Card
     */
    public function setTitleEs($titleEs)
    {
        $this->titleEs = $titleEs;

        return $this;
    }

    /**
     * Get titleEs
     *
     * @return string
     */
    public function getTitleEs()
    {
        return $this->titleEs;
    }

    /**
     * Set titlePl
     *
     * @param string $titlePl
     * @return Card
     */
    public function setTitlePl($titlePl)
    {
        $this->titlePl = $titlePl;

        return $this;
    }

    /**
     * Get titlePl
     *
     * @return string
     */
    public function getTitlePl()
    {
        return $this->titlePl;
    }

    /**
     * Set titleIt
     *
     * @param string $titleIt
     * @return Card
     */
    public function setTitleIt($titleIt)
    {
        $this->titleIt = $titleIt;

        return $this;
    }

    /**
     * Get titleIt
     *
     * @return string
     */
    public function getTitleIt()
    {
        return $this->titleIt;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Card
     */
    public function setKeywords($keywords, $locale = "en")
    {
        if($locale == "en") $this->keywords = $keywords;
        if($locale == "fr") $this->keywordsFr = $keywords;
        if($locale == "de") $this->keywordsDe = $keywords;
        if($locale == "es") $this->keywordsEs = $keywords;
        if($locale == "pl") $this->keywordsPl = $keywords;
        if($locale == "it") $this->keywordsIt = $keywords;
        
        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords($locale = "en", $strict = false)
    {
        $res = $this->keywords;
        if($locale == "fr") $res = $this->keywordsFr || $strict ? $this->keywordsFr : $res;
        if($locale == "de") $res = $this->keywordsDe || $strict ? $this->keywordsDe : $res;
        if($locale == "es") $res = $this->keywordsEs || $strict ? $this->keywordsEs : $res;
        if($locale == "pl") $res = $this->keywordsPl || $strict ? $this->keywordsPl : $res;
        if($locale == "it") $res = $this->keywordsIt || $strict ? $this->keywordsIt : $res;
        return $res;
    }

    /**
     * Set keywordsFr
     *
     * @param string $keywordsFr
     * @return Card
     */
    public function setKeywordsFr($keywordsFr)
    {
        $this->keywordsFr = $keywordsFr;

        return $this;
    }

    /**
     * Get keywordsFr
     *
     * @return string
     */
    public function getKeywordsFr()
    {
        return $this->keywordsFr;
    }

    /**
     * Set keywordsDe
     *
     * @param string $keywordsDe
     * @return Card
     */
    public function setKeywordsDe($keywordsDe)
    {
        $this->keywordsDe = $keywordsDe;

        return $this;
    }

    /**
     * Get keywordsDe
     *
     * @return string
     */
    public function getKeywordsDe()
    {
        return $this->keywordsDe;
    }

    /**
     * Set keywordsEs
     *
     * @param string $keywordsEs
     * @return Card
     */
    public function setKeywordsEs($keywordsEs)
    {
        $this->keywordsEs = $keywordsEs;

        return $this;
    }

    /**
     * Get keywordsEs
     *
     * @return string
     */
    public function getKeywordsEs()
    {
        return $this->keywordsEs;
    }

    /**
     * Set keywordsPl
     *
     * @param string $keywordsPl
     * @return Card
     */
    public function setKeywordsPl($keywordsPl)
    {
        $this->keywordsPl = $keywordsPl;

        return $this;
    }

    /**
     * Get keywordsPl
     *
     * @return string
     */
    public function getKeywordsPl()
    {
        return $this->keywordsPl;
    }

    /**
     * Set keywordsIt
     *
     * @param string $keywordsIt
     * @return Card
     */
    public function setKeywordsIt($keywordsIt)
    {
        $this->keywordsIt = $keywordsIt;

        return $this;
    }

    /**
     * Get keywordsIt
     *
     * @return string
     */
    public function getKeywordsIt()
    {
        return $this->keywordsIt;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Card
     */
    public function setText($text, $locale = "en")
    {
        if($locale == "en") $this->text = $text;
        if($locale == "fr") $this->textFr = $text;
        if($locale == "de") $this->textDe = $text;
        if($locale == "es") $this->textEs = $text;
        if($locale == "pl") $this->textPl = $text;
        if($locale == "it") $this->textIt = $text;
        
        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText($locale = "en", $strict = false)
    {
        $res = $this->text;
        if($locale == "fr") $res = $this->textFr || $strict ? $this->textFr : $res;
        if($locale == "de") $res = $this->textDe || $strict ? $this->textDe : $res;
        if($locale == "es") $res = $this->textEs || $strict ? $this->textEs : $res;
        if($locale == "pl") $res = $this->textPl || $strict ? $this->textPl : $res;
        if($locale == "it") $res = $this->textIt || $strict ? $this->textIt : $res;
        return $res;
    }

    /**
     * Set textFr
     *
     * @param string $textFr
     * @return Card
     */
    public function setTextFr($textFr)
    {
        $this->textFr = $textFr;

        return $this;
    }

    /**
     * Get textFr
     *
     * @return string
     */
    public function getTextFr()
    {
        return $this->textFr;
    }

    /**
     * Set textDe
     *
     * @param string $textDe
     * @return Card
     */
    public function setTextDe($textDe)
    {
        $this->textDe = $textDe;

        return $this;
    }

    /**
     * Get textDe
     *
     * @return string
     */
    public function getTextDe()
    {
        return $this->textDe;
    }

    /**
     * Set textEs
     *
     * @param string $textEs
     * @return Card
     */
    public function setTextEs($textEs)
    {
        $this->textEs = $textEs;

        return $this;
    }

    /**
     * Get textEs
     *
     * @return string
     */
    public function getTextEs()
    {
        return $this->textEs;
    }

    /**
     * Set textPl
     *
     * @param string $textPl
     * @return Card
     */
    public function setTextPl($textPl)
    {
        $this->textPl = $textPl;

        return $this;
    }

    /**
     * Get textPl
     *
     * @return string
     */
    public function getTextPl()
    {
        return $this->textPl;
    }

    /**
     * Set textIt
     *
     * @param string $textIt
     * @return Card
     */
    public function setTextIt($textIt)
    {
        $this->textIt = $textIt;

        return $this;
    }

    /**
     * Get textIt
     *
     * @return string
     */
    public function getTextIt()
    {
        return $this->textIt;
    }

    /**
     * Set advancementCost
     *
     * @param integer $advancementCost
     * @return Card
     */
    public function setAdvancementCost($advancementCost)
    {
        $this->advancementCost = $advancementCost;

        return $this;
    }

    /**
     * Get advancementCost
     *
     * @return integer
     */
    public function getAdvancementCost()
    {
        return $this->advancementCost;
    }

    /**
     * Set agendaPoints
     *
     * @param integer $agendaPoints
     * @return Card
     */
    public function setAgendaPoints($agendaPoints)
    {
        $this->agendaPoints = $agendaPoints;

        return $this;
    }

    /**
     * Get agendaPoints
     *
     * @return integer
     */
    public function getAgendaPoints()
    {
        return $this->agendaPoints;
    }

    /**
     * Set baseLink
     *
     * @param integer $baseLink
     * @return Card
     */
    public function setBaseLink($baseLink)
    {
        $this->baseLink = $baseLink;

        return $this;
    }

    /**
     * Get baseLink
     *
     * @return integer
     */
    public function getBaseLink()
    {
        return $this->baseLink;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return Card
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set factionCost
     *
     * @param integer $factionCost
     * @return Card
     */
    public function setFactionCost($factionCost)
    {
        $this->factionCost = $factionCost;

        return $this;
    }

    /**
     * Get factionCost
     *
     * @return integer
     */
    public function getFactionCost()
    {
        return $this->factionCost;
    }

    /**
     * Set flavor
     *
     * @param string $flavor
     * @return Card
     */
    public function setFlavor($flavor, $locale = "en")
    {
        if($locale == "en") $this->flavor = $flavor;
        if($locale == "fr") $this->flavorFr = $flavor;
        if($locale == "de") $this->flavorDe = $flavor;
        if($locale == "es") $this->flavorEs = $flavor;
        if($locale == "pl") $this->flavorPl = $flavor;
        if($locale == "it") $this->flavorIt = $flavor;

        return $this;
    }

    /**
     * Get flavor
     *
     * @return string
     */
    public function getFlavor($locale = "en", $strict = false)
    {
        $res = $this->flavor;
        if($locale == "fr") $res = $this->flavorFr || $strict ? $this->flavorFr : $res;
        if($locale == "de") $res = $this->flavorDe || $strict ? $this->flavorDe : $res;
        if($locale == "es") $res = $this->flavorEs || $strict ? $this->flavorEs : $res;
        if($locale == "pl") $res = $this->flavorPl || $strict ? $this->flavorPl : $res;
        if($locale == "it") $res = $this->flavorIt || $strict ? $this->flavorIt : $res;
        return $res;
    }

    /**
     * Set flavorFr
     *
     * @param string $flavorFr
     * @return Card
     */
    public function setFlavorFr($flavorFr)
    {
        $this->flavorFr = $flavorFr;

        return $this;
    }

    /**
     * Get flavorFr
     *
     * @return string
     */
    public function getFlavorFr()
    {
        return $this->flavorFr;
    }

    /**
     * Set flavorDe
     *
     * @param string $flavorDe
     * @return Card
     */
    public function setFlavorDe($flavorDe)
    {
        $this->flavorDe = $flavorDe;

        return $this;
    }

    /**
     * Get flavorDe
     *
     * @return string
     */
    public function getFlavorDe()
    {
        return $this->flavorDe;
    }

    /**
     * Set flavorEs
     *
     * @param string $flavorEs
     * @return Card
     */
    public function setFlavorEs($flavorEs)
    {
        $this->flavorEs = $flavorEs;

        return $this;
    }

    /**
     * Get flavorEs
     *
     * @return string
     */
    public function getFlavorEs()
    {
        return $this->flavorEs;
    }

    /**
     * Set flavorPl
     *
     * @param string $flavorPl
     * @return Card
     */
    public function setFlavorPl($flavorPl)
    {
        $this->flavorPl = $flavorPl;

        return $this;
    }

    /**
     * Get flavorPl
     *
     * @return string
     */
    public function getFlavorPl()
    {
        return $this->flavorPl;
    }

    /**
     * Set flavorIt
     *
     * @param string $flavorIt
     * @return Card
     */
    public function setFlavorIt($flavorIt)
    {
        $this->flavorIt = $flavorIt;

        return $this;
    }

    /**
     * Get flavorIt
     *
     * @return string
     */
    public function getFlavorIt()
    {
        return $this->flavorIt;
    }

    /**
     * Set illustrator
     *
     * @param string $illustrator
     * @return Card
     */
    public function setIllustrator($illustrator)
    {
        $this->illustrator = $illustrator;

        return $this;
    }

    /**
     * Get illustrator
     *
     * @return string
     */
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * Set influenceLimit
     *
     * @param integer $influenceLimit
     * @return Card
     */
    public function setInfluenceLimit($influenceLimit)
    {
        $this->influenceLimit = $influenceLimit;

        return $this;
    }

    /**
     * Get influenceLimit
     *
     * @return integer
     */
    public function getInfluenceLimit()
    {
        return $this->influenceLimit;
    }

    /**
     * Set memoryUnits
     *
     * @param integer $memoryUnits
     * @return Card
     */
    public function setMemoryUnits($memoryUnits)
    {
        $this->memoryUnits = $memoryUnits;

        return $this;
    }

    /**
     * Get memoryUnits
     *
     * @return integer
     */
    public function getMemoryUnits()
    {
        return $this->memoryUnits;
    }

    /**
     * Set minimumDeckSize
     *
     * @param integer $minimumDeckSize
     * @return Card
     */
    public function setMinimumDeckSize($minimumDeckSize)
    {
        $this->minimumDeckSize = $minimumDeckSize;

        return $this;
    }

    /**
     * Get minimumDeckSize
     *
     * @return integer
     */
    public function getMinimumDeckSize()
    {
        return $this->minimumDeckSize;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Card
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Card
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return Card
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set trashCost
     *
     * @param integer $trashCost
     * @return Card
     */
    public function setTrashCost($trashCost)
    {
        $this->trashCost = $trashCost;

        return $this;
    }

    /**
     * Get trashCost
     *
     * @return integer
     */
    public function getTrashCost()
    {
        return $this->trashCost;
    }

    /**
     * Set uniqueness
     *
     * @param boolean $uniqueness
     * @return Card
     */
    public function setUniqueness($uniqueness)
    {
        $this->uniqueness = $uniqueness;

        return $this;
    }

    /**
     * Get uniqueness
     *
     * @return boolean
     */
    public function getUniqueness()
    {
        return $this->uniqueness;
    }

    /**
     * Set limited
     *
     * @param boolean $limited
     * @return Card
     */
    public function setLimited($limited)
    {
        $this->limited = $limited;

        return $this;
    }

    /**
     * Get limited
     *
     * @return boolean
     */
    public function getLimited()
    {
        return $this->limited;
    }

    /**
     * Add decklists
     *
     * @param \Netrunnerdb\BuilderBundle\Entity\Decklist $decklists
     * @return Card
     */
    public function addDecklist(\Netrunnerdb\BuilderBundle\Entity\Decklist $decklists)
    {
        $this->decklists[] = $decklists;

        return $this;
    }

    /**
     * Remove decklists
     *
     * @param \Netrunnerdb\BuilderBundle\Entity\Decklist $decklists
     */
    public function removeDecklist(\Netrunnerdb\BuilderBundle\Entity\Decklist $decklists)
    {
        $this->decklists->removeElement($decklists);
    }

    /**
     * Get decklists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDecklists()
    {
        return $this->decklists;
    }

    /**
     * Set pack
     *
     * @param \Netrunnerdb\CardsBundle\Entity\Pack $pack
     * @return Card
     */
    public function setPack(\Netrunnerdb\CardsBundle\Entity\Pack $pack = null)
    {
        $this->pack = $pack;

        return $this;
    }

    /**
     * Get pack
     *
     * @return \Netrunnerdb\CardsBundle\Entity\Pack
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set type
     *
     * @param \Netrunnerdb\CardsBundle\Entity\Type $type
     * @return Card
     */
    public function setType(\Netrunnerdb\CardsBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Netrunnerdb\CardsBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set faction
     *
     * @param \Netrunnerdb\CardsBundle\Entity\Faction $faction
     * @return Card
     */
    public function setFaction(\Netrunnerdb\CardsBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \Netrunnerdb\CardsBundle\Entity\Faction
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set side
     *
     * @param \Netrunnerdb\CardsBundle\Entity\Side $side
     * @return Card
     */
    public function setSide(\Netrunnerdb\CardsBundle\Entity\Side $side = null)
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get side
     *
     * @return \Netrunnerdb\CardsBundle\Entity\Side
     */
    public function getSide()
    {
        return $this->side;
    }
}
