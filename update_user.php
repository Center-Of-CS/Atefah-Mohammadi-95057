<!doctype html>
<?php  
    include("lib/crud.php");
    $db = new CRUD();
    $firstName = $lastName = $_username = $password = $email = $gender = $description = $phone = $dateOfBirth ="";

    $fileErr =$firstNameErr = $lastNameErr = $userNameErr = $passwordErr = $emailErr = $genderErr = $descriptionErr = $phoneErr = $dateOfBirthErr ="";
                                                 
        $id = (int) $_GET['updateID'];
        
        $result = $db->select_one("user","id='$id'");
        
        $first_name = $result["first_name"];
        $last_name = $result["last_name"];
        $gender = $result["gender"];  
    ?>
 ?>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        $title = "singnup";
        include_once("title.php");
        include('head.php');
        include('navbar.php');;
      ?>
    <style>
      form{
        width:500px;
        margin:auto;
      }
     label{
        color: white;
     }
     
  </style>

<?php
                                
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
    
    if(empty($_POST['gender'])){
        $genderErr = "";    
    }else{
        $gender = cleanData($_POST['gender']);
    }
    
    if(empty($firstNameErr) && empty($lastNameErr) &&  empty($genderErr)){
        //function update 
        $data = sprintf("first_name='%s',last_name='%s',gender='%s'",
        mysqli_real_escape_string($GLOBALS["DB"],$firstName),
        mysqli_real_escape_string($GLOBALS["DB"],$lastName),
        mysqli_real_escape_string($GLOBALS["DB"],$gender));
    
        $update = $db->update("user",$data,"id='$id'");

        if($update){
            header("location:table_user.php?save=1");
        }else{
            echo "Failed update";    
            }
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

?>
</head>
<body>
<br><br><br><br><br>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="add_user" id="add_user" >
        <div class="form-group-inner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="login2 pull-right pull-right-pro">First Name *</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="firstName" id="firstName" value="<?php echo $first_name;?>" placeholder="Ahmad" class="form-control" />
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
                    <input type="text" name="lastName" id="lastName" value="<?php echo $last_name;?>" placeholder="Ahamdi" class="form-control" />
                    <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $lastNameErr?></label>
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
                      <input type="checkbox" class="form-check-input" <?php if(isset($_POST['gender']) && $gender=="female"){echo  "checked";}?> value="female" id="fmale" name="gender">
                      <label class="login2 pull-right pull-right-pro" style="color:red;"><?php echo $genderErr?></label>Fmale
                  </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                       <input type="checkbox" class="form-check-input" <?php if(isset($_POST['gender']) && $gender=="male"){echo  "checked";}?>  value="male" id="male" name="gender">Male
                  </label>
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