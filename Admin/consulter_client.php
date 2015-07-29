<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Compte client
                    
                        </h2>
                        <br><br>
    <a href="" onclick="window.print()"><img src='img/print.png' width='30' height='30'></img> </a>
 
                        <br><br>
                    </div>
  <?php 
    $id = $_GET['id'];
    $client->setId($id);
    $liste = $client->liste_info_client();
    foreach($liste as $row) {

    ?>
    
 <table class="table table-responsive table-bordered" style="background-color:#BBD2E1;">

<tr>
<td>ID </td>
<td><?php echo $row["id_client"] ?></td>
</tr>

<tr>
<td>Nom </td>
<td><?php echo $row["nom"] ?></td>
</tr>

<tr>
<td>Prénom </td>
<td><?php echo $row["prenom"] ?></td>
</tr>

<tr>
<td>N C I N </td>
<td><?php echo $row["ncin"] ?></td>
</tr>
<tr>
<td>Login </td>
<td><?php echo $row["login"] ?></td>
</tr>
<tr>
<td>Mot de passe </td>
<td><?php 
$pass = $crypt->decrypt($row["pass"]) ;
echo $pass; 

?></td>
</tr>

    </table>
 <?php 
  }
 ?>
                </div> 
                 <!-- /. ROW  -->
                  </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
