<?php
/*importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include "Fonction.php";
include "connexion.php";
include "fonctionPhpHtml.php";





 $ptrDb = connexion();
 if ($ptrDb) {	
	$resultat = pg_query($ptrDb,"select * from appartient where Code_J='".$_GET["Code_J"]."' AND Code_Clas='".$_GET["Code_Clas"]."'");

	if ($resultat) {
		echo "<h1 class = sublime> Appartient :</h1>";

		$Appartient = pg_fetch_array($resultat);

		$pageHTML = getDebutHtml('bd');
		/* cosntruire un formulaire qui recupere les informations passées en url de code de classement et le code joueur, comme ca quand on clique sur le lien modifier on modifie que l'enregistrement concerné */
		$pageHTML .= "<form action='appartient.php' name='form4' method='post' class=bold-line>\n"
				. "<table border='1'>\n"
				. "<tr><td><strong>Code classement :</strong></td>"
				. "<td>".getOptionsFrom_bdd('Code_Clas','classement',$Appartient[0])."</td></tr>\n"
				. "<tr><td><strong>Code joueur :</strong></td>"
				. "<td>".getOptionsFrom_bdd('Code_J','joueur',$Appartient[1])."</td></tr>\n"
				. "<tr>\n"
				. "<td><strong>Nombre de points :</strong></td>\n"
				. "<td><input type='number' name='Points' value='".$Appartient[2]."' /></td>\n"
				. "</tr>\n"
				. "<tr>\n"
				. "</table>\n"
				. "<input type='submit' value='modifier' name='modifier' />\n"
				. "</form>\n";
		$pageHTML .= getFinHtml();
		echo $pageHTML;

	}

	echo "<ul class=liste>"
	."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

}




?>
