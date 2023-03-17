<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    
    if(isset($_POST['user_register'])){

        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $confirm_user_password=$_POST['confirm_user_password'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];

        // accessing image
        $user_image=$_FILES['user_image']['name'];

        // accessing image temp (temporary) name
        $user_image_tmp=$_FILES['user_image']['tmp_name'];

        
        $user_ip = getIPAddress();
        
        // checking empty condition
        if($user_username=='' or $user_email=='' or $user_password=='' or $confirm_user_password=='' or $user_address=='' or $user_mobile=='' or $user_image==''){
            echo "<script>alert('Kindly fill all the available fields.')</script>";
            exit();
        }
        else{
            // select query
            $select_query="select * from user_details where username='$user_username' or user_email='$user_email'";
            $result_select=mysqli_query($con,$select_query);
            $rows_count=mysqli_num_rows($result_select);
            if($rows_count>0){
                echo "<script>alert('Username or Email already exists.')</script>";
            }

            elseif($user_password!=$confirm_user_password){
                echo "<script>alert('Passwords do not match.')</script>";
            }

            else{
                move_uploaded_file($user_image_tmp,"./user_images/$user_image");

                // insert query
                $insert_user="insert into user_details (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
                $result_query=mysqli_query($con,$insert_user);
                if($result_query){
                    echo "<script>alert('User has been registered successfully.')</script>";
                }
            }
        }
        
        // selecting cart items
        $select_cart_items="select * from cart_details where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows=mysqli_num_rows($result_cart);
        if($rows>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart.')</script>";
            echo "<script>window.open('../cart.php','_self')</script>"; 
            // redirect to checkout.php
        }
        else{
            echo "<script>window.open('../index.php','_self')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OTTICA - User Registration</title>

        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
    
    <div class="container-fluid my-3">

        <h1 class="text-center">New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">

                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required">
                </div>

                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter Your Email-ID" autocomplete="off" required="required">
                </div>

                <!-- image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">Image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                </div>

                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
                </div>

                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="confirm_user_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_user_password" id="confirm_user_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required="required">
                </div>

                <!-- address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required">
                </div>

                <!-- mobile -->
                <div class="form-outline mb-4">
                    <label for="user_mobile" class="form-label">Mobile Number</label>
                    <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required="required">
                </div>

                <!-- submit -->
                <div class="text-center">
                    <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an Account ? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>

                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>
<!-- Generate a list of input validation for mobile number input field
Generate a list of input validation for user address input field
Generate a list of input validation for username input field 4
Generate a list of input validation for password input field
Generate a list of input validation for confirm password input field
Generate a list of input validation for image input field
Generate a list of input validation for email id input field -->