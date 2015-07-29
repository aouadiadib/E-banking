<?php 
require_once("header.php");
?>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                              Ajouter  Compte
                    
                        </h2>
                    </div>
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 
 $RIBE=$numE=$typeE=$soldeE="";
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $erreur = true ; 

if( $controle->vide($_POST["RIB"])) 
{
  $RIBE=" * champ obligatoire";

} 

if( $controle->vide($_POST["num"])) 
{
  $numE=" * champ obligatoire";
}


if( $controle->vide($_POST["type"])) 
{
  $typeE=" * champ obligatoire";
}
if( $controle->vide($_POST["solde"])) 
{
  $soldeE=" * champ obligatoire";
}


if( ($controle->no_vide($_POST["RIB"])) && (strlen($_POST["RIB"]) != 8) ) 
{
  $RIBE=" * RIB incorrecte";

} 

if( ($controle->no_vide($_POST["num"])) && (strlen($_POST["num"]) != 8) ) 
{
  $numE=" * Num  incorrecte";

} 
 




if($controle->no_vide($_POST["RIB"],$_POST["num"],$_POST["type"],$_POST["solde"]) &&  (strlen($_POST["num"])==20)  && (strlen($_POST["RIB"])==20)  )
{   




      $client = $_POST['client'];
      $RIB = $_POST['RIB'];
      $solde = $_POST['solde'];
      $num = $_POST['num'];
      $type = $_POST['type'];
      $date = date('Y/m/d');
      $block =0;
      
      $compte->setRIB($RIB);
      $compte->setId_client($client);
      $compte->setSolde($solde);
      $compte->setNum($num);
      $compte->setType($type);
      $compte->setDate($date);
      $compte->setBlock($block);
      $ajout=$compte->ajouter();
      
      if($ajout)
      {
          header('location:compte.php?message=add');
      }
    }}
  ?>  

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Client</label>
      <div class="col-sm-6">
        <select name="client" class="form-control">
         <?php 

         $client->option_client();

         ?>
        </select>
    </div>
     </div>
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">R I B </label>
      <div class="col-sm-6">
         <input type="number" class="form-control" id="firstname" name="RIB" placeholder="">
      <span class="error"><?php echo $RIBE;?></span>
    </div>
     </div>
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Num carneil d'epargne</label>
      <div class="col-sm-6">
         <input type="number" class="form-control" id="firstname" name="num" placeholder="">
      <span class="error"><?php echo $numE;?></span>
    </div>
     </div>
     
    
       <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Type</label>
      <div class="col-sm-6">
         <select name="type" class="form-control">
          <option>compte courant</option>
          <option>compte commerciale</option>
         </select>
    </div>
     </div>

    
    
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Solde</label>
      <div class="col-sm-6">
         <input type="number" class="form-control" id="firstname" name="solde" placeholder="">
      <span class="error"><?php echo $soldeE;?></span>
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
