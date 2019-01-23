<?php
// Hacky code to make MySQL work on both of my machines.
if (__DIR__ == "/home/administrator/www_flowers") {
	$mysqli = new mysqli('127.0.0.1', 'admin', 'cuddles', 'origami');
} else { 
	$mysqli = new mysqli('127.0.0.1', 'root', 'cuddles', 'origami');
}

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
	fs_error('Database error 1F');
}

// Set charset to utf8
mysqli_set_charset($mysqli, 'utf8');

// Include the mysql "abstraction layer".
require("function/mysql_lib.php")
?>
