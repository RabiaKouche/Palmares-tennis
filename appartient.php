<?php

/* importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "fonctionPhpHtml.php";
include "Fonction.php";
include "connexion.php";


$pageHtml=getDebutHTML();
$ptrDb=connexion();

/* si on a cliqué sur le lien supprimer et la connexion est établit alors on recupere le code joueur et le code classement passé en url avec get et on fait un delete sur ces identifiants. */
if(isset($ptrDb)){
	if(isset($_GET['Code_J']) && isset($_GET['Code_Clas'])){
   		 $codc = $_GET['Code_Clas'];
   		 $codj = $_GET['Code_J'];
   		 $requete="DELETE FROM Appartient WHERE Code_Clas='$codc' AND Code_J='$codj'";
  		 $ptrQuery=pg_query(connexion(),$requete);
    }

    /* sinon si on a cliqué sur le bouton 'modifier' et tout est rensigné correctement on réucupere les informations cet enregistrement et on lui applique un 'update' pour la mettre a jour. */
    else if(isset($_POST["modifier"])) {
		  $Code_Clas =$_POST['Code_Clas'];
		  $Code_J =$_POST['Code_J'];
		  $Points = $_POST['Points'];
          $requete="UPDATE Appartient SET Points='$Points' WHERE Code_Clas='$Code_Clas' AND Code_J='$Code_J'";
		  $resu = pg_query($ptrDb,$requete);
	}

/* après la mis à jour ou la suppression on affiche de nouveau les informations de la table avec les 
nouvelles modifications.
ici on a fait ORDER BY pour garder le bon ordre des informations lors de modifications ou suppression.  */
$requete="SELECT * FROM Appartient ORDER BY Code_Clas, Code_J";
$pageHtml.=get_elem_tabAppartient($requete,$ptrDb);//construit un tableau qui contient toutes les appartenances des joueurs a partir de la table appartient.


}
else
	$pageHtml.="<h1>probleme de connexion</h1>\n";

$pageHtml.=getFinHTML();
echo $pageHtml;
echo "<ul class=liste>"
	 ."<li><p><a href='accueil.php' >Page d'accueil </a></p></li>"
	 ."<li><p><a href='classement.php' >Liste des Classements</a></p></li>"
 	 ."<li><p><a href='joueur.php' >Liste des Joueurs </a></p></li>"
 	 ."<li><p><a href='nation.php' >Liste des Nations</a></p></li>"
     ."<li><a href=FormAjoutAppartient.php> Ajouter une nouvelle Appartenance</a></li>"
     ."</ul>"
     ."<h1 class=sublime> La liste des Appartenances </h1>";

 ?>
