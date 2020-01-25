<?php 
namespace point_of_sale\config;

include_once 'Database.php';

class Login extends Database
{
	public function check_data($email, $password)
	{
		$query = mysqli_query($this->connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
		return $query->fetch_array();
	}
}