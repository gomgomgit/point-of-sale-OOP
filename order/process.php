<?php 
require '../config/OrderProcess.php';

use point_of_sale\config\Order;

$order = new Order;
$action = $_GET['action'];
$date = date("Y-m-d");

if ($action == "add") {
	$order->insert_order($_POST['table'], $_POST['user'], $_POST['total-cart'], $date);

	for ($count = 0; $count<count($_POST['hidden_item']); $count++) 
	{
		$order->insert_orderdetail($_POST['hidden_item'][$count], $_POST['hidden_qty'][$count], $_POST['hidden_total'][$count]);
	};
	header ('location:index.php');
} elseif ($action == "add-detail") {
	for ($count = 0; $count<count($_POST['hidden_item']); $count++) 
	{
		$order->add_orderdetail($_POST['order'], $_POST['hidden_item'][$count], $_POST['hidden_qty'][$count], $_POST['hidden_total'][$count]);
	};
	$order->add_total_order($_POST['order'], $_POST['total-cart']);
	header ('location:detail.php?id='.$_POST["order"].'');
} elseif ($action == "edit") {
	$order->update_data($_POST['id'], $_POST['table'], $_POST['table-past'], $_POST['user']);
	header ('location:index.php');
} elseif ($action == "delete") {
	$order->delete_order($_GET['id']);

	header('location:index.php');
} elseif ($action == "delete_detail") {
	$order->delete_detail($_GET['id'], $_GET['order']);
	header ('location:detail.php?id='.$_GET["order"].'');
} elseif ($action == "check_table") {
	$table = $order->check_table();
	if (empty($table)) {
		header('location:add_order.php');
	} else {
	    echo "<script type='text/javascript'> //not showing me this
	        swal(
	            'Table sudah penuh',
	            'mohon maaf atas kekurangan kami',
	            'warning'
	        );
	        window.location.replace('index.php');
	    </script>";
	    // mysqli_close();
	}
}

?>