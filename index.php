<?php

$request = $_SERVER['REQUEST_URI'];

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