<?php

class DataLayer
{
    //Add a field for the database object
    private $_dbh;

    //Define a constructor
    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    //Saves the order to the database
    function saveOrder()
    {
        //Define the query
        $sql = "INSERT INTO orders (food, meal, condiments)
                VALUES (:food, :meal, :condiments)";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters
        $order = $_SESSION['order'];
        $statement->bindParam(':food', $order->getFood(), PDO::PARAM_STR);
        $statement->bindParam(':meal', $order->getMeal(), PDO::PARAM_STR);
        $statement->bindParam(':condiments', $order->getCondiments(), PDO::PARAM_STR);

        //Execute the query
        $statement->execute();

        //Process the results
        $id = $this->_dbh->lastInsertId();
        return $id;
    }


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