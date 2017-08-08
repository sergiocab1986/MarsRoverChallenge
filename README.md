MarsRoverChallenge - README
****************************

This is the solution to the Technical challenge for CoVesta

1) Project Structure

/src
	This folder contains the source code to solve the Mars Rover challenge has been divided in four filed as follows:

		1. MarsRover.php - Is the file that reads the inputs, initializes the classes and prints the outputs
		2. Plateau.php   - This class represents the Plateau(grid) that will be explored by the Rovers.
		3. Rover.php     - This class represents the a Rover
		4. Position.php  - This class represents the a Position on the Plateau

/test
	This folder contains the test cases for the main classes of the project which are Position and the Plateau classes

		1. PlateauTest.php  - Tests the plateu functionality
		2. PositionTest.php	- Tests the position funtionality and its main methods


/docs
	This folder contains basic documentation about the problem that has been solved and general info about the project
		1. MarsRoverChallenge.docx - Describes the problem and the expented input and output
		2. input_vs_output.txt     - Describes additional input and outputs used to test the solution
		3. run_unit_tests.txt      - Describes the command used to run the test cases using PHPUnit


2) System Requirements
	1. PHP7
	2. PHP-Unit

3) How to run the program
	1. go inside the /src folder
	2. run the following command from your teminal php MarsRover.php
	3. Insert input values (see input_vs_output.txt inside the /test folder for some examples) 



