<?php 

include("includes/db.php");

?>
<?php

if(isset($_GET['customer_delete'])){

$delete_id = $_GET['customer_delete'];

$delete_customer = "delete from customers where customer_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_customer);


if($run_delete){

echo "<script>alert('Customer Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_customers','_self')</script>";


}

}


?>
