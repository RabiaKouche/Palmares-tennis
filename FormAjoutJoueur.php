<?php
include "Fonction.php";
include "fonctionPhpHtml.php";
include "connexion.php";

        
/* formulaire pour ajouter un joueur */
function getFormulaire(): string {
    $formulaire = "<form action='".$_SERVER['PHP_SELF']
        ."' method='POST' class=bold-line>\n"
        ."<strong>Nom joueur* : </strong>"
        . getInputText('Nom_J', ['size' => 15])
	      ."<br />"
        ."<strong>prenom joueur* : </strong>"
        . getInputText('Prenom_J', ['size' => 15])
	      ."<br />"
	      ."<strong>date de naissance* : </strong>"
	      .getInputDate('Date_Nais_J',['size' => 15])
	      ."<br />"
	      ."<strong>sexe joueur* :</strong>"
        . selection_enum_joueur('Sexe_J')
	      ."<br />"
	      ."<strong>code nationnalité* : </strong>"
        . getOptionsFrom_bdd('Code_Nat','joueur')
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
        if (valideForm($_POST, ['Nom_J', 'Prenom_J', 'Date_Nais_J', 'Sexe_J', 'Code_Nat'])) {
               $ptrDB = connexion();
               $nom=$_POST['Nom_J'];
               $prenom=$_POST['Prenom_J'];
               $annee=$_POST['Date_Nais_J'];
               $sexe=$_POST['Sexe_J'];
               $nationalite=$_POST['Code_Nat'];

               $requete="INSERT INTO joueur (nom_J,Prénom_J,Date_Nais_J,Sexe_J,Code_Nat) VALUES
               ('$nom','$prenom','$annee','$sexe','$nationalite')";
               $ptrQuery=pg_query($ptrDB,$requete);
               if ($ptrQuery) {  
                  $contenuHtml = intoBalise("h1", "Le joueur a bien été insérer");
                 
                }

        } else {
              $contenuHtml = intoBalise("h2", "Tous les champs sont obligatoires");
              $formulaireHtml = getFormulaire();

          }
    }

$pageHTML = getDebutHTML('bd')."<h1 class=sublime>Ajouter un nouveau joueur</h1>\n"
    . $contenuHtml
    . $formulaireHtml
    . getFinHTML();

echo $pageHTML;

echo "<ul class=liste>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";



 ?>
