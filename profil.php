<?php include 'header.php';
include 'connexionBDD.php';

if (empty($_SESSION['pseudo'])) { ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous devez vous connecter pour accéder à cette page !</div>

<?php } else if (empty($_GET['id'])){ ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous n'avez pas sélectionné de membre</div>
<?php } else {
        
$reqMembre = $bdd->prepare("SELECT *, DATE_FORMAT(`inscription`, '%d-%M-%Y') AS `date` FROM membres WHERE id=:id");
$reqMembre->execute(array(
        'id' => $_GET['id']));
$result = $reqMembre->fetch();

$formatter = new IntlDateFormatter('fr_FR',IntlDateFormatter::LONG,
                IntlDateFormatter::NONE,
                'Europe/Paris',
                IntlDateFormatter::GREGORIAN );
$date =new DateTime($result['date']);

$reqRoles = $bdd->prepare("SELECT * FROM membres, membre_roles, role WHERE membres.id=:id AND membres.id = membre_roles.id_membre AND role.id = membre_roles.id_role");
$reqRoles->execute(array(
        'id' => $_GET['id']));

$reqPersonnages = $bdd->prepare("SELECT *, DATE_FORMAT(`creation`, '%d-%M-%Y') AS `dateCrea` FROM membres, personnage WHERE membres.id=:id AND membres.id = personnage.proprietaire");
$reqPersonnages->execute(array(
        'id' => $_GET['id']));
?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img class="img-fluid img-thumbnail img-profil" src="<?php echo $result['avatar']; ?>" >
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php while ($resultrole = $reqRoles->fetch()) { ?>
                        <img class='img-fluid' src="source/img/role/<?php echo $resultrole['image']; ?>" >
                        <?php } ?>
                    </li>
                    <li class="list-group-item">Date d'inscription : <?php echo $formatter->format($date); ?></li>
                    <li class="list-group-item">E-mail : <?php echo $result['mail']; ?></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <h1>Profil de <?php echo $result['pseudo'] ?></h1>
                <p><?php echo $result['humeur']; ?></p>
                <p><?php echo $result['description']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1>Personnages joués par <?php echo $result['pseudo']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="nav-tabContent">
                <!-- Affiche La page 1 -->
                <div class="tab-pane fade show active" id="list-1" role="tabpanel">
                <?php $count = 1;
                        $numpage=1;
                while ($resultperso = $reqPersonnages->fetch()) { 
                    if ($count != 4) {
                        $count ++;?>
                    <div class="card col-lg-4">
                        <img class="card-img-top" src="<?php echo $resultperso['image']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultperso['nom']; ?></h5>
                            <p class="card-text"><?php echo $resultperso['perso_description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Créé le <?php 
                            $date2 =new DateTime($resultperso['dateCrea']);
                            echo $formatter->format($date2);?>
                            </small>
                        </div>
                    </div>
                    <?php } else {
                    $numpage ++; ?>
                
                <!-- Affiche La page associée au numéro si il y a + de 4 personnages -->
                <div class="tab-pane fade" <?php echo "id='list-". $numpage. "'" ?> role="tabpanel">
                <?php $count = 1; 
                    } ?>
                <?php } ?>
                </div>
            </div>
          </div>
            <!-- Affiche les numéros de pages -->
            <?php if ($numpage > 1) { ?>
          <div class="list-group col-12" role="tablist">
            <nav class="nobordure">
              <ul class="pagination" >
                  <?php 
                      for ($i=1;$i<=$numpage;$i++) {?>
                        <li class="page-item"><a class="page-link" id="list-home-list" data-toggle="list" <?php echo "href='#list-". $i. "'" ?> role="tab"><?php echo $i; ?></a></li>
                  <?php } ?>
              </ul>
            </nav>
          </div>
            <?php } ?>
    </div>
<?php
}
include 'footer.html'; ?>