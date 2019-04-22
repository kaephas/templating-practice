<?php
/**
 * Created by PhpStorm.
 * User: Kaephas Kain
 * Date: 2019-04-12
 * Filename: index.php
 * Description: loads error reporting, composer, fat free, setting default route to views/home.html
 */

session_start();

//Turn on error reporting
ini_set('display_errors' ,1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base:: instance();

//Turn on Fat-free error reporting
$f3 -> set('DEBUG', 3);

//Define a default route (dating splash page)
$f3->route('GET /', function($f3)
{
    // set a f3 variable
    $f3->set('title', 'Practicing with Templates');
    $f3->set('header', 'Templates Practice');
    $f3->set('temp', 67);
    $f3->set('radius', 10);
    $fruits = array('apple', 'banana', 'orange');
    $f3->set('fruits', $fruits);
    $bookmarks = array('https://www.google.com', 'https://www.facebook.com', 'https://www.instagram.com');
    $f3->set('bookmarks', $bookmarks);

    $bookmarks2 = array('Google'=>'https://www.google.com',
                        'Facebook'=>'https://www.facebook.com',
                        'Instagram'=>'https://www.instagram.com');
    $f3->set('bookmarks2', $bookmarks2);

    $desserts = array('chocolate' => 'Chocolate Mousse',
                      'vanilla' => 'Vanilla Custard',
                      'strawberry' => 'Strawberry Shortcake');
    $f3->set('desserts', $desserts);

//    $view = new Template();
//    echo $view->render('views/info.html');
    echo Template::instance()->render('views/info.html');
});

//run Fat-free
$f3 -> run();
