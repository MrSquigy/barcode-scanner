<?php
require_once('classes/DatabaseHelper.php');

/*	
*	This file sets up the MySQL database, additionally
*	you can use this file to add test data into the databases.
*/

// SQL Commands
$create_db = "CREATE DATABASE IF NOT EXISTS " . DATABASE_NAME;
$delete_db = "DROP DATABASE IF EXISTS " . DATABASE_NAME;
$create_items_table = "CREATE TABLE IF NOT EXISTS " . ITEMS_TABLE_NAME . " (id INT(6) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, description TEXT NOT NULL, price FLOAT(7, 2) NOT NULL DEFAULT 0, stock_count INT NOT NULL DEFAULT 0, order_date DATETIME)";
$insert_keyboard =  $insertConf = "INSERT INTO " . ITEMS_TABLE_NAME . " (name, description, price, stock_count) VALUES ('Keyboard', 'Basic Keyboard', '15', '10')";
$insert_mouse =  $insertConf = "INSERT INTO " . ITEMS_TABLE_NAME . " (name, description, price, stock_count) VALUES ('Mouse', 'Basic Mouse', '20', '10')";

$helper = new DatabaseHelper(false); // Create bare connection

if (isset($_GET['reinstall'])) $run = $helper->run_query($delete_db); // Reinstall

// Create the database
$run = $helper->run_query($create_db);
if ($run === FALSE) die("Failed to create database: " . $helper->get_last_error());

$helper = new DatabaseHelper(); // Create new helper with connection

// Create items table
$run = $helper->run_query($create_items_table);
if ($run === FALSE) die("Failed to create the items table: " . $helper->get_last_error());

// Add test data
$run = $helper->run_query($insert_keyboard);
$run = $helper->run_query($insert_mouse);
?>