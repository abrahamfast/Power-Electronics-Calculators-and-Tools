<?php


namespace App\Rules;

interface RuleInterface
{
    public static function check($answer);
}