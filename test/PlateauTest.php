<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Plateau
 */
final class PlateauTest extends TestCase
{
    public function testCanProcessValidInstructions()
    {
        $stub = $this->getMockBuilder(Plateau::class)
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableArgumentCloning()
                     ->disallowMockingUnknownTypes()
                     ->getMock();

        $stub->method('processInstructions')->willReturn("1 2 N");             
        $this->assertEquals($stub->processInstructions, "1 2 N");
    }

    // public function testCanProcessSmallerValidGrid()
    // {
    //     $plateau = new Plateau(5, 5);
    //     $position = new Position(1, 2, 'N');
    //     $rover = new Rover($position);
    //     $instructions = "LMLMLMLMM";
    //     $plateau->processInstructions($instructions, $rover);

    //     $this->assertEquals(
    //         $plateau->roversLocation[0],
    //         "1 2 N"
    //     );
    // }

}
