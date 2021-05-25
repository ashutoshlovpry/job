<?php
require("connection.php");
session_start();
$check=1;
if(!isset($_SESSION['log']))
{
if(isset($_POST['fname']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pass=$_POST['pass'];
    $type=$_POST['type'];
    $em=$_POST['email'];
    
    $sql="select * from js where email='$em'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result)==0)
    {
        $sql="select * from count";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $c=$row['num'];
        $c=$c+1;
        $sql="insert into js(id,fname,lname,pass,type,email) values('$c','$fname','$lname','$pass','$type','$em')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql="update count set num='$c'";
            mysqli_query($conn,$sql);
            $_SESSION['fname']=$fname;
            $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; 
            header("refresh:0,url='home.php'");
        }
        else
            print "error";
    }
    else
        {
        $check=0;    
    }
}
?>
    

<html>
    <head>
        <title>Sign-up</title>
        <link rel="stylesheet" href="./style/style.css" type="text/css">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

        <!-- jQuery library -->
         <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
         <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->

          <!-- Compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style type="text/css">
            body{
                background-image: url("pc_1.jpeg");
                
            }
            .nav-wrapper {
                background-color: #DAA520 !important;
            }
            ::placeholder{
                color: #F0E68C;
            }


        </style>
    </head>
    <body>

         <nav >
             <div class="nav-wrapper" >
                 <a href="home.php" class="brand-logo" style="margin-left: 750px"> SeekJob</a>
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="sign-up.php">Sign-up</a></li>
                     <li><a href="login.php">Login</a></li>
                     <li><a href="home.php">Home</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row back1">
            <div class="container">
                <h3>Sign-up Today!</h3>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <form class="f" action="<?php $_PHP_SELF ?>" name="myform" id="myform" method="post">
                    <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="fname" type="text" class="validate" name="fname" placeholder="First Name">
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="lname" type="text" class="validate" name="lname" placeholder="Last Name">
                                </div>
                                
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                 <i class="material-icons prefix">mail</i>
                                    <input type="email" name="email" class="validate" placeholder="Email">
                                    <p id="state"></p>
                                </div>
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                 <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass" type="password" name="pass" class="validate" placeholder="Password" onkeyup="return passwordChanged();"><span class="badge" id="strength" data-badge-caption="">Type Password</span>
                                </div>
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                 <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass2" type="password" name="pass2" class="validate" placeholder="Confirm Password">
                                </div>
                    </div>
                    <p>Your role:-</p>
                    <div class="row pad">
                        <p>
                          <input name="type" type="radio" id="emp" value="emp"/>
                          <label for="emp" style="color: black"><b>Employer</b></label>
                        </p><br>
                        <p>
                          <input name="type" type="radio" id="js" value="js" checked/>
                          <label for="js" style="color: black"><b>Job seeker</b></label>
                        </p>
                    </div>
                    <br>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    
        <?php
        if($check==0)
        {
            ?>
        <script>
         Materialize.toast('Email already exist', 4000)
        </script>
             <?php
        }
        ?>
        <script language="javascript" src="./javascript/passcheck.js"></script>
        <script language="javascript" src="./javascript/jvsc.js"></script>
    </body>
</html>

<?php
}
else
{
    print "error nt";
}
?>