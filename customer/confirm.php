<?php 
session_start();

if(!isset($_SESSION['customer_name'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {

include("includes/db.php");

include("functions/functions.php");

if(isset($_GET['order_id'])){

$order_id = $_GET['order_id'];

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no">
    <title>Confirm Payment| RENTIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?,family=Roboto:400,500,700,300,100">   
    
    <link href="styles/style.css" rel="stylesheet">
</head>

<body>

    <!-- Top Starts-->
    
    <div class="container-">        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a href="../index.php" class="btn btn-success btn-sm">WELCOME : GUEST</a>            
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        
                <ul class="navbar-nav ml-auto ">
                    <li>
                        <a class="nav-link"  href="../enquiry.php">Enquiry</a>
                    </li>
                    <li>
                        <a class="nav-link" href="../customer/myaccount.php">My Account</a>
                    </li>
                    <li>
                        <a class="nav-link" href="../cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <a class="nav-link" href="">
                        <?php

                            if(!isset($_SESSION['customer_name'])){

                            echo "Welcome :Guest";


                            }else{

                            echo "Welcome : " . $_SESSION['customer_name'] . "";

                            }


                            ?>
                        </a>
                    </li>
                </ul> 
            </div>
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

                
                <div class="container col-md-8 bg-light">
                    <form class="pt-4 ml-3" action="confirm.php?update_id=<?php echo $order_id; ?>" method="POST" enctype="multipart/form-data">
                        <h1 align="center">Please confirm your Payment</h1>
                        <div class="col-md-12">
                            <label for="invoice_no">Invoice No.</label>
                            <input type="text" class="form-control" id="invoice_no"  name="invoice_no">
                        </div>
                        <div class="col-md-12">
                            <label for="amount_sent">Amount Sent</label>
                            <input type="text" class="form-control" id="amount_sent" name="amount_sent" placeholder="" >
                        </div>
                        <div class="col-md-12">
                            <label for="payment_mode">Select Payment Option</label>
                            <select name="payment_mode" id="payment_mode" class="form-control">
                            <option value="">Choose..</option>
                            <option value="">Bank Code</option>
                            <option value="">UPI</option>
                            <option value="">Credit Card</option>
                            <option value="">Home Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="ref_id">Transaction/reference id</label>
                            <input type="text" class="form-control" id="ref_no" name="ref_no">
                        </div>
                        <div class="col-md-12">
                        <label>Easy Bhim UPI:</label>

                        <input type="text" class="form-control" name="code" required>
                        </div>
                        <div class="col-md-12">
                            <label for="date">Payment Date</label>
                            <input type="text" class="form-control mb-4" id="date" name="date">
                        </div>

                        <center>
                        <button type="submit" class="btn btn-primary shadow rounded mb-4" name="confirm_payment">Confirm Payment</button>
                       </center>                        
                    </form>   

                    <?php

                        if(isset($_POST['confirm_payment'])){

                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];

                        $amount = $_POST['amount_sent'];

                        $payment_mode = $_POST['payment_mode'];

                        $ref_no = $_POST['ref_no'];

                        $code = $_POST['code'];

                        $payment_date = $_POST['date'];

                        $complete = "Complete";

                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                        $run_payment = mysqli_query($con,$insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                        $run_customer_order = mysqli_query($con,$update_customer_order);

                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                        $run_pending_order = mysqli_query($con,$update_pending_order);

                        if($run_pending_order){

                        echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                        echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                        }



                        }



                        ?>
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