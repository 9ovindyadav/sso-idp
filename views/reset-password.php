<?php 
require("./meta-data.php");
require_once(__DIR__."/../db/reset-password.php");
resetPassword();
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
					<h1 class="text-center">Reset Password </h1>
					<div class="row">
						
						<div class="col-12 form-group">
						      <label for="new-password">New password</label>
						      <input type="password" name="new-password" class="form-control" id="new-password" placeholder="Enter new password">
						</div>
						<div class="col-12 form-group">
						    <label for="re-new-password">Confirm new password</label>
						    <input type="password" name="re-new-password" class="form-control" id="re-new-password" placeholder="Confirm your new password">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary w-100">Update Password</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>
</html>