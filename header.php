<?php 
require_once("class/main.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-banking Solution</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">E-banking</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="changer.php"><i class="fa fa-gear fa-fw"></i> Mot de passe</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                  
                    <li>
                        <a href="compte.php"><i class="fa fa-user"></i> Compte</a>
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-retweet"></i> Transfer <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="transfert_benificier.php"> <i class="fa fa-chevron-right"></i>Vers bénificiere</a>
                            </li>
                            <li>
                                <a href="transfer.php"> <i class="fa fa-chevron-right"></i>Suivie Transfert</a>
                            </li>
                       

                            </li>
                        </ul>
                    </li>





 <li>
                        <a href="#"><i class="fa fa-retweet"></i> Demande <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="demande_carte.php"> <i class="fa fa-chevron-right"></i>Demande carte</a>
                            </li>
                            <li>
                                <a href="demande_checkier.php"> <i class="fa fa-chevron-right"></i> Demande chéquier</a>
                            </li>
                            <li>
                                <a href="demande.php"> <i class="fa fa-chevron-right"></i> Suivre Demande</a>
                            </li>

                            </li>
                        </ul>
                    </li>




                     <li>
                        <a href="extrait.php"><i class="fa fa-list"></i>  Extrait</a>
                    </li>
                    
                   
                      <li>
                        <a href="reclamation.php"><i class="fa fa-edit"></i>  Réclamation</a>
                    </li>


                  
                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->