<?php 

session_start();
if(!isset($_SESSION['customer_name'])){

    echo "<script>window.open('../checkout.php','_self')</script>";
    
    
    }else {
    
    
    
    
    include("includes/db.php");
    
    include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no">
    <title>My Account | RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
</head>

<body>

    <!-- Top Starts-->
    
    <div class="container-">        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="profile_info">
                <a href="../index.php" class="btn btn-outline-warning">
                    
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
                        <a class="nav-link"  href="../enquiry.php">Enquiry</a>
                    </li>
                    <li>
                        <a class="nav-link" href="../customer/my_account.php">My Account</a>
                    </li>
                    <li>
                        <a class="nav-link" href="../cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <?php

                            if(!isset($_SESSION['customer_name'])){

                                echo "<a  class='nav-link' href='../checkout.php'> Login </a>";

                            }else {

                                echo "<a class='nav-link'href='../logout.php'> Logout </a>";

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
            <ul class="nav navbar-custom justify-content-center nav-tabs bg-light" >
                <li>
                    <a class="nav-link" href="../index.php">Home </a>
                </li>
                <li>
                    <a class="nav-link" href="../shop.php">Shop</a>
                </li>
                <li>
                    <a class="nav-link" href="../furniture.php">Furniture</a>
                </li>
                <li>
                    <a class="nav-link" href="../officeapp.php">Office </a>
                </li>
            </ul>
        </nav>
               
        <br>
        <!--TOP ENDS-->
        <div class="container-md"> 
            <div class="row">
                <div class="col-md-3">

                    <?php
                        include ("includes/sidebar.php")
                    ?>    
                </div> 

                
                <div class="col-md-9"> 
                    <div class="bg-light">
                        <?php 
                            if (isset($_GET['my_orders'])){
                                include("my_orders.php");
                            }

                            if (isset($_GET['pay_offline'])){
                                include("pay_offline.php");
                            }
                          
                            
                                
                            if(isset($_GET['edit_account'])) {
                                
                                include("edit_account.php");
                                
                            }
                                
                            if(isset($_GET['change_pass'])){
                                
                                include("change_pass.php");
                                
                            }
                                
                            if(isset($_GET['delete_account'])){
                                
                                include("delete_account.php");
                                
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start of Footer -->
        <?php
            include ("includes/footer.php")
        ?>
        <!-- End of Footer -->
    </div>

    <!--END OF CONTAINER-->

    
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>

</html>

<?php } ?>