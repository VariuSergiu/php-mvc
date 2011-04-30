<?php

// set error reporting on
error_reporting(E_ALL);

// define the site path constant
$sitePath = realpath(dirname(__FILE__));
define('__SITE_PATH', $sitePath);

// include the init.php file
include 'protected/includes/init.php';

// load the router
$registry->router = new AppRouter($registry);

// set the path to the controller directory
$registry->router->setPath(__SITE_PATH . '/protected/controllers');

// load up the template 
$registry->template = new AppTemplate($registry);

// load the controller
$registry->router->loader();



?>