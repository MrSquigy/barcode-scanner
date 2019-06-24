<?php

require_once('classes/DatabaseHelper.php');

/* Returns item from passed id */
function get_item($item_id) {
	$find_item = "SELECT * FROM " . ITEMS_TABLE_NAME . " WHERE id = '$item_id'";
	$helper = new DatabaseHelper();

	$run = $helper->run_query($find_item);
	if ($run === FALSE) die("Failed to lookup item: " . $helper->get_last_error());
	if ($run->num_rows == 0) return 0;
	$item = $run->fetch_assoc();

	return $item;
}

function add_item($name, $description, $price, $stock) {
	$add_item = "INSERT INTO " . ITEMS_TABLE_NAME . " (name, description, price, stock_count) VALUES ('$name', '$description', '$price', '$stock')";
	$helper = new DatabaseHelper();

	$run = $helper->run_query($add_item);
	if ($run === FALSE) return "Failed to add item: " . $helper->get_last_error();
	return "<a href='lookup.php?id=" . $helper->get_last_id() . "'>Successfully added item (ID: " . $helper->get_last_id() . ")</a>";
}

?>