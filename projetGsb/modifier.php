<?php
/**
 * Script de contr�le et d'affichage du cas d'utilisation "Modifier"
 * @package default
 * @todo  RAS
 */
 
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // d�marrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();

// DEBUT du contrôleur rechercher.php

if (count($_POST)==0)
{
    $etape = 1;
}
else
{
    $etape = 2;
    $unMat=$_POST['mat'];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $unMail=$_POST["mail"];
    modifier($nom,$prenom,$unMail,$unMat,$tabErreurs);
    // Message de réussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le visiteur a été correctement modifié.";
    }
 
}


// Début de l'affichage (les vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");

if($etape==1)
{
   include($repVues."vModifierForm.php");
}
include($repVues."pied.php") ;
?>