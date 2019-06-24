<!DOCTYPE html>
<html>
	<head>
		<title>Add item</title>
	</head>
	<body>
		<a href="index.html">< Home</a><br />
		<h2>Add item</h2>
		<?php
		require_once('classes/DatabaseHelper.php');

		if (isset($_POST['name']) && trim($_POST['name']) != '') {
			$helper = new DatabaseHelper();
			
			$name = $helper->escape(trim($_POST['name']));
			$description = $helper->escape(trim($_POST['description']));
			$price = $helper->escape($_POST['price']);
			$stock_amount = $helper->escape($_POST['stock']);

			$add = add_item($helper, $name, $description, $price, $stock_amount);
			if (strpos($add, 'Fail') !== false) echo $add;
			else die($add);
		} else {
			?>

			<form action="add.php" method="post">
				<table>
					<tr><td><input type="text" name="name" placeholder="Item Name"></td></tr>
					<tr><td><textarea name="description" cols="40" rows="5" placeholder="Item Description"></textarea></td></tr>
					<tr><td><input type="number" name="price" min="0" max="99999.99" step="any" placeholder="Item Price"></td></tr>
					<tr><td><input type="number" name="stock" min="1" step="1" placeholder="Stock Amount"></td></tr>
					<tr><td><input type="submit" value="Add"></td></tr>
				<table>
			</form>

			<?php
		}

		?>
	</body>
</html>