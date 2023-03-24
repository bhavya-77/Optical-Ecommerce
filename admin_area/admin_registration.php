<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    if(isset($_POST['admin_register'])){

        $admin_username=$_POST['admin_username'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];
        $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
        $confirm_admin_password=$_POST['confirm_admin_password'];

        if($admin_username=='' or $admin_email=='' or $admin_password=='' or $confirm_admin_password==''){
            echo "<script>alert('Kindly fill all the available fields.')</script>";
            exit();
        }
        else{
            $select_query="select * from admin_details where admin_username='$admin_username' or admin_email='$admin_email'";
            $result_select=mysqli_query($con,$select_query);
            $rows_count=mysqli_num_rows($result_select);
            if($rows_count>0){
                echo "<script>alert('Username or Email already exists.')</script>";
                echo "<script>window.open('admin_registration.php','_self')</script>";
            }

            elseif($admin_password!=$confirm_admin_password){
                echo "<script>alert('Passwords do no match.')</script>";
                echo "<script>window.open('admin_registration.php','_self')</script>";              
            }

            else{
                // insert query
                $insert_admin="insert into admin_details (admin_username, admin_email, admin_password) values ('$admin_username', '$admin_email', '$hash_password')";
                $result_query=mysqli_query($con,$insert_admin);
                if($result_query){
                    echo "<script>alert('Admin has been registered successfully.')</script>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Registration</title>

        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- css file  -->
        <link rel="stylesheet" href="../style.css">
        
        <!-- internal stylesheet -->
        <style>
            body{
                overflow-x: hidden;
            }
        </style>        
    </head>
    <body>
        <div class="container-fluid m-3">
            <h2 class="text-center mb-5">Admin Registration</h2>
            
            <div class="row d-flex justify-content-center">

                <div class="col-lg-6 col-xl-5">
                    <img src="../images/admin_reg.jpg" alt="Admin Registration" class="img-fluid">
                </div>

                <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">

                        <!-- username -->
                        <div class="form-outline mb-4">
                            <label for="admin_username" class="form-label">Username</label>
                            <input type="text" name="admin_username" id="admin_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required">
                        </div>

                        <!-- email -->
                        <div class="form-outline mb-4">
                            <label for="admin_email" class="form-label">Email</label>
                            <input type="text" name="admin_email" id="admin_email" class="form-control" placeholder="Enter Your Email-ID" autocomplete="off" required="required">
                        </div>

                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="admin_password" class="form-label">Password</label>
                            <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
                        </div>

                        <!-- confirm password -->
                        <div class="form-outline mb-4">
                            <label for="confirm_admin_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_admin_password" id="confirm_admin_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required="required">
                        </div>

                        <!-- submit -->
                        <div class="text-center">
                            <input type="submit" name="admin_register" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Register">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an Account ? <a href="admin_login.php" class="text-danger">Login</a></p>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </body>
</html>