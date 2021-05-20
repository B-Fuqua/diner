<?php

class Validation
{
    //Return true if a food is valid
    static function validFood($food): bool
    {
        return strlen(trim($food)) >= 2;
    }

    //Return true if meal is valid
    static function validMeal($meal): bool
    {
        return in_array($meal, DataLayer::getMeals());
    }

    //Return true if *all* condiments are valid
    static function validCondiments($condiments): bool
    {
        $validCondiments = DataLayer::getCondiments();

        //Make sure each selected condiment is valid
        foreach ($condiments as $userChoice) {
            if (!in_array($userChoice, $validCondiments)) {
                return false;
            }
        }

        //All choices are valid
        return true;
    }
}