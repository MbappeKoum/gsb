<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Inscription"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // démarrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();
    

// DEBUT du contrôleur inscription

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $adresse=$_POST["adresse"];
  $CodeP=$_POST["cp"];
  $ville=$_POST["ville"];
  //$dateEmbauche=$_POST["dateEmbauche"];
  $secCode=$_POST["secCode"];
  $labCode=$_POST["labCode"];
  $mdp=$_POST["mdp"];
  $mail=$_POST["mail"];
  $role=$_POST["role"];

  inscription($nom, $prenom, $adresse, $CodeP, $ville, $secCode, $labCode, $mdp, $mail, $role, $tabErreurs);

}

// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vInscription.php");
include($repVues."pied.php");
?>
  
