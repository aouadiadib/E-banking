<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Poser Reclamation
                    
                        </h2>
                    </div>
                    
                    
                     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Poser Reclamation
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
                                      $sujet = $_POST["sujet"];
                                      $texte = $_POST["texte"];
                                      $etat = "en cours de traitement";
                                      $repense="";
                                      
                                      $reclamation->setSujet($sujet);
                                      $reclamation->setTexte($texte);
                                      $reclamation->setEtat($etat);
                                      $reclamation->setId_client($id_client);
                                      $reclamation->setRepense($repense);
                                      
                                      $ajout = $reclamation->ajouter();
                                      
                                      if($ajout)
                                      { 
                                        header('location:reclamation.php?message=add');
                                      }
                                      
                                      
                                  }
                                  
                                  ?>  
                                    
                                    
                                        <div class="form-group">
                                            <label>Sujet : </label>
                                            <input class="form-control" type="text" name="sujet" required>
                                          
                                        </div>
                                       <div class="form-group">
                                            <label>Texte  : </label>
                                            <textarea name="texte" rows="10" cols="10" class="form-control" required>
                                            
                                            </textarea>
                                          
                                        </div>
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
