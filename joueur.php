<?php
/*importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "connexion.php";
include "fonctionPhpHtml.php";
include "Fonction.php";



$pageHtml=getDebutHTML();
$ptrDb=connexion();
if (isset($ptrDb)) {
	/* si on a cliqué sur le lien supprimer et la connexion est établit alors on recupere le code joueur passé en url avec get et on fait un delete sur cet identifiant. */
	if (isset($_GET['Code_J'])) {
   		 $cod = $_GET["Code_J"];
		 $requete="DELETE FROM joueur WHERE Code_J='".$cod."'";
  		 $ptrQuery=pg_query($ptrDb,$requete);

	}

	/* sinon si on a cliqué sur le bouton 'modifier' et tout est rensigné correctement on réucupere les informations ce ce joueur et on lui applique un update pour la mettre a jour. */
	else if (isset($_POST["modifier"])) {
		  $codj =$_POST['Code_J'];
		  $nom=$_POST['nom_J'];
      	  $prenom=$_POST['Prénom_J'];
          $Date_Nais_J=$_POST['Date_Nais_J'];
          $sexe = $_POST['Sexe_J'];
          $Code_Nat = $_POST['Code_Nat'];
          $requete="UPDATE joueur SET nom_J='$nom', Prénom_J='$prenom', Date_Nais_J='$Date_Nais_J', Sexe_J='$sexe', Code_Nat='$Code_Nat' WHERE Code_J='$codj'";
		  $resu = pg_query($ptrDb,$requete);
		}

/* après la mis à jour ou la suppression on affiche de nouveau les informations de la table avec les 
nouvelles modifications.
ici on a fait ORDER BY pour garder le bon ordre des informations lors de modifications ou suppression.  */
$requete="SELECT * FROM joueur order by Code_J";
$pageHtml.=get_elem_tabJoueur($requete,$ptrDb);//construit un tableau de joueur a partir de la table joueur

}
else
$pageHtml.="<h1>probleme de connexion</h1>\n";

$pageHtml.=getFinHTML();

echo $pageHtml;
echo "<ul class=liste>"
	."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
	."<li><p><a href='nation.php' >Liste des Nations</a></p></li>"
	."<li><p><a href='classement.php' >Liste des Classements</a></p></li>"
	."<li><p><a href='appartient.php' >Liste des Appartenances</a></p></li>"
	."<li><a href=FormAjoutJoueur.php> Ajouter un nouveau Joueur</a></li>"
	."</ul>"
	."<h1 class=sublime> La liste des joueurs :</h1>";
 ?>
