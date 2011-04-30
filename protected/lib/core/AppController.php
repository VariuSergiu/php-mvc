<?php


abstract class AppController
{


    /**
     * @registry object
     * @access protected
     */
    protected $registry;

    function  __construct($registry)
    {
        $this->registry = $registry;
    }

    /**
     * @all controllers must contain an index method
     */
    abstract function index();

    
}

?>
