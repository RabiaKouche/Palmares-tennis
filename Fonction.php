<?php


/*
 recherche d'une valeur par défaut à attribuer à un input text
si l'information est déjà saisie dans un formulaire incomplet
*/
function getInputValue(string $nomVar) : string {
    if (isset($_REQUEST[$nomVar]) && $_REQUEST[$nomVar])
        return "value='".$_REQUEST[$nomVar]."' ";
    return "";
}


/* vérification de la présence des valeurs obligatoires d'un formulaire */
function valideForm($method, $tabCles) {
    foreach ($tabCles as $cle) {
        if (!isset($method[$cle]))
            return FALSE;
        if (is_string($method[$cle]) && trim($method[$cle]) === "")
            return FALSE;
        if (is_array($method[$cle]) && empty($method[$cle]))
            return FALSE;
    }
    return TRUE;
}

/* fonction qui récupere les informations de la table "Joueur" données par la requete "$requete" et les mettre dans un tableau avec deux liens de supression et de modification pour chaque enregistrement */
function get_elem_tabJoueur($requete,$ptrDb):string{
    $ptrQuery=pg_query($ptrDb,$requete);
    if (isset($ptrQuery)) {
        $table="<table border=8 id='tablej'>\n";
        $table.="<tr>";
        $table.="<th>code joueur</th> <th>nom joueur</th> <th>Prénom joueur</th> <th>Date de naissance</th> <th>sexe joueur </th> <th>code nationalité</th><th></th> <th></tr>";

         while($ligne = pg_fetch_row($ptrQuery)) {
             $table.="<tr>";
              // $table.="<a href=formulaireModif.php>";
              for ($j=0;$j<count($ligne);$j++) {
                  $table.=" <td> $ligne[$j] </td>\n";
              }
	
	              $table.="<td><a href='joueur.php?Code_J=". $ligne[0]."'> supprimer </a></td>";
                $table.="<td><a href='FormModifJoueur.php?Code_J=". $ligne[0]."'> modifier </a></td>";
                $table.="</a>";
                $table.="</tr>";
            }
      }
return $table;
}

/* fonction qui récupere les informations de la table "Nation" données par la requete "$requete" et les mettre dans un tableau avec deux liens de supression et de modification pour chaque enregistrement */
function get_elem_tabNation($requete,$ptrDb):string {
    $ptrQuery=pg_query($ptrDb,$requete);
    if (isset($ptrQuery)) {
        $table="<table border=4 id='tablec'>\n";
        $table.="<tr>";
        $table.="<th>code nation</th><th>nom nation</th><th></th> <th></th></tr>";

      while ($ligne = pg_fetch_row($ptrQuery)) {
          $table.="<tr>";
          for ($j=0;$j<count($ligne);$j++) {
              $table.=" <td> $ligne[$j] </td>\n";
          }

	      $table.="<td><a href='nation.php?Code_Nat=".$ligne[0]."' > supprimer </a></td>";
	      $table.="<td><a href='FormModifNation.php?Code_Nat=".$ligne[0]."'> modifier </a></td>";
        $table.="</a>";
        $table.="</tr>";
      }
    }
return $table;
}

/* fonction qui récupere les informations de la table "Classement" données par la requete "$requete" et les mettre dans un tableau avec deux liens de supression et de modification pour chaque enregistrement */
function get_elem_tabClassement($requete,$ptrDb):string {
    $ptrQuery=pg_query($ptrDb,$requete);
    if (isset($ptrQuery)) {
        $table="<table border=4 id='tablee'>\n";
        $table.="<tr>";
        $table.="<th>code classement</th><th>type classement</th> <th>Année Classement</th><th></th> <th></th>";
    
      while ($ligne = pg_fetch_row($ptrQuery)) {
          $table.="<tr>";
          for ($j=0;$j<count($ligne);$j++) {
              $table.=" <td> $ligne[$j] </td>\n";
          }

	        $table.="<td><a href='classement.php?Code_Clas=".$ligne[0]."' > supprimer </a></td>";
	        $table.="<td><a href='FormModifClassement.php?Code_Clas=".$ligne[0]."'> modifier </a></td>";
          $table.="</a>";
          $table.="</tr>";
      }
    }
return $table;
}

