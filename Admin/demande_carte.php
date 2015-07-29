<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                            Demande Carte
                    
                        </h2>
                    </div>
                    
                    
                     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Demande Carte
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                                  <?php 
                                  
                                  if($_SERVER["REQUEST_METHOD"]=="POST")
                                  {
                                      session_start();
                                      $id_client = $_SESSION["id"];
                                      $type = $_POST["type"];
                                     
                                      $etat = "en cours de traitement";
                                      $nombre=1;
                                      
                                      $demande->setType($type);
                                      $demande->setEtat($etat);
                                      $demande->setNombre($nombre);
                                      $demande->setId_client($id_client);
                                      
                                      
                                      $ajout = $demande->ajouter_demande();
                                      
                                      if($ajout)
                                      { 
                                         header('location:demande.php?message=add');
                                      }
                                      
                                      
                                  }
                                  
                                  ?>  
                                    
                                    
                                        <div class="form-group">
                                            <label>Type de Carte : </label>
                                                <br><br>
                                            <select name="type" class="form-control">
                                              <option>carte crédit</option>
                                             <option>carte affaire</option>
                                              <option>carte achat</option>
                                            </select>
                                          
                                        </div>
                                       <br><br>
                                   <div class="form-group">
                                         
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                  
                                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                    
                    
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
