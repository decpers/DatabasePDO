<?php
	require_once("autoload.php");

	class organizeData extends Data {

		public function organize(){
			$data = new Data();
			$allData = $data->getAllData();
			$enteredIds = count($allData);		
			$lastRecord = $enteredIds - 1;
			$LastID = $allData[$lastRecord]['id'];
		
			for($i = 1; $i <= $LastID; $i++){			
				$contentData = $data->getOneData($i);
				//False means than is empty
				if($contentData == false){
					$newId = $i;
					$OldId =$i+1;
					$updateID = $data->updateDataID($OldId,$newId);	
				}

			};
		}

	};

	$test = new organizeData();
	$organizeTest = $test->organize();
	
?>