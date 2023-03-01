<?php 

namespace App\Tools;

use App\Interface\ToolsInterface;

class ElectricalCapacitorLifeCalculator implements ToolsInterface
{
	protected int|float $maximumVoltageRatingCapacitor;
	protected int|float $loadLifeRating;
    public function calculate()
    {
        $x = ($this->maximumTempratingCapacitor - $this->ambientTemperature) / 10;

        $sum = $this->loadLifeRating * ($this->maximumVoltageRatingCapacitor / $this->operatingVoltageApplication ) * (2**$x);
        echo $sum;
    }
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
    
    public function setOperatingVoltageOfApplication(int|float $OperatingVoltageOfApplication) : void
    {
        $this->OperatingVoltageOfApplication = $OperatingVoltageOfApplication;
    }
    public function getOperatingVoltageOfApplication() : int|float
    {
        return $this->OperatingVoltageOfApplication;
    }
    public function setMaximumTempratingCapacitor(int|float $maximumTempratingCapacitor)  : void
    {
        $this->maximumTempratingCapacitor = $maximumTempratingCapacitor;
    }
    public function getMaximumTempratingCapacitor() : int|float
    {
        return $this->maximumTempratingCapacitor;
    }
    public function setAmbientTemperature(int|float $ambientTemperature) : void
    {
        $this->ambientTemperature = $ambientTemperature;
    }
    public function getAmbientTemperature() : int|float
    {
        return $this->ambientTemperature;
    }
         
}


