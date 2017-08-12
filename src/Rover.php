<?php
/**
* This class represents the a Rover
* @author     Sergio Cabrera
* @version    1.0 - Mars Rover Tech Challenge
*/
class Rover
{
    /**
     * Is the current position of the Rover
     * @var Position
     */
    var $position;

    /**
     * Sets the initial postion of the Rover
     * @param Position $position Is the initial position 
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }



    /**
     * @return string The X Y Facing details of the Rover
     */
    function roverToString(){
        return $this->position->xPos . " " .  $this->position->yPos . " " . $this->position->facing;
    }
}
?>