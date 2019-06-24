<!DOCTYPE html>
<html>
	<head>
		<title>Edit an item</title>
	</head>
	
	<body>
		<a href='index.html'>< Home</a><br />
		<h2>Edit an Item</h2>
		<?php
		require_once('common.php');
		
		if (!isset($_GET['id'])) exit();
		$id = $_GET['id'];
		$item = get_item($id);

		if ($item == 0) die("<p>There is no item with that ID</p>");

		if (isset($_POST['name'])) {
			$helper = new DatabaseHelper();
			
			$name = $helper->escape(trim($_POST['name']));
			$description = $helper->escape(trim($_POST['description']));
			$price = $helper->escape($_POST['price']);
			$stock_amount = $helper->escape($_POST['stock']);

			$update_item = "UPDATE " . ITEMS_TABLE_NAME . " SET name='$name', description='$description', price='$price', stock_count='$stock_amount' WHERE id = '$id'";

			$run = $helper->run_query($update_item);
			if ($run === FALSE) die("Failed to update item: " . $helper->get_last_error());

			echo "Successfully updated item";
			exit(); // Don't display the form if we edited.
		}

		echo "<form action='edit.php?id=$id' method='post'>";
		echo "<table>";
		echo "<tr><td>Item Name</td></tr>";
		echo "<tr><td><input type='text' name='name' placeholder='Item Name' value='$item[name]'></td></tr>";
		echo "<tr><td>Item Description</td></tr>";
		echo "<tr><td><textarea name='description' cols='40' rows='5' placeholder='Item Description'>$item[description]</textarea></td></tr>";
		echo "<tr><td>Item Price</td></tr>";
		echo "<tr><td><input type='number' name='price' min='0' max='99999.99' step='any' placeholder='Item Price' value='$item[price]'></td></tr>";
		echo "<tr><td>Stock Amount</td></tr>";
		echo "<tr><td><input type='number' name='stock' min='1' step='1' placeholder='Stock Amount' value='$item[stock_count]'></td></tr>";
		echo "<tr><td><input type='submit' value='Update'></td></tr>";
		echo "<table>";
		echo "</form>";

		?>

	</body>
</html>