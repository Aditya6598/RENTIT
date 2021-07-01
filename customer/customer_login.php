
<section class="login">
        
        <div class="jumbotron jumbotron shadow rounded" style="height: 5px;">
        <div class="container-sm">         
            <div class="row ">
            
            <div class="col">
                <h1 class="display text-xl-left"> <strong> Login</strong> </h1>
            </div>
            
            </div>
        </div>

        
        </div>

        <div class="container-sm">
        <form action="checkout.php" method="POST">
            
            <div class="form-row">
                <div class="col-md-12">
                    <label for="c_name">Username</label>
                    <input type="text" name="c_name" class="form-control mb-4" id="c_name" placeholder="" required>
                </div>                

            </div>       
            

            <div class="form-row mb-4">
                <div class="form-group col-md-12">
                    <label for="c_pass">Password</label>
                    <input type="password" class="form-control" id="c_pass" 
                    name="c_pass" placeholder="Don't share your password"required>
                </div>               
                
            </div>       
            

            <center>
            <button class="btn btn-outline-success shadow rounded mb-3" name="login" value="Login" id="login">Login Now</button>

            <p>Don't have an Account? <a href="customer_register.php" style="color: blue;" >Register here</a></p>
            </center>
        </form>   
        </div>

    </section>

<?php

if(isset($_POST['login'])){

$customer_name = $_POST['c_name'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_name='$customer_name' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_name']=$customer_name;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('index.php','_self')</script>";

}
else {

$_SESSION['customer_name']=$customer_name;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('index.php','_self')</script>";

} 


}

?>