<?php
$conn = require_once(__DIR__ . "/connect.db.php");

$sql = "DELETE FROM users WHERE email = :email ;";
session_start();
$email = $_SESSION['email'];
$statement = $conn->prepare($sql);
$statement->bindParam(":email",$email);

if($statement->execute()){
	echo "User ".$email." deleted successfully";
	header('location: /logout');
}