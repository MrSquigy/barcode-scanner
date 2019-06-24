<!DOCTYPE html>
<html>
	<head>
		<title>View all items</title>
	</head>

	<body>
		<a href='index.html'>< Home</a><br />
		<h2>All Items</h2>
		<table width="800px">
			<tr>
				<td>Item Name</td>
				<td width="70%">Item Description</td>
				<td>Item Price</td>
				<td>Edit Link</td>
			</tr>

			<?php
			require_once('classes/DatabaseHelper.php');

			$get_items = "SELECT * FROM " . ITEMS_TABLE_NAME . " ORDER BY `id` ASC";

			$helper = new DatabaseHelper();
			
			$run = $helper->run_query($get_items);
			if ($run === FALSE) die("Failed to get all items: " . $helper->get_last_error());

			while ($item = $run->fetch_assoc()) {
				echo "<tr>";
				echo "<td><a href='lookup.php?id=$item[id]'>$item[name]</a></td>";
				echo "<td>$item[description]</td>";
				echo "<td>$$item[price]</td>";
				echo "<td><a href='edit.php?id=$item[id]'>Edit Item</a></td>";
				echo "</tr>";
			}
			?>
		</table>
	</body>
</html>