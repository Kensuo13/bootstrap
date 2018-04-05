<?php
include('header.php');
include('connexionBDD.php'); ?>

<div class="jumbotron">
    
<?php

if (!empty($_POST['id1']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['mail']) && !empty($_POST['mail2'])) {
    $pseudo = $_POST['id1'];
    $mdp = $_POST['mdp1'];
    $mdp2 = $_POST['mdp2'];
    $mail = $_POST['mail'];
    $mail2 = $_POST['mail2'];
    
} else {
    echo "<h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>L'un des champs est vide.</div>";
    header('Location: formInscription.php');
}
if ($mdp == $mdp2) {
    // On crypte le mot de passe
    $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
} else {
    echo "<h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>Les deux mots de passe sont différents. Retourner à la page d'inscription.</div>";
    header('Location: formInscription.php');
}
if ($mail != $mail2) {
    echo "<h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>Les deux mots de passe sont différents. Retourner à la page d'inscription.</div>";
    header('Location: formInscription.php');
}
//On vérifie que le pseudo est disponible
$req1 = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
$req1->execute(array(
    'pseudo' => $pseudo));

$existe = false;

while ($donnees = $req1->fetch())
{
	$existe = true;
}

if (!$existe) {
    // On insère le tout dans la base de données
    $req = $bdd->prepare('INSERT INTO membres(pseudo, mdp, mail, inscription) VALUES(:pseudo, :mdp, :mail, CURDATE())');
    $req->execute(array(
        'pseudo' => $pseudo,
        'mdp' => $pass_hache,
        'mail' => $mail));
    
    echo "<h1 class='display-4'>Inscription réussie !</h1><div class='alert alert-success' role='alert'>Félicitations, votre inscription a bien été prise en compte ! Vous pouvez désormais vous connecter.</div>";
} else {
    echo "<h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>Le pseudo existe déjà, vous devez tout vous retaper...</div>";
    header('Location: formInscription.php');
} ?>

</div>

<?php
include('footer.html');
?>