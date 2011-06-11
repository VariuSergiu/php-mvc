<?php
/**
 * The ORM
 *
 *
 * @category   Database
 * @author     Variu Sergiu <variusergiu@gmail.com>
 * @copyright  2011 Variu Sergiu
 * @license    Free
 * @version    v.1.0
 * @package    Database
 */


abstract class DbMapper
{
    /**
     * The id column in the database
     *
     * @var $id
     * @access public
     */
    public $id = null;

    /**
     * The table name from the database
     *
     * @var $table
     * @access public
     */
    public $table = null;

    function __construct()
    {
    }

    /**
     * Binds the data into objects using
     *
     * @param array $data
     * @access public
     */
    public function bind($data)
    {
        foreach ($data as $key=>$value) {
            $this->$key = $value;
        }
    }

    /**
     *
     * @param $id, the id of the row from the database
     */
    public function findByPk($id)
    {
        $this->id = $id;
        $dbh = Database::getInstance();
        $sql = $this->buildQuery('load');
        $dbh->fetchRowFromDb($sql);
        $row = $dbh->loadObjectList();
        foreach ($row as $key=>$value) {
            if ($key == 'id') {
                continue;
            }
            $this->$key = $value;
        }
    }

    /**
     * Finds all the rows from the database
     *
     * @return $data
     */
    public function findAll()
    {
        $dbh = Database::getInstance();
        $sql = "SELECT * FROM {$this->table}";
        //$dbh->doQuery($sql);
        $dbh->fetchAllFromDb($sql);
        $data = $dbh->loadObjectList();
        //print_r($data);
        return $data;
    }


    /**
     * Executes a statemnet
     */
    public function exec()
    {
        $dbh = Database::getInstance();
        $sql = $this->buildQuery('exec');
        $dbh->doQuery($sql);
    }

    protected function buildQuery($task)
    {
        $sql = "";
        if ($task == 'exec') {
            if ($this->id == '') {
                $keys = "";
                $values = "";
                $classVars = get_class_vars(get_class($this));
                $sql .= "INSERT INTO {$this->table}";
                foreach ($classVars as $key=>$value) {
                    if ($key == 'id' || $key == 'table') {
                        continue;
                    }
                    $keys .= "{$key},";
                    $values .= "'{$this->$key}',";
                }
                $sql .= '(' . substr($keys, 0, -1) . ') VALUES(' . substr($values, 0, -1) . ')';
            } else {
                $classVars = get_class_vars(get_class($this));
                $sql .= "UPDATE {$this->table} SET ";
                foreach ($classVars as $key=>$value) {
                    if ($key == 'id' || $key == 'table') {
                        continue;
                    }
                    $sql .= "{$key}='{$this->$key}',";
                }
                $sql = substr($sql, 0, -1) . " WHERE id={$this->id}";
                print_r($sql);
            }
        } elseif ($task == 'load') {
            $sql .= "SELECT * FROM {$this->table}
                     WHERE id='{$this->id}'";
        }
        return $sql;
    }


}

?>
