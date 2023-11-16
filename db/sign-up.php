<?php

function matchPassword($password, $rePaasword) {
	return $password === $rePaasword ;
}

function toHash($password){
	return password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
}

function userExists($conn, $email){
	$sql = "SELECT email FROM users WHERE email = :email;" ;

	$statement = $conn->prepare($sql);
	$statement->bindParam(":email",$email);
	$statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);

	if($user){
		return $user;
	}
	return false;
}

function signUpUser() {
	 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		try {
		    
		    $conn = require_once(__DIR__ . "/connect.db.php");
		    require_once(__DIR__."/create-table.php");
		    createUsersTable($conn);

		    $sql = "INSERT INTO users(full_name,email,password,date_of_birth,mobile_no,country) VALUES(:name,:email,:password,:dob,:mobile,:country);";

		    $name = $_POST['full-name'];
		    $email = $_POST['email'];
		    $password = $_POST['password'];
		    $rePaasword = $_POST['re-password'];
		    $dob = $_POST['dob'] ?: date('Y-m-d');
		    $mobileNo = $_POST['mobile-no'];
		    $country = $_POST['country'];

		    if($name && $email && $password && $rePaasword){
		    	$user = userExists($conn,$email);
			     if(!$user){
			     	if ($password === $rePaasword) {
			     		$password = toHash($password);
			     		
			     		$statement = $conn->prepare($sql);
			     		$result = $statement->execute([
			     										':name' => $name,
			     										':email' => $email,
			     										':password' => $password,
			     										':dob' => $dob,
			     										':mobile' => $mobileNo,
			     										':country' => $country
			     										]);

			     		
			     		if($result){
			     			// echo("User Registered succesfully.");
			     			header("location: /login");
			     			exit();
			     		}else{
			     			echo("Failed to register.");
			     		}
			     	}else{
			     		echo("Password not matched.");
			     	}
			     }else{
			     	echo "User ".$user['email']." already exists.";
			     }

		    }else{
		    	echo("Please provide all the credentials.");
		    }

		} catch (Exception $e) {
		    // Handle any exceptions here, log them, or display an error message
		    echo "Caught exception: " . $e->getMessage();
		}
	}

}