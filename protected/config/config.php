<?php
/**
 * The configuration file of the framework
 * 
 * DB configuration - dsn, database user, password and options
 * 
 * Environment configuration - development, live and testing
 *
 */

$dsn     = 'mysql:host=localhost;dbname=gamelist';
$user    = 'root';
$pass    = '';
$options = array(
    PDO::ATTR_PERSISTENT => TRUE,
);

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}


?>
