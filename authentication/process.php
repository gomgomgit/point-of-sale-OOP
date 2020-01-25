<?php 
session_start();
require '../config/LoginProcess.php';
require '../config/UserProcess.php';

use point_of_sale\config\Login;
use point_of_sale\config\User;

$action = $_GET['action'];

if ($action == 'login') {
	$login = new Login;
	$data = $login->check_data($_POST['email'], $_POST['password']);
	if ($data) 
	{
		$_SESSION['email'] = $data['email'];
		$_SESSION['name'] = $data['name'];
		header('location:../home/index.php');
	} else {
		header('location:login.php');
	}
} elseif ($action == "logout") {
	unset($_SESSION["email"]);
	unset($_SESSION["name"]);
	header('location:login.php');
} elseif ($action == "signup") {
	$user = new User;
	$user->insert_data($_POST['name'], $_POST['email'], $_POST['password']);
	header('location:login.php');
}