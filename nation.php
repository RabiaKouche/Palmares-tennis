<?php

/* importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "fonctionPhpHtml.php";
include "Fonction.php";
include "connexion.php";




$pageHtml=getDebutHTML("Nations");
$ptrDb=connexion();
/* si on a cliqué sur le lien supprimer et la connexion est établit alors on recupere le code nation passé en url avec get et on fait un delete sur cet identifiant. */
if (isset($ptrDb)) {
	if (isset($_GET['Code_Nat'])) {
   		 $cod = $_GET['Code_Nat'];
   		 $requete = "DELETE FROM nation WHERE Code_Nat='$cod'";
 		 $ptrQuery = pg_query(connexion(),$requete);

	}		/* sinon on a cliqué sur le bouton 'modifier' et tout est rensigné correctement on réucupere les informations ce cette nation et on lui applique un update pour la mettre a jour. */
	else if (isset($_POST["modifier"])) {
		  	$Code =$_POST['Code_Nat'];
		  	$nom = $_POST['nom_Nat'];
          	$requete = "UPDATE nation SET nom_Nat='$nom', Code_Nat='$Code' WHERE Code_Nat='$Code'";
			$resu = pg_query($ptrDb,$requete);
		 }
/* après la mis à jour ou la suppression on affiche de nouveau les informations de la table avec les 
nouvelles modifications.
ici on a fait ORDER BY pour garder le bon ordre des informations lors de modifications ou suppression.  */
	$requete="SELECT * FROM nation ORDER BY Code_Nat";
	$pageHtml.=get_elem_tabNation($requete,$ptrDb);//construit un tableau de nation a partir de la table nation
}
else
	$pageHtml.="<h1>probleme de connexion</h1>\n";

$pageHtml.=getFinHTML();

echo $pageHtml;

echo "<ul class=liste>"
	."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
	."<li><p><a href='classement.php' >Liste des Classements</a></p></li>"
	."<li><p><a href='joueur.php' >Liste des Joueurs</a></p></li>"
	."<li><p><a href='appartient.php' >Liste des Appartenances</a></p></li>"
	."<li><a href=FormAjoutNation.php> Ajouter une nouvelle Nation</a></li>"
	."</ul>"
	."<h1 class=sublime> La liste des nations :</h1>";

 ?>
