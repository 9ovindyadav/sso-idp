 <?php 
require_once(__DIR__ . "/../meta-data.php");

require_once(__DIR__."/../db/sign-up.php");
signUpUser();

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
	<script defer src="./views/js/app.js"></script>	
</head>
<body>
	<?php require("./views/header.php") ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto form-container">
				<form method="POST" id="signup-form">
					<h1>Sign up </h1>
					<p>Enter your details below to create your account and get started.</p>
					<div class="row">
						<div class="col-6 form-group">
						    <label for="full-name">Full name</label>
						    <input 
						    	type="text" 
						    	class="form-control" 
						    	id="full-name"
						    	name="full-name" 
						    	placeholder="Enter your full name">
						</div>
						<div class="col-6 form-group">
						      <label for="email">Email address</label>
						      <input 
						      	type="email" 
						      	class="form-control" 
						      	name="email" 
						      	id="email" 
						      	placeholder="name@example.com">
						</div>
					</div>
					<div class="row">
						<div class="col-6 form-group">
						    <label for="date-of-birth">Date of birth</label>
						    <input 
						    	type="date" 
						    	class="form-control" 
						    	name="dob" 
						    	onclick="this.showPicker()" 
						    	id="date-of-birth" 
						    	placeholder="Enter your full name">
						</div>
						<div class="col-6 form-group">
						    <label for="mobile-no">Mobile no</label>
						    <input 
						      	type="tel" 
						      	class="form-control" 
						      	name="mobile-no" 
						      	id="mobile-no" 
						      	placeholder="+91">
						</div>
					</div>
					<div class="row">
						<div class="col-6 form-group">
						    <label for="country">Country</label>
						    <select 
						    	class="form-control" 
						    	name="country" 
						    	id="country">
						       <option>Select your country...</option>
						       <?php 
						       $newArr = array_map(function($country){
						       	return "<option>".$country."</option>";
						       }, $countries);

						       echo(implode("", $newArr));
						       ?>
						     </select>
						</div>
						
					</div>
					<div class="row">
						<div class="col-6 form-group">
						    <label for="password">Password</label>
						    <input 
						    	type="password" 
						    	class="form-control" 
						    	id="password" 
						    	name="password" 
						    	placeholder="Create a password">
						</div>
						<div class="col-6 form-group">
						      <label for="re-password">Confirm password</label>
						      <input 
						      	type="password" 
						      	class="form-control" 
						      	id="re-password" 
						      	name="re-password" 
						      	placeholder="name@example.com">
						</div>
					</div>

					<div class="row my-3">
						<div class="col">
							<button type="reset" class="btn btn-secondary w-100">Cancel</button>
						</div>
						<div class="col">
							<button type="submit" class="btn btn-primary w-100">Sign up</button>
						</div>
					</div>

					<p class="text-center mt-4">Already have an account ? <a href="/login">Login</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>