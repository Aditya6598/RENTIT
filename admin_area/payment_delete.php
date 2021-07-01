<?php 

include("includes/db.php");

?>


<?php

if(isset($_GET['payment_delete'])){

$delete_id = $_GET['payment_delete'];

$delete_payment = "delete from payments where payment_id='$delete_id'";


$run_delete = mysqli_query($con,$delete_payment);


if($run_delete){

echo "<script>alert('Payment Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_payments','_self')</script>";
}
}



?>


