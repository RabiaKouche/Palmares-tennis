<?php


// début d'un document HTML 5
function getDebutHTML($id='null', $title = "Title content") : string {
    return "<!DOCTYPE html>
<html lang='fr'>
<head>
  <title>$title</title>
  <meta charset='UTF-8'>
   <link rel='Stylesheet' href='css/tennis.css'  />
  </head>
  <body class='$id'>";
}

// fin d'un document HTML
function getFinHTML(): string {
    return "</body></html>";
}


function intoBalise(string $nomElement, string $contenuElement,
                    array $params = null): string {
    $resu = "<$nomElement "; // amorce la construction de la balise ouvrante
    if (isset($params)) { // traite le 3e parametre s'il existe
        foreach ($params as $attribut => $valeur)
            $resu .= $attribut."='$valeur'"; // construit les attributs de la balise HTML
    }
    if ($contenuElement==="")
        $resu .=" />"; // ferme la balise s'il s'agit d'un élément vide
    else
        $resu .= ">$contenuElement</$nomElement>"; // termine la balise ouvrante, intègre le contenu et ferme la balise
    return $resu; // retourne la chaine de caractères construite
}

?>