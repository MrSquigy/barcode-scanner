<!DOCTYPE html>
<html>
	<head>
		<title>Delete item</title>
	</head>

	<body>
		<a href='index.html'>< Home</a><br />
		<h2>Delete item</h2>

		<?php
		require_once('common.php');

		if (!isset($_POST['id'])) exit();

		$helper = new DatabaseHelper();

		$id = $helper->escape($_POST['id']);
		$delete_item = "DELETE FROM " . ITEMS_TABLE_NAME . "WHERE `id` = '$id'";

		$run = $helper->run_query($delete_item);
		if ($run === FALSE) die("Failed to delete item: " . $helper->get_last_error());
		else echo "Successfully deleted item";

		?>
	</body>
</html>