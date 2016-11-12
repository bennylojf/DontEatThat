<?php
use PHPUnit\Framework\TestCase;

class FoodFinderTest extends TestCase
{
	public function testGetFoodDatas(){
		// Arrange
        $arr = new FoodFinder();
			
        // Act
        $act = $arr->getFoodDatas();

        // Assert
        $this->assertEquals(2, count($act));
	}
	
	public function testSetNumberOfSearchTerms(){
		// Arrange
		$x = new FoodFinder();
		
		$number = 4;
		
		// Act
		$a = $x->setNumberOfSearchTerms($number);
		
		// Assert
		$this -> assertEquals($number, $a);
	}
	
	
}
