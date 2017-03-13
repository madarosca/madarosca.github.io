<?php

class DBConnect 
{

	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_password = '';
	private $db_name = 'website3';
	public $connection;


	public function __construct() 
	{
		$this->connect(); 
	}


	public function connect() 
	{
		$this->connection = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_password);
	}


	public function select($query, $fields=array()) 
	{
		$where = '';
		if (count($fields)) {
			foreach ($fields as $field => $value) {
				$where .= $field . "='" . $value . "' AND ";
			}
			$where = rtrim($where, " AND ");
		}

		try {
			if (!empty($where)) {
				$query .= " WHERE " . $where;
			}
			$stmt = $this->connection->prepare($query);

			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

		    return $result;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}


	public function insert($table, $params)
	{
		$columns = '';
		$values = '';
		foreach ($params as $column => $value) {
			$columns .= $column . ",";
			$values .= "'" . $value . "',";
		}
		$columns = rtrim($columns, ",");
		$values = rtrim($values, ",");

		try {
			$stmt = $this->connection->prepare("INSERT INTO " . $table . " ( " . $columns . ") VALUES (" . $values . ")");
			$stmt->execute();
        	return $this->connection->lastInsertId(); 
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}

	}

	public function update($table, $columns, $conditions)
	{
		$set = '';
		foreach ($columns as $column => $value) {
			$set .= $column . "='" . $value . "',";
		}
		$set = rtrim($set, ",");

		$where = '';
		foreach ($conditions as $condition => $value) {
			$where .= $condition . "='" . $value . "' AND ";
		}
		$where = rtrim($where, " AND ");

		echo ("<pre>"); print_r($set); echo ("</pre>");

		try {
			$stmt = $this->connection->prepare("UPDATE " . $table . " SET " . $set . " WHERE " . $where);
			$stmt->bindParam(':id', $condition);
			return $stmt->execute(); 
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
}