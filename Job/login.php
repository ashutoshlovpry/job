<?php
require("connection.php");
session_start();
if(isset($_SESSION['log']))
{
    print "Error";
}
else
{
    



?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="./style/style.css" type="text/css">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

        <!-- jQuery library -->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

          <!-- Compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style type="text/css">
            body{
                background-image: url("pc_1.jpeg");
                
            }
            ::placeholder{
                color: #F0E68C;
            }
          .nav-wrapper {
                background-color: #DAA520 !important;
            }
        </style>

    </head>
    <body>
        <nav>
             <div class="nav-wrapper">
                 <a href="#" class="brand-logo" style="margin-left: 750px"> SeekJob</a>
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="sign-up.php">Sign-up</a></li>
                     <li><a href="#">Login</a></li>
                     <li><a href="home.php">Home</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <h3>Please Login</h3>
                <form class="form" name="myform2" id="myform2" method="post" action="<?php $_PHP_SELF ?>">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="pass" placeholder="Password">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['email']))
{
    $fn=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="select * from js where email='$fn' and pass='$pass'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $x=mysqli_num_rows($res);
    if($x>0)
    {
        $_SESSION['log']=1;
        $_SESSION['fn']=$row['fname'];
        $_SESSION['id']=$row['id'];
        $_SESSION['count']=$row['count'];
        if($row['type']=='emp')
        {
            if($row['count']==0)
            {
  //              print "count";
                header("refresh:0,url='askemp.php'");
            }
            else{
//            print "emp";
             header("refresh:0,url='welemp.php'");
            }
        }
        else
        {
            if($row['count']==0)
            {
               // print "count";
                header("refresh:0,url='askjs.php'");
            }
            else{
            //print "js";
            header("refresh:0,url='weljs.php'");
            }
        }    
    }
    else
    {
        ?>
        <script> Materialize.toast('User credentials wrong', 4000)</script>
        <?php
    }
}
        ?>
        
    </body>
</html>
<?php
}
?>