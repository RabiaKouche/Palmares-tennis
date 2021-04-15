
<?php
include "Fonction.php";
include "fonctionPhpHtml.php";
include "connexion.php";

        
/* formulaire pour ajouter une appartenance de joueur à un classement */
function getFormulaire(): string {
    $formulaire = "<form action='".$_SERVER['PHP_SELF']
        ."' method='POST' class=bold-line>\n"
        ."<strong>Code joueur* : </strong>"
        . getOptionsFrom_bdd('Code_J','joueur')
	      ."<br />"
        ."<strong>Code classement* : </strong>"
        . getOptionsFrom_bdd('Code_Clas','classement')
	      ."<br />"
	      ."<strong>Nombre de points* : </strong>"
	      .getInputNumber('Points',['size' => 15])
	      ."<br />"
        . "<input type='submit' name='ajouter' size='15' value='Ajouter' />\n"
        . "</form>\n";
    return $formulaire;
}

$formulaireHtml ="";
$contenuHtml = "";


if (isset($_POST))
    if (empty($_POST)) {
        $formulaireHtml = getFormulaire();
    }
    else {
      if (valideForm($_POST, ['Code_J', 'Code_Clas', 'Points'])) {
            $ptrBD = connexion();
            $Code_J=$_POST['Code_J'];
            $Code_Clas=$_POST['Code_Clas'];
            $Points=$_POST['Points'];
            $requete="INSERT INTO appartient (Code_J,Code_Clas,Points) VALUES
            ('$Code_J','$Code_Clas','$Points')";

            $ptrQuery=pg_query($ptrBD,$requete);
            if ($ptrQuery){
                $contenuHtml = intoBalise("h1", "L'appartenance à bien été insérer");
                
            }    
      }
      else {
          $contenuHtml = intoBalise("h2", "Tous les champs sont obligatoires");
          $formulaireHtml = getFormulaire();

      }
    }

$pageHTML = getDebutHTML('bd')."<h1 class=sublime>Ajouter une nouvelle appartenance</h1>\n"
    . $contenuHtml
    . $formulaireHtml
    . getFinHTML();

echo $pageHTML;

echo "<ul class=liste>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

 ?>
