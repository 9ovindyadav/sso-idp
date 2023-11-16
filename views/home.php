<?php 
require("./meta-data.php"); 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>                                                             
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $company ?></title>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./views/css/bootstrap-4.6.2/css/bootstrap.min.css">
		<script defer src="./views/css/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>	

		<link rel="stylesheet" href="./views/css/index.css">
	</head>

	<body>
		<?php require("./views/header.php") ?>
		<div class="hero">
			<div class="hero-container text-center">
				<h1><?= strtoupper($theme) ?></h1>
				<p><?= $heroDescription ?></p>
				<div>
					<button class="btn btn-primary">Get Started</button>
					<button class="btn btn-primary">Request Demo</button>
				</div>
				
			</div>
			<div class="hero-brands">
				<img src="../assets/icons/amazon.svg" alt="">
				<img src="../assets/icons/nasa.svg" alt="">
				<img src="../assets/icons/tesla.svg" alt="">
				<img src="../assets/icons/walmart.svg" alt="">
				<img src="../assets/icons/mahindra.svg" alt="">
			</div>
		</div>
		<!-- <h1>Hello Mom!</h1>
		<iframe width="980" height="410" src="https://mars.nasa.gov/layout/embed/send-your-name/future/certificate/?cn=758464375941" frameborder="0"></iframe> -->
	</body>
</html>