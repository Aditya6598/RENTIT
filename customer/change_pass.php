<div class="container col-md-8 bg-light">
    <form class="pt-4" action="confirm.php" method="POST" enctype="multipart/form-data">

    <h1 align="center">Change Password </h1>
        
        <div class="col-md-12">
            <label>Enter Your Current Password</label>

            <input type="text" name="old_pass" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label>Enter Your New Password</label>

            <input type="text" name="new_pass" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label>Enter Your New Password</label>

            <input type="text" name="new_pass" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label>Enter Your New Password Again</label>

            <input type="text" name="new_pass_again" class="form-control mb-4" required>
        </div>
        

        <center>
            <button type="submit" name="submit" class="btn btn btn-outline-warning rounded shadow mb-4">

             Change Password

            </button>
        </center>

        
    </form>   
</div>


<?php

if(isset($_POST['submit'])){

$c_email = $_SESSION['customer_email'];

$old_pass = $_POST['old_pass'];

$new_pass = $_POST['new_pass'];

$new_pass_again = $_POST['new_pass_again'];

$sel_old_pass = "select * from customers where customer_pass='$old_pass'";

$run_old_pass = mysqli_query($con,$sel_old_pass);

$check_old_pass = mysqli_num_rows($run_old_pass);

if($check_old_pass==0){

echo "<script>alert('Your Current Password is not valid try again')</script>";

exit();

}

if($new_pass!=$new_pass_again){

echo "<script>alert('Your New Password dose not match')</script>";

exit();

}

$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";

$run_pass = mysqli_query($con,$update_pass);

if($run_pass){

echo "<script>alert('your Password Has been Changed Successfully')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";


}




}



?>







