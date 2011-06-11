<?php

/**
 * The DAL
 *
 *
 * @category   Database
 * @author     Variu Sergiu <variusergiu@gmail.com>
 * @copyright  2011 Variu Sergiu
 * @license    Free
 * @version    v.1.0
 * @package    Database
 */


class Database
{
    /**
     * The instance var of the database
     *
     * @var static instance
     * @access private
     */
    private static $_instance;

    /**
     * The connection variable
     *
     * @var dbh
     * @access private
     */
    private $_dbh;

    /**
     * The results var from the database
     *
     * @var results
     * @access private
     */
    private $_results;

    /**
     * The number of rows variable
     *
     * @var num rows
     * @access private
     */
    private $_numRows;

    /**
     * Empty construct for use with the Singleton Design Pattern
     */
    private function __construct()
    {
    }

    /**
     * Gets the instance of the database without instantiating
     * the database object
     * Usage: $database : Database::getInstance()
     *
     * @return instance
     * @access public
     */
    public static function getInstance()
    {
        if (! self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Connects to the database with PDO
     *
     * @return $dbh, the database connection
     */
    public function connect()
    {
        include FRAMEWORK_PATH . '/protected/config/' . 'config.php';
        try {
            $this->_dbh = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->_dbh;
    }

    /**
     * Does a query based on a $sql string
     *
     * @param $sql
     * @access public
     */
    public function doQuery($sql)
    {
        $this->_results = $this->_dbh->query($sql);
    }

    /**
     * Fetches a single row from the database
     *
     * @param $sql
     * @access public
     */
    public function fetchRowFromDb($sql)
    {
        $this->doQuery($sql);
        $this->_numRows = $this->_results->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches multiple rows from the database
     *
     * @param $sql
     * @access public
     */
    public function fetchAllFromDb($sql)
    {
        $this->doQuery($sql);
        $this->_numRows = $this->_results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Returns the results from the database and 
     * stores them in the obj variable
     *
     * @return $obj
     */
    public function loadObjectList()
    {
        $obj = '';
        if ($this->_results) {
            $obj = $this->_numRows;
        }
        return $obj;
    }

    

}


?>
