<!doctype html>
<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<title>Periksa</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include 'header.php'; ?>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-sm-7">
				<?php
				include_once 'pertanyaan.php';
				?>
			</div>
		</div>
	</div>
</body>

</html>