<?php include 'header.php';?>

<div class="jumbotron">
  <h1 class="display-4">Succès !</h1>
  <div class='alert alert-success' role='alert'>Vous êtes connecté(e) ! Bienvenue, <?php $_SESSION['pseudo'] ?> Votre id est : <?php $_SESSION['id'] ?></div>
</div>

<?php include 'footer.html';?>