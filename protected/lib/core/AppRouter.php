<?php


class AppRouter
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

    protected $args = array();

    public $file;

    public $controller;

    public $action;

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
     * Loads the controller
     *
     * @return void
     */
    public function loader()
    {
        //check the route
        $this->getController();

        //check if file is not there
        if (is_readable($this->file) == false) {
            //echo $this->file;
            die('404 Not found');
        }

        //include the controller
        include $this->file;

        //a new controller class instance
        $class = $this->controller . 'Controller';
        $controller = new $class($this->_registry);

        //check if the action is callable
        if (is_callable(array($controller, $this->action)) == false) {
            $action = 'index';
        } else {
            $action = $this->action;
        }        
        //run the action
        $controller->$action();
    }

    /**
     * Gets the controller from the url route
     * 
     * @return void
     */
    protected function getController()
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
        if (empty($this->controller)) {
            $this->controller = 'index';
        }
        //get action
        if (empty($this->action)) {
            $this->action = 'index';
        }
        //if (!in_array($this->action, $parts)) {
        //    die('404 Not Found');
        //}
        //set the file path of the controller based on the url path
        $this->file = $this->_urlPath . '/' . $this->controller . 'Controller.php';
    }


}



?>