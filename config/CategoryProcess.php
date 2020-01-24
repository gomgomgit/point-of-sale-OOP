<?php 
namespace point_of_sale\config;


// require 'Database.php';

// use point_of_sale\config\Database;

include_once 'Database.php';


class Category extends Database
	{
		public function show_data()
		{
			$query = mysqli_query($this->connect, 'SELECT * FROM category');
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		public function insert_data($name)
		{
			mysqli_query($this->connect, "INSERT INTO category (name) VALUES ('$name')");
		}
		public function get_by_id($id)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM category WHERE id = '$id'");
			return $query->fetch_array();
		}
		public function update_data($id, $name)
		{
			mysqli_query($this->connect, "UPDATE category SET name = '$name' WHERE id = '$id'");
		}
		public function delete_data($id)
		{
			mysqli_query($this->connect, "DELETE FROM category WHERE id = '$id'");
		}
	}


 ?>