<?php

// $conn = require_once("./connect.db.php");

function createUsersTable($conn) {
     $sql = "CREATE TABLE IF NOT EXISTS users( 
			  user_id   INT AUTO_INCREMENT,
			  full_name  VARCHAR(30) NOT NULL, 
			  email VARCHAR(30) NOT NULL,
			  role VARCHAR(5) DEFAULT 'user', 
			  password VARCHAR(100) NOT NULL,
			  date_of_birth DATE DEFAULT CURRENT_DATE,
			  mobile_no VARCHAR(13),
			  country VARCHAR(30),
			  PRIMARY KEY(user_id)
			);";

     $statement = $conn->prepare($sql);
     $result = $statement->execute();
     
}

