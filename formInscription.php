<?php include 'header.html';?>

<div class="jumbotron">
    <h1 class="display-4">Inscription</h1>
    <form action="inscription.php" method="POST" onsubmit="return verifFormInscription(this)">
        <fieldset>
            <table class="table">
                <tbody>
                  <tr>
                    <td><label for="pseudo">Pseudo</label></td>
                    <td><input type="text" id="id1" name="id1" required='required'/></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><label for="mdp">Mot de passe</label></td>
                    <td><input type="password" id="mdp1" name="mdp1" required='required' /></td>
                    <td id='alertmdp'></td>
                  </tr>
                  <tr>
                    <td><label for="mdp2">Répéter le mot de passe</label></td>
                    <td><input type="password" id="mdp2" name="mdp2" required='required'/></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><label for="mail">Adresse mail</label></td>
                    <td><input type="email" id="mail" name="mail" required='required'/></td>
                    <td id='alertmail'></td>
                  </tr>
                  <tr>
                    <td><label for="mail2">Répéter l'adresse mail</label></td>
                    <td><input type="email" id="mail2" name="mail2" required='required'/></td>
                    <td id='alertmail2'></td>
                  </tr>
                </tbody>
            </table>
            <button type='submit' class="btn btn-primary">Inscription</button>
        </fieldset>
    </form>
</div>

<?php include 'footer.html';?>