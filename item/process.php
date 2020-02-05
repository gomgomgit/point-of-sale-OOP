<?php 
require '../config/ItemProcess.php';

use point_of_sale\config\Item;

$item = new Item;
$action = $_GET['action'];

if ($action == "add") {
	$menu_name = $_FILES['menu']['name'];
	$tmp_name = $_FILES['menu']['tmp_name'];

	if (empty($menu_name)) {
		$menu_image = "menu-default.jpg";
	} else {
		$menu_image =  ($_POST['name'].".jpg");
		$menu_image =  str_replace(" ", "", $menu_image);

		move_uploaded_file($tmp_name, "../menu/".$menu_image);
	}

	$item->insert_data($_POST['category'], $_POST['name'], $_POST['price'], $_POST['stock'], $menu_image);
	header ('location:index.php'); 
} elseif ($action == "edit") {

	$menu_name = $_FILES['menu']['name'];
	$tmp_name = $_FILES['menu']['tmp_name'];

	if (empty($menu_name)) {
		$menu_image = $old_menu;
	} else {
		$menu_image =  ($_POST['name'].".jpg");
		$menu_image =  str_replace(" ", "", $menu_image);

		move_uploaded_file($tmp_name, "../menu/".$menu_image);
	}

	$item->update_data($_POST['id'], $_POST['category'], $_POST['name'], $_POST['price'], $_POST['stock'], $menu_image);
	header ('location:index.php');
} elseif ($action == "delete") {
	$item->delete_data($_GET['id']);
	header('location:index.php');
}

 ?>