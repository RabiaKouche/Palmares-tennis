<?php

/*importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/

include "fonctionPhpHtml.php";
include "Fonction.php";
include "connexion.php";



 $ptrDb=connexion();
 if ($ptrDb) {	
	$resultat = pg_query($ptrDb,"select * from classement where Code_Clas='".$_GET["Code_Clas"]."'");
	if ($resultat) {
		echo "<h1 class=sublime> Classement :</h1>";
		$classement = pg_fetch_array($resultat);
		$pageHTML ="";
		$pageHTML.=getDebutHtml('bd');
		/* cosntruire un formulaire qui recupere les informations passées en url de code de classement, comme ca quand on clique sur le lien modifier on modifie que l'enregistrement concerné */
		$pageHTML.="<form action='classement.php' name='form3' method='post' class=bold-line>\n";
		$pageHTML.= "<table border='1'>\n";
		$pageHTML.= "<input type='hidden' name='Code_Clas' value='".$_GET['Code_Clas']."' />\n";
		$pageHTML.= "<tr>\n";
		$pageHTML.= "<td><strong>Type classement :</strong></td>\n";
		$pageHTML.= "<td>".selection_enum_Class('Type_Clas',$classement[1])."</td>\n";
		$pageHTML.= "</tr>\n";
		$pageHTML.= "<tr>\n";
		$pageHTML.= "<td><strong>Année classement </strong></td>\n";
		$pageHTML.= "<td><input type='text' name='Année_Clas' value='".$classement[2] . "'/></td>\n";
		$pageHTML.= "</tr>";
		$pageHTML.= "</table>";
		$pageHTML.= "<input type='submit' value='modifier' name='modifier' />";
		$pageHTML.= "</form>";

		$pageHTML.=getFinHtml();
		echo $pageHTML;

	}

	echo "<ul class=liste>"
	."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

}

?>
