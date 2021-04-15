<?php


/* importation les scriptes qui contiennent des fonctions à utiliser
fonctionPhpHtml : fonction de debut et de fin html.
connexion : scripte contient une fonction connexion().
Fonction : toutes les autres fonctions.*/
include 'fonctionPhpHtml.php';
include "Fonction.php";
include "connexion.php";

 

function getPageHtml(): string {

  $pageHtml = getDebutHTML('bd1',"Classement Des Joueur De Tennis");

  $pageHtml.="<div id='accueil'> <h1 align='center'>Bienvenue Sur Notre Site Internet Tennis !</h1></div>";

  $pageHtml.="<h1 align='center'><a  href=classement.php><ul><li>Classement Joueurs</li></ul> </a></h1> ";
    $pageHtml.="<h1 align='center'><a  href=appartient.php><ul><li>Table Appartient</li></ul> </h1>";

  $pageHtml.="<h1 align='center'><a href=joueur.php><ul><li>Table Joueurs</li></ul> </a></h1>";

  $pageHtml.="<h1 align='center'><a  href=nation.php><ul><li>Table Nation</li></ul> </a></h1>";

  $pageHtml.="<div id='accueil2'> <h1 align='center'> KOUCHE RABIA || HADDAD SORAYA</h1></div>";




  $pageHtml.=getFinHTML();

  return $pageHtml ;
}


echo getPageHtml();



?>
