<?php
/**
 * The Base App Controller
 *
 * The Base Controller that all the controllers in the
 * application extends
 * It has an abstract method index() that all the child controllers
 * must define
 *
 * @category   Base Controller
 * @author     Variu Sergiu <variusergiu@gmail.com>
 * @copyright  2011 Variu Sergiu
 * @license    Free
 * @version    v.1.0
 * @package    Core Object
 */


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
