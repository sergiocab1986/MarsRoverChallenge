<?php
declare(strict_types=1);

require_once "src/Position.php";
require_once "src/Rover.php";
use PHPUnit\Framework\TestCase;

/**
 * @covers Plateau
 */
final class PlateauTest extends TestCase
{

    public function testCanProcessSmallerValidFirstCase()
    {
        $plateau = new Plateau(5, 5);
        $position = new Position(1, 2, 'N');
        $rover = new Rover($position);
        $instructions = "LMLMLMLMM";
        $plateau->processInstructions($instructions, $rover);

        $this->assertEquals($plateau->roversLocation[0],"1 3 N");
    }

    public function testCanProcessSmallerValidSecondCase()
    {
        $plateau = new Plateau(5, 5);
        $position = new Position(3, 3, 'E');
        $rover = new Rover($position);
        $instructions = "MMRMMRMRRM";
        $plateau->processInstructions($instructions, $rover);

        $this->assertEquals($plateau->roversLocation[0],"5 1 E");
    }


    public function testCanProcessSmallerValidAllCasesTogether()
    {
        $plateau = new Plateau(5, 5);
        
        //FirstCase
        $position = new Position(1, 2, 'N');
        $rover = new Rover($position);
        $instructions = "LMLMLMLMM";
        $plateau->processInstructions($instructions, $rover);

        //SecondCase
        $position = new Position(3, 3, 'E');
        $rover = new Rover($position);
        $instructions = "MMRMMRMRRM";
        $plateau->processInstructions($instructions, $rover);

        //ThirdCase
        $position = new Position(0, 3, 'E');
        $rover = new Rover($position);
        $instructions = "MMRMLMLMRMMLMM";
        $plateau->processInstructions($instructions, $rover);

        //FourCase
        $position = new Position(3, 5, 'E');
        $rover = new Rover($position);
        $instructions = "RMRML";
        $plateau->processInstructions($instructions, $rover);


        $this->assertEquals(count($plateau->roversLocation), 4);
        $this->assertEquals($plateau->roversLocation[0],"1 3 N");
        $this->assertEquals($plateau->roversLocation[1],"5 1 E");
        $this->assertEquals($plateau->roversLocation[2],"3 4 N");
        $this->assertEquals($plateau->roversLocation[3],"2 5 S");
    }

}
