<?php

/* importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "fonctionPhpHtml.php";
include "Fonction.php";
include "connexion.php";




	$pageHtml=getDebutHTML("Classements");
	$ptrDb=connexion();

/* si on a cliqué sur le lien supprimer et la connexion est établit alors on recupere le code classement passé en url avec get et on fait un delete sur ces identifiants. */
	if (isset($ptrDb)) {
		if (isset($_GET['Code_Clas'])) {
			$cod = $_GET['Code_Clas'];
			$requete="DELETE FROM classement WHERE Code_Clas=$cod";
			$ptrQuery=pg_query($ptrDb,$requete);
		}
		/* sinon si on a cliqué sur le bouton 'modifier' et tout est rensigné correctement on réucupere les informations cet enregistrement et on lui applique un 'update' pour la mettre a jour. */
		else{
			if(isset($_POST['modifier'])){
				$code = $_POST['Code_Clas'];
				$type = $_POST['Type_Clas'];
				$annee = $_POST['Année_Clas'];
				$requete = "UPDATE classement SET Type_Clas = '$type', Année_Clas = $annee where Code_Clas='$code'";
				$resultat = pg_query($ptrDb,$requete);
			}
		}
		

/* après la mis à jour ou la suppression on affiche de nouveau les informations de la table avec les 
nouvelles modifications.
ici on a fait ORDER BY pour garder le bon ordre des informations lors de modifications ou suppression.  */
		$requete="SELECT * FROM classement ORDER BY Code_Clas";
		$pageHtml.=get_elem_tabClassement($requete,$ptrDb);//construit un tableau qui contient tout classements à partir de la table classement.

	}
	else
		$pageHtml.="<h1>probleme de connexion</h1>\n";


	$pageHtml.=getFinHTML();

	echo $pageHtml;
	echo "<ul class=liste>"
		. "<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
		. "<li><p><a href='nation.php' >Liste des Nations</a></p></li>"
		. "<li><p><a href='joueur.php' >Liste des Joueurs</a></p></li>"
		. "<li><p><a href='appartient.php' >Liste des Appartenances</a></p></li>"
		. "<li><a href=FormAjoutClassement.php> Ajouter un nouveau classement</a></li>"
		. "</ul>"
		. "<h1 class=sublime> La liste des classements :</h1>";

	?>