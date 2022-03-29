<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsb'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
 
    return $connect;
}

function lister()
{
    $connexion = connecterServeurBD();
   
    $requete="select VIS_MATRICULE, VIS_NOM, VIS_PRENOM, VIS_VILLE from visiteur";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $visiteurs[$i]['VIS_MATRICULE']=$ligne['VIS_MATRICULE'];
        $visiteurs[$i]['VIS_NOM']=$ligne['VIS_NOM'];
        $visiteurs[$i]['VIS_PRENOM']=$ligne['VIS_PRENOM'];
        $visiteurs[$i]['VIS_VILLE']=$ligne['VIS_VILLE'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteurs;
}


function listerMateriel()
{
    $connexion = connecterServeurBD();
   
    $requete="select * from materiel";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $materiel[$i]['type']=$ligne['type'];
        $materiel[$i]['prix']=$ligne['prix'];
        $materiel[$i]['taille']=$ligne['taille'];
        $materiel[$i]['couleur']=$ligne['couleur'];
        $materiel[$i]['model']=$ligne['model'];
        $materiel[$i]['poids']=$ligne['poids'];
        $materiel[$i]['epaisseur']=$ligne['epaisseur'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $materiel;
}







function ajouter($matricule, $nom, $prenom, $adresse, $codeP, $ville, $dateEmbauche, $secCode, $labCode, $mdp, $mail, $role,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  // Cr�er la requ�te d'ajout 
  $requete="insert into vsiteur"
  ."(VIS_MATRICULE,VIS_NOM,VIS_PRENOM,VIS_ADRESSE, VIS_CP, VIS_VILLE, VIS_DATEEMBAUCHE, SEC_CODE, LAB_CODE, VIS_MDP, VIS_MAIL, VIS_ROLE) values ('"
  .$matricule."','"
  .$nom."',"
  .$prenom.",'"
  .$adresse."','"
  .$codeP.",'"
  .$ville.",'"
  .$dateEmbauche.",'"
  .$secCode.",'"
  .$labCode.",'"
  .$mdp.",'"
  .$mail.",'"
  .$role."');";
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "Le visiteurs $visiteur a été correctement ajouté";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout du visiteur $visiteur a échoué !!!";
    ajouterErreur($tabErr, $message);
  } 

}



function AjouterMateriel($unType, $unPrix, $uneTaille, $uneCouleur, $unModel, $unPoids, $uneEpaisseur, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  // Cr�er la requ�te d'ajout 
  $requete="insert into materiel"
  ."(type,prix,taille,couleur,model,poids,epaisseur) values ('"
  .$unType."','"
  .$unPrix."','"
  .$uneTaille."','"
  .$uneCouleur."','"
  .$unModel."','"
  .$unPoids."','"
  .$uneEpaisseur."');";

  if($uneEpaisseur<0 || $uneEpaisseur>10){

    $message = "Le matériel ne peut pas excéder 10 d'épaisseur!";
    ajouterErreur($tabErr, $message);
  }

  else{
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "Le matériel a été correctement ajouté!";
    ajouterErreur($tabErr, $message);
    }


  else
  {
    $message = "Le matériel n'a pas été ajouté!";
    ajouterErreur($tabErr, $message);
  } 

}
}

function inscription($nom, $prenom, $adresse, $codeP, $ville, $secCode, $labCode, $mdp, $mail, $role,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  // Cr�er la requ�te d'ajout 
  $requete="insert into visiteur"
  ."(VIS_NOM,VIS_PRENOM,VIS_ADRESSE, VIS_CP, VIS_VILLE, SEC_CODE, LAB_CODE, VIS_MDP, VIS_MAIL, VIS_ROLE) values ('"
  .$nom."',"
  .$prenom.",'"
  .$adresse."','"
  .$codeP.",'"
  .$ville.",'"
  //.$dateEmbauche.",'"
  .$secCode.",'"
  .$labCode.",'"
  .$mdp.",'"
  .$mail.",'"
  .$role."');";
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "Le visiteurs a été correctement ajouté";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout du visiteur a échoué !!!";
    ajouterErreur($tabErr, $message);
  } 

}


function rechercher($id)
{
    $connexion = connecterServeurBD();
    
    $visiteur = array();
   
    $requete="select VIS_MATRICULE, VIS_NOM, VIS_PRENOM, VIS_ADRESSE from visiteur";
      $requete=$requete." where VIS_NOM='".$id."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $visiteur[$i]['VIS_MATRICULE']=$ligne['VIS_MATRICULE'];
        $visiteur[$i]['VIS_NOM']=$ligne['VIS_NOM'];
        $visiteur[$i]['VIS_PRENOM']=$ligne['VIS_PRENOM'];
        $visiteur[$i]['VIS_ADRESSE']=$ligne['VIS_ADRESSE'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteur;
}


function RechercherMateriel($type)
{
  $connexion = connecterServeurBD();
    
  $materiel = array();
 
  $requete="SELECT `type`, `prix`, `taille`, `couleur`, `model`, `poids` FROM `materiel`";
    $requete=$requete."where type ='".$type."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $materiel[$i]['type']=$ligne['type'];
        $materiel[$i]['prix']=$ligne['prix'];
        $materiel[$i]['taille']=$ligne['taille'];
        $materiel[$i]['couleur']=$ligne['couleur'];
        $materiel[$i]['model']=$ligne['model'];
        $materiel[$i]['poids']=$ligne['poids'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $materiel;
}


function supprimer($ref, &$tabErr)
{
    $connexion = connecterServeurBD();
    
          
    $requete="delete from visiteur";
    $requete=$requete." where VIS_MATRICULE='".$ref."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "La visiteurs a été correctement supprimée";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression de la visiteurs a échou� !!!";
      ajouterErreur($tabErr, $message);
    }      
    
}




function SupprimerMateriel($model, &$tabErr)
{
    $connexion = connecterServeurBD();
    
          
    $requete="delete from materiel";
    $requete=$requete." where model='".$model."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le a été correctement supprimée";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression du matériel a échoué !!!";
      ajouterErreur($tabErr, $message);
    }      
    
}


