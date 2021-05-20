<?php

/* data-layer.php
 * Return data for the diner app
 */

// Get the meals for the order form
function getMeals()
{
    return array("breakfast", "brunch", "lunch", "dinner");
}

// Get the condiments for the order 2 form
function getCondiments()
{
    return array("ketchup", "mustard", "mayo", "sriracha");
}