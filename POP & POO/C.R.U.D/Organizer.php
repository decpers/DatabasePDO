<?php
	require_once("autoload.php");

	/* Use only when delete an user */
	
	class Organizer extends User {

		public function organize(){
			$data = new User();
			$allData = $data->getAllUsers();
			$enteredIds = count($allData);		
			$lastRecord = $enteredIds - 1;
			$LastID = $allData[$lastRecord]['id'];
		
			for($i = 1; $i <= $LastID; $i++){			
				$contentData = $data->getOneUser($i);
				//False means than is empty
				if($contentData == false){
					$newId = $i;
					$OldId =$i+1;
					$updateID = $data->updateUserID($OldId,$newId);	
					header("Location: organizeUserData.php" );
				}

			};
		}

	};


	$test = new Organizer();
	$organizeTest = $test->organize();
	echo $organizeTest;


	
?>
