
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
    <title>HOME | RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>

<body>

    <!-- Top Starts-->
    
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
                        <a class="btn btn-outline-success navbar-btn right ml-2 mr-2 mb-1" href="cart.php"> 
                            <span> <?php items(); ?> items in cart </span>
                        </a>
                    </li>
                    <li>
                    
                        <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->

                            <button class="btn navbar-btn btn-outline-secondary ml-2 mb-2" type="button" data-toggle="collapse" data-target="#search">
                            <i class="bi bi-search"></i>
                             Search

                            <span class="sr-only">Toggle Search</span>

                            

                            </button>

                            </div><!-- navbar-collapse collapse right Ends -->

                            <div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->

                            <form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->

                            <div class="input-group"><!-- input-group Starts -->

                            <input class="form-control ml-2" type="text" placeholder="Search Company Name" name="user_query" required>

                            <span class="input-group-sm "><!-- input-group-btn Starts -->

                            <button type="submit" value="Search" name="search" class="btn btn-primary">

                            <i class="bi bi-search"></i>

                            </button>

                            </span><!-- input-group-btn Ends -->

                            </div><!-- input-group Ends -->

                            </form><!-- navbar-form Ends -->

                            </div><!-- collapse clearfix Ends -->

                        </div>
                    
                    </li>
                </ul> 
            </div>
        </nav>

        <nav class="container-">
            <ul class="nav navbar-custom justify-content-center nav-tabs bg-light" >
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
        
        
        <br>
        <!--TOP ENDS-->

        <!--Carousel Starts-->
        <div id="carousel" class="carousel slide shadow" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php 
                    
                    $get_slides = "SELECT * FROM slider LIMIT 0,1";

                    $run_slides = mysqli_query($con,$get_slides);

                    while($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                    
                    echo "
                    <div class='carousel-item active'>
                        <img src='admin_area/slides_images/$slide_image' class='d-block w-100' alt='...'>
                    </div>              
                    
                    ";
                    }                
                ?>
                <?php
                
                    $get_slides = "SELECT * FROM slider LIMIT 1,3";

                    $run_slides = mysqli_query($con,$get_slides);

                    while($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                    
                    echo "
                    <div class='carousel-item '>
                        <img src='admin_area/slides_images/$slide_image' class='d-block w-100' alt='...'>
                    </div>              
                    
                    ";
                    } 
                ?>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

        <br>

        <!--Carousel Ends-->
        <div class="card-body mb-4 shadow border border-" role="">
            <h3>Latest this week! </h3>
        </div>

        <br>

        <!-- PRODUCTS CARD BEGINS -->
        <div class="container-fluid ">              
            <div class="row col-md-12 row-cols-2 row-cols-md-4">
                
                <?php
                
                    getPro();
                
                ?>
                                    
            </div> 
        
        </div>
        <!-- PRODUCTS CARD ENDS -->

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