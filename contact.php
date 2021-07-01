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
        <div class="container-fluid"> 
                             
            <div class="row">      
                <!-- Sidebars Start-->          
                <div class="col-md-3"> 
                    <?php include("includes/sidebar.php") ;?>
                </div>  
                <!-- Sidebars Ends-->             
                            
                <div class="row col-md-8"> 
                                     
                        <form action="contact.php" method="POST" class="col shadow ">
                        <div class="ml-4 my-4">  

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2>Contact US<h2>
                                    </div>
                                    <div class="card-text">
                                       If you have any suggestions please fill free to suggest us.
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" ">
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control"  name="subject" id="subject" >                                
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            

                            <center><button type="submit" name="submit" class="btn btn-primary shadow rounded">Submit</button>

                            
                            </center>
                        </div>
                        </form>   
                        <?php

                            if(isset($_POST['submit'])){

                                // Admin receives email through this code

                                $sender_name = $_POST['name'];

                                $sender_email = $_POST['email'];

                                $sender_subject = $_POST['subject'];

                                $sender_message = $_POST['message'];

                                $receiver_email = "sad.ahmed22224@gmail.com";

                                mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

                                // Send email to sender through this code

                                $email = $_POST['email'];

                                $subject = "Welcome to my website";

                                $msg = "I shall get you soon, thanks for sending us email";

                                $from = "narkaraditya659@gmail.com";

                                mail($email,$subject,$msg,$from);

                                echo "<h2 align='center'>Your message has been sent successfully</h2>";

                            }   


                        ?>
                    </div>
                </div>


   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>

</html>