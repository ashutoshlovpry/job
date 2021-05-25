<?php
session_start();
require("connection.php");
if(isset($_SESSION['log']))
{
$co=0;
 $fn=$_SESSION['fn'];
$id=$_SESSION['id'];
   if(isset($_FILES['image'])){
       
    
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
       
       
       $exp=$_POST['exp'];
       $ph=$_POST['phone'];
       $add=$_POST['address'];
       $company=$_POST['company'];
       
    //  $file_ext=strtolower(end(explode('.',$file_name)));
      //$x=$_POST['nam'];
       //print("<br><h1>".$x."</h1><br>");
      //$expensions= array("jpeg","jpg","png");
      
      //if(in_array($file_ext,$expensions)=== false){
        // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      //}
      
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }
      
       
       
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
          $co=1;
          $im='images/'.$file_name;
          $sql="insert into empdetail(id,experience,phone,address,company,comp_image) values('$id','$exp','$ph','$add','$company','$im')";
          $res=mysqli_query($conn,$sql);
          if($res)
              print "success";
          else
              print "error";
          $sql="update js set count=1 where id='$id'";
          $res=mysqli_query($conn,$sql);
          $_SESSION['count']=1;
          if($res)
              print "success update count";
          header("refresh:0,url='welemp.php'");
      }else{
         print_r($errors);
      }
   }
?>
<html>
    <head>
        <title>Fill-up</title>
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
                     <li><a href="signout.php">Logout</a></li>
                 </ul>
            </div>
        </nav>
       <div class="row">
            <div class="container">
                <br>
                <h5>Welcome, <?php print $fn; ?></h5>
                <h6>Before you can continue, please add additional details. This is a necessary step</h6>
                <br>
              <form action = "" method = "POST" enctype = "multipart/form-data" name="myform" id="myform">
                  <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">work</i>
                                    <input id="company" type="text" class="validate" name="company" placeholder="Name of Company" required>
                                </div>
                    </div>  
                  <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone" type="tel" class="validate" name="phone" placeholder="Telephone" required>
                                </div>
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">add_location</i>
                                    <input id="address" type="text" class="validate" name="address" placeholder="Address of Company" required>
                                </div>
                    </div>
                  <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="exp" class="materialize-textarea" name="exp" placeholder="Your Experience" required></textarea>
                                </div>
                    </div>
                  <div class="row">
                        <div class="file-field input-field">
                              <div class="btn">
                                <span>File</span>
                                <input type="file" name="image" required>
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Company Logo">
                              </div>
                        </div>
                  </div>
                 <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                 <ul>
                    <li>Sent file: <?php if($co==1) echo $_FILES['image']['name'];  ?>
                    <li>File size: <?php if($co==1) echo $_FILES['image']['size'];  ?>
                    <li>File type: <?php if($co==1) echo $_FILES['image']['type']; ?>
                 </ul>

              </form>
           </div>
       </div>
       <script src="javascript/jscheck.js"></script>
       <script>
        
  $(document).ready(function() {
    $('select').material_select();
  });
       </script>
   </body>
</html>
<?php
}
else
    print "error";
?>