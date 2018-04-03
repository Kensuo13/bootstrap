function verifFormConnexion(f)
{
    var inputPseudo = document.getElementById('id');
    var alertPseudo = document.getElementById('alertid');
    var pseudoOk = verifInput(inputPseudo, alertPseudo );
    
    var inputMdp = document.getElementById('mdp');
    var alertMdp = document.getElementById('alertmdp');
    var mdpOk = verifInput(inputMdp, alertMdp );
    if(pseudoOk && mdpOk)
        return true;
    else
    {
        return false;
    }
}

function verifInput(input, alert) {
    var id = input.value;
    if(id == ''){
        alert.innerHTML = "<div class='alert alert-danger' role='alert'>Veuillez remplir ce champ !</div>" ;
        return false;
    }
    else
    {
        alert.innerHTML = "" ;
        return true;
    }
}


function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}