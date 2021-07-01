<?php 

include("includes/db.php");

?>
<?php
 
if(isset($_GET['delete_slide'])){


$delete_id = $_GET['delete_slide'];

$delete_slide = "delete from slider where slide_id='$delete_id'";


$run_delete = mysqli_query($con,$delete_slide);

if($run_delete){

echo "<script>alert('One Slide Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_slides','_self')</script>";

}


} 
 
 
 

?>

