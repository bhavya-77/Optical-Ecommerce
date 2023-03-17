<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    @session_start();

    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        $select_query="select * from user_details where username='$user_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_ip=getIPAddress();

        // accessing cart items
        $select_cart="select * from cart_details where ip_address='$user_ip'"; 
        $result_cart=mysqli_query($con,$select_cart);
        $row_count_cart=mysqli_num_rows($result_cart);

        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password,$row_data['user_password'])){
                // echo "<script>alert('Login Successful')</script>";
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }
                else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>alert('You have items in your cart.')</script>";
                    echo "<script>window.open('../cart.php','_self')</script>";
                }
            }
            else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OTTICA - User Login</title>

        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- internal stylesheet -->
        <style>
            body{
                overflow-x: hidden;
            }
        </style>

    </head>
<body>
    <div class="container-fluid my-3">
        <h1 class="text-center">User Login</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post">

                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required">
                </div>

                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
                </div>

                <!-- submit -->
                <div class="text-center">
                    <input type="submit" name="user_login" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an Account ? <a href="user_registration.php" class="text-danger">Register</a></p>
                </div>

                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>