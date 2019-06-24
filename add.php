<!DOCTYPE html>
<html>
	<head>
		<title>Add item</title>
	</head>
	<body>
		<?php

		if (isset($_GET['name']) && trim($_GET['name']) != '') {
			$name = $_GET['name'];
			echo $name;
		} else {
			?>

			<form action="add.php" method="get">
				<table>
					<tr><td><input type="text" name="name" placeholder="Item Name"></td></tr>
					<tr><td><textarea name="description" cols="40" rows="5" placeholder="Item Description"></textarea></td></tr>
					<tr><td><input type="number" min="0" max="99999.99" step="any" placeholder="Item Price"></td></tr>
					<tr><td><input type="number" min="1" max="9999" step="1" placeholder="Stock Amount"></td></tr>
					<tr><td><input type="submit" value="Add"></td></tr>
				<table>
			</form>

			<?php
		}

		?>
	</body>
</html>