<?php 
session_start();
require '../config/LoginProcess.php';
require '../config/UserProcess.php';

use point_of_sale\config\Login;
use point_of_sale\config\User;

$action = $_GET['action'];
$pass = md5($_POST['password']);
if ($action == 'login') {
	$login = new Login;
	$data = $login->check_data($_POST['email'], $pass);
	if ($data) 
	{
		$_SESSION['id'] = $data['id'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['name'] = $data['name'];
		header('location:../home/index.php');
	} else {
		header('location:login.php');
	}
} elseif ($action == "logout") {
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['id']);
	header('location:login.php');
} elseif ($action == "signup") {
	$user = new User;
	$user->insert_data($_POST['name'], $_POST['email'], $pass);
	header('location:login.php');
}