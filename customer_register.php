<?php 

session_start();
include("includes/db.php");

include("functions/functions.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no">
    <title> Office | RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="profile_info">
                <a href="index.php" class="btn btn-outline-warning">
                    
                    <?php

                        if(!isset($_SESSION['customer_name'])){

                            echo "Welcome :Guest";


                        }
                        else{

                            echo "Welcome : " . $_SESSION['customer_name'] . "";
                        }
                    ?>
                </a>
            </div>        
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        
                <ul class="navbar-nav ml-auto ">
                    <li>
                        <a class="nav-link"  href="enquiry.php">Enquiry</a>
                    </li>
                    <li>
                        <a class="nav-link" href="customer/my_account.php">My Account</a>
                    </li>
                    
                    
                    <li>
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <?php

                            if(!isset($_SESSION['customer_name'])){

                                echo "<a  class='nav-link' href='checkout.php'> Login </a>";

                            }else {

                                echo "<a class='nav-link'href='logout.php'> Logout </a>";

                            }
                        ?>
                    </li>
                    <li>
                        <a class="btn btn-outline-success navbar-btn right ml-2" href="cart.php"> 
                            <span> <?php items(); ?> items in cart </span>
                        </a>
                    </li>
                </ul> 
            </div>
        </nav>

  <section class="register">
    
    <div class="jumbotron jumbotron shadow rounded" style="height: 5px;">
      <div class="container-sm">         
        <div class="row ">
        
          <div class="col">
            <h1 class="display text-xl-left"> <strong> Register</strong> </h1>
          </div>
          
        </div>
      </div>

     
    </div>

    <div class="container-sm">
      <form action="customer_register.php" method="POST">
        <div class="row">
          <div class="form-group col">
            <label>Customer Name</label>

            <input type="text" class="form-control" name="c_name" required>

          </div><!-- form-group Ends -->

          <div class="form-group col"><!-- form-group Starts -->

            <label> Customer Email</label>

            <input type="text" class="form-control" name="c_email" required>

          </div><!-- form-group Ends -->

          <div class="form-group col"><!-- form-group Starts -->

            <label> Customer Password </label>

            <input type="password" class="form-control" name="c_pass" required>

          </div><!-- form-group Ends -->
        </div>
        

        <div class="row">
          <div class="form-group col"><!-- form-group Starts -->

            <label> Customer Country </label>

            <input type="text" class="form-control" name="c_country" required>

          </div><!-- form-group Ends -->

          <div class="form-group col"><!-- form-group Starts -->

            <label> Customer City </label>

            <input type="text" class="form-control" name="c_city" required>

          </div><!-- form-group Ends -->
        </div>          

        <div class="form-group"><!-- form-group Starts -->

          <label> Customer Address </label>

          <textarea type="text" class="form-control" name="c_address" required></textarea>

        </div><!-- form-group Ends -->

        <div class="row">
          <div class="form-group col"><!-- form-group Starts -->

              <label> Customer Contact </label>

              <input type="text" class="form-control" name="c_contact" required>

            </div><!-- form-group Ends -->

          <div class="form-group col"><!-- form-group Starts -->

            <label> Customer Image </label>

            <input type="file" class="form-control" name="c_image" >

          </div><!-- form-group Ends -->

        </div>
        <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="register" class="btn btn-outline-success shadow mb-4">

        Register

        </button>

        </div>

      </form>
           
    </div>

  </section> 

    <!--END OF CONTAINER-->

    
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>

</html>

<?php

if(isset($_POST['register'])){

$c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_country = $_POST['c_country'];

$c_city = $_POST['c_city'];

$c_contact = $_POST['c_contact'];

$c_address = $_POST['c_address'];

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

$c_ip = getRealUserIp(); 

move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_counv try,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";


$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_name']=$c_name;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}else{

$_SESSION['customer_name']=$c_name;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('index.php','_self')</script>";

}
}

?>