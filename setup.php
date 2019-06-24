<?php
require_once('config.php'); // Include our config file

/*	
*	This file sets up the MySQL database, additionally
*	you can use this file to add test data into the databases.
*/

// SQL Commands
$create_db = "CREATE DATABASE IF NOT EXISTS " . DATABASE_NAME;
$create_items_table = "CREATE TABLE IF NOT EXISTS " . ITEMS_TABLE_NAME . " (id INT(6) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, description TEXT NOT NULL, price FLOAT(7, 2) NOT NULL DEFAULT 0, stock_count INT NOT NULL DEFAULT 0, order_date DATETIME NOT NULL)";
?>