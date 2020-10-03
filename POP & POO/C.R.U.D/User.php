<?php
	require_once("autoload.php");

	Class User extends Connection{
		
		private $strName;
		private $strLastName;
		private $strEmail;
		private $newConnection;

		public function __construct(){

			$this->newConnection = new Connection();
			$this->newConnection = $this->newConnection->getConnection();

		}

		public function insertUser(string $name, string $lastName, string $email){
			$this->strName = $name;
			$this->strLastName = $lastName; 
			$this->strEmail = $email;
			$dataToInsert = array($this->strName, $this->strLastName, $this->strEmail);

			$query= "INSERT INTO users(name,lastName,email) VALUES(?,?,?)";	
			$prepareDataInsertion = $this->newConnection->prepare($query);
			$insertData = $prepareDataInsertion->execute($dataToInsert);
			$responseObtained = $insertData;

			if($responseObtained == 1) {
				$message = "Operation result: 1 new data was inserted successfully.";
				return $message;
			} 
			else {
				echo "Operation result: Insertion error. ";
			};		
		}

		public function getAllUsers() {
			$query = "SELECT*FROM users;";
			$realizeQuery = $this->newConnection->query($query);
			$responseObtained = $realizeQuery->fetchall(PDO::FETCH_ASSOC);
			return $responseObtained; 
		}

		public function getOneUser(int $id){
			$query = "SELECT*FROM users where id = $id;";
			$realizeQuery = $this->newConnection->query($query);
			$responseObtained = $realizeQuery->fetchall(PDO::FETCH_ASSOC);
			return $responseObtained; 
		}

		public function updateUser(int $id, string $name, string $lastName, string $email) {
			$this->strName = $name;
			$this->strLastName = $lastName; 
			$this->strEmail = $email;

			$query= "UPDATE users SET name = ?, lastName = ?, email = ? where id = $id";	
			$prepareDataUpdate = $this->newConnection->prepare($query);
			$newData = array($this->strName, $this->strLastName, $this->strEmail);
			$updateThisData = $prepareDataUpdate->execute($newData);
			$responseObtained = $updateThisData;

			if($responseObtained == 1) {
				$message = "Operation result: Data updated successfully.";
				return $message;
			} 
			else {
				echo "Operation result: Error in the data update. ";
			};		
		}

		public function deleteUser(int $id){
			$idSelected = array($id);
			$query = "DELETE FROM users where id = ?";
			$prepareDeleting = $this->newConnection->prepare($query);
			$delete = $prepareDeleting->execute($idSelected);
			$responseObtained = $delete;

			if($responseObtained == 1) {
				$message = "Operation result: Data deleted successfully.";
				return $message;
			} 
			else {
				echo "Operation result: Error has occurred in deleting. ";
			};	
		}

		public function updateUserID(int $id, int $newId) {		
			$this->newId = $newId; 			
			$query= "UPDATE users SET id = ? where id = $id";	
			$prepareDataUpdate = $this->newConnection->prepare($query);
			$newData = array($this->newId);
			$updateThisData = $prepareDataUpdate->execute($newData);
			$responseObtained = $updateThisData;

			if($responseObtained == 1) {
				$message = "Operation result: ID updated successfully.";
				return $message;
			} 
			else {
				echo "Operation result: Error in the data update. ";
			};		
		}

	};

?>

