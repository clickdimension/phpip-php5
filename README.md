# phpip-php5
Rewrite of PHPIP tool for PHP5

Since PHPIP from https://sourceforge.net/projects/phpip/ seems to be abandoned, besides depending on obsolete PHP version I did a rewrite expanding the original database and writing a new web front with Laravel 4, Bootstrap and Jquery.
The rewrite allowed us to migrate to a fairly updated server and shut down the old obsolete one.

After the migration the login form allows using the old passwords (not known to the admin), wich are being transformed into a new and safer format during the first successfull logins.

Thanks to Bootstrap i also did some visual tweaking ;) - hoping to make it more intuitive and practical.
