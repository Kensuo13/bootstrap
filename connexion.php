<?php 
include 'connexionBDD.php'; 
    if (!empty($_POST['id']) && !empty($_POST['mdp'])) {
    $pseudo = $_POST['id'];
    $mdp = $_POST['mdp'];

} else {
    include 'header.php';
    
    echo "<div class='jumbotron'><h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>erreur : l'un des champs est vide.</div>";
    header('Location: formInscription.php');
}
//On crypte le mot de passe
$pass_hache = password_hash($mdp, PASSWORD_DEFAULT);

// On recherche dans la base de données le membre qui correspond à cet identifiant et ce mot de passe
$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));

$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($mdp, $resultat['mdp']);

if (!$resultat)
{
    include 'header.php';
    echo "<div class='jumbotron'><h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>Mauvais identifiant ou mot de passe !</div>";
}
else
{
    if ($isPasswordCorrect) {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        include 'header.php';
        echo "<div class='jumbotron'><h1 class='display-4'>Succès</h1><div class='alert alert-success' role='alert'>Vous êtes connecté(e) ! Bienvenue, ". $_SESSION['pseudo'] ."Votre id est : ". $_SESSION['id'] ."</div>";
    }
    else {
        include 'header.php';
        echo "<div class='jumbotron'><h1 class='display-4'>Erreur</h1><div class='alert alert-danger' role='alert'>Mauvais identifiant ou mot de passe !</div>";
    }
}
?>

</div>

<?php include 'footer.html';