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
            'Please select your tools',
            ['ElectricalCapacitorLifeCalculator'],
            '0,1'
        );


        $calculatorTool = $helper->ask($input, $output, $question);

//        $question->setErrorMessage('Color %s is invalid.');
//        $output->writeln('You have just selected: '.$color);



        if ($calculatorTool == 'ElectricalCapacitorLifeCalculator'){
            $electricalCapacitorLifeCalculator = new ElectricalCapacitorLifeCalculator;
            $questions = $electricalCapacitorLifeCalculator->getQuestions();
            foreach ($questions as $key => $question) {
                @$electricalCapacitorLifeCalculator->{$key} = $helper->ask($input, $output, $question);
            }
            $result = $electricalCapacitorLifeCalculator->calculate();
            $output->writeln('Projected Life at Operating Conditions (L2) Is : ' . $result);
            die;
        }



    	// input
    	// validation
    	// math
    	// output


        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }

}