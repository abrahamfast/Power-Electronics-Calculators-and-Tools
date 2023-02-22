<?php 

use PHPUnit\Framework\TestCase;
use Abrahamghaemi\PowerElectronicsCalculatorsAndTools\Calculator;
final class CalculatorTest extends TestCase
{
	public function testNewInstance()
	{
		$calculator = new Calculator;
		$this->assertNotNull($calculator);
	}
}