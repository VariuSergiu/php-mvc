<?php

// define our environment
define('ENVIRONMENT', 'live');

//start our session
session_start();
if (!isset ($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = '0.00';
}


// define the site path constant
$sitePath = realpath(dirname(__FILE__));
define('FRAMEWORK_PATH', $sitePath);

// include the init.php file
include 'protected/includes/init.php';

$dbh = Database::getInstance();
$dbh->connect();

$registry = new Registry();
// load the router
$registry->router = new Router($registry);

// set the path to the controller directory
$registry->router->setPath(FRAMEWORK_PATH . '/protected/controllers');

// load up the template
$registry->template = new Template($registry);

// load the controller
$registry->router->loader();

?>

