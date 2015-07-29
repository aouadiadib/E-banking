<?php 
   session_start();
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Compte Client
                    
                        </h2>
                    </div>
<br><br><br><br><br><br><br>
<h3>

</h3>
<br><br><br><br>


<table class="table table-responsive table-bordered table-hover">
        <thead style="background-color:#26C4EC; color:white;">
        <tr>
        <th>Date d'envoie</th><th>Type d'envoie</th><th>Numéreau</th><th>Solde</th>
        <th>Etat</th>
        </tr>
        </thead>
        <tbody>
        <?php 
      

               
        $id = $_SESSION["id"];
        $transfert->setId_client($id);

$transfert->select_transfert();


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
