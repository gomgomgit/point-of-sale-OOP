<?php 
require '../config/ItemProcess.php';

use point_of_sale\config\Item;

$item = new Item;
$action = $_GET['action'];

if ($action == "add") {
	$item->insert_data($_POST['category'], $_POST['name'], $_POST['price'], $_POST['stock']);
	header ('location:index.php');
} elseif ($action == "edit") {
	$item->update_data($_POST['id'], $_POST['category'], $_POST['name'], $_POST['price'], $_POST['stock']);
	header ('location:index.php');
} elseif ($action == "delete") {
	$item->delete_data($_GET['id']);
	header('location:index.php');
}

 ?>