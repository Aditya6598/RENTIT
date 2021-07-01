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
    <title>Enquiry | RENTIT</title>
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

        <div class="container-">
            <div class="card bg-light border-0 pt-4 " >
                <strong>
                    <h3><p class="text-center " style="padding: 10px, -10px;">Special Requirement</p><h3>    
                </strong>
            </div>
        </div>
               
        <br>
        <!--TOP ENDS-->
        
        <!--Enquiry Starts-->

        <div class="row  align-self-center justify-content-center" >  
            <form class="shadow p-5 mb-2 bg-white rounded" action="" method="POST" style="width:800px">                
                <div class="text col-md-12">
                    <h1 style="text-align: center;">Enquiry</h1> 
                    
                    <div class="form-group">
                        <label for="spec_req">Specific Requirement</label>
                        <input type="text" name="spec_req" id="spec_req" class="form-control" placeholder="Enter your requirement" required>
                    </div>

                    <div class="form-group">
                        <label for="req_date">Date of Requirment</label>
                        <input type="date" name="req_date" id="req_date" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="cust_name">Name</label>
                        <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="texr" name="contact" id="password" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="cust_email">Email id</label>
                        <input type="password" name="cust_email" id="cust_email" class="form-control mb-4" placeholder="" required>
                    </div>
                    
                    
                    
                    <div class=""><center>
                        <button type="submit" class="btn btn-outline-info shadow mb-4" >Submit</button>
                        </center>
                    </div>
                </div>      
            </form>      
        </div>   

        <!--Enquiry Ends-->
        
<br>

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