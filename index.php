<?php

//This is my controller for the diner project

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define routes
$f3->route('GET /', function(){
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /breakfast', function(){
    //Display the breakfast page
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /lunch', function(){
    //Display the lunch page
    $view = new Template();
    echo $view->render('views/lunch.html');
});

//Run Fat-Free
$f3->run();