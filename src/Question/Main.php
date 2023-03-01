<?php

namespace App\Question;

use App\Rules\Validator;
use Symfony\Component\Console\Question\Question;

class Main
{
    protected array $questions;
    protected array $generatedQuestions;

    /**
     * @return array
     */
    public function getGeneratedQuestions(): array
    {
        return $this->generatedQuestions;
    }

    /**
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function __construct()
    {
        $this->generate();
    }
    public function generate(): void
    {
        foreach ($this->questions as $questionItem){
            $question = new Question($questionItem['label']);
            $question->setValidator(static function($answer) use($questionItem){
                Validator::prompt($questionItem, $answer);
                return $answer;
            });

            $this->generatedQuestions[$questionItem['name']] = $question;
        }
    }

    public function setAnswer($answer, $questionName): void
    {
        $this->questions[$questionName]['answer'] = $answer;
    }
}