# Quick notes for installation

- Go into the directory where your server will reside
- Fork the repo and clone it: `git clone https://github.com/yourname/netrunnerdb`
- This creates a directory named netrunnerdb. This has to be your apache DOCROOT. 
- Go into it.
- Install Composer: `curl -s http://getcomposer.org/installer | php`
- Install the vendor libs: `php composer.phar install`
- Create the database: `php app/console doctrine:database:create`
- Create the tables: `php app/console doctrine:schema:update --force`
- If the above command fails, edit app/config/parameters.yml and try again
- Import the data: mysql -u root -p netrunnerdb < netrunnerdb-cards.sql
- Configure your web server with the correct DocRoot
- Point your browser to `/web/app_dev.php`

# Quick notes for update

When you update your repository, run the following commands:

- `php composer.phar self-update`
- `php composer.phar update`
- `php app/console doctrine:schema:update --force`
- `php app/console cache:clear --env=dev`

## Deck of the Week

To update the deck of the week on the front page:

- `php app/console highlight` 

## Add cards

- login as ROLE_ADMIN (edit your user) or edit `app/config/security.yml`
- go to `/admin/card`, `/admin/pack`, `/admin/cycle`, etc.

# Misc Notes

- your php module must be configured with `mbstring.internal_encoding = UTF-8`
