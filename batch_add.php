<!DOCTYPE html>
<html>
	<head>
		<title>Batch add items</title>
	</head>
	
	<body>
		<a href="index.html">< Home</a><br />
		<h2>Batch add items</h2>

		<?php
		require_once('common.php');

		if (isset($_POST['items'])) {
			//if (isset($_POST['items_file']) $items = explode('\n', $_POST['items_file']);
			$items = preg_split('/\r\n|[\r\n]/', $_POST['items']); // Split the lines

			for ($i = 0; $i < count($items); $i++) $items[$i] = explode(SEPARATOR_STRING, $items[$i]);

			$helper = new DatabaseHelper();
			$count = 0;
			foreach ($items as $item) {
				$name = $helper->escape($item[0]);
				$description = $helper->escape($item[1]);
				$price = $helper->escape($item[2]);
				$stock = $helper->escape($item[3]);

				$add = add_item($name, $description, $price, $stock);
				if (strpos($add, 'Success') !== false) $count++;
			}

			echo "Successfully added $count/" . count($items) . " items";
			exit();
		}

		?>

		<form action="batch_add.php" method="post">
			<p>You can upload a file or you can type/paste in below.<br /><br />
			The format is Name<?php echo SEPARATOR_STRING; ?>Description<?php echo SEPARATOR_STRING; ?>Price<?php echo SEPARATOR_STRING; ?>Stock<br />
			The separator is <?php echo SEPARATOR_STRING; ?> (You can modify the separator in config.php)</p>
			<input type="file" name="items_file"><br />
			<textarea name="items" cols="30" rows="10"></textarea><br />
			<input type="submit" value="Add Items">
		</form>
	</body>
</html>