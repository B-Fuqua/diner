<?php

/* data-layer.php
 * Return data for the diner app
 */

//Require the config file
require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');

class DataLayer
{
    // Add a field for the database object
    /**
     * @var PDO The database connection object
     */
    private $_dbh;

    // Define a constructor

    /**
     * DataLayer constructor.
     */
    function __construct()
    {
        //Connect to the database
        try {
            //Instantiate a PDO database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected to database!";
        }
        catch(PDOException $e) {
            //echo $e->getMessage();  //for debugging only
            die ("Oh darn! We're having a bad day. Please call to place your order.");
        }
    }

    // Saves an order to the database

    /**
     * saveOrder accepts an Order object and inserts it into the database
     * @param $order
     * @return string
     */
    function saveOrder($order)
    {
        //1. Define the query
        $sql = "INSERT INTO orders (food, meal, condiments) 
                VALUES (:food, :meal, :condiments)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':food', $order->getFood(), PDO::PARAM_STR);
        $statement->bindParam(':meal', $order->getMeal(), PDO::PARAM_STR);
        $statement->bindParam(':condiments', $order->getCondiments(), PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get OrderID)
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    // Get the meals for the order form

    /**
     * getMeals returns an array of meal options
     * @return string[]
     */
    static function getMeals()
    {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

    // Get the condiments for the order 2 form

    /**
     * getCondiments returns an array of condiment options
     * @return string[]
     */
    static function getCondiments()
    {
        return array("ketchup", "mustard", "mayo", "sriracha", "maple syrup");
    }

    function getOrders()
    {
        //Define the query
        $sql = "SELECT order_id, food, meal, condiments, order_date FROM orders";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Execute the statment
        $statement->execute();

        //Process the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}