<?php include 'header.php';
include 'connexionBDD.php';

if (empty($_SESSION['pseudo'])) { ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous devez vous connecter pour accéder à cette page !</div>

<?php } else if (empty($_GET['id'])){ ?>
    <h1 class='display-4'>Erreur</h1>
    <div class='alert alert-danger' role='alert'>Vous n'avez pas sélectionné de membre</div>
<?php } else {
        
$req = $bdd->prepare("SELECT * FROM membres WHERE id=:id");
$req->execute(array(
        'id' => $_GET['id']));
$result = $req->fetch();
?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img class="img-fluid img-thumbnail img-profil" src="source/img/tt.jpg" alt="Card image cap">
                <ul class="list-group">
                    <li class="list-group-item">Rôle 1, Rôle 2, Rôle 3 (badges ?)</li>
                    <li class="list-group-item">Date d'inscription : 10 janvier 2017</li>
                    <li class="list-group-item">Adresse mail : exemple@exemple.truc</li>
                </ul>
            </div>
            <div class="col-lg-8">
                <h1>Profil de machin</h1>
                <p>Je suis de bonne humeur.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pharetra sed magna dictum lacinia. Sed egestas congue quam nec volutpat. Quisque volutpat mauris ligula, vel laoreet nisl tincidunt eget. Curabitur a commodo enim. Sed ac odio turpis duis.</p>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-12">
            <h1>Personnages joués par machin</h1>
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