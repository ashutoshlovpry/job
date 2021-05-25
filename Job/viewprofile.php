<?php
    session_start();
require("connection.php");

if(!isset($_SESSION['log']))
{
    print("error");
}
else
{
    $regi=1;
    $id=$_GET['id'];
    $sql="select * from jsdetail where id='$id'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $img=$row['image'];
    $sk=$row['skills'];
    $interest=$row['interest'];
    $collg=$row['college'];
    $exp=$row['experience'];
    $img=$row['image'];
    $dob=$row['dob'];
    $add=$row['address'];
    $ph=$row['phone'];
    if(mysqli_num_rows($res)==0)
    {
        $regi=0;
    }
    $sql="select * from js where id='$id'";
    $res=mysqli_query($conn,$sql);
    $row2=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $fname=$row2['fname'];
    $lname=$row2['lname'];
    $email=$row2['email'];
?>
<html>
    <head>
        <title>Profile</title>
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
        <nav>
             <div class="nav-wrapper">
                 <!-- <a href="#" class="brand-logo">> SeekJob</a> -->
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="viewapp.php?id=<?php print $_SESSION['b1']; ?>">Go back</a></li>
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="emp_prof.php">Profile</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <br>
                <h5>Applicant profile:- </h5>
                <br>
                <div class="row">
                    <div class="col s12">
                        <h6><b>Profile picture</b></h6>
                        <br>
                        <?php if($regi==1){ ?>
                        <img class="materialboxed" width="400" src="<?php print $img ?>">
                        <?php
                                          }
                        else
                        {
                        ?>
                        <p>No profile picture uploaded by applicant</p>
                        <?php
                        }
                        ?>
                        <br>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Name</b></h6>
                        <p><?php print $fname." ".$lname ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Email Address</b></h6>
                        <p><?php print $email ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Date of Birth</b></h6>
                        <p><?php print $dob ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Phone number</b></h6>
                        <p><?php print $ph ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h6><b>Address</b></h6>
                        <p><?php print $add ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Experience</b></h6>
                        <p><?php print $exp ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Skills</b></h6>
                        <p><?php print $sk ?></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    
}
?>