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
    <title>Shop | RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
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
                        <a class="btn btn-outline-success navbar-btn right ml-2" href="cart.php"> 
                            <span> <?php items(); ?> items in cart </span>
                        </a>
                    </li>
                </ul> 
            </div>
        </nav>

        
               
        <br>
        <!--TOP ENDS-->
        <div class="container-"> 
                             
            <div class="row">      
                <!-- Sidebars Start-->          
                <div class="col-md-2"> 
                    <?php include("includes/sidebar.php") ;?>
                </div>  
                <!-- Sidebars Ends-->             
                            
                <div class="col-md-10 ">                    
                    <div class="col-md-12">   
                        <?php

                        if(!isset($_GET['p_cat'])){
                        
                            if(!isset($_GET['cat'])){
                            
                                echo "
                                
                                <div class='card col-md-12 mb-4 shadow border-info'>
                                
                                    <h1>Shop</h1>
                                    
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using '</p>
                                
                                </div>
                                
                                ";
                                
                                }
                            
                            }
                        
                        ?>
                    </div>
                    
                    <div class="row col-md-12" >                        
                        <?php                       

                            if(!isset($_GET['p_cat'])) {

                                if(!isset($_GET['cat'])){


                                    $per_page=8;

                                    if(isset($_GET['page'])){

                                    $page = $_GET['page'];

                                    }else {

                                    $page=1;

                                    }

                                    $start_from = ($page-1) * $per_page ;

                                    $get_products = "select * from products order by 1 DESC LIMIT  $start_from,$per_page";

                                    $run_products = mysqli_query($con,$get_products);

                                    while($row_products=mysqli_fetch_array($run_products)){

                                    $pro_id = $row_products['product_id'];

                                    $pro_title = $row_products['product_title'];

                                    $pro_price = $row_products['product_price'];

                                    $pro_img1 = $row_products['product_img1'];

                                    echo "                          

                                    <div class='col-md-3' style=';'>
                                        
                                            <div class='card-deck  ' >
                        
                                                <div class='card mb-4 border-info' style='height:450px; width: 350px' >
                                                    <a href= 'details.php?pro_id = $pro_id'>
                                                        <img style='height:250px;' src='admin_area/product_images/$pro_img1' class='card-img-top img-thumbnail'>
                                                    </a>
                        
                                                    <div class='card-body '>
                                                        <h3 class='card-title'><a href='details.php?pro_id = $pro_id'>$pro_title</a></h3>
                        
                                                        <p class='price'>Rs. $pro_price</p>
                                                        <p class='buttons'>
                                                        
                                                        <center>
                                                            <div class='row '>
                                                            
                                                                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-info btn-sm ml-3'>View Details</a>
                                                                    &nbsp &nbsp &nbsp &nbsp
                                                                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-success btn-sm'>Add to Cart</a>
                                                            
                                                            </div>
                                                        </center>
                                                        
                                                        </p>
                                                    </div>                        
                                                </div>                    
                                            </div>                   
                                        
                                    </div>                
                                    ";
                                }

                        ?> 
                        
                    </div> 
                     
                </div>                
            </div>
            <!-- Pagination Starts-->
            <nav  aria-label="Page navigation example ">
                <ul class="pagination justify-content-center pt-4">
                    <?php

                        $query = "select * from products";

                        $result = mysqli_query($con,$query);

                        $total_records = mysqli_num_rows($result);

                        $total_pages = ceil($total_records / $per_page);
                        
                        echo "
                        
                            <li class='page-item'><a class='page-link' href='shop.php?page=1' >".'First Page'."</a></li>

                            ";

                            for ($i=1; $i<=$total_pages; $i++){

                                echo "

                                <li class='page-item'><a a class='page-link' href='shop.php?page=".$i."' >".$i."</a></li>

                                ";
                                
                            };

                            echo "

                            <li class='page-item'><a class='page-link' href='shop.php?page=$total_pages' >".'Last Page'."</a></li>

                            ";                      




                            }
                        }
                    ?>
                </ul>
            </nav>
            <!-- Pagination ENDS-->
            <?php

                getpcatpro();

                getcatpro();

            ?>               
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