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

			// Handle if a file was uploaded
			if (isset($_FILES['items_file'])) {
				$file_name = $_FILES['items_file']['tmp_name'];
				if ($_FILES['items_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($file_name)) $items = file_get_contents($file_name);
			} else $items = $_POST['items'];

			$items = preg_split('/\r\n|[\r\n]/', $items); // Split the lines

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

		<form enctype="multipart/form-data" action="batch_add.php" method="post">
			<p>You can upload a file or you can type/paste in below.<br /><br />
			The format is Name<?php echo SEPARATOR_STRING; ?>Description<?php echo SEPARATOR_STRING; ?>Price<?php echo SEPARATOR_STRING; ?>Stock<br />
			The separator is <?php echo SEPARATOR_STRING; ?> (You can modify the separator in config.php)</p>
			<input type="file" name="items_file"><br />
			<textarea name="items" cols="30" rows="10"></textarea><br />
			<input type="submit" value="Add Items">
		</form>
	</body>
</html>