<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>  
<div class="container">
  <?php
try
{
  $PARAM_hote = 'localhost'; // le chemin vers le serveur
  $PARAM_port = '3306';
  $PARAM_nom_bd = 'gsb'; // le nom de votre base de donn�es
  $PARAM_utilisateur = 'root'; // nom d'utilisateur pour se connecter
  $PARAM_mot_passe = '';
  $bdd = new PDO('mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

   <legend>Entrez les données sur le matériel à  modifier </legend>
      <label> Référence :</label>
      <input type="text" name="id"  /><br />
  </select>
  <input type="hidden" name="etape" value="3" />
  <fieldset>
    <legend>Entrez les données à modifier :</legend>
    <label>Prix :</label>
    <input type="text" name="prix"  /><br />
    <label>Couleur :</label>
    <input type="text" name="couleur"  size="20" /><br />
    <label>Poids :</label>
    <input type="text" name="poids"  /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Modifier</button>
  <button type="reset" class="btn">Annuler</button>
</form>
</div>
</body>
</html>