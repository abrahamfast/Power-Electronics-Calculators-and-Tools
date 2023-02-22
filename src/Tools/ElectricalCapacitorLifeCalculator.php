<?php 

namespace Abrahamghaemi\PowerElectronicsCalculatorsAndTools\Tools;

use Abrahamghaemi\PowerElectronicsCalculatorsAndTools\Interface\ToolsInterface;

class ElectricalCapacitorLifeCalculator implements ToolsInterface
{
	protected int|float $maximumVoltageRatingCapacitor;
	protected int|float $loadLifeRating;
	public function setMaximumVoltageRatingCapacitor(int|float $maximumVoltageRatingCapacitor) : void
	{
		$this->maximumVoltageRatingCapacitor = $maximumVoltageRatingCapacitor;
	}
    public function getMaximumVoltageRatingCapacitor() : int|float 
    {
    	return $this->maximumVoltageRatingCapacitor;
    }
    public function setLoadLifeRating(int|float $loadLifeRating) : void 
    {
    	$this->loadLifeRating = $loadLifeRating;
    }
    public function getLoadLifeRating() : int|float 
    {
    	return $this->loadLifeRating;
    }
}


