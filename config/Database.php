<?php 
namespace point_of_sale\config;

class Database
	{
		public $server	= "localhost";
		public $user	= "root";
		public $pass	= 1234;
		public $db 		= "kasir_oop";
		public $connect = "";

		public function __construct() 
		{
			$this->connect = mysqli_connect($this->server, $this->user, $this->pass, $this->db);

			// if($connect){
			// 	echo "You're connected";
			// } else {
			// 	echo "Failed to connecting";
			// }

			if (mysqli_connect_error()) {
				echo "failed to connect";
			}
		}
	}
	new Database;





