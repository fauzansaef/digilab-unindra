<?php
session_start();
define('BASE_URL', "http://localhost/perpustakaan/");

function check_login(){
	if(!isset($_SESSION['username'])){
		header("Location:http://localhost/perpustakaan/login.php");
	}
}



?>