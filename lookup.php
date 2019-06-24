<!DOCTYPE html>
<html>
	<head>
		<title>Lookup item</title>
	</head>
	<body>
		<a href="index.html"><- Home</a><br /><br />
		<form action="lookup.php" method="get">
			<input type="text" name="id" placeholder="Item ID" autofocus>
			<input type="submit" value="Lookup">
		</form>

		<?php
		require_once('classes/DatabaseHelper.php');
		require_once('common.php');

		if (isset($_GET['id']) && trim($_GET['id']) != '') {
			$id = $_GET['id'];
			$item = get_item($id);

			if ($item == 0) die("<p>There is no item with that ID</p>");

			?>
			<table width="500px">
			<tr><td><h1><?php echo $item['name']; ?></h1></td></tr>
			<tr><td><?php echo $item['description']; ?></td></tr>
			<tr><td align="right">$<?php echo $item['price']; ?></td></tr>
			</table>

			<?php
		}
		?>
	</body>
</html>