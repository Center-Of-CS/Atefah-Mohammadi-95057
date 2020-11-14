

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
        $title = "singnup";
        include_once("title.php");
        include('head.php');
        
        include('navbar.php');;
      ?>
  <style>
      form{
        width:600px;
        margin:auto;
      }
      label{
        color: white;
      }

      .form-control{
        background-color: white;
      }
  </style>
</head>
<?php


  include("lib/crud.php");

  $db = new CRUD();

  $firstName = $lastName = $_username = $password = $email = $gender  = $dateOfBirth = $year ="";

  $firstNameErr = $lastNameErr = $userNameErr = $passwordErr = $emailErr = $gender =$genderErr  = $dateOfBirthErr = $yearErr ="";
                                 
                      
  if(isset($_POST['submit'])){

    if(empty($_POST['firstName'])){
      $firstNameErr = "first name can not be empty";  
    }else{
      $firstName = cleanData($_POST['firstName']);
    }
    if(empty($_POST['lastName'])){
      $lastNameErr = "last name can not be empty";  
    }else{
      $lastName = cleanData($_POST['lastName']);
    }
    if(empty($_POST['_username'])){
      $userNameErr = "";  
    }else{
      $_username = cleanData($_POST['_username']);
    }
    if(empty($_POST['password'])){
      $passwordErr = "";  
    }else{
      $password = cleanData($_POST['password']);
    }
    if(empty($_POST['dateOfBirth'])){
      $dateOfBirthErr = ""; 
    }else{
      $dateOfBirth = cleanData($_POST['dateOfBirth']);
    }
    
    if(empty($_POST['email'])){
      $emailErr = ""; 
    }else{
      $email = cleanData($_POST['email']);
    }
    
    if(empty($_POST['gender'])){
      $genderErr = "";  
    }else{
      $gender = cleanData($_POST['gender']);
    }

    if(1){    
      //test function insert 
      $insert = $db->insert("user","`first_name`, `last_name`, `user_name`, `password`, `email`, `dob`, `gender`, `year`","'$firstName', '$lastName','$_username', '$password', '$email','$dateOfBirth', '$gender' ,'$year'");

            header("location:signup.php?save=1");
      
    }else{
    
    echo "Failed";
    }
  }

  function cleanData($data){
   $data = trim($data);
   $data = htmlSpecialChars($data);
   $data = stripslashes($data);

   return $data;
   }

    if(isset($_GET['save1'])){
    
    echo "<h1 class='' style='color:green;font-size:20px;'> Successfully Saved Data To Database;</h1>";
    
    }if(isset($_GET['save'])){
    
    echo "<h1 class='' style='color:green;font-size:20px;'> Successfully File uploaded</h1>";
    
    }
  
  ?>

<body>


  <br><br> <br><br>   <br>                                    
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="add_user" id="add_user" >
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">First Name *</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="firstName" id="firstName" value="<?php echo $firstName;?>" placeholder="Ahmad" class="form-control" />
              <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $firstNameErr?></label>

            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Last Name *</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="lastName" id="lastName" value="<?php echo $lastName;?>" placeholder="Ahamdi" class="form-control" />
                <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $lastNameErr?></label>

            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Username *</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="_username" id="username" value="<?php echo $_username;?>" placeholder="ahmad123" class="form-control" />
              <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $userNameErr?></label>

            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Email</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="ahmad@gmail.com" class="form-control" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Password *</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="password" name="password" value="<?php echo $password;?>" class="form-control" />
                  <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $passwordErr?></label>

            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Date Of Birth </label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="date" value="<?php echo $dateOfBirth;?>" name="dateOfBirth" id="dateOfBirth" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="form-group-inner">
        <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Gender *</span></label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" <?php if(isset($_POST['gender']) && $gender=="female"){echo  "checked";}?> value="female" id="fmale" name="gender">
                  <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $genderErr?></label>Fmale
              </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                   <input type="radio" class="form-check-input" <?php if(isset($_POST['gender']) && $gender=="male"){echo  "checked";}?>  value="male" id="male" name="gender">Male
              </label>
            </div>
        
        </div>
     </div>
     <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Year</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="number" value="<?php echo $year;?>" name="year" id="year" class="form-control" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="login-btn-inner">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                        <button class="btn btn-white" type="submit">Cancel</button>
                        <button class="btn btn-sm btn-primary login-submit-cs" name="submit" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
      
</body>

</html>