function modifier($nom, $prenom, $unMail, $unMat,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where vis_nom = '".$nom."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE visiteur SET
    vis_nom = '$nom',
    vis_prenom = '$prenom',
    vis_mail = '$unMail' WHERE vis_matricule='$unMat';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le visiteur a été correctement modifié";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification du visiteur a échoué !!!";
      ajouterErreur($tabErr, $message);
    } 
}

function modifierMateriel($id,$prix, $couleur, $poids,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from materiel";
    $requete=$requete." where ID = '".$id."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE materiel SET
    prix = '$prix',
    couleur = '$couleur',
    poids = '$poids' WHERE ID='$id';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le matériel a été correctement modifié";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification du matériel a échoué !!!";
      ajouterErreur($tabErr, $message);
    } 
}


function rechercherUtilisateur($log, $psw, &$tabErr)
{
    $connexion = connecterServeurBD();
      
    $requete="select * from utilisateur";
      $requete=$requete." where nom='".$log."' and mdp ='".$psw."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
    $cat = "nulle";
    
    $ligne = $jeuResultat->fetch();
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    if ($ligne)
    {
        $cat = $ligne['cat'];
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $cat;
}


function listerEmprunter()
{
    $connexion = connecterServeurBD();
   
    $requete="select dateEmprunter, dateRestituer, vis_matricule, idMateriel from emprunter where dateRestituer is not null";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $emprunt[$i]['dateEmprunter']=$ligne['dateEmprunter'];
        $emprunt[$i]['dateRestituer']=$ligne['dateRestituer'];
        $emprunt[$i]['vis_matricule']=$ligne['vis_matricule'];
        $emprunt[$i]['idMateriel']=$ligne['idMateriel'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $emprunt;
}

function listerPasRestituer()
{
    $connexion = connecterServeurBD();
   
    $requete="select dateEmprunter, dateRestituer, vis_matricule, idMateriel from emprunter where dateRestituer is null";
    
    $jeuResultat=$connexion->query($requete); 
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $pasRestituer[$i]['dateEmprunter']=$ligne['dateEmprunter'];
        $pasRestituer[$i]['dateRestituer']=$ligne['dateRestituer'];
        $pasRestituer[$i]['vis_matricule']=$ligne['vis_matricule'];
        $pasRestituer[$i]['idMateriel']=$ligne['idMateriel'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   
  
  return $pasRestituer;
}

function ajouterEmprunt($dateEmprunter, $vis_matricule, $idMateriel,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  $requete="select * from emprunter";
  $requete=$requete." where idMateriel <> '".$idMateriel."' and dateRestituer is not null;";   
  // Cr�er la requ�te d'ajout 
  $requete="insert into emprunter"
  ."(dateEmprunter, vis_matricule, idMateriel) values ('"
  .$dateEmprunter."','"
  .$vis_matricule."','"
  .$idMateriel."');";
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "L'emprunt a été correctement ajouté.";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout de l'emprunt a échoué !";
    ajouterErreur($tabErr, $message);
  } 

}

function ajouterRestituer( $dateRestituer, $vis_matricule, $idMateriel,&$tabErr)
{
  
  $connexion = connecterServeurBD();
  $requete="select vis_matricule, idMateriel from emprunter";
  $requete=$requete." where vis_matricule = '".$vis_matricule."' and idMateriel = '".$idMateriel."' and dateRestituer is null;";   

  $requete="update emprunter"
  ." set dateRestituer ='"
  .$dateRestituer."'
  where idMateriel = '".$idMateriel."'
  and vis_matricule = '".$vis_matricule."';";          
 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant


  
  // Si la requête a réussi
  if ($ok)
  {
    $message = "Le matériel a été correctement restituer.";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, la réstitution de l'emprunt a échoué !";
    ajouterErreur($tabErr, $message);
  } 

}

function listerMaterielDisponible()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT `type`, `prix`, `taille`, `couleur`, `model`, `poids`  FROM materiel WHERE ID not in (SELECT emprunter.idMateriel from emprunter where emprunter.dateRestituer is null)";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $materiel[$i]['type']=$ligne['type'];
        $materiel[$i]['prix']=$ligne['prix'];
        $materiel[$i]['taille']=$ligne['taille'];
        $materiel[$i]['couleur']=$ligne['couleur'];
        $materiel[$i]['model']=$ligne['model'];
        $materiel[$i]['poids']=$ligne['poids'];        
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $materiel;
}

?>
