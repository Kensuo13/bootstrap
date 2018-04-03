function surligne(form, erreur)
{
   var champ1 = form.id;
   var champ2 = form.mdp;
   if(erreur) {
       var id = form.id.value;
       var mdp = form.mdp.value;
        if(id == ''){
            document.getElementById('alertid').innerHTML = "<div class='alert alert-danger' role='alert'>Veuillez remplir ce champ !</div>" ;
        }
        if (mdp == ''){
            document.getElementById('alertmdp').innerHTML = "<div class='alert alert-danger' role='alert'>Veuillez remplir ce champ !</div>" ;
        }
    } else {
        if(id == ''){
            document.getElementById('alertid').innerHTML = "" ;
        }
        if (mdp == ''){
            document.getElementById('alertmdp').innerHTML = "" ;
        }
    }
}

function verifForm(f)
{
    var pseudoOk = verifId(f);
    var mailOk = verifMdp(f);
    if(pseudoOk && mailOk)
        return true;
    else
    {
        return false;
    }
}

function verifId(form)
{

    var id = form.id.value;

    if(id == ''){
        surligne(form, true);
        return false;
    }
    else
    {
        surligne(form, false);
        return true;
    }
}

function verifMdp(form)
{
    var mdp = form.mdp.value;
    if(mdp == ''){
        surligne(form, true);
        return false;
   } 
   else
   {
        surligne(form, false);
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