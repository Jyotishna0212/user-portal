<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>

      $(document).ready(function(){
        displayData();
      });
function displayData()
    {
        var displayData="true";
        console.log(displayData);
        $.ajax({
            url:"displaytable.php",
    type:'post',
    data:{
       displaySend:displayData,
        },
        success:function(data,status)
        {
            $('#displayDataTable').html(data);
            console.log(status)
        }
    });
    // console.log("hello");
}

// get and update

function GetDetails(id)
    {
// console.log("yes",id)
      $('#id').val(id);
      // console.log( $('#id').val(id));
      $.ajax({
            url:"getid.php",
    type:'POST',
    data:{
       id:id,
        },
        datatype:"json",
        success:function(data,status)
        {

          // let getdata =data;
// console.log(getdata);
        var  userid=JSON.parse(data);
        // console.log(userid);
        $('#updatename').val(userid.name);
        $('#updatemobile').val(userid.mobile)
        $('#updateemail').val(userid.email)
        $('#updatepassword').val(userid.password)
// console.log(userid.name);1
// console.log(userid.id);
  
            
        }
    });
    $('#update_user_modal').modal("show");

      

    }
  
    

function UpdateUserDetails() {
    // get values
    var id = $("#id").val();
    var name = $("#updatename").val();
    var email = $("#updateemail").val();
    var mobile = $("#updatemobile").val();
    var password = $("#updatepassword").val();


    // get hidden field value

    // Update the details by requesting to the server using ajax
    $.ajax( {
      url:"update.php",
      type:'post',
      data:{
        id: id,
        name:name,
            email: email,
            mobile: mobile,
            password: password
      },
            
        
        success:function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            displayData();
        }
      });
}

function DeleteUser(id)

    {
      console.log(id)

        $.ajax({
            url:"delete.php",
    type:'post',
    data:{
       deletesend:id,
        },
        success:function(data,status)
        {
            // $('#displayDataTable').html(data);
            // console.log(data)
            displayData();
            // console.log(status);
            
        }
    });
    
}

    function adduser( )
    {
        var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var password = $("#password").val();
$.ajax({
    url:"action.php",
    type:'post',
    data:{
        name:name,
            email: email,
            mobile: mobile,
            password: password
    },
    success:function(data,status)
    {
        // function to display data;
        displayData();
        console.log(status);
    }
});
    }
    // update function
    

</script>

    <title>Table</title>
</head>
<body>
    <!-- --- -->
    <div class="container">
   

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
<div class="form-group">
<label class="form-label">Name</label>
<input type="text" class="form-control" placeholder="Enter your name " id ="name" >

</div>
<div class="form-group mb-3">
<label class="form-label">Email</label>
<input type="email" class="form-control" placeholder="Enter your email" id="email"    >

</div>
<div class="form-group mb-3">
<label class="form-label">Mobile</label>
<input type="number" class="form-control" placeholder="Enter your mobile number" id="mobile"  >

</div>
<div class="form-group mb-3">
<label class="form-label">Password</label>
<input type="password" class="form-control" placeholder="Enter your password" id="password" autocomplete="off" >

</div>

</div>
<div class="modal-footer">
    <button type="submit" name ="submit"class="btn btn-dark" onclick="adduser()" >submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<div class="container my-5">
<h1> USER PORTAL</h1>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add new user
</button>
<!-- displayData -->


<!-- update modal -->

<div class="modal fade" id="update_user_modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form> 


<div class="mb-3">
<input type="text" class="form-control" id="id"  >

</div>
<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" class="form-control" placeholder="Enter your name " id ="updatename"  >

</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" class="form-control" placeholder="Enter your email" id="updateemail"   >

</div>
<div class="mb-3">
<label class="form-label">Mobile</label>
<input type="number" class="form-control" placeholder="Enter your mobile number" id="updatemobile"  >

</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" class="form-control" placeholder="Enter your password" id="updatepassword" autocomplete="off" >

</div>
<button type="submit" name ="submit"class="btn btn-dark" onclick="UpdateUserDetails()">Update</button>
<!-- <button type="submit" name ="submit"class="btn btn-dark" onclick="adduser()" >submit</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
</form>
    </div>
  </div>
</div>
</div>

</div>
        <!-- modole -->
<!-- <div class="container"> -->
<div id="displayDataTable"></div>




    </div>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

</body>
</html>