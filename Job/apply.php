<?php

session_start();
require("connection.php");
if(isset($_SESSION['log']))
{
$jid=$_SESSION['id'];
$jobid=$_GET['jobid'];
    
//print $jobid;
$s="select * from apply where job_id='$jobid' and js_id='$jid'";
    $res2=mysqli_query($conn,$s);
    if(mysqli_num_rows($res2)>0){
        print "<h5 align=center>Already registered</h5>";
        header("refresh:1,url='weljs.php'");
    }
else
{
if(isset($_POST['reason']))
{
    $r=$_POST['reason'];
    
    
    $sql="insert into apply(job_id,js_id,reason) values('$jobid','$jid','$r')";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        header("refresh:0,url='success.php'");
        print "success";
    }
    else
        print "error inserting";

}


?>

<html>
    <head>
        <title>Application</title>
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
    </head>
    <body>
        <div class="row">
            <div class="container">
                <br>
                <br>
                <form action="<?php $_PHP_SELF ?>" method="post" name="myform">
                    <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">mode_edit</i>
                      <textarea name="reason" id="icon_prefix2" class="materialize-textarea" required></textarea>
                      <label for="icon_prefix2">Why should you be selected?</label>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Send Application
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    
}
}
else
    print "error. Login properly";
?>