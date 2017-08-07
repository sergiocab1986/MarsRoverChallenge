<?php
/**
* This class represents the Plateau(grid) that will be explored by the Rovers.
* @author     Sergio Cabrera
* @version    1.0 - CoVesta Tech Challenge
*/
class Plateau
{
    /**
     * This is grid that defines the Plateau
     * @var array array
     */
    var $plateau;

    /**
     * The X axe value of the upper right coordinate
     * @var int
     */
    var $xRightTop;

    /**
     * The Y axe value of the upper right coordinate
     * @var int
     */
    var $yRightTop;

    /**
     * Stores the Rovers locations (e.g. "x y facing" per Rover)
     * @var array
     */
    var $roversLocation = [];

    /**
    * Initializes the plateu, starting from the (0,0) lower-left coordinates until 
    *   the given ($xRightTop, $yRightTop) upper right coordinates given by the user
    * @param int $xRightTop the X axe value of the upper right coordinate
    * @param int $yRightTop the Y axe value of the upper right coordinate
    */
    public function __construct($xRightTop, $yRightTop)
    {
        $this->xRightTop = $xRightTop;
        $this->yRightTop = $yRightTop;
        $this->plateau = array();
    	$this->plateau = array_fill(0, $xRightTop + 1, 0);
    	for($i = 0; $i <= $yRightTop; $i++ ) {
	        $this->plateau[$i] = array();
	        $this->plateau[$i] = array_fill(0, $xRightTop + 1, 0);
	    }
    }

    /**
     * This function starts reads the instructions given for a specific Rover
     * @param array $instructions The instructions that the Rover needs to follow e.g. 
     *                              L=spins the Rover 90 degrees to the left
     *                              R=spins the Rover 90 degrees to the right
     *                              M=moves the Rover one grid point while facing the same direction
     * @param Rover $rover Is the Rover that will follow the instructions
     */
    function processInstructions($instructions, $rover){
        for ($i = 0; $i< strlen($instructions); $i++) {
    		$nextMove = $instructions[$i];
    		if($nextMove == 'L' || $nextMove == 'R'){
    			$rover->position->rotate($nextMove);
    		}
    		else if($nextMove == 'M'){
                $this->nextPositionAvailable($rover, $nextMove);
    		}
	    }
        $output = $rover->roverToString();
        //echo $output;
        $this->plateau[$this->yRightTop - $rover->position->yPos][$rover->position->xPos] = $rover->position->facing;
        //$this->printPlateu();
        array_push($this->roversLocation, $output);
    }

    /**
     * This function evaluates if the next position is available or not,
     * A position is not available if there is another Rover already in that position or it is the edge of the 
     * grid and it cannot continue
     * @param Rover $rover Is the Rover that will make the next move
     * @param char $nextMove Is the next move to be processed: L,R,M
     */
    function nextPositionAvailable($rover, $nextMove){
        switch ($rover->position->facing)
        {
            case 'N':
                $nextPosY = $this->yRightTop - $rover->position->yPos - 1;
                $nextPosX = $rover->position->xPos;
                if($nextPosY >= 0){
                    $nextPosValue = $this->plateau[$nextPosY][$nextPosX];
                    if(empty($nextPosValue)){
                        $rover->position->move($nextMove);
                    }
                }
                break;
            case 'S':
                $nextPosY = $this->yRightTop - $rover->position->yPos + 1;
                $nextPosX = $rover->position->xPos;
                if($nextPosY <= $this->yRightTop){
                    $nextPosValue = $this->plateau[$nextPosY][$nextPosX];
                    if(empty($nextPosValue)){
                        $rover->position->move($nextMove);
                    }
                }
                break;    
            case 'E':
                $nextPosX = $rover->position->xPos + 1;
                $nextPosY = $this->yRightTop - $rover->position->yPos;
                $nextPosValue = $this->plateau[$nextPosY][$nextPosX];
                if($nextPosX <= $this->xRightTop){
                    if(empty($nextPosValue)){
                        $rover->position->move($nextMove);
                    }
                }
                break;
            case 'W':
                $nextPosX = $rover->position->xPos - 1;
                $nextPosY = $this->yRightTop - $rover->position->yPos;
                $nextPosValue = $this->plateau[$nextPosY][$nextPosX];
                if($nextPosX >= 0){
                    if(empty($nextPosValue)){
                        $rover->position->move($nextMove);
                    }
                }
                break;    
        }

    }

    /**
     * This function prints all the Rovers location within the Plateau (e.g. "x y facing" per Rover)
     */
    function printRoversLocation(){
        for( $i=0; $i<count($this->roversLocation); $i++ ){
            echo $this->roversLocation[$i];
            if($i<count($this->roversLocation)-1)
                echo "\n";
        }
    }

    /**
     * This function prints the entire Plateau as a matrix for human readable purposes (debugging/testing)
     */
    function printPlateu(){
        echo "**** PLATEU ********\n";
        for( $i=0; $i<count($this->plateau); $i++ ) {
            for( $j=0; $j<count($this->plateau[$i]); $j++ ) {
                echo $this->plateau[$i][$j]. " ";
            }
            echo "\n";
        }
    }
            
}
?>