<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                                Consulter Réclamations
                    
                        </h2>
                    </div>
<br><br><br><br><br><br><br>


<table class="table table-responsive table-bordered table-hover">
        
        <tbody>
          <?php 
         
        $id = $_GET["id"];
        $reclamation->setId($id);
        $liste = $reclamation->liste_reclamation();
        
        foreach ($liste  as $line ) {
        
    
        ?>  
          <tr>
            <td>
             ID : 
            </td>
            <td>
               <?php echo $line["id_reclamation"]; ?> 
            </td>
          </tr>
           <tr>
            <td>
             Etat : 
            </td>
            <td>
               <?php echo $line["etat"]; ?> 
            </td>
          </tr>
           <tr>
            <td>
             Sujet : 
            </td>
            <td>
               <?php echo $line["sujet"]; ?> 
            </td>
          </tr>
          <tr>
            <td>
             Texte : 
            </td>
            <td>
               <?php echo $line["texte"]; ?> 
            </td>
          </tr>
          <tr>
            <td>
             Repense : 
            </td>
            <td>
               <?php echo $line["repense"]; ?> 
            </td>
          </tr>
          <?php } ?>
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
