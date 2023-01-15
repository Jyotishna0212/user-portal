<?php
include 'connect.php';

if(isset($_GET['deletesend']))
{
    
    $unique=$_POST['deletesend'];
    // echo $id;
    $sql="DELETE *FROM `crud` WHERE id=$unique";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Deleted successfull";
        // after the user is delted then redirected to the display .php page where all the users in the table
        // header('location:display.php');

    }
    else {
        die(mysqli_error($con));
    }
}
?>