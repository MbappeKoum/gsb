
  <!-- Vue pour lister les visiteurs
    ================================================== -->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br><br><br>
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Ville</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($leVisiteur))
    { 
 ?>     
        <tr>
        <td><?php echo $leVisiteur[$i]["VIS_MATRICULE"]?></td>
            <td><?php echo $leVisiteur[$i]["VIS_NOM"]?></td>
            <td><?php echo $leVisiteur[$i]["VIS_PRENOM"]?></td>
            <td><?php echo $leVisiteur[$i]["VIS_VILLE"]?></td>
            
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
