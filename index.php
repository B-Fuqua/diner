<?php

//This is my controller for the diner project

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require necessary files
require_once ('vendor/autoload.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../config.php');

//Start a session AFTER the autoload***
session_start();

//Connect to the database
try
{
    //Instantiate a PDO database object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected to database!";
}
catch(PDOException $e)
{
    //echo $e->getMessage(); //For debugging only
    die ("Oh darn! We're having a bad day. Please call to place your order");
}

//Instantiate classes
$f3 = Base::instance();
$con = new Controller($f3);
$dataLayer = new DataLayer($dbh);

//Test the saveOrder function
//$_SESSION['order'] = new Order("BLT", "lunch", "mayo");
//$dataLayer->saveOrder();

//Define default route
$f3->route('GET /', function(){
    $GLOBALS['con']->home();
});

$f3->route('GET /breakfast', function(){

    //Display the breakfast page
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET|POST /order1', function(){
    $GLOBALS['con']->order1();
});

$f3->route('GET|POST /order2', function(){
    $GLOBALS['con']->order2();
});

$f3->route('GET /summary', function(){
    $GLOBALS['con']->summary();
});

//Run Fat-Free
$f3->run();
