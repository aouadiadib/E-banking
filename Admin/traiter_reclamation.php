<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Traiter Réclamation
                    
                        </h2>
                    </div>

   
<form class="form-horizontal" role="form" method="post" action="#">
 <?php
 
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $id = $_GET["id"];
      $repense = $_POST["rep"];
      $etat = "traiter";
      $reclamation->setId($id);
      $reclamation->setEtat($etat);
      $reclamation->setRepense($repense);
      $op  = $reclamation->traiter_reclamation();
      
      
      if($op)
      {
          
          header('location:reclamation.php?message=update');
        }

    }
  ?>  

     
     
    
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Répense : </label>
      <div class="col-sm-6">
         <textarea class="form-control" name="rep"  rows="15" id="comment" required></textarea>
      
    </div>
     </div>
     
  
     
      
     <br><br>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>
    <input type="submit" value="  Valider  " class="btn btn-primary">
  
   </div>
   
</form>    
        
      
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
