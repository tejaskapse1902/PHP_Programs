<?php
// DB credentials.
define('DB_HOST','localhost:3307');
define('DB_USER','TejasKapse');
define('DB_PASS','Pass@123');
define('DB_NAME','demodb'); // put you database name here
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,
DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>