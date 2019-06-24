<!DOCTYPE html>
<html>
	<head>
		<title>Lookup item</title>
	</head>
	<body>
		<?php

		if (isset($_GET['id']) && trim($_GET['id']) != '') {
			$id = $_GET['id'];
			echo $id;
		} else {
			// Put html form in here
			?>

			<form action="lookup.php" method="get">
				<input type="text" name="id" id="id" placeholder="Item ID">
				<input type="submit" value="Lookup">
			</form>

			<?php
		}

		?>
	</body>
</html>