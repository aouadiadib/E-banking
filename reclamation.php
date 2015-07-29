<?php 
session_start();
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                                Liste des Reclamations
                    
                        </h2>
                    </div>
<br><br><br>

<?php 

$client->affichage();

?>

<br><br>

<a href="poser_reclamation.php"><img src="assets/img/+.png" width="30"></a>
<br><br>
<table class="table table-responsive table-bordered table-hover">
        <thead style="background-color:#26C4EC; color:white;">
        <tr>
        <th>ID</th><th>sujet</th><th>Etat</th><th>Consulter</th><th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
         
        $id = $_SESSION["id"];
        $reclamation->setId_client($id);
        $reclamation->select_reclamation();

        ?>  
        </tbody>
        </table>
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
