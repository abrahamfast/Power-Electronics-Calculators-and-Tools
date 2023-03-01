<?php

namespace App\Rules;

use App\Exceptions\Validation;
class BoolRule implements RuleInterface
{
    public static function check($answer)
    {
        if (is_bool($answer)){
            throw new \RuntimeException(
                'The answer must be boolean'
            );
        }
    }
}