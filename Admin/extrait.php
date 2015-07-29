<?php 
require_once("header.php");
?>

        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                          
                                Extrait
                    
                        </h2>
                    </div>
<br><br><br><br><br><br><br>

<div class="imgg">
  <?php 
        session_start();
        $id = $_SESSION["id"];

  ?>
  <a href="extrait_word.php?id=<?php echo $id;  ?>" target="blank">
 <img src="img/word.png" width="160" height="170">
</a>
</div>
<div class="imgg1">
  <a href="extrait_pdf.php?id=<?php echo $id;  ?>" target="blank">
 <img src="img/pdf.png" width="200" height="180">
</a>
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
