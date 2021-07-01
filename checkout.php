<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no">
    <title>HOME | RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
</head>

<body>
<div class="container-">        
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

        <nav class="container-">
            <ul class="nav navbar-custom justify-content-center nav-tabs bg-light mb-4 shadow" >
                <li>
                    <a class="nav-link"  href="index.php">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li>
                    <a class="nav-link" href="cart.php">Go to Cart</a>
                </li>
                <li>
                    
                    </a>
                </li>
                
                
            </ul>
        </nav>
        
        <section class="presentation">


        <div class="container-fluid">

            <div class="row ">

                <div class="col-md-2">
                <?php include("includes/sidebar.php"); ?>
                </div>

                <div class="col-md-9 pt-4 mt-4 b-4">
                    <?php

                        if(!isset($_SESSION['customer_name'])){

                        include("customer/customer_login.php");

                        }else{

                        include("payment_options.php");
                        }
                    ?>
                </div>

            </div>
        
        </div>
        
        
        </section>
        
        <br>
        <!--TOP ENDS-->

        <!--Carousel Starts-->
        
        <!-- PRODUCTS CARD ENDS -->

        <!-- Start of Footer -->
        <?php
            include ("includes/footer.php")
            ?>
        <!-- End of Footer -->
    </div>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>