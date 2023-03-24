<?php
    // including connect file
    // include('./includes/connect.php');

    // fetching products from the products table - index.php
    function getproducts(){
        global $con;

        // condition to check isset or not
        // you are checking that if no specific category or brand variable is selected, then only display all the data
        // otherwise display according to specific variable selected
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

                $select_query="select * from products order by rand() limit 0,9";
                // remove "order by rand()" to stop displaying products randomly
                // limit is used to control the number of products displayed on the home page
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $product_id=$row['product_id'];                              
                    $product_title=$row['product_title'];                              
                    $product_description=$row['product_description'];                              
                    // $product_keywords=$row['product_keywords'];                              
                    $product_image1=$row['product_image1'];                              
                    $category_id=$row['category_id'];                              
                    $brand_id=$row['brand_id'];                    
                    $product_price=$row['product_price'];
                    echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: ₹ $product_price</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";                              
                }
            }
        }
    }

    // fetching ALL products from the products table - index.php
    function get_all_products(){
        global $con;

        // condition to check isset or not
        // you are checking that if no specific category or brand variable is selected, then only display all the data
        // otherwise display according to specific variable selected
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

                $select_query="select * from products order by rand()";
                // remove "order by rand()" to stop displaying products randomly
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $product_id=$row['product_id'];                              
                    $product_title=$row['product_title'];                              
                    $product_description=$row['product_description'];                              
                    // $product_keywords=$row['product_keywords'];                              
                    $product_image1=$row['product_image1'];                              
                    $category_id=$row['category_id'];                              
                    $brand_id=$row['brand_id'];                    
                    $product_price=$row['product_price'];
                    echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: ₹ $product_price</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";                              
                }
            }
        }
    }

    // fetching products from the products table according to SPECIFIC CATEGORY - index.php
    function get_unique_categories(){
        global $con;

        if(isset($_GET['category'])){
            $category_id=$_GET['category'];

            $select_query="select * from products where category_id=$category_id";
 
            $result_query=mysqli_query($con,$select_query);

            // checking if stock for particular category is present or not
            $num_0f_rows=mysqli_num_rows($result_query);
            if($num_0f_rows==0){
                echo "<h2 class='text-center text-danger'>No stock available for this category.</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query))
            {
                $product_id=$row['product_id'];                              
                $product_title=$row['product_title'];                              
                $product_description=$row['product_description'];                              
                // $product_keywords=$row['product_keywords'];                              
                $product_image1=$row['product_image1'];                              
                $category_id=$row['category_id'];                              
                $brand_id=$row['brand_id'];                    
                $product_price=$row['product_price'];
                echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description</p>
                                <p class='card-text'>Price: ₹ $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";                              
            }
        }
    }

    // fetching products from the products table according to SPECIFIC BRAND - index.php
    function get_unique_brands(){
        global $con;

        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];

            $select_query="select * from products where brand_id=$brand_id";
 
            $result_query=mysqli_query($con,$select_query);

            // checking if stock for particular brand is present or not
            $num_0f_rows=mysqli_num_rows($result_query);
            if($num_0f_rows==0){
                echo "<h2 class='text-center text-danger'>No stock available for this brand.</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query))
            {
                $product_id=$row['product_id'];                              
                $product_title=$row['product_title'];                              
                $product_description=$row['product_description'];                              
                // $product_keywords=$row['product_keywords'];                              
                $product_image1=$row['product_image1'];                              
                $category_id=$row['category_id'];                              
                $brand_id=$row['brand_id'];                    
                $product_price=$row['product_price'];
                echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description</p>
                                <p class='card-text'>Price: ₹ $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";                              
            }
        }
    }

    // brands to be displayed - index.php
    function getbrands(){
        global $con;
        $select_brands="select * from brands";
        $result_brands=mysqli_query($con,$select_brands);
        // $row_data=mysqli_fetch_assoc($result_brands);
        // echo $row_data['brand_title'];
        while($row_data=mysqli_fetch_assoc($result_brands)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo "<li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                </li>";
        }
    }

    // categories to be displayed - index.php
    function getcategories(){
        global $con;
        $select_categories="select * from categories";
        $result_categories=mysqli_query($con,$select_categories);
        // $row_data=mysqli_fetch_assoc($result_categories);
        // echo $row_data['category_title'];
        while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                </li>";
        }
    }

    // searching products function - search_product.php
    function search_product(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
            $search_query="select * from products where product_keywords like '%$search_data_value%'";
            
            $result_query=mysqli_query($con,$search_query);

            // checking if stock for particular search has any results or not
            $num_0f_rows=mysqli_num_rows($result_query);
            if($num_0f_rows==0){
                echo "<h2 class='text-center text-danger'>No match found for the given Search criteria.</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query))
            {
                $product_id=$row['product_id'];                              
                $product_title=$row['product_title'];                              
                $product_description=$row['product_description'];                              
                // $product_keywords=$row['product_keywords'];                              
                $product_image1=$row['product_image1'];                              
                $category_id=$row['category_id'];                              
                $brand_id=$row['brand_id'];                    
                $product_price=$row['product_price'];
                echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description</p>
                                <p class='card-text'>Price: ₹ $product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";                              
            }
        }
    }

    // view more product details function - product_details.php
    function view_details(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['product_id'])){
        // you are checking that if no specific category or brand variable is selected, then only display all the data
        // otherwise display according to specific variable selected
            if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){
                    $product_id=$_GET['product_id'];

                    $select_query="select * from products where product_id=$product_id";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id=$row['product_id'];                              
                        $product_title=$row['product_title'];                              
                        $product_description=$row['product_description'];                              
                        // $product_keywords=$row['product_keywords'];                              
                        $product_image1=$row['product_image1'];                              
                        $product_image2=$row['product_image2'];                              
                        $product_image3=$row['product_image3'];                              
                        $category_id=$row['category_id'];                              
                        $brand_id=$row['brand_id'];                    
                        $product_price=$row['product_price'];
                        echo "<div class='col-md-4 mb-3'>
                                <div class='card'>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'> $product_description</p>
                                        <p class='card-text'>Price: ₹ $product_price</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn' style='background: #ff523b; color: #fff;'>Add To Cart</a>
                                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                    </div>
                                </div>
                            </div>  
                                <div class='col-md-8'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <h4 class='text-center mb-5' style='color: #ff523b;'>More Product Images</h4>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                        </div>
                                    </div>
                                </div>";                               
                    }
                }
            }
        }
    }

    // get ip function - index.php
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
         }  
                
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }  
        //whether ip is from the remote address  
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip; 
    
    // cart function - all files (below navbar)
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address = getIPAddress();
            $get_product_id=$_GET['add_to_cart'];
            $select_query="select * from cart_details where ip_address='$get_ip_address' and product_id=$get_product_id";
            $result_query=mysqli_query($con,$select_query);

            $num_0f_rows=mysqli_num_rows($result_query);
            if($num_0f_rows>0){
                echo "<script>alert('This item is already present inside the cart.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                $insert_query="insert into cart_details (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
                $result_query=mysqli_query($con,$insert_query);
                echo "<script>alert('Item is added to cart.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    // cart item number function - all files (in navbar, shopping cart button)
    function cart_item(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address = getIPAddress();
            
            $select_query="select * from cart_details where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);

            $count_cart_items=mysqli_num_rows($result_query);
        }
        else{
            global $con;
            $get_ip_address = getIPAddress();
            
            $select_query="select * from cart_details where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);

            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;       
    }

    // total price function -
    function total_cart_price(){
        global $con;
        $get_ip_address=getIPAddress();
        $total_price=0;

        $cart_query="select * from cart_details where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$cart_query);

        while($row=mysqli_fetch_array($result_query)){
            $product_id=$row['product_id'];
            $select_products="select * from products where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);

            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }

    //get user details
    function get_user_order_details(){
        global $con;
        $username=$_SESSION['username'];

        $get_details="select * from user_details where username='$username'";
        $result_details=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_array($result_details)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders="select * from user_orders where user_id=$user_id and order_status='Pending'";
                        $result_orders=mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_orders);
                        if($row_count>0){
                            echo "<h3 class='text-center mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders.</h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='btn btn-info py-2 px-3' style='background: #ff523b; color: #fff;'>Order Details</a></p>";
                        }
                        else{
                            echo "<h3 class='text-center mt-5 mb-3'>You have no pending orders.</h3>
                            <p class='text-center'><a href='../index.php' class='btn btn-info py-2 px-3' style='background: #ff523b; color: #fff;'>Explore Products</a></p>";
                        }
                    }
                }
            }
        }
    }
?>