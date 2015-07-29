<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Transfert Solde 
                    
                        </h2>
                    </div>
                    
                    
                     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Transfert Solde
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                                  <?php 
                                  $soldeE=$numE="";

                                  if($_SERVER["REQUEST_METHOD"]=="POST")
                                  {
                                      session_start();
                                      $id_client = $_SESSION["id"];
                                     $compte->setId_client($id_client);
                                     $actuel = $compte->select_solde();

                                     $type = $_POST["type"];
                                     $num = $_POST["num"];
                                     $solde = $_POST["solde"];

                                    if(strlen($num)!=20)
                                    {
                                      $numE=" R.I.B incorrecte";
                                    }



                                    if(($actuel-10)<$solde)
                                    {
                                      $soldeE=" Solde insuffisant";
                                    }

                                    if(empty($_POST["num"]))
                                    {
                                      $numE= " * champ obligatoire";
                                    }

                                    if(empty($_POST["solde"]))
                                    {
                                      $soldeE= " * champ obligatoire";
                                    }

                        if((strlen($_POST["num"])==20) && (($actuel-$solde)>9))
                                     
                    {                 $etat = "success";
                                      $transfert->setEtat($etat);
                                      $transfert->setType($type);
                                      $transfert->setNum($num);
                                      $transfert->setSolde($solde);
                                      $transfert->setId_client($id_client);

                                      
                                      
                                      $ajout = $transfert->ajouter();

                                      $reste = $actuel-$solde;
                                      $mod = $compte->modifier_solde($reste);

                                      $historique->setSolde($reste);
                                      $historique->setId_client($id_client);
                                      $historique->ajouter();
                                      if($ajout)
                                      { 
                                        
                                        
                                         header('location:transfer.php?message=transfert');
                                      }
                                      
                                      
                                  }
                                }
                                  
                                  ?>  
                                    
                                          <div class="form-group">
                                            <label>compte à débiter : </label>
                                                <br><br>
                                           <select name="type" class="form-control">
                                            <option value="R I B">R I B </option>
                                           
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label>compte a crediter : </label>
                                                <br><br>
                                           <input type="number" class="form-control" name="num">
                                           <span style="color:red;">
                                            <?php 
                                            echo $numE;
                                            ?>
                                           </span>
                                        </div>
                                       <br><br>
                                        <div class="form-group">
                                            <label>Solde (en dinar tunisien) : </label>
                                                <br><br>
                                           <input type="number" class="form-control" name="solde">
                                           <span style="color:red;">
                                            <?php 
                                            echo $soldeE;

                                            ?>
                                           </span>
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
