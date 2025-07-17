<?php

$options = [
	PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES		=> false,
];
try {
	$sql = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, $options);
} catch (\PDOException $e) {
	if (function_exists('fs_error'))
		fs_error('Database connection error');
	else
		die('Database connection error');
}

function query($query,$params = []) {
	global $sql;

	$res = $sql->prepare($query);
	$res->execute($params);
	return $res;
}

function fetch($query,$params = []) {
	$res = query($query,$params);
	return $res->fetch();
}

function result($query,$params = []) {
	$res = query($query,$params);
	return $res->fetchColumn();
}
