<?php
include "connect.php";

if(isset($_POST['id']))
{
$uniqueid=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    echo "Name:".$name ;
     $sql ="UPDATE `crud` SET  name='$name',email='$email', mobile='$mobile', password='$password' WHERE id = $uniqueid";
    // $sql ="UPDATE `crud` SET `id` = '3', `name` = 'jyotishnadf', `email` = 'x@gmaill.com', `mobile` = '3736363848', `password` = 'qazxswedcm' WHERE `crud`.`id` = 1" ;

     $result= mysqli_query($con,$sql);
    if($result)
    {
        echo "updated successfully";
        // header('location:display.php');

    }
    

}

?>
