<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Lister"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  
  // d�marrage ou reprise de la session
  initSession();
  
  // initialement, aucune erreur ...
  $tabErreurs = array();
    
 
  $leVisiteur = lister();
  
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vLister.php");
  include($repVues."pied.php") ;
  ?>
    
