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
<?php 
         
        $id = $_SESSION["id"];
        $compte->setId_client($id);
        $rib = $compte->select_RIB();
        $num = $compte->select_NUM();
        echo "R.I.B :&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
        echo $rib;
        echo "<br><br>";
        echo "Compte d'epargne  : &nbsp;&nbsp;&nbsp;". $num;


?>
</h3>
<br><br><br><br>


<table class="table table-responsive table-bordered table-hover">
        <thead style="background-color:#26C4EC; color:white;">
        <tr>
        <th>Titulaire de compte</th><th>Type de compte</th><th>Date de solde</th><th>Devise de compte</th>
        <th>Solde</th>
        </tr>
        </thead>
        <tbody>
        <?php 
      



$compte->select_compte();


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
