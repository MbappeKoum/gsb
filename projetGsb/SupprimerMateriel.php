<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Supprimer"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$model=lireDonneePost("model", "");
if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  SupprimerMateriel($model, $tabErreurs);
  if (nbErreurs($tabErreurs)==0)
  {
    $reussite = 1;
    $messageActionOk = "Le Matériel a bien été supprimé.";
  }

}

// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vSupprimerMateriel.php"); ;
}

include($repVues."pied.php") ;
?>
  