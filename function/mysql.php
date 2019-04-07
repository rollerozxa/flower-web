<?php
// Hacky code to make MySQL work on both of my machines.
if (__DIR__ == "/home/administrator/www_flowers/function") {
	$host = '127.0.0.1';
	$db   = 'origami';
	$user = 'admin';
	$pass = 'cuddles';
} else {
	$host = '127.0.0.1';
	$db   = 'origami';
	$user = 'root';
	$pass = 'cuddles';
}

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
	$sql = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, $options);
} catch (\PDOException $e) {
	if (function_exists('fs_error'))
		fs_error('Database error 1F');
	else
		die('Database error 1F');
}

function query($query,$params = []) {
	global $sql;

	$res = $sql->prepare($query);
	$res->execute($params);
	return $res;
}

function fetch($query,$params = []) {
	global $sql;
	
	$res = query($query,$params);
	return $res->fetch();
}

function result($query,$params = []) {
	global $sql;
	
	$res = query($query,$params);
	return $res->fetchColumn();
}
