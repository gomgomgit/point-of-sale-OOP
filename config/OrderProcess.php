<?php 
namespace point_of_sale\config;

// require 'Database.php';

// use point_of_sale\config\Database;

include_once 'Database.php';

class Order extends Database
{
	public function show_order()
	{
		$query = mysqli_query($this->connect, "SELECT orderr.*, user.name AS user FROM orderr INNER JOIN user ON orderr.user_id = user.id");
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		if (isset($data)) {
		return $data;
		}
	}
	public function show_detail_order($id)
	{
		$query = mysqli_query($this->connect, "SELECT order_detail.*, item.name AS item, item.price AS price FROM order_detail INNER JOIN item ON order_detail.item_id = item.id WHERE order_id='$id'");
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		return $data;
	}

	public function insert_order($table, $user, $total, $date)
	{
		mysqli_query($this->connect, "INSERT INTO orderr (table_number, user_id, total, date) VALUES ('$table', '$user', '$total', '$date')");
		mysqli_query($this->connect,"UPDATE tablee SET status = 0 WHERE id = '$table'");
	}
	public function insert_orderdetail($item, $qty, $total) 
	{
		$order = mysqli_query($this->connect, "SELECT MAX(id) AS new_order FROM orderr");
		$new_order = $order->fetch_array();
		$max_order = $new_order['new_order'];
		// var_dump($new_order);
		mysqli_query($this->connect, "INSERT INTO order_detail (order_id, item_id, qty, total) VALUES ('$max_order', '$item', '$qty', '$total')"); 

		$stock_item = mysqli_query($this->connect, "SELECT * FROM item WHERE id = '$item'");
		$stock = $stock_item->fetch_array();
		$stock = $stock['stock'];
		$stock_now = $stock - $qty;
		var_dump($stock_item);
		mysqli_query($this->connect, "UPDATE item SET stock = '$stock_now' WHERE id = '$item'");
	}
	public function add_orderdetail($order_id, $item, $qty, $total) 
	{
		mysqli_query($this->connect, "INSERT INTO order_detail (order_id, item_id, qty, total) VALUES ('$order_id', '$item', '$qty', '$total')"); 
		$stock = mysqli_query($this->connect, "SELECT stock FROM item WHERE id = '$item'");
		$stock = $stock->fetch_array();
		$stock = $stock['stock'] ;
		$stock_now = $stock - $qty;
		var_dump($stock);
		mysqli_query($this->connect, "UPDATE item SET stock = '$stock_now'");
	}
	public function add_total_order($id, $total) 
	{
		$order = mysqli_query($this->connect, "SELECT * FROM orderr WHERE id = '$id'");
		$order = $order->fetch_array();
		$order = $order['total'];
		$new_total = $order + $total;
		mysqli_query($this->connect, "UPDATE orderr SET total = '$new_total' WHERE id = $id");
	}
	public function get_by_id($id)
	{
		$query = mysqli_query($this->connect, "SELECT orderr.*, user.name as user FROM orderr INNER JOIN user ON orderr.user_id = user.id WHERE orderr.id='$id'");
		return $query->fetch_array();
	}
	public function order_by_id($id)
	{
		$query = mysqli_query($this->connect, "SELECT orderr.*, user.name as user FROM orderr INNER JOIN user ON orderr.user_id = user.id WHERE orderr.id='$id'");
		return $query->fetch_array();
	}
	public function update_data($id, $table, $table_past, $user)
	{
		mysqli_query($this->connect, "UPDATE orderr SET table_number = '$table', user_id = '$user' WHERE id = '$id'");
		mysqli_query($this->connect,"UPDATE tablee SET status = 1 WHERE id = '$table_past'");
		mysqli_query($this->connect,"UPDATE tablee SET status = 0 WHERE id = '$table'");
	}
	public function delete_order($id)
	{
		$table = mysqli_query($this->connect, "SELECT table_number FROM orderr WHERE id='$id'");
		$table = $table->fetch_array();
		$table = $table['table_number'];
		mysqli_query($this->connect, "DELETE FROM orderr WHERE id = '$id'");
		mysqli_query($this->connect, "DELETE FROM order_detail WHERE order_id = '$id'");
		mysqli_query($this->connect,"UPDATE tablee SET status = 1 WHERE id = '$table'");
	}
	public function delete_detail($id, $order)
	{
		$detail = mysqli_query($this->connect, "SELECT * FROM order_detail WHERE id = '$id'");
		$detail = $detail->fetch_array();
		$detail_total = $detail['total'];
		$detail_order = $detail['order_id'];

		$order = mysqli_query($this->connect, "SELECT * FROM orderr WHERE id = '$detail_order'");
		$order = $order->fetch_array();
		$order = $order['total'];

		$new_total = $order - $detail_total;

		mysqli_query($this->connect, "DELETE FROM order_detail WHERE id ='$id'");
		mysqli_query($this->connect, "UPDATE orderr SET total = '$new_total'");
	}
}