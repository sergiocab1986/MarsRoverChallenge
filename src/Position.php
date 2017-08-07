<?php
/**
* This class represents the a Position on the Plateau
* @author     Sergio Cabrera
* @version    1.0 - CoVesta Tech Challenge
*/
class Position
{
    /**
     * Is the current X axe position of the Rover
     * @var int
     */
    var $xPos;

    /**
     * Is the current Y axe position of the Rover
     * @var int
     */
    var $yPos;

    /**
     * Is the current facing of the Rover in terms of the four cardinal compass points 
     * such as: N=North, S=South, E=East, W=West
     * @var char
     */
    var $facing;

    /**
     * Defines the X, Y and Facing parameters of this position
     * @param int $x the x value for this position
     * @param int $y the y value for this position
     * @param int $facing the cardinal compass point of this position (N,S,E,W)
     */
    public function __construct($x, $y, $facing)
    {
        $this->xPos = $x;
        $this->yPos = $y;
        $this->facing = $facing;
    }

    /**
     * Rotates the facing 90 degrees to the right or the left according to the current facing
     * @param int $newDirection indicates if the new direction goes to the R=right or the L=left
     */
    function rotate($newDirection){
         if($this->facing == 'E'){
            $this->facing = ($newDirection == 'L')? 'N' : 'S';
         }
         else if($this->facing == 'W'){
            $this->facing = ($newDirection == 'L')? 'S' : 'N';
         }
         else if($this->facing == 'S'){
            $this->facing = ($newDirection == 'L')? 'E' : 'W';
         }
         else if($this->facing == 'N'){
            $this->facing = ($newDirection == 'L')? 'W' :'E';
         }
    }

    /**
     * Moves the position to the next grid while keeping the same facing point
     */
    function move()
    {
        switch ($this->facing)
        {
            case 'N':
                $this->yPos += 1;
                break;

            case 'E':
                $this->xPos += 1;
                break;

            case 'S':
                $this->yPos -= 1;
                break;

            case 'W':
                $this->xPos -= 1;
                break;
        }
    }
}
?>