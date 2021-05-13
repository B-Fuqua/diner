<?php

/*
 * data-layer.php
 * Return data for the diner app
 */

// Get the meals for the order form
function getMeals()
{
    return array("breakfast", "lunch", "dinner");
}

function getConds()
{
    return array("ketchup", "mustard", "sriracha");
}