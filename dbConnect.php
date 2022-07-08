<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personne";


$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
