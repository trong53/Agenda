<?php

function validate(string $name, string $pattern) : bool {
     
	if (preg_match($pattern, trim($name))) {
		return true;
	}else{
		return false;
	}
}

function insertUser(string $name, string $password, string $email, string $created_at) : void 
{
    require './database/db.php';
		
		$sql = $connection->prepare("INSERT INTO users (name, password, email, created_at) 
                					VALUES (?, ?, ?, ?)");
		$sql -> bindparam(1, $name, PDO::PARAM_STR);
		$sql -> bindparam(2, $password);
		$sql -> bindparam(3, $email, PDO::PARAM_STR);
		$sql -> bindparam(4, $created_at);

		$sql -> execute();
}

function checkExist ($fieldTochecked, $param) {

	require './database/db.php';

	$sql = $connection->prepare("SELECT * FROM users WHERE $fieldTochecked = ?");
    $sql -> bindparam(1, $param);
	$sql->execute();
	$exists = $sql->fetchColumn();  // either 1 or null
	
	return $exists;
}

