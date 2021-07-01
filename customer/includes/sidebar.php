<div>
<?php

$customer_session = $_SESSION['customer_name'];

$get_customer = "select * from customers where customer_name='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_image = $row_customer['customer_image'];

$customer_name = $row_customer['customer_name'];

if(!isset($_SESSION['customer_name'])){


}
else {

echo "

<center>

<img src='customer_images/$customer_image' class='img-responsive'>

</center>

<br>

<h3 align='center' class='panel-title'> Name : $customer_name </h3>

";

}

?>

<div class="card mb-4" >
  
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group" id=""><center>
       
    <div class="list-group list-unstyled">
      <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">

        <a class="list-group-item list-group-item-action "   href="my_account.php?my_orders"> My Orders </a>

      </li>

      <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">

        <a class="list-group-item list-group-item-action " href="my_account.php?pay_offline"> Pay Offline </a>

      </li>

      <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

        <a class="list-group-item list-group-item-action "  href="my_account.php?edit_account"> <i class="fa fa-pencil"></i> Edit Account </a>

      </li>

      <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

        <a class="list-group-item list-group-item-action "  href="my_account.php?change_pass"> <i class="fa fa-user"></i> Change Password </a>

      </li>

      <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">

        <a class="list-group-item list-group-item-action "  href="my_account.php?delete_account"> <i class="fa fa-trash-o"></i> Delete Account </a>

      </li>

      <li>

        <a class="list-group-item list-group-item-action " href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

      </li>
    </div>
    
  </ul>
  </center>
  
</div>

</div>

   