<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Liste client
                    
                        </h2>
                    </div>

<br> <br> 
 <a href="ajouter_client.php"><img src='img/ajout.png' width='30' height='30'></img> </a>
 <br><br>


<table class="table table-responsive table-bordered table-hover">
        <thead style="background-color:#26C4EC; color:white;">
        <tr>
        <th>ID</th><th>N C I N</th><th>Nom</th><th>Prénom</th>
         <th>login</th><th>Activation</th>
       <th>Mot de passe</th><th></th><th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
      

                 

$client->select_client();


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
