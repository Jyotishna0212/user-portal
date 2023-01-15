<?php
include "connect.php";
extract($_POST);

// if($_SERVER['REQUEST_METHOD'] == 'POST')
if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['mobile'])
 && isset($_POST['password']))
{

    // $lname=$_POST['name'];
    // $lemail=$_POST['email'];
    // $lmobile=$_POST['mobile'];
    // $lpassword=$_POST['password'];

    // echo "Name:".$name ;
    // echo $email;
    // echo $mobile;
    // echo $password;


    $sql ="INSERT INTO `crud` (name,email,mobile,password) VALUES ('$name', '$email','$mobile','$password')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "Data inserted successfully";
        // header('location:display.php');

    }
   
}
?>