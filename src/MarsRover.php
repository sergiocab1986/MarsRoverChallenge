<?php
/**
* Reads the inputs and outputs the results from the Plateau 
* @author     Sergio Cabrera
* @version    1.0 - CoVesta Tech Challenge
*/

//load the classes required
require ('Plateau.php');
require ('Position.php');
require ('Rover.php');

//Prepare to read from standard input and initialize values
$stdin = fopen('php://stdin', 'r');
$count = 0;
$roverXPos = $roverYPos = $roverFacing = '';
$outputList = [];
$rover = null;
$plateau = null;

while(!feof($stdin)) {
    $input = fgets($stdin);
    if($input == "\n"){ //prints the Rovers locations and breaks the reading from stdin if a breakline(alone) is found
    	if($plateau != null){
    		$plateau->printRoversLocation();
    	}
    	return;
    }

    if($count==0){ //if it is the first input then initilize the Plateau
    	$positions = explode(" ", $input);
    	$xRightTop = trim($positions[0]);
    	$yRightTop = trim($positions[1]);
    	$plateau = new Plateau($xRightTop, $yRightTop);
    }
    else{
	    if($count%2 != 0){ //if the input line is odd then it means that the Rover needs to be initialized
	    	$roverInitialPos = explode(" ", $input);
	    	$roverXPos = trim($roverInitialPos[0]);
	    	$roverYPos = trim($roverInitialPos[1]);
	    	$roverFacing = trim($roverInitialPos[2]);

	    	$position = new Position($roverXPos, $roverYPos, $roverFacing);
	    	$rover = new Rover($position);
	    }
	    else{ //if the input line is even then it means that the Rover needs to follow this instructions
    		$instructions = trim($input);
    		$plateau->processInstructions($instructions, $rover);
	    }
	}

    $count++;
}
fclose($stdin);

?>