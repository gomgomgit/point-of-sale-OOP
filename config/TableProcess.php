<?php 
namespace point_of_sale\config;

// require 'Database.php';

// use point_of_sale\config\Database;

include_once 'Database.php';


class Table extends Database
	{
		public function show_data()
		{
			$query = mysqli_query($this->connect, 'SELECT * FROM tablee');
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		public function show_available()
		{
			$query = mysqli_query($this->connect, 'SELECT * FROM tablee WHERE status = 1');
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		public function insert_data($number, $seats, $status)
		{
			mysqli_query($this->connect, "INSERT INTO tablee (number, seats, status) VALUES ('$number', '$seats', '$status')");
		}
		public function get_by_id($id)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM tablee WHERE id = '$id'");
			return $query->fetch_assoc();
		}
		public function update_data($id, $number, $seats, $status)
		{
			mysqli_query($this->connect, "UPDATE tablee SET number = '$number', seats = '$seats', status = '$status' WHERE id = '$id'");
		}
		public function delete_data($id)
		{
			mysqli_query($this->connect, "DELETE FROM tablee WHERE id = '$id'");
		}
	}


 ?>