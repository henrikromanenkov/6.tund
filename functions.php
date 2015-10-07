<?php
	// Loon andmebaasi �henduse
	require_once("../../config_global.php");
	$database = "if15_henrrom";
	
	function getCarData(){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color from car_plates");
		$stmt->bind_result($id, $user_id_from_database, $number_plate, $color);
		$stmt->execute();
		
		//tekitan t�hja massiivi, kus edaspidi hoian objekte 
		$car_array = array();
		
		//tee midagi seni, kuni saad ab'st �he rea andmeid.
		while($stmt->fetch()){
			//seda siin sees tehakse nii mitu korda kui on ridu.
			
			//tekitan objekti; kus hakkan hoidma v��rtusi
			$car = new StdClass();
			$car->id = $id;
			$car->plate = $number_plate;
			
			//lisan massiivi
			array_push($car_array, $car);
			//var_dump �tleb muutuja t��bi ja sisu
			//echo "<pre>";
			//var_dump($car_array);
			//echo "</pre><br>";
		}
		
		//tagastan massiivi, kus k�ik read sees
		return $car_array;
			
		$stmt->close();
		$mysqli->close();
	}
	

	
?>