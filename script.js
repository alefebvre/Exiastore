$(document).ready(function(){
	
	function surligne(champ, erreur)
	{
		if(erreur)
		champ.style.backgroundColor = "#fba";
		else
		champ.style.backgroundColor = "";
	}

	function verifLogin(champ)
	{
		var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,6}$/;
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

	function verifMdp(champ)
	{
		var verifMDP = document.form.mdp.value; 
		if (champ.value != verifMDP)
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
		
	function verifNom(champ)
	{
		var regex = /^[a-z-]/;
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

	function verifPrenom(champ)
	{
		var regex = /^[a-z-]/;
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

	function valider(form)
	{
		var loginOk = verifLogin(form.login);
		var mdpOk = verifMdp(form.mdp);
		var nomOk = verifNom(form.nom);
		var prenomOk = verifPrenom(form.prenom);
		
		var tLogin = document.form.login.value; 
		var tMdp = document.form.mdp.value; 
		var tMdp2 = document.form.mot_de_passe2.value; 
		var tNom = document.form.nom.value; 
		var tPrenom = document.form.prenom.value; 
		
		if (tLogin == "" || tMdp == "" || tMdp2 == "" || tNom == "" || tPrenom == "")
		{
			window.location.href = "index.php";
			alert("Un des champs n'est pas rempli");
			return false; 
		}
		else if(loginOk && nomOk && prenomOk && mdpOk)
		{
			return true;
		}
		else
		{
			window.location.href = "index.php";
			alert("Veuillez remplir correctement tous les champs");
			return false;
		}
	}
});
