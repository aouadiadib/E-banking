<?php 
    require_once("class/main.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>E-banking | Solution</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/JavaScript">

function clavier (valeur) {
document.forms["changer"].elements["motDePasse"].value=document.forms["changer"].elements["motDePasse"].value+valeur;
}
</script>
</head>
<body style="background:#2f6e91;">

<div class="container">

<div class="page-header">
    <center>
    <h1 style="color:white;">

       Administration  E-banking 

    </h1>
</center>
</div>

<!-- IPad Login - START -->
<div class="container">
    <div class="row colored">
        <div class="contcustom">
            <img src="img/admin.jpg" width="150" height="120">
            <br><br>
            <div>
                <form name="changer" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
 <?php 

                    if($_SERVER["REQUEST_METHOD"]=="POST")
                    {

                        $login = $_POST["login"];
                        $pass = $_POST["motDePasse"];

                 

                        if($login == "" || $pass=="")
                        {
                            echo "<br><font color=red> saisir votre login et mot de passe</font>";
                       

                        } else {

                        $client->setLogin($login);
                        $client->setPass($pass);

                        $login = $client->login();

                        if($login==false)
                        {
                            echo "<br><font color=red>Login ou mot de passe incorrecte</font>";
                        }



                    }
                }



                ?>

                <input type="text" placeholder="Login" name="login">
                <input type="password"  readonly="readonly" name="motDePasse" id="motDePasse" placeholder="Mot de passe" >
                

 <div class="dcv">
<input type="button" class="cv" value="0" id="c0" onClick="clavier(0);">
<input type="button" class="cv" value="1" id="c1" onClick="clavier(1);">
<input type="button" class="cv" value="2" id="c2" onClick="clavier(2);">
<input type="button" class="cv" value="3" id="c3" onClick="clavier(3);">
<input type="button" class="cv" value="4" id="c4" onClick="clavier(4);">
<input type="button" class="cv" value="5" id="c5" onClick="clavier(5);">
<input type="button" class="cv" value="6" id="c6" onClick="clavier(6);">
<div class="ccv">
<input type="button" class="cv" value="7" id="c7" onClick="clavier(7);">
<input type="button" class="cv" value="8" id="c8" onClick="clavier(8);">
<input type="button" class="cv" value="9" id="c9" onClick="clavier(9);">
</div>

</div>

                <button class="btn btn-default wide"><span class="fa fa-check med"></span></button>
                <br>
              

                </form>
                <br>
            </div>
        </div>
    </div>
    <br><br>
</div>

<style>
    .colored {
        background-color: #2f6e91;
    }

    .row {
        padding: 20px 0px;
    }

    .bigicon {
        font-size: 97px;
        color: #f96145;
    }

    .contcustom {
        text-align: center;
        width: 600px;
        border-radius: 0.5rem;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: 10px auto;
        background-color: white;
        padding: 20px;
    }

    input {
        width: 100%;
        margin-bottom: 17px;
        padding: 15px;
        background-color: #ECF4F4;
        border-radius: 2px;
        border: none;
    }

    h2 {
        margin-bottom: 20px;
        font-weight: bold;
        color: #ABABAB;
    }

    .btn {
        border-radius: 2px;
        padding: 10px;
    }

    .med {
        font-size: 27px;
        color: white;
    }

    .wide {
        background-color: #2f6e91;
        width: 100%;
        -webkit-border-top-right-radius: 0;
        -webkit-border-bottom-right-radius: 0;
        -moz-border-radius-topright: 0;
        -moz-border-radius-bottomright: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .cv
    {
        background-color:#80D0D0;
        color:white;
        width:70px;
        
        float:left;
        margin-left:5px;

    }
     
    .dcv
    {
        float:left;
        margin-left:10px;
    }
    
    .ccv
    {
        float:left;
        margin-left:150px;
    }
</style>

<!-- IPad Login - END -->

</div>

</body>
</html>