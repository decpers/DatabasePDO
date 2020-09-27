<?php
	require_once("autoload.php");

	Class Data extends Connection{
		
		private $strName;
		private $strLastName;
		private $strEmail;
		private $NewConnection;

		public function __construct(){

			$this->NewConnection = new Connection();
			$this->NewConnection = $this->NewConnection->getConnection();

		}

		public function insertData(string $name, string $lastName, string $email){
			$this->strName = $name;
			$this->strLastName = $lastName; 
			$this->strEmail = $email;
			$dataToInsert = array($this->strName, $this->strLastName, $this->strEmail);

			$query= "INSERT INTO users(name,lastName,email) VALUES(?,?,?)";	
			$prepareDataInsertion = $this->NewConnection->prepare($query);
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

		public function getAllData() {
			$query = "SELECT*FROM users;";
			$realizeQuery = $this->NewConnection->query($query);
			$responseObtained = $realizeQuery->fetchall(PDO::FETCH_ASSOC);
			return $responseObtained; 
		}

		public function getOneData(int $id){
			$query = "SELECT*FROM users where id = $id;";
			$realizeQuery = $this->NewConnection->query($query);
			$responseObtained = $realizeQuery->fetchall(PDO::FETCH_ASSOC);
			return $responseObtained; 
		}

		public function updateData(int $id, string $name, string $lastName, string $email) {
			$this->strName = $name;
			$this->strLastName = $lastName; 
			$this->strEmail = $email;

			$query= "UPDATE users SET name = ?, lastName = ?, email = ? where id = $id";	
			$prepareDataUpdate = $this->NewConnection->prepare($query);
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

		public function deleteData(int $id){
			$idSelected = array($id);
			$query = "DELETE FROM users where id = ?";
			$prepareDeleting = $this->NewConnection->prepare($query);
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

		public function updateDataID(int $id, int $newId) {
			
			$this->newId = $newId; 
			
			$query= "UPDATE users SET id = ? where id = $id";	
			$prepareDataUpdate = $this->NewConnection->prepare($query);
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

