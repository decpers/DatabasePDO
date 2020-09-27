<?php

	/*
	 * Remember: properties must be of type private and methods public.
	 */
	
	class Connection{

		private $hostServer = "localhost";
		private $user = "root";
		private $password = "";
		private $dataBase = "test";
		private $connect;

		public function __construct(){

			$connectionString = "mysql:hos=".$this->hostServer."; dbname=".$this->dataBase."; charset=utf8";

			try{

				$this->connect = new PDO($connectionString, $this->user, $this->password);
				$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
				 //echo "We are conecct to database";

			}

			catch(Exception $e){

				$this->connect = "Warning -> Connection error ->";
				echo connect.$e->getMessage();

			};
		}

		public function getConnection(){

			return $this->connect;
		}
	
	};	

?>