<?php 
require '../config/UserProcess.php';

use point_of_sale\config\User;

$user = new User;
$action = $_GET['action'];
if ($action == "add") {
	$user->insert_data($_POST['name'], $_POST['email'], $_POST['password']);
	header('location:index.php');
} elseif ($action == "edit") {
	$user->update_data($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password']);
	header('location:index.php');
} elseif ($action == "delete") {
	$user->delete_data($_GET['id']);
	header('location:index.php');
}

 ?>