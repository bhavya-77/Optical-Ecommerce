<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>

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
            <h2 class="text-center mb-5">Admin Login</h2>
            
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

                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="admin_password" class="form-label">Password</label>
                            <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
                        </div>

                        <!-- submit -->
                        <div class="text-center">
                            <input type="submit" name="admin_login" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Login">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an Account ? <a href="admin_registration.php" class="text-danger">Register</a></p>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </body>
</html>