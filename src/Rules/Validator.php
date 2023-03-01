<?php

namespace App\Rules;

class Validator
{
    public static function prompt($questionItem, $answer)
    {
        $validateRules = explode('|', $questionItem['rule']);
        $value = null;
        foreach ($validateRules as $rule) {
            if ($complexRule = explode(':', $rule)) {

                if (count($complexRule) == 2) {
                    $rule = $complexRule[0];
                    $value = $complexRule[1];
                }
            }

            switch ($rule) {
                case 'required':
                    RequiredRule::check($answer);
                    break;
                case 'bool':
                    BoolRule::check($answer);
                    break;
                case 'int':
                    if (is_int($answer)) {
                        throw new \RuntimeException(
                            'The answer must be int'
                        );
                    }
                    break;
                case 'float':
                    if (is_float($answer)) {
                        throw new \RuntimeException(
                            'The answer must be float'
                        );
                    }
                    break;
                case 'string':
                    if (is_string($answer)) {
                        throw new \RuntimeException(
                            'The answer must be string'
                        );
                    }
                    break;
                case 'max':
                    // @TODO check equal
                    if ($answer > $value) {
                        throw new \RuntimeException(
                            'The answer greater than :' . $value
                        );
                    }
                    break;
                case 'min':
                    if ($answer < $value) {
                        throw new \RuntimeException(
                            'The answer less than :' . $value
                        );
                    }
                    break;
            }
        }
    }

}