<?php
$host="localhost";
$user="root";
$password="";
$database="bootstrap";

try
{
	$bdd = new PDO('mysql:host='. $host .';dbname='. $database .';charset=utf8', $user , $password );
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>