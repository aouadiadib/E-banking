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
    $compte->setId($id);
    $liste = $compte->liste_info_compte();
    foreach($liste as $row) {

    ?>
    
 <table class="table table-responsive table-bordered" style="background-color:#BBD2E1;">

<tr>
<td>ID </td>
<td><?php echo $row["id_compte"] ?></td>
</tr>

<tr>
<td>R I B  </td>
<td><?php echo $row["RIB"] ?></td>
</tr>

<tr>
<td>Num carneil d'epargne </td>
<td><?php echo $row["num_c"] ?></td>
</tr>

<tr>
<td>Date </td>
<td><?php echo $row["date"] ?></td>
</tr>
<tr>
<td>Solde </td>
<td><?php echo $row["solde"]." DT"; ?></td>
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

