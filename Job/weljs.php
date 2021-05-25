<?php
session_start();
require("connection.php");
$interest="programming";
if(isset($_SESSION['log']))
{
$name=$_SESSION['fn'];
$temp=1;
$id=$_SESSION['id'];
$co=$_SESSION['count'];
if(isset($_POST['int']))
    {
        $int=$_POST['int'];
        $temp=0;
        $interest=$int;
        $co=1;
    }
if($co==1 && $temp==1){
    $sql="select * from jsdetail where id='$id'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $interest=$row['interest'];
}
?>

<html>
    <head>
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                     <li><a href="profile.php">Profile</a></li>
                 </ul>
                 <ul class="side-nav" id="mobile-demo">
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="profile.php">Profile</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <div class="col s12 m12">
                <br>
                <h5>Welcome <?php print $name ?></h5>
                <br>
                <h5>Search Jobs from other domains</h5>
                <form name="myform" method="post" action="<?php $_PHP_SELF ?>">
                    <br>
                    <select name="int"  onchange="if(this.value !='<?php print $interest ?>' ) { this.form.submit(); }">
                            <option value="programming" <?php if(isset($interest)){ if($interest=="programming"){ ?>selected="selected" <?php } }?> >Programming</option>
                            <option value="teaching" <?php if(isset($interest)){ if($interest=="teaching"){ ?>selected="selected" <?php }} ?> >Teaching</option>
                            <option value="web-dev" <?php if(isset($interest)){ if($interest=="web-dev"){ ?>selected="selected" <?php }} ?> >Web Development</option>
                            <option value="commerce" <?php if(isset($interest)){ if($interest=="commerce"){ ?>selected="selected" <?php }} ?> >Commerce</option>
                            <option value="medical" <?php if(isset($interest)){ if($interest=="medical"){ ?>selected="selected" <?php }} ?> >Medical</option>
                    </select>
                </form>
                </div>
                <br>
                <br>
                <br>
                <div class="col s12 m12">
                    <h6><b>Jobs Available according to your preference-</b></h6>
                <br>
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Domain</th>
                            <th>Salary</th>
                            <th>Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    if($co)
                    {
                        $sql="select * from jobs where interest='$interest'";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                             ?>
                        <tr>
                        <?php
                             print "<td>".$row['name']."</td>";
                             print "<td>".$row['company']."</td>";
                             print "<td>".$row['interest']."</td>";
                             print "<td>".$row['salary']."</td>";
                            $jid=$row['id'];
                             print "<td>"."<a class='btn waves-effect waves-light' href='jobdetails.php?id=$jid'>Details</a>"."</td>";
                            
                            ?>
                        </tr>
                        <?php
                        }
                    }
                    else
                    {
                        $sql="select * from jobs";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                            ?>
                        <tr>
                        <?php
                             print "<td>".$row['name']."</td>";
                             print "<td>".$row['company']."</td>";
                             print "<td>".$row['interest']."</td>";
                             print "<td>".$row['salary']."</td>";
                             $jid=$row['id'];
                             print "<td>"."<a class='btn waves-effect waves-light' href='jobdetails.php?id=$jid'>Details</a>"."</td>";
                            
                            ?>
                        </tr>
                        <?php
                        }
                    }
                ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <script>
         $(document).ready(function() {
    $('select').material_select();
  });
        
        </script>
        <script>
        $(".button-collapse").sideNav();
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