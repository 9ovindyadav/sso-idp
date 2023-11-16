<?php

require __DIR__.'/../utils/config.php';

function connectDb($dbHost, $dbName, $dbUser, $dbPassword) {
		
		$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

		try {
			$conn = new PDO($dsn, $dbUser, $dbPassword);
            
			if ($conn) {
				// echo "Connected to the $dbName database successfully!";
				return $conn ;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
}

return connectDb($dbHost, $dbName, $dbUser, $dbPassword);