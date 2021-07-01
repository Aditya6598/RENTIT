<div>

    <center>
        <h1 class="mb-4">Do You Reaaly Want To Delete Your Account???</h1> 
    
    
    <form action="delete_account.php" method="post" class="">
    <div class="mb-4">
        <input type="submit" class="btn btn-outline-danger mb-4" name="yes" value="Yes, I want to delete">


        <input type="submit" class="btn btn-outline-success mb-4 ml-4 " name="no" value="No, I Don't want to delete">
    </div>
    </form>
    </center>
</div>
















<?php

$c_email = $_SESSION['customer_email'];

if(isset($_POST['yes'])){

$delete_customer = "delete from customers where customer_email='$c_email'";

$run_delete = mysqli_query($con,$delete_customer);

if($run_delete){

session_destroy();

echo "<script>alert('Your Account Has Been Deleted! Good By')</script>";

echo "<script>window.open('../index.php','_self')</script>";

}

}

if(isset($_POST['no'])){

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}


?>