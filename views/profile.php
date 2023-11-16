<?php require("./meta-data.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./views/css/bootstrap-4.6.2/css/bootstrap.min.css">
	<script defer src="./views/css/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>	

	<link rel="stylesheet" href="./views/css/index.css">	
</head>
<body>
	<?php require("./views/header.php");
			session_start();
			$name = $_SESSION['full_name'];
	 ?>
	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-6 mx-auto text-center my-5">
	 			 <h1 class="mb-5">Welcome <?php echo $name ?></h1>
	 			<a class="btn btn-primary" href="/reset">Reset Password</a>
	 			<a class="btn btn-secondary" href="/delete-account">Delete Account</a>
	 		</div>
	 	</div>
	 </div>
</body>
</html>