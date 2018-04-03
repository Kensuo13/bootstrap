<?php
include('header.html');
include('connexionBDD.php');

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$mdp2 = $_POST['mdp2'];
$mail = $_POST['mail'];
$mail2 = $_POST['mail2'];


include('footer.html');
?>