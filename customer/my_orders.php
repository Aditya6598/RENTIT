<?php 
include("includes/db.php");
?>
<div class="container bg-light">
    <center>
        <h2>My Orders</h2>

        <p class="">Your orders on one place</p>
        <p class="text-muted">If you have any queries please free to <a href="../contact.php"><strong>Contact</strong></a> our customer service is working for you. </p>

        <table class="table">
            <thead class="thead-light">                
                <tr>
                <th scope="col">No</th>
                <th scope="col">Due Ammount</th>
                <th scope="col">invoice</th>
                <th scope="col">Quantity</th>
                <th scope="col">Days</th>
                <th scope="col">Order Date</th>
                <th scope="col">Paid/Unpaid</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $customer_name = $_SESSION['customer_name'];

                    $get_customer = "select * from customers where customer_name='$customer_session'";

                    $run_customer = mysqli_query($con,$get_customer);

                    $row_customer = mysqli_fetch_array($run_customer);

                    $customer_id = $row_customer['customer_id'];

                    $get_orders = "select * from customer_orders where customer_id='$customer_id'";

                    $run_orders = mysqli_query($con,$get_orders);

                    $i = 0;

                    while($row_orders = mysqli_fetch_array($run_orders)){

                        $order_id = $row_orders['order_id'];

                        $due_amount = $row_orders['due_amount'];

                        $invoice_no = $row_orders['invoice_no'];

                        $qty = $row_orders['qty'];

                        $day = $row_orders['day'];

                        $order_date = substr($row_orders['order_date'],0,11);

                        $order_status = $row_orders['order_status'];

                        $i++;

                        if($order_status=='pending'){

                        $order_status = "Unpaid";

                        }
                        else{

                            $order_status = "Paid";

                        }

                    ?>
                <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>Rs. <?php echo $due_amount; ?></td>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $day; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td><a  href="confirm.php?order_id=<?php echo $order_id; ?>" class="btn btn-outline-info">Confirm if Paid </a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>




