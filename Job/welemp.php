<?php

session_start();
require("connection.php");
if(isset($_SESSION['log']))
{
    $id=$_SESSION['id'];
    $fn=$_SESSION['fn'];
    

?>

<html>
    <head>
        <title>Welcome</title>
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
                 <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="emp_prof.php">Profile</a></li>
                 </ul>
                 <ul class="side-nav" id="mobile-demo">
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="emp_prof.php">Profile</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <br>
                <h5>Welcome <?php print $fn; ?></h5>
                <br>
                <a href="addjob.php" class="btn waves-effect waves-light">Add new Job Position</a>
                <br>
                <?php
                
                $sql="select * from jobs where emp_id='$id'";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)==0)
                {
                    ?>
                <br>
                <h6>Please post some job</h6>
                <?php
                }
                else
                {
                    ?>
                <br>
                <table class="responsive-table">
                    <thead>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Domain</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        
                <?php
                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                    {
                        ?>
                        <tr>
                        <?php
                        print "<td>".$row['name']."</td>";
                        print "<td>".$row['salary']."</td>";
                        print "<td>".$row['interest']."</td>";
                        $jobid2=$row['id'];
                        print "<td>"."<a class='btn waves-effect waves-light' href='viewapp.php?id=$jobid2'>View Applicants</a>"."</td>";
                        ?>
                        </tr>
                            <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>
<?php
}
else
    print "error";
?>