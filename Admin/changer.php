<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Changer Mot de passe
                    
                        </h2>
                    </div>
<br><br>


<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 <?php
$passE=$npassE=$rnpassE= "";
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 

      
      session_start();
      $login = $_SESSION["login"];
      

      if($controle->vide($_POST['pass']))
      {
        $passE="* champ obligatoire";
      }
      if($controle->vide($_POST['npass']))
      {
        $npassE="* champ obligatoire";
      }
      if($controle->vide($_POST['rnpass']))
      {
        $rnpassE="* champ obligatoire";
      }
      
      
      
      if($controle->no_vide($_POST['pass'],$_POST['npass'],$_POST['rnpass']))
      { 
    $pass = $_POST['pass'];
        $npass = $_POST['npass'];
        $rnpass = $_POST['rnpass'];
    
     
              
              

     if ($npass!=$rnpass){
    $rnpassE="retaper mot de passe correctement";
        
  }
            
$npass = $crypt->encrypt($npass);
$rnpass = $crypt->encrypt($rnpass);
    if  ($npass==$rnpass) {
      
        
        $client->setLogin($login);
        $client->setPass($npass);
        if($client->changer_pass())
        {
        
        header('location:suc_changer.php?message=transfert');
                                     
        }
      }
    }}
 
 ?>
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Mot de passe</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" id="firstname" name="pass" placeholder="">
      <span class="error"><?php echo $passE;  ?></span>
    </div>
     </div>
     <br>
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nouveau mot de passe</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" id="firstname" name="npass" placeholder="">
      <span class="error"><?php echo $npassE;  ?></span>
    </div>
     </div>
     <br>
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Confirmation mot de passe</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" id="firstname" name="rnpass" placeholder="">
      <span class="error"><?php echo $rnpassE;  ?></span>
    </div>
     </div>
    
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
