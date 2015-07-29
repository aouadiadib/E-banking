<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Traiter Demande
                    
                        </h2>
                    </div>
<br><br>
   <form class="form-horizontal" role="form" method="post" action="#">
 <?php
 

 $id = $_GET["id"];

   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    

      $etat = $_POST['rep'];
      
      
      
       
      
      $demande->setId($id);
      $demande->setEtat($etat);
      $ajout=$demande->traiter_demande();
      
      if($ajout)
      {
       header('location:demande.php?message=traiter');
      }
    }
  ?>  
 
     <div class="form-group">
  <label for="firstname" class="col-sm-2 control-label">Répense</label>
      <div class="col-sm-6">
        <select name="rep" class="form-control">
          <option>Accepter</option>
           <option>Refuser</option>
        </select>

    </div>
  </div>

 

  
     
    

     <br><br>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>
    <input type="submit" value="Valider" class="btn btn-primary">
  
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
