<?php

Class Template
{

    /*
     * @the registry
     * @access private
     */
    private $_registry;

    /*
     * @Variables array
     * @access private
     */
    private $_vars = array();

    /**
     * @constructor
     * @access public
     * @return void
     */
    public function __construct($registry) {
            $this->_registry = $registry;
    }


     /**
     * @set undefined vars
     * @param string $index
     * @param mixed $value
     * @return void
     */
     public function __set($index, $value)
     {
            $this->_vars[$index] = $value;
     }

     public function show($name) {
            $path = FRAMEWORK_PATH . '/protected/views' . '/' . $name . '.php';

            if (file_exists($path) == false)
            {
                    throw new Exception('Template not found in '. $path);
                    return false;
            }

            // Load variables
            foreach ($this->_vars as $key => $value)
            {
                    $$key = $value;
            }

            include ($path);
    }

}

?>