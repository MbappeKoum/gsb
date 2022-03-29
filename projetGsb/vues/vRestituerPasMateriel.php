
  <!-- Vue pour lister les matériels pas restitué
    ================================================== -->

<br>

<br>
<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br>
      <thead>
        <tr>
          <th>dateEmprunter</th>
          <th>dateRestituer</th>
          <th>vis_matricule</th>
          <th>idMateriel </th>
     
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($pasRestituer))
    { 
 ?>     
        <tr>
            <td><?php echo $pasRestituer[$i]['dateEmprunter']?></td>
            <td><?php echo $pasRestituer[$i]["dateRestituer"]?></td>
            <td><?php echo $pasRestituer[$i]["vis_matricule"]?></td>
            <td><?php echo $pasRestituer[$i]["idMateriel"]?></td>
          
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 