<?php 
require("./meta-data.php");
require_once(__DIR__."/../db/login.php");
loginUser();
  
?>

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
	<?php require("./views/header.php") ?>
	<div class="container">
		<div class="row">
			<div class="col-md-5 mx-auto form-container">
				<form method="POST">
					<h1 class="text-center">Welcome back ! </h1>
					<p class="text-center m-0">Glad to see you again 👋</p>
					<p class="text-center">Enter your details to login below.</p>
					<div class="row">
						
						<div class="col-12 form-group">
						      <label for="email">Email address</label>
						      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
						</div>
						<div class="col-12 form-group">
						    <label for="password">Password</label>
						    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary w-100">Login</button>
						</div>
					</div>
				

					<p class="text-center mt-4">Already have an account ? <a href="/signup">Sign up</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>