/* fonction qui récupere les informations de la table "Appartient" données par la requete "$requete" et les mettre dans un tableau avec deux liens de supression et de modification pour chaque enregistrement */
function get_elem_tabAppartient($requete,$ptrDb):string {
    $ptrQuery=pg_query($ptrDb,$requete);
    if (isset($ptrQuery)) {
        $table="<table border=4 id='tablee' >\n";
        $table.="<tr>";
        $table.="<th>code joueur</th><th>code classement </th> <th> Points</th><th></th> <th></th>";
    
      while ($ligne = pg_fetch_row($ptrQuery)) {
          $table.="<tr>";
          for ($j=0;$j<count($ligne);$j++) {
              $table.=" <td> $ligne[$j] </td>\n";

          }

          $table.="<td><a href='appartient.php?Code_J=".$ligne[0]."&Code_Clas=".$ligne[1]."' > supprimer </a></td>";
          $table.="<td><a href='FormModifAppartient.php?Code_J=".$ligne[0]."&Code_Clas=".$ligne[1]."' > modifier </a></td>";
          $table.="</a>";
          $table.="</tr>";
      }
    }
return $table;
}

// fabrication d'un input HTML de type date, on aurra besoin pour la date de naissance d'un joueur
function getInputDate(string $nomVar,array $attributs) {
  $inputHtml="<input type='date' name='$nomVar'";
  $inputHtml.=getInputValue($nomVar);
  $inputHtml .= "/>";
	$inputHtml.="<br />";
  return $inputHtml;
}

// fabrication d'un input HTML de type number
function getInputNumber(string $nom,array $valeur):string {
  $inputHtml = "<input type='number' name='$nom' ";
  $inputHtml .= getInputValue($nom);
  if (!empty($attributs)) {
      foreach ($attributs as $attribut => $valeur)
      $inputHtml.= $attribut."='$valeur' ";
  }
  $inputHtml .= "/>";
  $inputHtml .= "<br />";	
  return $inputHtml;
}

// fabrication d'un input HTML de type text
function getInputText(string $nomVar, array $attributs=[]) : string {
    $inputHtml = "<input type='text' name='$nomVar' ";
    $inputHtml .= getInputValue($nomVar);
    if (!empty($attributs)) {
        foreach ($attributs as $attribut => $valeur)
        $inputHtml.= $attribut."='$valeur' ";
    }
    $inputHtml .= "/>";
    return $inputHtml;
}

/* fonction qui supprime un joueur en fonction de son identifiant "Code_J" */
function supprimer_joueur($id) {
  if (connexion()) {
      $requete="DELETE FROM joueur WHERE Code_J='$id'";
      $ptrQuery=pg_query(connexion(),$requete);
  }
}

/* fonction pour la liste de sélection pour les énumérations des différents type de classemnt
WTA ET ATP */
function selection_enum_Class(string $nomVar, string $value='null'): string {
    $lesoptions = "";
    $lesoptions.=" <select id='cars' name='$nomVar'>";
    if ($value == 'WTA') {
      $lesoptions .="<option value='WTA' selected='selected'>WTA</option>"
                  ."<option value='ATP'>ATP</option>";
    }
    else
      $lesoptions .="<option value='WTA'>WTA</option>"
                  ."<option value='ATP' selected='selected'>ATP</option>"
  	              . getInputValue($nomVar)
                  ."</select>"; 
    return $lesoptions;
}

/* fonction pour  liste de sélection pour les énumérations de sexe de joueur H : homme, F : femme */
function selection_enum_joueur(string $nomVar, string $value='null'): string {
    $lesoptions = "";
    $lesoptions.=" <select id='cars' name='$nomVar'>";
    if ($value == 'F') {
               $lesoptions.="<option value='F' selected='selected'>F</option>"
                          ."<option value='H'>H</option>";
    }
    else
      $lesoptions.="<option value='F'>F</option>"
                  ."<option value='H' selected='selected'>H</option>";
      $lesoptions .= getInputValue($nomVar)
                  ."</select>"; 
    return $lesoptions;
}

/* fonction qui permet de récuperer les informations associées à une clé étrangère.
par exemple pour ajouter un joueur le champs de saisis code nationalité sera associé à une liste 
de sélection pour tout les codes existants da la table 'Nation' */
function getOptionsFrom_bdd(string $nomVar,string $table,$value='null'): string {
  $lesoptions = "";
  $lesoptions.="<select name='$nomVar'>";
  $ptrDb = connexion();

  if ($ptrDb) {
      $requete = "select  $nomVar from $table";
      $resultat = pg_query($ptrDb, $requete);

      while($ligne = pg_fetch_array($resultat)) {
        if($value == $ligne[0])
          $lesoptions.="<option value='$ligne[0]' selected='selected'>".$ligne[0]."</option>";
        else 
           $lesoptions.="<option value='$ligne[0]'>".$ligne[0]."</option>";

      }
    $lesoptions.="</select>";

  }
  return $lesoptions;
}


?>