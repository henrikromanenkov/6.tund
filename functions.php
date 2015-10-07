<?php
	// Loon andmebaasi ühenduse
	require_once("../../config_global.php");
	$database = "if15_henrrom";
	
	function getCarData(){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color from car_plates");
		$stmt->bind_result($id, $user_id_from_database, $number_plate, $color);
		$stmt->execute();
		
		$row = 1;
		
		//tee midagi seni, kuni saad ab'st ühe rea andmeid.
		while($stmt->fetch()){
			//seda siin sees tehakse nii mitu korda kui on ridu.
			
			echo $row." ".$number_plate."<br>";
			$row = $row +1; // $row++;
		}
			
		$stmt->close();
		$mysqli->close();
	}
	
	//käivitan funktsiioni
	getCarData();
	
?>