<?php
session_start();
require("connection.php");
if(isset($_SESSION['log']))
{
    $id=$_GET['id'];
    $_SESSION['b1']=$id;
    $regi=1;
?>

<html>
    <head>
        <title>View Applicants</title>
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
                     <li><a href="welemp.php">Go back</a></li>
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="emp_prof.php">Profile</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <br>
                <?php
                    $sql="select * from apply where job_id='$id'";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)==0)
                {
                    ?>
                <h5>There are no applicants at the moment</h5>
                <?php
                }
                else
                {
                ?>
                <h5>The applicants are-</h5>
                <br>
                <?php 
                    $x=1;
                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                    {
                        $regi=1;
                        $jsid=$row['js_id'];
                        $s="select * from js where id='$jsid'";
                        $res2=mysqli_query($conn,$s);
                        $row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
                        $sq="select * from jsdetail where id='$jsid'";
                        $res3=mysqli_query($conn,$sq);
                        $row3=mysqli_fetch_array($res3,MYSQLI_ASSOC);
                        if(mysqli_num_rows($res3)==0)
                        {
                            $regi=0;
                        }
                        
                    ?>
                <div class="row">
                    <h6><b>Application <?php print $x;$x++; ?></b></h6><br>
                    <div class="row">
                        <?php
                        if($regi==1)
                        {
                            ?>
                        <div class="col s12 m4">
                            <img class="materialboxed" width="200" src="<?php print $row3['image']; ?>" alt="No image set by applicant">
                        </div>
                        <?php
                        }
                        else
                        {
                            ?>
                        <div class="col s12 m4"><p>User has not uploaded an image</p></div>
                        <?php
                        }
                        ?>
                        <div class="col s12 m8">
                            <p><b>Name:</b> <?php print $row2['fname']." ".$row2['lname']; ?></p>
                            <p><b>Skills: </b><?php print $row3['skills']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <h6><b>Reason for getting hired: </b><?php print $row['reason']; ?></h6>
                    </div>
                    <a href="viewprofile.php?id=<?php print $jsid ?>" class="btn waves-effect waves-light">Profile</a>
                    <br>
                </div>
                <hr>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
<?php
}
else
    print "error";
?>