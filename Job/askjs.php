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
       $collg=$_POST['collg'];
       $dob=$_POST['date'];
       $sk=$_POST['skills'];
       $add=$_POST['address'];
       $interest=$_POST['interest'];
       
       $_SESSION['interest']=$interest;
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
          //echo $ph;
          $sql="insert into jsdetail(skills,id,college,experience,phone,address,dob,image,interest) values('$sk','$id','$collg','$exp','$ph','$add','$dob','$im','$interest')";
          $res=mysqli_query($conn,$sql);
          if($res)
              print "success";
          $sql="update js set count=1 where id='$id'";
          $res=mysqli_query($conn,$sql);
          $_SESSION['count']=1;
          if($res)
              print "success update count";
      }else{
         print_r($errors);
      }
       header("refresh:0,url='weljs.php'");
   }
?>
<html>
    <head>
        <title>Fill-up</title>
        <link rel="stylesheet" href="./style/style.css" type="text/css">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

      
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
                 
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="signout.php">Logout</a></li>
                     <li><a href="weljs.php">Skip Step</a></li>
                 </ul>
            </div>
        </nav>
       <div class="row">
            <div class="container">
                <br>
                <h5>Welcome, <?php print $fn; ?></h5>
                <h6>Before you can continue, please add additional details so that you can stand out among other applicants</h6>
                <br>
              <form action = "" method = "POST" enctype = "multipart/form-data" name="myform" id="myform">
                  <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">date_range</i>
                        <input id="date" type="text" class="datepicker" name="date" placeholder="Date of Birth">
                    </div>
                  </div>
                  <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone" type="tel" class="validate" name="phone" placeholder="Telephone">
                                </div>
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">add_location</i>
                                    <input id="address" type="tel" class="validate" name="address" placeholder="Address" required>
                                </div>
                    </div>
                  <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">work</i>
                                    <input id="exp" type="tel" class="validate" name="exp" placeholder="Experience" required>
                                </div>
                    </div>
                  <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="icon_prefix2" class="materialize-textarea" name="skills" placeholder="Your skills" required></textarea>
                                </div>
                    </div>
                    <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">school</i>
                                  <textarea id="icon_college" class="materialize-textarea" name="collg" placeholder="College Name" required></textarea>
                                </div>
                    </div>
                  <div class="row">
                    <div class="input-field col s12">
                        <select name="interest">
                            <option value="programming">Programming</option>
                            <option value="teaching">Teaching</option>
                            <option value="web-dev">Web Development</option>
                            <option value="commerce">Commerce</option>
                            <option value="medical">Medical</option>
                        </select>
                      </div>
                  </div>
                  <div class="row">
                        <div class="file-field input-field">
                              <div class="btn">
                                <span>File</span>
                                <input type="file" name="image" required>
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Your Profile picture">
                              </div>
                        </div>
                  </div>
                 <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                        <a class="btn waves-effect waves-light" href="weljs.php">Skip step</a>
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
