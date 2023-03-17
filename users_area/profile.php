<!-- connection file -->
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile - Welcome <?php echo $_SESSION['username'] ?> </title>

        <!-- bootstrap CSS link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css file  -->
        <link rel="stylesheet" href="../style.css">

        <!-- internal stylesheet -->
        <style>
            .profile_img{
                padding: 20px;
                width: 100%;
                /* height: 100%; */
                display: block;
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
                    <img src="../images/logo.jpg" alt="Logo" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user_registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>

                        <form class="d-flex mx-auto" role="search" action="../search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" style="width: 400px; font-size: 16px;">
                            <input type="submit" name="search_data_product" class="btn btn-outline-success" value="Search">
                        </form>

                        <div style="margin-right: 0;">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../cart.php">Total Price: ₹ <?php total_cart_price(); ?></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </nav>

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

            <!-- fourth child -->
            <div class="row">

                <!-- side-nav -->
                <div class="col-md-2 bg-secondary p-0">
                    
                    <!-- brands to be displayed -->
                    <ul class="navbar-nav me-auto text-center" style="height: 100vh">
                        <li class="nav-item" style="background: #ff523b; color: #fff;">
                            <a href="#" class="nav-link text-light"><h4>Your Profile</h4></a>
                        </li>

                        <?php
                            $username=$_SESSION['username'];
                            $user_image="select * from user_details where username='$username'";
                            $result_image=mysqli_query($con,$user_image);
                            $fetch_image=mysqli_fetch_array($result_image);
                            $image=$fetch_image['user_image'];
                            echo "<li class='nav-item'>
                                <img src='./user_images/$image' class='profile_img' alt='Profile Picture'>
                            </li>";
                        ?>

                        <li class="nav-item">
                            <a href="profile.php" class="nav-link text-light">Pending Orders</a>
                        </li>

                        <li class="nav-item">
                            <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
                        </li>

                        <li class="nav-item">
                            <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
                        </li>

                        <li class="nav-item">
                            <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="user_logout.php" class="nav-link text-light">Logout</a>
                        </li>
                        
                    </ul>

                </div>

                <div class="col-md-10">
                    
                </div>

            </div>            
        </div>

        <!-- footer -->
        <div class="footer">
            <div class="f-container">
                <div class="f-row">
                    <div class="footer-col-1">
                        <h3>Download Our App (Available Soon)</h3>
                        <p>Download App for ANDROID and IOS Mobile Phones.</p>
                        <div class="app-logo">
                            <img src="../images/play-store.png">
                            <img src="../images/app-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="../images/logo.jpg" class="footer-logo">
                        <p>Our Purpose Is To Deliver The Best Style Accessible To Everyone.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Reach Us On</h3>
                        <ul>
                            <li><a class="nav-link" href="https://g.co/kgs/xEDSrX"><i class="fa-brands fa-google"></i><br>Google</a></li>
                            <br>
                            <li><a class="nav-link" href="https://instagram.com/ottica.eyeboutique?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i><br>Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="copyright">© 2023 All Rights Reserved - OTTICA</p>
            </div>
        </div>

        <!-- bootstrap JSS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>