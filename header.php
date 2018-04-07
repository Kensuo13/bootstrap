<?php 
// Si ligne n'existe pas, on affiche le session_start
if (!isset($ligne)){
    session_start();
}?>
<html>
<head>
    
    <title>Page Title</title>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="verifs.js"></script>

    
</head>


<body>

    <!--navbar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Notre Template</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        
            <?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ ?>
                <a class="nav-link" href="deconnexion.php">
                    <button class="connect" type="button" class="btn btn-primary">
                        Deconnexion [<small><?php echo $_SESSION['pseudo'] ?></small>]
                    </button>   
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php?id=<?php echo $_SESSION['id']; ?>">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="salon.php">Salon RP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="membres.php">Membres</a>
                </li>
            <?php } else { ?>
          <a class="nav-link" href="#">
            <!-- Button trigger modal -->
              <button class="connect" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Connexion
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <form action="connexion.php" method="POST">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Connexion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                  <fieldset>
                                      <label for="id">Identifiant</label>
                                      <input type="text" id="id" name="id" required='required'/>
                                      <label for="mdp">Mot de passe</label>
                                      <input type="password" id="mdp" name="mdp" required='required'/>
                                  </fieldset>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="javascript:location.href='formInscription.php'">Inscription</button>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
          </a>
            <?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
<?php if ($_SERVER['PHP_SELF'] != '/bootstrap/index.php') { ?>
    <div class='jumbotron'>
<?php } ?>
    