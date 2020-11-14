<?php
include("lib/crud.php");
$db = new CRUD();
// test select function 
$list_of_users = "";
//update user
$sql = "select * from user";
$rows = $db->select_raw($sql);

foreach($rows as $re){

$id = $re["id"];
$first_name = $re["first_name"];
$last_name = $re["last_name"];
$email = $re["email"];
$gender = $re["gender"];

$list_of_users .="
    <tr>
        <td>$id</td>
        <td>$first_name</td>
        <td>$last_name</td>
        <td>$email</td>
        <td>$gender</td>
        <td>
            <a href='table_user.php?deleteID=$id'>Delete</a>
            <a href='update_user.php?updateID=$id'>Update</a>
        
        </td>
        
    </tr>";
}

if(isset($_GET['deleteID'])){
    $id = (int) $_GET['deleteID'];
    $de = $db->delete("user","id='$id'");

    if($de){
        header("location:table_user.php?deleted=1");

    }
}

?>
<!DOCTYPE html>
<html lang="en">
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
      table,td,th{
        width:1000px;
        margin:auto;
        border: 2px solid black;
        background: white;
      }
      td,th{
        text-align: center;
      }
      form{
        width: 500px;
        margin: auto;
      }
      img{
        width: 50px 50px;
      }
      label{
        color: white;
        font-weight: bold;
      }
  </style>

</head>

<body>
<br><br><br><br><br> 

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>gender</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        echo $list_of_users;
        ?>
    </tbody>
</table>
                            

</body>

</html>