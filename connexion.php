<?php include 'header.html'; 

$id = $_POST["id"];
$mdp = $_POST["mdp"];

?>

<div class="jumbotron">
  <h1 class="display-4">Ceci est la page de connexion</h1>
  <p class="lead">Ici s'afficheront les données qui passent en post : L'identifiant : <?php echo $id ?> et le mot de passe : <?php echo $mdp ?></p>
</div>

<?php include 'footer.html';?>