<?php
session_start();
require("connection.php");

if(isset($_SESSION['log']))
{
    $id=$_SESSION['id'];
    $fn=$_SESSION['fn'];
    if(isset($_POST['name']))
    {
        $nam=$_POST['name'];
        $sal=$_POST['salary'];
        $interest=$_POST['interest'];
        $det=$_POST['details'];
        $sql="select * from empdetail where id='$id'";
        $res=mysqli_query($conn,$sql);
        $row2=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $company=$row2['company'];
        print $company;
        $sql="select * from jobcount";
        $res=mysqli_query($conn,$sql);
        $row2=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $co=$row2['count'];
        $co=$co+1;
        //print $co;
        $sql="insert into jobs(id,name,company,employer,details,interest,emp_id,salary) values('$co','$nam','$company','$fn','$det','$interest','$id','$sal')";
        $res=mysqli_query($conn,$sql);
         $sql="update jobcount set count='$co'";
        mysqli_query($conn,$sql);
        if($res)
//            print "success";
            header("refresh:0,url='welemp.php'");
        else
            print "error";
        
    }

?>

<html>
    <head>
        <title>Add new Job</title>
        <link rel="stylesheet" href="./style/style.css" type="text/css">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <nav>
             <div class="nav-wrapper">
                 <!-- <a href="#" class="brand-logo">> SeekJob</a> -->
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="welemp.php">Go back</a></li>
                     <li><a href="signout.php">Logout</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <br>
                <h5>Add a new job position</h5>
                <br>
                <form action="<?php $_PHP_SELF ?>" method="post" name="myform">
                <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">work</i>
                                    <input id="jname" type="text" class="validate" name="name" placeholder="Job Title">
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_money</i>
                                    <input id="salary" type="text" class="validate" name="salary" placeholder="Salary">
                                </div>        
                </div>
                    <br>
                <div class="row">
                    <div class="input-field col s12">
                        <p><b>Domain</b></p>
                        <select name="interest">
                            <option value="programming">Programming</option>
                            <option value="teaching">Teaching</option>
                            <option value="web-dev">Web Development</option>
                            <option value="commerce">Commerce</option>
                            <option value="medical">Medical</option>
                        </select>
                      </div>
                  </div>
                    <br>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea name="details" id="icon_prefix2" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Details About the job</label>
                    </div>
                </div>
                    <br>
                <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Post Job
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
        
        $(document).ready(function() {
    $('select').material_select();
  });</script>
    </body>
</html>
<?php
}
else
    print "error";
?>
