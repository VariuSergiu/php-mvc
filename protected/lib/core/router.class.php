<?php

/**
 * The Router class
 *
 * Routes to the specific controller/action based on the url
 *
 * @category   Registry
 * @author     Variu Sergiu <variusergiu@gmail.com>
 * @copyright  2011 Variu Sergiu
 * @license    Free
 * @version    v.1.0
 * @package    Core Object
 */

class Router
{
    /**
     * The registry object
     *
     * @access private
     */
    private $_registry;

    /**
     * The controller path
     *
     * @access private
     */
    private $_urlPath;
    
    /**
     * The controller file . e.g: productController.php
     * 
     * @var file
     * @access private
     */
    private $_file;

    /**
     * The controller name from url
     *
     * @var <controller
     * @access private
     */
    private $_controller;

    /**
     * The controller action from the url
     *
     * @var action
     * @access private
     */
    private $_action;

    /**
     * The constructor , instantiates the registry object
     * @param Registry $registry 
     */
    public function  __construct(Registry $registry)
    {
        $this->_registry = $registry;
    }

    /**
     * Sets the controller directory path
     *
     * @param string $path
     * @return void
     */
    public function setPath($path)
    {
        //check if path is a directory
        if (is_dir($path) == false) {
            throw new Exception('Invalid controller path :' . $path);
        }
        //set the path
        $this->_urlPath = $path;
    }

    /**
     * Gets the url path
     *
     * @return array the url path
     */
    public function getPath()
    {
        return $this->_urlPath;
    }

    /**
     * Loads to the appropiate controller based on the url provided by
     * the getController() private method
     *
     * @return void
     */
    public function loader()
    {
        //check the route
        $this->getController();

        //check if file is not there
        if (is_readable($this->_file) === false) {
            throw new Exception('error 404 not found');
        }

        //include the controller
        include $this->_file;

        //a new controller class instance
        $class = $this->controller . 'Controller';
        $controller = new $class($this->_registry);

        //check if the action is callable
        if (is_callable(array($controller, $this->_action)) === false) {
            $action = 'index';
        } else {
            $action = $this->_action;
        }        
        //run the action
        $controller->$action();
    }

    /**
     * Gets the controller from the url route
     * 
     * @return void
     */
    private function getController()
    {
        //get the route from the URL
        $route = isset($_GET['page']) ? $_GET['page'] : '';
        if (empty($route)) {
            $route = 'index';
        } else {
            $parts = explode('/', $route);
            $this->controller = $parts[0];
            if (isset($parts[1])) {
                $this->action = $parts[1];
            }
        }
        //get action
        if (empty($this->action)) {
            $this->action = 'index';
        }
        //set the file path of the controller based on the url path
        $this->_file = FRAMEWORK_PATH . '/protected/controllers/' . $this->controller . 'Controller.php';
    }


}



?>