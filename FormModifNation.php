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
	$resultat = pg_query($ptrDb,"select * from nation where Code_Nat='".$_GET["Code_Nat"]."'");
	if ($resultat) {
		echo "<h1 class=sublime> Nation</h1>";
		$nation = pg_fetch_array($resultat);
		$pageHTML =getDebutHtml('bd');

		/* cosntruire un formulaire qui recupere les informations passées en url de code de nation, comme ca quand on clique sur le lien modifier on modifie que l'enregistrement concerné */
		$pageHTML   .= "<form name='form2' action='nation.php' method='post' class=bold-line>\n"
					."<table border='1'>\n"
					. "<input type='hidden' name='Code_Nat' value='".$_GET['Code_Nat']."' />\n"
					. "<tr>\n"
					. "<td><strong>Code nation :</strong></td>\n"
					. "<td><input type='text' name='Code_Nat' value='".$nation[0]."' /></td>\n"
					. "</tr>\n"
					. "<tr>\n"
					. "<td><strong>Nom nation :</strong></td>\n"
					. "<td><input type='text' name='nom_Nat' value='".$nation[1] . "'/></td>\n"
					. "</tr>\n"
					. "</table>\n"
					. "<input type='submit' value='modifier' name='modifier' />\n"
					. "</form>\n";
		$pageHTML   .= getFinHtml();
		echo $pageHTML;

	}

	echo "<ul class=liste>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

}

?>
