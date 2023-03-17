<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTTICA - Payment</title>

        <!-- bootstrap CSS link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css file  -->
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        
        <?php
            $user_ip=getIPAddress();
            $get_user="select * from user_details where user_ip='$user_ip'";
            $result_query=mysqli_query($con,$get_user);
            $run_query=mysqli_fetch_array($result_query);
            $user_id=$run_query['user_id'];
        ?>

        <div class="container">
            <h2 class="text-center">Payment Options</h2>
            <div class="row my-5" style="text-align: center;">
                <div class="col-md-6">
                    <a href="https://www.paypal.com" target="_blank"><h3>Pay Online</h3></a>
                </div>

                <div class="col-md-6">
                    <a href="order.php?user_id=<?php echo $user_id?>"><h3>Pay Offline</h3></a>
                </div>                 
            </div>
        </div>
    </body>
</html>