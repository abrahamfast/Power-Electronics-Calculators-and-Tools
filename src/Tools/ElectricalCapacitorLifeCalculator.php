<?php 

namespace App\Tools;

use App\Interface\ToolsInterface;
use App\Question\ElectricalCapacitorLifeCalculatorQuestion;

/**
 *
 * Electrolytic Capacitor Life Calculator
 * @desc The operating conditions directly affect the life of an aluminum electrolytic capacitor.
 * The ambient temperature has the largest effect on life.
 * The relationship between life and temperature follows a chemical reaction formula called Arrhenius' Law of Chemical Activity.
 * The capacitor’s life doubles for every 10 degree Celsius decrease in temperature.
 * @url https://eepower.com/tools/electrolytic-capacitor-life-calculator
 */
class ElectricalCapacitorLifeCalculator implements ToolsInterface
{
	public $maximumVoltageRatingCapacitor;
    public $loadLifeRating;
    public  $ambientTemperature;
    public  $operatingVoltageOfApplication;
    public  $maximumTempratingCapacitor;
    protected $questions;

    public function __construct()
    {
        $this->questions = (new ElectricalCapacitorLifeCalculatorQuestion)->getGeneratedQuestions();
    }
    /**
     * math and formula
     *
     * @return float|int
     * @throws \Exception
     */
    public function calculate(): float|int
    {

        try {
            $x = ( $this->maximumTempratingCapacitor - $this->ambientTemperature ) / 10;
            // @TODO check later
            //$DealtaT = ($ambientTemperature - $maximumTempratingCapacitor);
            return $this->loadLifeRating * ($this->maximumVoltageRatingCapacitor / $this->operatingVoltageOfApplication ) * (2**$x);
        } catch (\Exception $e){
            throw new \Exception("Bad execution");
        }
    }

    /**
     * get list of questions for ask
     *
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
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
        $this->operatingVoltageOfApplication = $OperatingVoltageOfApplication;
    }
    public function getOperatingVoltageOfApplication() : int|float
    {
        return $this->operatingVoltageOfApplication;
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


