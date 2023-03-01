<?php 

namespace App\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use App\Tools\ElectricalCapacitorLifeCalculator;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;


#[AsCommand(name: 'tools:list')]
class ToolsListCommand extends Command
{
    protected function configure()
    {
        $this->setDescription("The operating conditions directly affect the life of an aluminum electrolytic capacitor...");
    }

	 protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Please select: ',
            // choices can also be PHP objects that implement __toString() method
            ['ElectricalCapacitorLifeCalculator'],
            0
        );

        $calculatorTool = $helper->ask($input, $output, $question);

//        $question->setErrorMessage('Color %s is invalid.');
//        $output->writeln('You have just selected: '.$color);

        if ($calculatorTool == 'ElectricalCapacitorLifeCalculator'){
            $questionLoadLifeRating = new Question('Enter Load Life Rating:');
            $questionLoadLifeRating->setValidator(function($answer){
                if (!is_float($answer)){
                    throw new \RuntimeException(
                        'Load Life Rating should be float'
                    );
                }

                return $answer;

            });


            $questionMaximumVoltageRatingCapacitor = new Question('Enter Maximum voltage rating of capacitor:');
            $questionMaximumVoltageRatingCapacitor->setValidator(function ($answer) {
                if ($answer>2) {
                    throw new \RuntimeException(
                        'Enter Maximum voltage rating of capacitor should be equal or less than 2'
                    );
                }

                return $answer;
            });
            $question->setMaxAttempts(2);
            $questionOperatingVoltageApplication = new Question('Enter Operating voltage of application:');
            $questionMaximumTempratingCapacitor = new Question('Enter Maximum temp rating of capacitor:');
            $questionAmbientTemperature = new Question('Enter Ambient Temperature:');

            // if the users inputs 'elsa ' it will not be trimmed and you will get 'elsa ' as value
            $loadLifeRating = $helper->ask($input, $output, $questionLoadLifeRating);
            $maximumVoltageRatingCapacitor = $helper->ask($input, $output, $questionMaximumVoltageRatingCapacitor);
            $operatingVoltageApplication = $helper->ask($input, $output, $questionOperatingVoltageApplication);
            $maximumTempratingCapacitor = $helper->ask($input, $output, $questionMaximumTempratingCapacitor);
            $ambientTemperature = $helper->ask($input, $output, $questionAmbientTemperature);
            var_dump($loadLifeRating, $maximumTempratingCapacitor, $operatingVoltageApplication, $maximumVoltageRatingCapacitor, $ambientTemperature);
            die;
        }

        $question = new Question('What is the name of the child?');
        $question->setTrimmable(false);
        // if the users inputs 'elsa ' it will not be trimmed and you will get 'elsa ' as value
        $name = $helper->ask($input, $output, $question);
        die;


    	$electricalCapacitorLifeCalculator = new ElectricalCapacitorLifeCalculator;
    	$electricalCapacitorLifeCalculator->setMaximumVoltageRatingCapacitor($input->getArgument('maximumVoltageRatingCapacitor'));
    	$electricalCapacitorLifeCalculator->setLoadLifeRating($input->getArgument('loadLifeRating'));
        $electricalCapacitorLifeCalculator->calculate();
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