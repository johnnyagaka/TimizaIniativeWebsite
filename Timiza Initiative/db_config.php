<?php 
/**
 * @author Team Timiza
 * @version 1.1.0
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'timiza');

//creation of a class called DB_con
class DB_con {

	//Instance varaibles
	public $connection;


	/**
	*Instantiation of Attributes in the constructor
	*/
	function __construct(){
        $this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		
        if ($this->connection->connect_error) die('Database error -> ' . $this->connection->connect_error);
        
		
	}
	 /**
	*@method ret_obj()
	*@return $this->connection
	*/
	function ret_obj(){
        return $this->connection;
        
	}

}

