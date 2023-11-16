<?php

function loginUser(){

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$conn = require_once(__DIR__ . "/connect.db.php");
	    
	    $email = $_POST['email'];
	    $password = $_POST['password'];

	    $sql = "SELECT full_name,email,password FROM users WHERE email = :email ;";
	    
	    $statement = $conn->prepare($sql);
	    $statement->bindParam(":email",$email);
	    $statement->execute();
	    $user = $statement->fetch(PDO::FETCH_ASSOC);
	    
	    if($user){
	    
	    	$storedHashPassword = $user['password'];
	    	if(password_verify($password, $storedHashPassword)){
	    		session_start();
	    		$_SESSION['email'] = $user['email'] ;
	    		$_SESSION['full_name'] = $user['full_name'] ;
	    		header('location: /');
	    	}
	    	echo("Invalid credentials !");
	        
	    }else{
	    	echo("User not found.");
	    }
	}
}