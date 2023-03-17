<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Dashboard</title>
        
        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- css file  -->
        <link rel="stylesheet" href="../style.css">
        
        <!-- internal stylesheet -->
        <style>
            .admin_image{
                width: 100px;
                object-fit: contain;
            }

            .footer{
                /* position: absolute; */
                bottom: 0;
                background: #ffcccc;
                color: #000;
                font-size: 14px;
                padding: 20px 0 20px;
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
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="" class="nav-link">Welcome Guest</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>

            <!-- second child -->
            <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
            </div>

            <!-- third child -->
            <div class="row">
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="p-4 px-5">
                        <a href="#"><img src="../images/admin.png" class="admin_image"></a>
                        <p class="text-light text-center">Admin Name</p>
                    </div>
                    <div class="button text-center">
                        <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="insert_products.php" class="nav-link text-light p-1">Insert Products</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">View Products</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="index.php?insert_category" class="nav-link text-light p-1">Insert Categories</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">View Categories</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="index.php?insert_brand" class="nav-link text-light p-1">Insert Brands</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">View Brands</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">All Orders</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">All Payments</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">List Users</a></button>
                        <button class='btn' style='background: #ff523b; color: #fff;'><a href="" class="nav-link text-light p-1">Logout</a></button>
                        <!-- <button class="my-3"><a href="" class="nav-link text-light p-2" style="background: #ff523b; color: #fff;">Logout</a></button> -->
                    </div>
                </div>
            </div>

            <!-- fourth child -->
            <div class="container my-4">
                <?php
                    if(isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }
                    if(isset($_GET['insert_brand'])){
                        include('insert_brands.php');
                    }
                ?>
            </div>
            
            <!-- last child -->
            <!-- <div class="bg-info p-3 text-center footer">
                <p>Cop</p>
            </div> -->
             <!-- footer -->
            <div class="footer">
                <p class="copyright">© 2023 All Rights Reserved - OTTICA</p>
            </div>
        </div>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </body>
</html>

