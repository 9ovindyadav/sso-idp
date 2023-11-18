<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./views/css/bootstrap-4.6.2/css/bootstrap.min.css">
	<script defer src="./views/css/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>	

	<link rel="stylesheet" href="./views/css/index.css">
	<script defer src="./views/js/app.js"></script>	
</head>
<body>
		<?php require("./views/header.php");
		$name = $_SESSION['full_name'];
	 	?>

		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto my-5 text-center">
					<h1>Welcome <?= $name ?></h1>
					<div class="my-5 d-flex justify-content-around">
						<a href="/reset" class="btn btn-primary">Reset Password</a>
						<a href="/delete" class="btn btn-secondary">Delete Account</a>
					</div>
				</div>
			</div>
		</div>
</body>
</html>