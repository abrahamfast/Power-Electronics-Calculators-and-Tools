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
        $this->setDescription("The operating tools");
    }

	 protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $question = new ChoiceQuestion(
            'Please select your tools',
            ['ElectricalCapacitorLifeCalculator'],
            '0'
        );

        $calculatorTool = $helper->ask($input, $output, $question);

        if ($calculatorTool == 'ElectricalCapacitorLifeCalculator'){
            $electricalCapacitorLifeCalculator = new ElectricalCapacitorLifeCalculator;
            $questions = $electricalCapacitorLifeCalculator->getQuestions();
            foreach ($questions as $key => $question) {
                @$electricalCapacitorLifeCalculator->{$key} = $helper->ask($input, $output, $question);
            }
            $result = $electricalCapacitorLifeCalculator->calculate();
            $output->writeln('Projected Life at Operating Conditions (L2) Is : ' . $result);
        }

        return Command::SUCCESS;
    }

}