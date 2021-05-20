<?php

class DataLayer
{
    // Get the meals for the order form
    static function getMeals()
    {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

// Get the condiments for the order 2 form
    static function getCondiments()
    {
        return array("ketchup", "mustard", "mayo", "sriracha");
    }
}