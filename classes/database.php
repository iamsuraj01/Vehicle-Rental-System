<?php
include('constants.php');
class DataBase{
	public $connection;
	public $lastQuery;
	
	function __construct(){
		$this->db_connect();
		}
	function db_connect(){
		$this->connection =new mysqli(SERVERNAME,USER,PASSWORD,DATABASE);
		
	}
		
	
	}
?>