<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
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
    

// DEBUT du contrôleur ajouter.php

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $unMatricule=$_POST["matricule"];
  $unNom=$_POST["nom"];
  $unPrenom=$_POST["prenom"];
  $uneAdresse=$_POST["adresse"];
  $unCodePostal=$_POST["cp"];
  $uneVille=$_POST["ville"];
  $uneDateEmbauche=$_POST["dateEmbauche"];
  $unSecCode=$_POST["secCode"];
  $unLabCode=$_POST["labCode"];
  $unMdp=$_POST["mdp"];
  $unMail=$_POST["mail"];
  $unRole=$_POST["role"];

  ajouter($unMatricule, $unNom, $unPrenom, $uneAdresse, $unCodePostal, $uneVille, $uneDateEmbauche, $unSecCode, $unLabCode, $unMdp, $unMail, $unRole);
}

// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vAjouterForm.php");
include($repVues."pied.php");
?>
  
