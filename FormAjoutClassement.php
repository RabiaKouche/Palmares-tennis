<?php
include "Fonction.php";
include "fonctionPhpHtml.php";
include "connexion.php";
        
       
/* formulaire pour ajouter un classement */
function getFormulaire(): string {
    $formulaire = "<form action='".$_SERVER['PHP_SELF']
        ."' method='POST' class=bold-line>\n"
        ."<strong>type de classement* : </strong>"
        . selection_enum_class('Type_Clas')
	      ."<br />"
        ."<strong>Annee de classement* : </strong>"
        . getInputNumber('Année_Clas', ['size' => 15])
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
      if (valideForm($_POST, ['Type_Clas', 'Année_Clas'])) {
              $ptrDb = connexion();
              $type=$_POST['Type_Clas'];
              $annee=$_POST['Année_Clas'];
              
              if ($annee<1970 or $annee > 2021) {
                echo intoBalise("h1", "annee non valide !!");
                echo getFormulaire();

              }
              else {
              $requete="INSERT INTO classement (Type_Clas,Année_Clas) VALUES ('$type',$annee)";
              $ptrQuery=pg_query($ptrDb,$requete);
}
              if (isset($ptrQuery)){
                  $contenuHtml = intoBalise("h1", "Le classement a bien été insérer");
                  
              }
      }
      else {
              $contenuHtml = intoBalise("h2", "Tous les champs sont obligatoires");
              $formulaireHtml = getFormulaire();
      }
    }

$pageHTML = getDebutHTML('bd')."<h1 class=sublime>Ajouter un nouveau classement</h1>\n"
    . $contenuHtml
    . $formulaireHtml
    . getFinHTML();

echo $pageHTML;

echo "<ul class=liste>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";

 ?>
