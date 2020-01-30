<?php 
require '../config/TableProcess.php';

use point_of_sale\config\Table;

$table = new Table;
$action = $_GET['action'];
if ($action == "add") {
	$table->insert_data($_POST['table'], $_POST['seats'], $_POST['status']);
	header('location:index.php');
} elseif ($action == "edit") {
	$table->update_data($_POST['id'], $_POST['table'], $_POST['seats'], $_POST['status']);
	header('location:index.php');
} elseif ($action == "delete") {
	$table->delete_data($_GET['id']);
	header('location:index.php');
}

 ?>