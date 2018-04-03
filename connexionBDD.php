<?php
$host="localhost";
$user="root";
$password="";
$database="template";
mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()){
    die('<p> La connexion au serveur SQL a échouée</p>');
} else {
    echo '<p>pd</p>';
}

?>