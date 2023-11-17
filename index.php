<?php

$request = $_SERVER['REQUEST_URI'];
session_start();

switch($request){
	case "":
	case "/":
		require("./views/home.php");
		break;
	case "/login":
		require("./views/login.php");
		break;
	case "/logout":
		require("./db/logout.php");
		break;
	case "/signup":
		require("./views/sign-up.php");
		break;
	case "/profile":
		require("./views/profile.php");
		break;
	case "/dashboard":
		if($_SESSION['role'] === "admin"){
			require("./views/dashboard.php");
		}else{
			http_response_code(404);
			echo("<h1 class='text-center'> You don't have permission to access this page.</h1>");
		}
		break;
	case "/delete-account":
		require("./db/delete-account.php");
		break;
	case "/reset":
		require("./views/reset-password.php");
		break;
	default:
		http_response_code(404);
		require("./views/404.php");
}
?>