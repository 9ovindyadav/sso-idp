<?php

function resetPassword() {

	    $conn = require_once(__DIR__ . "/connect.db.php");
	 	$sql = "UPDATE users SET password = :password WHERE email = :email ;";
		session_start();
		$email = $_SESSION['email'];
		$password = $_POST['new-password'];
		$rePassword = $_POST['re-new-password'];

		if($password && $rePassword){

			if($password === $rePassword){
				$password = password_hash($password, PASSWORD_BCRYPT,["cost" => 12]);
				$statement = $conn->prepare($sql);
				$statement->bindParam(":email",$email);
				$statement->bindParam(":password",$password);

				if($statement->execute()){
					echo "User ".$email." Password updated successfully";
					header('location: /logout');
				}
			}else{
				echo("Password not matched.");
			}
		}	
}


