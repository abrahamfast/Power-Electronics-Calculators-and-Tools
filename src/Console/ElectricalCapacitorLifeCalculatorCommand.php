<?php 

namespace Edison\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Edison\Tools\ElectricalCapacitorLifeCalculator;


#[AsCommand(name: 'electrical:capacitor-life-calculator')]
class ElectricalCapacitorLifeCalculatorCommand extends Command
{
    protected function configure()
    {
    	$this->addArgument('maximumVoltageRatingCapacitor', InputArgument::REQUIRED, 'Enter Maximum voltage rating of capacitor: ');
    	$this->addArgument('loadLifeRating', InputArgument::REQUIRED, 'Enter Load Life Rating:');
        $this->setDescription("The operating conditions directly affect the life of an aluminum electrolytic capacitor...");
    }

	 protected function execute(InputInterface $input, OutputInterface $output): int
    {
    	$electricalCapacitorLifeCalculator = new ElectricalCapacitorLifeCalculator;
    	$electricalCapacitorLifeCalculator->setMaximumVoltageRatingCapacitor($input->getArgument('maximumVoltageRatingCapacitor'));
    	$electricalCapacitorLifeCalculator->setLoadLifeRating($input->getArgument('loadLifeRating'));
    	$a = clone $electricalCapacitorLifeCalculator;
    	$a->setLoadLifeRating(11);
    	var_dump($electricalCapacitorLifeCalculator , $a);
    	// input
    	// validation
    	// math
    	// output

        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        echo "iam running";
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }

}