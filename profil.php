<?php include 'header.php';
include 'connexionBDD.php';

if (empty($_SESSION['pseudo'])) { ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous devez vous connecter pour accéder à cette page !</div>

<?php } else if (empty($_GET['id'])){ ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous n'avez pas sélectionné de membre</div>
<?php } else {
        
$req = $bdd->prepare("SELECT *, DATE_FORMAT(`inscription`, '%d-%M-%Y') AS `date` FROM membres WHERE id=:id");
$req->execute(array(
        'id' => $_GET['id']));
$result = $req->fetch();

$formatter = new IntlDateFormatter('fr_FR',IntlDateFormatter::LONG,
                IntlDateFormatter::NONE,
                'Europe/Paris',
                IntlDateFormatter::GREGORIAN );
$date =new DateTime($result['date']);

$req2 = $bdd->prepare("SELECT * FROM membres, membre_roles, role WHERE membres.id=:id AND membres.id = membre_roles.id_membre AND role.id = membre_roles.id_role");
$req2->execute(array(
        'id' => $_GET['id']));
?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img class="img-fluid img-thumbnail img-profil" src="<?php echo $result['avatar']; ?>" >
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php while ($resultrole = $req2->fetch()) { ?>
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
        <div class='row'>
            <div class="col-lg-12">
            <h1>Personnages joués par <?php echo $result['pseudo']; ?></h1>
        </div>
        </div>
        <div class="row">
            <div class="card-deck">
                <div class="card col-lg-4">
                    <img class="card-img-top" src="https://www.jqueryscript.net/images/Simplest-Responsive-jQuery-Image-Lightbox-Plugin-simple-lightbox.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card col-lg-4">
                    <img class="card-img-top" src="https://www.francetvinfo.fr/image/75ej3m23w-8539/1200/825/13986167.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card col-lg-4">
                <img class="card-img-top" src="https://www.wonderplugin.com/videos/demo-image0.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
include 'footer.html';?>