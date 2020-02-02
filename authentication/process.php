<?php 
session_start();
require '../config/LoginProcess.php';
require '../config/UserProcess.php';

use point_of_sale\config\Login;
use point_of_sale\config\User;

$action = $_GET['action'];
if ($action == 'login') {
	$pass = md5($_POST['password']);
	$login = new Login;
	$data = $login->check_data($_POST['email'], $pass);
	if ($data) 
	{
		$_SESSION['id'] = $data['id'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['avatar'] = $data['avatar'];
		header('location:../home/index.php');
	} else {
		header('location:login.php');
	}
} elseif ($action == "logout") {
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['id']);
	unset($_SESSION['avatar']);
	header('location:login.php');
} elseif ($action == "signup") {
	$user = new User;
	$pass = md5($_POST['password']);

	$avatar_name = $_FILES['avatar']['name'];
	$tmp_name = $_FILES['avatar']['tmp_name'];

	if (empty($avatar_name)) {
		$avatar_user = "avatar-".rand(1,5).".jpg";
	} else {
		$avatar_user =  ($_POST['name'].$_POST['id'].".jpg");
		$avatar_user =  str_replace(" ", "", $avatar_user);

		move_uploaded_file($tmp_name, "../avatar/".$avatar_user);
	}

	$user->insert_data($_POST['name'], $_POST['email'], $pass, $avatar_user);
	header('location:login.php');
}