<?php 
require_once('DBConnect.php');

class User
{

	public function __construct($rows) 
	{
		foreach ($rows as $key => $row) {
			$this->$key = $row;
		}
	}

	public static function make($row)
	{
		return new User($row);
	}   
	
	public static function getUsers()
	{
		$connection = new DBConnect;
		$query = "SELECT * FROM users";
        $row = $connection->select($query);

		return $row;

	}

	public function updateData($columns, $conditions)
	{
		$table = 'users';
		$connection = new DBConnect;
		$connection->update($table, $columns, $conditions);
	} 

	public static function getUserByAttribute($attribute) 
	{

		$connection = new DBConnect;
		$query = "SELECT * FROM users";
		$row = current($connection->select($query, $attribute));

		return self::make($row);

	}

}

