
<?php
/*importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "Fonction.php";
include "connexion.php";
include "fonctionPhpHtml.php";


 $ptrDb=connexion();
 if ($ptrDb) {
	$cod = $_GET['Code_J'];
	$requete = "select * from joueur where Code_J=$cod";
	$resultat = pg_query($ptrDb,$requete);
	if ($resultat) {
		echo "<h1 class=sublime> Joueur</h1>";
		$joueur = pg_fetch_array($resultat);
		$pageHTML =getDebutHtml('bd');

		/* cosntruire un formulaire qui recupere les informations passées en url de code de joueur, comme ca quand on clique sur le lien modifier on modifie que l'enregistrement concerné */
		$pageHTML.= "<form name='form1' action='joueur.php' method='post' class=bold-line>\n"
				 ."<table border='1'>\n"
				 ."<input type='hidden' name='Code_J' value='".$_GET['Code_J']."' />\n"
		         . "<tr>\n"
		         ."<td><strong>Nom :</strong></td>\n"
		         . "<td><input type='text' name='nom_J' value='".$joueur[1]."' /></td>\n"
		         . "</tr>\n"
		         . "<tr>\n"
		         . "<td><strong>Prenom :</strong></td>\n"
		         . "<td><input type='text' name='Prénom_J' value='".$joueur[2] . "'/></td>\n"
		         . "</tr>\n"
		         . "<tr>\n"
		         . "<td><strong>date de naissance :</strong></td>\n"
		         . "<td><input type='date' name='Date_Nais_J' size='10' value='".$joueur[3] . "' /></td>\n"
		         . "</tr>\n"
		         .  "<tr>\n"
		         . "<td><strong>Sexe :</strong></td>\n"
		         . "<td>".selection_enum_joueur('Sexe_J',$joueur[4])."</td>\n"
		         . "</tr>\n"
		         . "<tr>\n"
		         . "<td><strong>code nationalite :</strong></td>\n"
		         . "<td>".getOptionsFrom_bdd('Code_Nat','joueur',$joueur[5])."</td>\n"
		         . "</tr>\n"
		
		         . "</table>\n"
		         . "<input type='submit' value='modifier' name='modifier' />\n"
	             . "</form>\n";
	             $pageHTML .= getFinHtml();
	             echo $pageHTML;



	}
	echo "<ul class=liste>"
	."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

}


?>
