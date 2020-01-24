<?php 
namespace point_of_sale\config;

// require 'Database.php';

// use point_of_sale\config\Database;

include_once 'Database.php';


class User extends Database
	{
		public function show_data()
		{
			$query = mysqli_query($this->connect, 'SELECT * FROM user');
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		public function insert_data($name, $email, $password)
		{
			mysqli_query($this->connect, "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')");
		}
		public function get_by_id($id)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM user WHERE id = '$id'");
			return $query->fetch_assoc();
		}
		public function update_data($id, $name, $email, $password)
		{
			mysqli_query($this->connect, "UPDATE user SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'");
		}
		public function delete_data($id)
		{
			mysqli_query($this->connect, "DELETE FROM user WHERE id = '$id'");
		}
	}


 ?>