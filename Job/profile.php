<?php

session_start();
require("connection.php");
if(isset($_SESSION['log']))
{
if($_SESSION['count']==0)
    header("refresh:0,url='askjs.php'");
else
    {
$id=$_SESSION['id'];
    $regi=1;
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
          $sql="update jsdetail set skills='$sk',interest='$interest',college='$collg',address='$add',dob='$dob',phone='$ph',experience='$exp',image='$im' where id='$id'";
          $res=mysqli_query($conn,$sql);
          $sql="update js set count=1 where id='$id'";
          $res=mysqli_query($conn,$sql);
          $_SESSION['count']=1;
      }else{
         print_r($errors);
      }
    header("refresh:0,url='profile.php'");
   }

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
                 <a href="#" class="brand-logo">> SeekJob</a>
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="weljs.php">Go Back</a></li>
                     <li><a href="signout.php">Logout</a></li>
                 </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <br>
                <h5>Your profile:- </h5>
                <br>
                <div class="row">
                    <div class="col s12">
                        <h6><b>Your Profile picture</b></h6>
                        <br>
                        <img class="materialboxed" width="400" src="<?php print $img ?>">
                        <br>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Your Domain Interest</b></h6>
                        <p><?php print $interest ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Your College</b></h6>
                        <p><?php print $collg ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Your Date of Birth</b></h6>
                        <p><?php print $dob ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Your Phone number</b></h6>
                        <p><?php print $ph ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h6><b>Your address</b></h6>
                        <p><?php print $add ?></p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6><b>Your Experience</b></h6>
                        <p><?php print $exp ?></p>
                        <br>
                    </div>
                    <div class="col s6">
                        <h6><b>Your Skills</b></h6>
                        <p><?php print $sk ?></p>
                        <br>
                    </div>
                </div>
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Edit Details 
                <i class="material-icons">edit</i>
                </a>

                  <!-- Modal Structure -->
                  <div id="modal1" class="modal modal-fixed-footer">
                      <form action = "" method = "POST" enctype = "multipart/form-data" name="myform" id="myform">
                          <div class="modal-content">
                              <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">date_range</i>
                        <input id="date" type="text" class="datepicker" name="date" placeholder="Date of Birth" required>
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
                                    <input id="icon_telephone" type="tel" class="validate" name="address" placeholder="Address" required>
                                </div>
                    </div>
                  <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">work</i>
                                    <input id="icon_telephone" type="tel" class="validate" name="exp" placeholder="Experience" required>
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
                          </div>
                          <div class="modal-footer">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                          </div>
                      </form>
                  </div>
            </div>
        </div>
        <script src="javascript/jscheck.js"></script>
        <script>
            $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
        </script>
        <script>
         $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
        </script>
        <script>
         $(document).ready(function() {
    $('select').material_select();
  });
        </script>
        
    </body>
</html>
<?php
}
}
else
    print "error";
?>