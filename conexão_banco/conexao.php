<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'multicultural';


$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

