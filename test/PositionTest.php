<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Position
 */
final class PositionTest extends TestCase
{
    public function testCanRotateProperlyNorthRight()
    {
        $position = new Position(1, 2, 'N');        
        $position->rotate('R');
        $this->assertEquals($position->facing, 'E');
    }

    public function testCanRotateProperlyNorthLeft()
    {
        $position = new Position(1, 2, 'N');        
        $position->rotate('L');
        $this->assertEquals($position->facing, 'W');
    }

    public function testCanRotateProperlyEastRight()
    {
        $position = new Position(1, 2, 'E');        
        $position->rotate('R');
        $this->assertEquals($position->facing, 'S');
    }

    public function testCanRotateProperlyEastLeft()
    {
        $position = new Position(1, 2, 'E');        
        $position->rotate('L');
        $this->assertEquals($position->facing, 'N');
    }

    public function testCanRotateProperlyWestRight()
    {
        $position = new Position(1, 2, 'W');        
        $position->rotate('R');
        $this->assertEquals($position->facing, 'N');
    }

    public function testCanRotateProperlyWestLeft()
    {
        $position = new Position(1, 2, 'W');        
        $position->rotate('L');
        $this->assertEquals($position->facing, 'S');
    }

    public function testCanRotateProperlySouthRight()
    {
        $position = new Position(1, 2, 'S');        
        $position->rotate('R');
        $this->assertEquals($position->facing, 'W');
    }

    public function testCanRotateProperlySouthLeft()
    {
        $position = new Position(1, 2, 'S');        
        $position->rotate('L');
        $this->assertEquals($position->facing, 'E');
    }

    public function testMoveNorth(){
        $position = new Position(1, 2, 'N');
        $nextMove = $position->yPos + 1;
        $position->move();
        $this->assertEquals($position->yPos, $nextMove);
    }

    public function testMoveEast(){
        $position = new Position(1, 2, 'E');
        $nextMove = $position->xPos + 1;
        $position->move();
        $this->assertEquals($position->yPos, $nextMove);
    }

    public function testMoveWest(){
        $position = new Position(1, 2, 'W');
        $nextMove = $position->xPos - 1;
        $position->move();
        $this->assertEquals($position->xPos, $nextMove);
    }

    public function testMoveSouth(){
        $position = new Position(1, 2, 'S');
        $nextMove = $position->yPos - 1;
        $position->move();
        $this->assertEquals($position->yPos, $nextMove);
    }

}
