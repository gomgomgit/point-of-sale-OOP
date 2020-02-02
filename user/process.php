<?php 
require '../config/UserProcess.php';

use point_of_sale\config\User;

$user = new User;
$action = $_GET['action'];
if ($action == "add") {
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
	// header('location:index.php');
} elseif ($action == "edit") {
	if (empty($_POST['password'])) {
		$pass = $_POST['old_pass'];
	} else {
		$pass = md5($_POST['password']);
	}

	$avatar_name = $_FILES['avatar']['name'];
	$tmp_name = $_FILES['avatar']['tmp_name'];

	if (empty($avatar_name)) {
		$avatar_user = $_POST['old_avatar'];
	} else {
		$avatar_user =  ($_POST['name'].$_POST['id'].".jpg");
		$avatar_user =  str_replace(" ", "", $avatar_user);

		move_uploaded_file($tmp_name, "../avatar/".$avatar_user);
	}
	var_dump($avatar_user);

	$user->update_data($_POST['id'], $_POST['name'], $_POST['email'], $pass, $avatar_user);
	// header('location:index.php');
} elseif ($action == "delete") {
	$user->delete_data($_GET['id']);
	header('location:index.php');
}

 ?>