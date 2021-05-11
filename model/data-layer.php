<?php

/*
 * data-layer.php
 * Return data for the diner app
 */

// Get the meals for the order form
function getMeals()
{
    return array("Breakfast", "Lunch", "Dinner");
}

function getConds()
{
    return array("Ketchup", "Mustard", "Sriracha");
}