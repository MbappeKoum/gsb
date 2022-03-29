
<!--Vue pour la saisie des informations dans un formulaire!-->

<div class="container">

<form name="formAjout" action="" method="post">
  <fieldset>
    <legend>Entrez les données sur le visiteur à ajouter </legend>
    <label>Nom :</label> <input type="text" name="nom" size="20" /><br />
    <label>PRENOM :</label> <input type="text" name="prenom" size="10" /><br />
    <label>ADRESSE :</label> <input type="text" name="adresse" size="20"/><br />    
    <label>CODE POSTALE :</label> <input type="text" name="cp" size="20"/><br />    
    <label>VILLE :</label> <input type="text" name="ville" size="20"/><br />    
   <!-- <label>DATEEMBAUCHE :</label> <input type="text" name="dateEmbauche" size="20"/><br />    
-->  <label>SECTION CODE :</label>
    <select name="secCode">
       <option selected value = "P">P</option>
       <option value = "S">S</option>
       <option value = "E">E</option>
    </select> 
    <label>LABEL CODE :</label>
    <select name="labCode">
       <option selected value = "SW">SW</option>
       <option value = "GY">GY</option>
    </select> 
    <label>MOT DE PASSE :</label> <input type="text" name="mdp" size="20"/><br />    
    <label>MAIL :</label> <input type="text" name="mail" size="20"/><br />    
    <label>ROLE :</label> <input type="text" name="role" size="20"/><br />    

  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


