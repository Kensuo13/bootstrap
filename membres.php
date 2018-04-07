<?php include 'header.php';
include 'connexionBDD.php';

if (empty($_SESSION['pseudo'])) { ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous devez vous connecter pour accéder à cette page !</div>
<?php } else {

$req = $bdd->prepare("SELECT * FROM membres");
$req->execute();

?>

    <h1 class="display-4">Liste des membres</h1>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col"><span class="oi oi-image size3"></span></th>
                <th scope="col"><span class="oi oi-person size3"></span></th>
                <th scope="col"><span class="oi oi-question-mark size3"></span></th>
                <th scope="col"><span class="oi oi-pulse size3"></span></th>
            </tr>
        </thead>
        <tbody>
        <?php $num = 0;
        while ($membres = $req->fetch())
       { $num ++; ?>
            <tr>
                <td class="div-membres"><img class="img-fluid img-thumbnail img-profil" src="<?php echo $membres['avatar']; ?>" ></td>
                <td><a href="profil.php?id=<?php echo $membres['id']; ?>"><?php echo $membres['pseudo']; ?></a></td>
                <td><?php echo $membres['description']; ?></td>
                <td><?php echo $membres['humeur']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table> 

<?php }
include 'footer.html';?>

  
    
  
