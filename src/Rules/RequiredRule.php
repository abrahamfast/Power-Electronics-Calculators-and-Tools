<?php

namespace App\Rules;

use App\Exceptions\Validation;
class RequiredRule implements RuleInterface
{
    public static function check($answer)
    {
        if (is_null($answer)){
            throw new Validation(
                'The answer required'
            );
        }
    }
}