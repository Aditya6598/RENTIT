<?php 

session_start();
include("includes/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['pro_id'])){

    $product_id = $_GET['pro_id'];

    $get_product = "select * from products where product_id='$product_id'";

    $run_product = mysqli_query($con,$get_product);

    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_title = $row_product['product_title'];

    $pro_price = $row_product['product_price'];

    $pro_desc = $row_product['product_desc'];

    $pro_img1 = $row_product['product_img1'];

    $pro_img2 = $row_product['product_img2'];

    $pro_img3 = $row_product['product_img3'];

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($con,$get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];

}


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
        <div class="container-fluid"> 
                             
            <div class="row  ">      
                <!-- Sidebars Start-->          
                <div class="col-2 "> 
                    <?php include("includes/sidebar.php") ;?>
                </div>  
                <!-- Sidebars Ends-->   
                            
                    <div class="col-6 ">                   
                    
                        <div class="card h-75 mb-4 shadow border border-warning">
                            <div id="mycarousel" class="carousel slide" data-ride="carousel" >
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1"></li>
                                    <li data-target="#mycarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner align-content-center">
                                    <div class="carousel-item align-content-md-center active">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" style="height: 350px; width: 100%;" class="img-responsive d-block" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" style="height: 350px; width: 100%;" class="img-responsive d-block " alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" style="height: 350px; width: 100%;" class="img-responsive d-block " alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                    
                            </div>

                            <div class="card-body border-top border-warning">
                                <h3 class="card-title"><?php echo $pro_title;?></h3>
                                <p class="card-text"><?php echo $pro_desc; ?></p>
                                
                            </div>
                            
                        </div>                    
                    </div>

                    <div class="col-4">
                        <div class="card shadow">
                        
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $pro_title;?> </h2>
                                
                                <?php add_cart()?>
                                <form action="details.php?add_cart=<?php echo $product_id;?> " method="POST">
                                    <div class="form-group row ml-5">
                                        <label for="product_qty" class="col-sm-5 col-form-label">Quantity</label>
                                        <div class="col-sm-5">
                                            <select id="product_qty"  name="product_qty" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ml-5">
                                        <label for="product_day" class="col-sm-5 col-form-label">No. of Days</label>
                                        <div class="col-sm-5">
                                            <select id="product_day" name="product_day" class="form-control">
                                            <option selected>Choose...</option>
                                            <?php
                                                for ($i=1; $i<=31; $i++)
                                                {
                                                    ?>
                                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                    <?php
                                                }
                                            ?>

                                        </select>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="price">Rs.<?php echo $pro_price; ?></p>
                                    </div>
                                    

                                    <button type="submit" class="btn btn-outline-success">Add to Cart</button>
                                </form>  
                            </div>
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