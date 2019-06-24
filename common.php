<?php

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

?>