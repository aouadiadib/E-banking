<?php 
   session_start();
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                            Demande chéquier
                    
                        </h2>
                    </div>
                    
                    
                     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Demande chéquier
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                                  <?php 
                                  
                                  if($_SERVER["REQUEST_METHOD"]=="POST")
                                  {
                                  
                                      $id_client = $_SESSION["id"];
                                      $type = $_POST["type"];
                                     
                                      $etat = "en cours de traitement";
                                      $nombre=$_POST["nombre"];
                                      
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
                                            <label>Type de chéquier : </label>
                                                <br><br>
                                            <select name="type" class="form-control">
                                              <option>chéquier barré</option>
                                             <option>chéquier non barré</option>
                                              <option>chéquier certifié</option>
                                            <option>chéquier visé</option>
                                            </select>
                                          
                                        </div>
                                          <div class="form-group">
                                            <label>Nombre de check : </label>
                                                <br><br>
                      <select name="nombre" class="form-control">
                                              <option>50</option>
                                             <option>100</option>
                                              <option>200</option>
                                          
                                            </select> </div>
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
