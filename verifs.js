function verifFormInscription(f)
{
    
    var inputMdp = f.mdp1;
    var inputMdp2 = f.mdp2;
    var inputMail = f.mail;
    var inputMail2 = f.mail2;
    
    var alertmdp = f.alertmdp;
    var alertmail = f.alertmail;
    
    var result = true;
    
    if (inputMdp.value != inputMdp2.value) {
        document.getElementById('alertmdp').innerHTML = "<div class='alert alert-danger' role='alert'>Les mots de passe ne sont pas identiques !</div>" ;
        result = false;
    } else {
        document.getElementById('alertmdp').innerHTML = "" ;
    }
    
    if (inputMail.value != inputMail2.value) {
        document.getElementById('alertmail2').innerHTML = "<div class='alert alert-danger' role='alert'>Les adresses mail ne sont pas identiques !</div>" ;
        result = false;
    } else {
        document.getElementById('alertmail2').innerHTML = "";
    }
    
    if (!verifMail(inputMail)) {
        result = false;
    }
    
    return result;
}

function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value))
    {
        document.getElementById('alertmail').innerHTML = "<div class='alert alert-danger' role='alert'>Votre adresse mail n'est pas au bon format ! (exemple.exemple@exemple.ex)</div>" ;
        return false;
    }
    else
    {
        document.getElementById('alertmail').innerHTML = "" ;
        return true;
    }
}