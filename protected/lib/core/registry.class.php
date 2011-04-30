<?php

/**
 * The Registry class
 *
 * Registry class stores registry objects
 *
 * @category   Registry
 * @author     Variu Sergiu <variusergiu@gmail.com>
 * @copyright  2011 Variu Sergiu
 * @license    Free
 * @version    v.1.0
 * @package    Registry
 */
class Registry
{
    /**
     * Variable that stores an array of registry objects
     *
     * @var array objects
     */
    private $_objects;

    /**
     * Variable that stores an array of registry settings
     *
     * @var array settings
     */
    private $_settings;

    private function construct()
    {
    }

    /**
     * Creates a new object and stores it in the registry
     * @param string $object, the object file prefix
     * @param string $key, pair for the object 
     * @return void
     */
    public function createAndStoreObject($object, $key)
    {
        require_once $object . '.class.php';
        $this->_objects[$key] = new $object($this);
    }

    /**
     * Gets an object from the registry store
     * @param string $key the objects array key
     * @return Object
     */
    public function getObject($key)
    {
        return $this->_objects[$key];
    }

    /**
     * Stores the registry setting
     * @param string $setting the setting data
     * @param string $key the key pair for the setting array
     * @return void
     */
    public function storeSetting($setting, $key)
    {
        $this->_settings[$key] = $setting;
    }

    /**
     * Gets a setting from the registries store
     * @param string $key the settings array key
     * @return string the setting data
     */
    public function getSetting($key)
    {
        return $this->_settings[$key];
    }
}


?>