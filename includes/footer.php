<div id="footer bg-secondary">
    <div class="container- bg-light p-4">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h3> Categories</h3>

                <ul>
                    <?php

                    $get_p_cats = "select * from product_categories";

                    $run_p_cats = mysqli_query($con,$get_p_cats);

                    while($row_p_cats = mysqli_fetch_array($run_p_cats)){

                    $p_cat_id = $row_p_cats['p_cat_id'];

                    $p_cat_title = $row_p_cats['p_cat_title'];

                    echo "<li> <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";

                    }

                    ?>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h3> Help</h3>

                <ul>
                    <li>
                        <a href="cart.php">Track Order</a>
                    </li>
                    <li>
                        <a href="lamps.php">Returns</a>
                    </li>
                    <li>
                        <a href="cart.php">Shippings</a>
                    </li><li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h3> Get In Touch</h3>
                <p id="touch">
                    Any questions? Let us know in store at 62, Krishna Nagar, Parel, 9869257738
                </p>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Newsletter
                </h4>

                <form>
                    <div class="subscribe ">
                        <input class="form-control " type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="">
                        <button class="btn btn-dark ">
                            Subscribe
                        </button>
                    </div>
                </form>                    
            </div>            
        </div>        
    </div>   
    <div id="copyright">
            <div class="container- bg-dark">
                
                    <p class="text-center"> &copy; 2021 Aditya Narkar</p>                   
                                    
            </div>
        </div> 
</div>