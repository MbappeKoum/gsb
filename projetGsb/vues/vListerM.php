

  <!-- Vue pour lister les matériels
    ================================================== -->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br><br> <br>
      <thead>
        <tr>
          <th>Type</th>
          <th>Prix</th>
          <th>Taille</th>
          <th>Couleur</th>
          <th>Model</th>
          <th>Poids</th>
          <th>Epaisseur</th>


        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($materiel))
    { 
 ?>     
        <tr>
        <td><?php echo $materiel[$i]["type"]?></td>
            <td><?php echo $materiel[$i]["prix"]?></td>
            <td><?php echo $materiel[$i]["taille"]?></td>
            <td align="right"><?php echo $materiel[$i]["couleur"]?></td>
            <td><?php echo $materiel[$i]["model"]?></td>
            <td><?php echo $materiel[$i]["poids"]?></td>
            <td><?php echo $materiel[$i]["epaisseur"]?></td>


        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
