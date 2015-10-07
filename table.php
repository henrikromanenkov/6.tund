<?php

	require_once("functions.php");

	//käivitan funktsiioni
	$array_of_cars = getCarData();
	
	//trükin välja esimese auto
	echo $array_of_cars[0]->id." ".$array_of_cars[0]->plate;
?>
