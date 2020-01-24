<?php 
require '../config/CategoryProcess.php';

use point_of_sale\config\Category;

$category = new Category;

$action = $_GET['action'];

if ($action == 'add') 
{
	$category->insert_data($_POST['name']);
	header('location:index.php');
	// var_dump($_POST['name']);
} elseif ($action == 'edit') {
	$category->update_data($_POST['id'], $_POST['name']);
	header('location:index.php');
} elseif ($action == 'delete') {
	$category->delete_data($_GET['id']);
	header('location:index.php');
}
