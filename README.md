# e-lyrics-app-org

### Htaccess file :

Htaccess is a configuration file for the Apache web server, and the mod_rewrite directive tells to Apache that every request will end up to the index.php located in the folder named public.
Another thing: using htaccess and drive the traffic under the public folder, the rest of your project’s structure will be hidden to anyone.

### config file

Inside the config file, we can store the settings of the project, for example, we can store the name of our app, the path of the root, and of course, the database connection parameters.

### autoloader

In this project I am using PSR-4 autoloading autoloader from the composer

### Libraries and packages 
 
* ###### doctrine/collections : a library that contains classes for working with arrays of data.
* ###### ext-pdo : a package that contains the PDO extension for PHP. PDO extension provides a data-access abstraction layer
* ###### symphony routing : 
* ###### symphony http : 