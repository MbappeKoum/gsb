
<?php
$est=!estConnecte();
?>
  <!-- Navbar
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <ul class="nav">

            <li>
                <a href="./index.php">Accueil</a>
              </li>

            <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Utilisateur  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li class="nav">
                <a href="lister.php">Lister</a>
              </li>
              <li class="nav">
                <a href="rechercher.php">Rechercher</a>
              </li>
              <li class="nav">
                <a href="supprimer.php">Supprimer</a>
              </li>
              <li class="nav">
                <a href="modifier.php">Modifier</a>
              </li>
              <li class="nav">
                <a href="inscriptionUtilisateur.php">S'inscrire</a>
              </li>
                  </ul>
              </li>

              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Matériel  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li class="nav">
                  <li class="nav">
                <a href="SupprimerMateriel.php">Supprimer matériel</a>
              </li>
              <li class="nav">
                <a href="AjouterMateriel.php">Ajouter matériel</a>
              </li>
              <li class="nav">
                <a href="RechercherMateriel.php">Rechercher matériel</a>
              </li>
              <li class="nav">
                <a href="listerM.php">Lister matériel</a>
              </li>
              <li class="nav">
                <a href="modifierM.php">Modifier matériel</a>
              </li>
                  </ul>
              </li>


              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunt  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li class="nav">
                  <li class="nav">
                  <li class="nav">
                <a href="Emprunter.php">Lister emprunt</a>
              </li>
              <li class="nav">
                <a href="Restituer.php">Restituer matériel</a>
              </li>
              <li class="nav">
                <a href="restituerPasMateriel.php">Restituer pas matériel</a>
              </li>
              <li class="nav">
                <a href="AjouterEmprunter.php">Ajouter emprunter</a>
              </li>
              <li class="nav">
                <a href="AjouterRestituer.php">Ajouter restituer</a>
              </li>
              <li class="nav">
                <a href="listerMaterielsDisponible.php">Matériels disponibles</a>
              </li>
                  </ul>
              </li>
                   
      
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>



          

                                 
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

