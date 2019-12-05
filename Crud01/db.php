<?php

$dsn = 'mysql:host=localhost;dbname=ProjekZero1';
$username = 'root';
$password = 'root';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}