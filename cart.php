<!-- connection file -->
<?php
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTTICA - Cart</title>

        <!-- bootstrap CSS link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css file  -->
        <link rel="stylesheet" href="style.css">

        <!-- internal stylesheet -->
        <style>
            .cart_img{
                width: 80px;
                height: 80px;
                object-fit: contain;
            }
        </style>

    </head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <img src="./images/logo.jpg" alt="Logo" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>

                        <!-- <form class="d-flex mx-auto" role="search" action="search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" style="width: 400px; font-size: 16px;">
                            <input type="submit" name="search_data_product" class="btn btn-outline-success" value="Search">
                        </form> -->

                        <div style="margin-right: 0;">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="cart.php">Total Price: ₹ <?php total_cart_price(); ?></a>
                                </li> -->
                            </ul>
                        </div>
 
                    </div>
                </div>
            </nav>

            <!-- ip address function
                $ip = getIPAddress();  
                echo 'User Real IP Address - '.$ip;  -->

            <!-- calling cart function -->
            <?php
                cart();
            ?>

            <!-- second child -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">

                    <?php
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='#'>Welcome Guest</a>
                                </li>";
                        }
                        else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                                </li>";
                        }

                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                                </li>";
                        }
                        else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
                                </li>";
                        }
                    ?>

                </ul>
            </nav>

            <br>

            <!-- third child -->
            <!-- <div class="bg-light">
                <h3 class="text-center">Hidden Store</h3>
                <p class="text-center">Communications is the heart of e-commerce</p>
            </div> -->

            <!-- fourth child - table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                        <table class="table table-bordered text-center">
                            
                                <!-- php code to display dynamic data -->
                                <?php
                                    global $con;
                                    $get_ip_address=getIPAddress();
                                    $total_price=0;
                            
                                    $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                                    $result_query=mysqli_query($con,$cart_query);
                                    $result_count=mysqli_num_rows($result_query);
                                    if($result_count>0){
                                        echo"
                                        <thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Remove</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            
                                        while($row=mysqli_fetch_array($result_query)){
                                            $product_id=$row['product_id'];
                                            $select_products="select * from products where product_id='$product_id'";
                                            $result_products=mysqli_query($con,$select_products);
                                
                                            while($row_product_price=mysqli_fetch_array($result_products)){
                                                $product_price=array($row_product_price['product_price']);
                                                $price_table=$row_product_price['product_price'];
                                                $product_title=$row_product_price['product_title'];
                                                $product_image1=$row_product_price['product_image1'];

                                                $product_values=array_sum($product_price);
                                                $total_price+=$product_values;
                                            ?>
                                                <tr>
                                                    <td><?php echo $product_title ?></td>
                                                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" class="cart_img"></td>
                                                    <td><input type="text" name="qty" class="form-input w-50" placeholder="Enter Quantity"></td>

                                                    <?php
                                                        $get_ip_address=getIPAddress();
                                                        if(isset($_POST['update_cart'])){
                                                            $quantities=$_POST['qty'];
                                                            $update_table="update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                                                            $result_update=mysqli_query($con,$update_table);
                                                            $total_price=$total_price * $quantities;
                                                        }
                                                    ?>
                                                    <td>₹ <?php echo $price_table ?></td>
                                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                                    <td>
                                                        <input type="submit" value="Update Cart" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" name="update_cart">
                                                        <input type="submit" value="Remove Cart" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" name="remove_cart">
                                                    </td>
                                                </tr>
                                <?php
                                            }
                                        }
                                    }
                                    else{
                                        echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                                    }
                                ?>                            
                            </tbody>
                        </table>

                        <!-- subtotal -->
                        <?php
                            global $con;
                            $get_ip_address=getIPAddress();
                    
                            $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                            $result_query=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result_query);
                            if($result_count>0){
                                echo "
                                <div class='d-flex mb-5'>
                                    <h4 class='px-3'>Subtotal: <strong>₹  $total_price </strong></h4>
                                    <a href='index.php' class='btn mx-3' style='background: #ff523b; color: #fff;'>Continue Shopping</a>
                                    <a href='./users_area/checkout.php' class='btn btn-secondary'>Checkout</a>
                                </div>";
                            }
                            else{
                                echo "<a href='index.php' class='btn m-3' style='background: #ff523b; color: #fff;'>Continue Shopping</a>";
                            }

                        ?>
                        
                    </form>
                </div>
            </div>

            <!-- function to remove items -->
            <?php
                function remove_cart_item(){
                    global $con;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            echo $remove_id;
                            $delete_query="delete from cart_details where product_id=$remove_id";
                            $run_delete=mysqli_query($con,$delete_query);
                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_item=remove_cart_item();
            ?>

        <!-- footer -->
        <?php
            include('./includes/footer.php') 
        ?>

        <!-- bootstrap JSS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>