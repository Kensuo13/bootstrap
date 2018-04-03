function surligne(champ, texte, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
      texte.innerHTML = "Veuillez remplir ce champ !";
   else
      champ.style.backgroundColor = "";
}

function verifForm(f)
{
   var pseudoOk = verifId(f.id);
   var mailOk = verifMdp(f.mdp);
   if(pseudoOk && mailOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function verifId(champ)
{
   var id = champ.value;
   var texte = document.getElementById('verifId');
   if(id == ''){
      surligne(champ, texte, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifMdp(champ)
{
    var mdp = champ.value;
   if(mdp == ''){
      surligne(champ, true);
      return false;
   } 
   else
   {
      surligne(champ, false);
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