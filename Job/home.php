<?php
    session_start();
require("connection.php");
if(!isset($_SESSION['log']))
{
if(isset($_SESSION['expire'])){
$x=time();
if($x>$_SESSION['expire'])
    session_destroy();
}
?>

<html>
    <head>
        <title>Sign-up</title>
        <link rel="stylesheet" href="./style/style.css" type="text/css">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

        
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style type="text/css">
          body{
                  background-image: url("pc_1.jpeg");
                  
              }

          .nav-wrapper {
                background-color: #DAA520 !important;
            }
        </style>
    </head>
    <body>
        <nav>
             <div class="nav-wrapper">
                 
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="sign-up.php">Sign-up</a></li>
                     <li><a href="login.php">Login</a></li>
                     <li><a href="home.php">Home</a></li>
                 </ul>
            </div>
        </nav>
        <?php
        if(isset($_SESSION['fname']))
        {
            
        ?>
        <div class="row">
            <div class="container">
                <h3>Thank you for signing up <?php print $_SESSION['fname'] ?>. Please Login</h3>
            </div>
        </div>
        <?php
        }
        ?>
        <br>
        <div class="row">
            <div class="container">
                <div class="slider">
                    <ul class="slides">
                      
                      <li>
                        <img src="img/download2.jpg"> 
                        <div class="caption left-align">
                          <h3>Over <?php 
                                $sql="select * from count";
                                $result=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                $c=$row['num'];
                                print $c;
                              ?> members worldwide</h3>
                          <h5 class="light grey-text text-lighten-3">Be a part of the community.</h5>
                        </div>
                      </li>
                      <li>
                       
                        <div class="caption right-align">
                          <h3>Premium companies looking to hire</h3>
                          <h5 class="light grey-text text-lighten-3">Join to view Premium jobs according to your taste</h5>
                            <a class="btn waves-effect waves-light" href="sign-up.php">Sign-up</a>
                        </div>
                      </li>
                      <li>
                       
                        <div class="caption center-align">
                          <h3>No more wandering for jobs</h3>
                         
                            <a class="btn waves-effect waves-light" href="login.php">Login</a>
                        </div>
                      </li>
                    </ul>
                  </div>
            </div>
        </div>
        <script>
       $(document).ready(function(){
      $('.slider').slider();
    });
        </script>
    </body>
</html>
<?php
}
else
{
    print "error";
}
?>
