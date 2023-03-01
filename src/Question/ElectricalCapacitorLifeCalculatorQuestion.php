<?php
namespace App\Question;

class ElectricalCapacitorLifeCalculatorQuestion extends Main
{
    protected array $questions = [
        [
            'name'=> 'loadLifeRating',
            'label' => 'Enter Load Life Rating:',
            'rule' => 'float|int|min:1|required',
            'answer' => ''
        ],
        [
            'name'=> 'maximumVoltageRatingCapacitor',
            'label' => 'Enter Maximum voltage rating of capacitor:',
            'rule' => 'float|int|max:3|min:0|required',
            'answer' => ''
        ],
        [
            'name'=> 'operatingVoltageOfApplication',
            'label' => 'Enter Operating voltage of application:',
            'rule' => 'float|int|min:1|required',
            'answer' => ''
        ],
        [
            'name'=> 'maximumTempratingCapacitor',
            'label' => 'Enter Maximum temp rating of capacitor:',
            'rule' => 'float|int|required',
            'answer' => ''
        ],
        [
            'name'=> 'ambientTemperature',
            'label' => 'Enter Ambient Temperature:',
            'rule' => 'float|int|required',
            'answer' => ''
        ]
    ];
}