<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Ajouter client
                    
                        </h2>
                    </div>
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 
 $ncinE=$nomE=$prenomE=$telE=$emailE=$loginE="";
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $erreur = true ; 
if( $controle->vide($_POST["ncin"])) 
{
  $ncinE=" * champ obligatoire";

} 

if( $controle->vide($_POST["nom"])) 
{
  $nomE=" * champ obligatoire";
}


if( $controle->vide($_POST["prenom"])) 
{
  $prenomE=" * champ obligatoire";
}
if( $controle->vide($_POST["login"])) 
{
  $loginE=" * champ obligatoire";
}
if( $controle->vide($_POST["email"])) 
{
  $emailE=" * champ obligatoire";
}

if( $controle->vide($_POST["tel"])) 
{
  $telE=" * champ obligatoire";
}
if( ($controle->no_vide($_POST["email"])) && ($controle->no_Email($_POST["email"])) ) 
{
  $emailE=" * Email incorrecte";

} 
if( ($controle->no_vide($_POST["ncin"])) && (strlen($_POST["ncin"])!=8) ) 
{
  $ncinE=" * NCIN incorrecte";

} 
if( ($controle->no_vide($_POST["tel"])) && (strlen($_POST["tel"])!=8) ) 
{
  $telE=" * Teléphone incorrecte";

} 



if($controle->no_vide($_POST["prenom"],$_POST["nom"],$_POST["ncin"],$_POST["tel"],$_POST["email"]) &&  (strlen($_POST["ncin"])==8)  && (strlen($_POST["tel"])==8) && ($controle->isEmail($_POST["email"])) )
{   




  
      $tel = $_POST['tel'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $ncin = $_POST['ncin'];
      $email = $_POST['email'];
      $login = $_POST['login'];
      
      $client->setNom($nom);
      $client->setPrenom($prenom);
      $client->setTel($tel);
      $client->setNCIN($ncin);
      $client->setLogin($login);
      $ajout=$client->ajouter();
      
      if($ajout)
      {
          header('location:liste_client.php?message=add');
      }
    }}
  ?>  

   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">N C I N</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="ncin" placeholder="">
      <span class="error"><?php echo $ncinE;?></span>
    </div>
     </div>
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="nom" placeholder="">
      <span class="error"><?php echo $nomE;?></span>
    </div>
     </div>
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Prénom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="prenom" placeholder="">
      <span class="error"><?php echo $prenomE;?></span>
    </div>
     </div>
     
    
       <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="tel" placeholder="">
      <span class="error"><?php echo $telE;?></span>
    </div>
     </div>

      <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="email" placeholder="">
      <span class="error"><?php echo $emailE;?></span>
    </div>
     </div>   
    
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Login</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="login" placeholder="">
      <span class="error"><?php echo $loginE;?></span>
    </div>
     </div>   
    
     
    
  
    
     
      
     <br><br>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>
    <input type="submit" value="Ajouter" class="btn btn-primary">
  
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
