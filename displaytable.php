<?php
include 'connect.php';

    // <?php
    
    if(isset($_POST['displaySend']))
    {
        // echo "hello";
        $table='<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Password</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>';
    
          $sql="SELECT *FROM `crud`";
          $result= mysqli_query($con,$sql);
        //   if($result)
        //   {
          $number=1;
              while($row= mysqli_fetch_assoc($result))
              {
                  $id=$row['id'];
                  $name=$row['name'];
                  $email=$row['email'];
                  $mobile=$row['mobile'];
                  $password=$row['password'];
                  $table.=' <tr>
                  <td scope="row">'.$number.'</td>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$mobile.'</td>
                  <td>'.$password.'</td>
                  <td><button  class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#update_user_modal" onclick="GetDetails('.$id.')">Update</button>
                  <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button></td>
                </tr>';
                $number++;
              }
              $table.='</table>';
      echo $table;
          }
          
         
       
    ?>



   