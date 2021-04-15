  <?php
  include "Fonction.php";
  include "connexion.php";
  include "fonctionPhpHtml.php";

          
       
/* formulaire pour ajouter une Nation */
  function getFormulaire(): string {
      $formulaire = "<form action='".$_SERVER['PHP_SELF']
      ."' method='POST' class=bold-line>\n"
      ."<strong>Code nation* : </strong>"
      . getInputText('Code_Nat', ['size' => 15])
  	  ."<br />"
      ."<strong>Nom nation* : </strong>"
      . getInputText('Nom_Nat', ['size' => 15])
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
        if (valideForm($_POST, ['Code_Nat', 'Nom_Nat'])) {
            $ptrDB = connexion();
            $code=$_POST['Code_Nat'];
            $nom=$_POST['Nom_Nat'];

            $requete="INSERT INTO nation (Code_Nat,Nom_Nat) VALUES
            ('$code','$nom')";

            $ptrQuery=pg_query($ptrDB,$requete);
            if ($ptrQuery){
                $contenuHtml = intoBalise("h1", "La nation à bien été insérer");
               
            }
        }
        else {
            $contenuHtml = intoBalise("h2", "Tous les champs sont obligatoires");
            $formulaireHtml = getFormulaire();

        }
      }

  $pageHTML = getDebutHTML('bd')."<h1 class=sublime>Ajouter une nouvelle nation</h1>\n"
      . $contenuHtml
      . $formulaireHtml
      . getFinHTML()
      ."</div>";

  echo $pageHTML;

  echo "<ul class=liste>"
    ."<li><p><a href='nation.php' >Nations</a></p></li>"
    ."<li><p><a href='classement.php' >Classements</a></p></li>"
    ."<li><p><a href='appartient.php' >Appartenances</a></p></li>"
    ."<li><p><a href='joueur.php' >Joueurs</a></p></li>"
    ."<li><p><a href='accueil.php' >Page d'accueil</a></p></li>"
    ."</ul>";




   ?>
