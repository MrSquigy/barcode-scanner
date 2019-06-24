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
			$items = $_POST['items'];
		}

		?>

		<form action="batch_add.php">
			<p>You can upload a file or you can type/paste in below.<br /><br />
			The format is Name<?php echo SEPARATOR_STRING; ?>Description<?php echo SEPARATOR_STRING; ?>Price<?php echo SEPARATOR_STRING; ?>Stock<br />
			The separator is <?php echo SEPARATOR_STRING; ?> (You can modify the separator in config.php)</p>
			<input type="file" name="items_file"><br />
			<textarea name="items" cols="30" rows="10"></textarea>
		</form>
	</body>
</html>