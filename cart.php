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
    <title>Cart | RENTIT</title>
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
        <div class="row container-"> 

            <div class="col-md-8">
                <div class="card mb-4 ml-4 " >
                    <div class="card-body bg-white shadow ">
                    <form action="cart.php" method="post" enctype="multipart-form-data" >
                        <h2 class="card-title">Shopping Cart</h2>
                        <?php
                            
                            $ip_add = getRealUserIp();

                            $select_cart = "select * from cart where ip_add='$ip_add'";

                            $run_cart = mysqli_query($con,$select_cart);

                            $count = mysqli_num_rows($run_cart);

                        ?>
                        <h6 class="card-subtitle mb-2 text-muted">You currently have <?php echo $count; ?> in your cart </h6>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th colspan="2">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">No. of Days</th>
                                <th scope="col" colspan="1">Delete</th>
                                <th scope="col"colspan="2">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                $total = 0;

                                while($row_cart = mysqli_fetch_array($run_cart)){
 
                                    $pro_id = $row_cart['p_id'];

                                    $pro_day = $row_cart['day'];

                                    $pro_qty = $row_cart['qty'];

                                    $get_products = "select * from products where product_id='$pro_id'";

                                    $run_products = mysqli_query($con,$get_products);

                                    while($row_products = mysqli_fetch_array($run_products)){

                                        $product_title = $row_products['product_title'];

                                        $product_img1 = $row_products['product_img1'];

                                        $only_price = $row_products['product_price'];

                                        $sub_total = $row_products['product_price']*$pro_qty*$pro_day;

                                        $total += $sub_total;

                                ?>
                                <tr>
                                <th scope="row"><img class="img-thumbnail" style='height:130px; width: 130px;' src="admin_area/product_images/<?php echo $product_img1; ?>" ></th>
                                <td>

                                <a href="#" > <?php echo $product_title; ?> </a>

                                </td>

                                <td>
                                <?php echo $pro_qty; ?>
                                </td>

                                <td>

                                  Rs.<?php echo $only_price; ?>.00

                                </td>

                                <td>

                                <?php echo $pro_day; ?>

                                </td>

                                <td>
                                <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" >
                                </td>

                                <td>

                                Rs.<?php echo $sub_total; ?>.00

                                </td>
                                
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>

                        <div class="btn-group dropleft">
                            <a type="button" class="btn btn-outline-secondary dropdown-toggle"  href="shop.php">
                                Continue Shopping
                            </a>                            
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-outline-secondary" name="update" value="Update Cart">
                                Update Cart
                            </button>                            
                        </div>

                        <div class="btn-group dropright">
                            <a type="button" class="btn btn-outline-secondary dropdown-toggle"  href="checkout.php">
                                Checkout
                            </a>                            
                        </div>
                        </form>
                    </div>
                </div>
                <?php

                    function update_cart(){

                        global $con;

                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id){


                                $delete_product = "delete from cart where p_id='$remove_id'";

                                $run_delete = mysqli_query($con,$delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }

                    echo @$up_cart = update_cart();

                ?>
            </div>

            <div class="col-md-3">
                <div class="card mb-4 " >
                    <div class="card-header">
                    <h2>Order Summary</h2> </div>
                    <div class="card-body text-left bg-white">
                        
                        <p class="card-text">Shipping and additional costs are calculated based on the values you have entered for number of days.</p>
                        <table class="table">
                            
                            <tbody>
                            <tr>

                                <td> Order Subtotal </td>

                                <th>Rs.<?php echo $total; ?>.00 </th>

                            </tr>

                            <tr>

                                <td> Shipping and handling </td>

                                <th>Rs.0.00</th>

                            </tr>

                                <tr>

                                <td>Tax</td>

                                <th>Rs 0.00</th>

                                </tr>

                                <tr class="total">

                                <td>Total</td>

                                <th>Rs.<?php echo $total; ?>.00</th>

                                </tr>
                                
                            </tbody>
                        </table>
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

    
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>

</html>