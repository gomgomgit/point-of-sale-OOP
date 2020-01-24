<?php 
namespace point_of_sale\config;

// require 'Database.php';

// use point_of_sale\config\Database;

include_once 'Database.php';

class Item extends Database
{
	public function show_data()
	{
		$query = mysqli_query($this->connect, "SELECT item.*, category.name as category FROM item INNER JOIN category ON item.category_id = category.id");
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		return $data;
	}
	public function insert_data($category, $name, $price, $stock)
	{
		mysqli_query($this->connect, "INSERT INTO item (category_id, name, price, stock) VALUES ('$category', '$name', '$price', '$stock')");
	}
	public function get_by_id($id)
	{
		$query = mysqli_query($this->connect, "SELECT item.*, category.name as category FROM item INNER JOIN category ON item.category_id = category.id WHERE item.id='$id'");
		return $query->fetch_array();
	}
	public function update_data($id, $category, $name, $price, $stock)
	{
		mysqli_query($this->connect, "UPDATE item SET category_id = '$category', name = '$name', price = '$price', stock = '$stock' WHERE id = '$id'");
	}
	public function delete_data($id)
	{
		mysqli_query($this->connect, "DELETE FROM item WHERE id = '$id'");
	}
}