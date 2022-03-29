<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Restituer"
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
    
 
  $pasRestituer = listerPasRestituer();
  
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vRestituerPasMateriel.php");
  include($repVues."pied.php") ;
  ?>
    
