<div class="box"><!-- box Starts -->

    <?php

        $session_name = $_SESSION['customer_name'];

        $select_customer = "select * from customers where customer_name='$session_name'";

        $run_customer = mysqli_query($con,$select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];


    ?>

    <h1 class="text-center">Payment Options For You</h1>

    <p class="lead text-center">

        <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>

    </p>

    <h3 class="muted">More payment options coming soon</h3>

</div><!-- box Ends -->