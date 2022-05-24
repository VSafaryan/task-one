<?php 

namespace src\Http\Controllers;

use \Nette\Database\Connection;

class DatabaseController {

    private static $db;
    private $connection;


    public function __construct($host = HOST , $username = USERNAME , $password = PASSWORD , $dbName =DBNAME )
    {
        $database = new Connection("mysql:host=$host;dbname=$dbName", $username, $password);

        $this->connection = $database;
    }

    public static function getInstance($host = HOST , $username = USERNAME , $password = PASSWORD , $dbName =DBNAME)
    {
        if(self::$db === null)
        {
          self::$db = new self($host , $username , $password , $dbName);      
        }

        return self::$db;

    }


    public function startCondition()
    {
       return $this->connection;     
    }

}