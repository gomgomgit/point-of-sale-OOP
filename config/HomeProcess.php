<?php 
namespace point_of_sale\config;

include_once 'Database.php';

class Home extends Database
{
	public function show_data_user()
	{
		$query = mysqli_query($this->connect, 'SELECT * FROM user');
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		return $data;
	}
	public function show_data_category()
	{
		$query = mysqli_query($this->connect, 'SELECT * FROM category');
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		return $data;
	}
	public function show_data_item()
	{
		$query = mysqli_query($this->connect, "SELECT * FROM item");
		while ($row = mysqli_fetch_array($query)) {
			$data[] = $row;
		}
		return $data;
	}
}