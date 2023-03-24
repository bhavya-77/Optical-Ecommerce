<!-- connection file -->
<?php
    include('../includes/connect.php');
    session_start();

    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];

        // get order details - invoice number and amount
        $select_data="select * from user_orders where order_id=$order_id";
        $result=mysqli_query($con,$select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];
    }

    if(isset($_POST['confirm_payment'])){
        $invoice=$_POST['invoice'];
        $amount=$_POST['amount'];
        $mode=$_POST['mode'];

        $insert_query="insert into user_payments (order_id, invoice_number, amount, payment_mode) values ('$order_id', '$invoice', '$amount', '$mode')";
        $insert_result=mysqli_query($con,$insert_query);
        if($insert_result){
            echo "<h3 class='text-center text-light'>Payment Completed Successfully</h3>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }

        $update_orders="update user_orders set order_status='Complete' where order_id=$order_id";
        $update_result=mysqli_query($con,$update_orders);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTTICA - Payment Page</title>

        <!-- bootstrap CSS link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css file  -->
        <link rel="stylesheet" href="../style.css">

    </head>
    <body class="bg-secondary">
        <div class="container my-5">
            <h1 class="text-center text-light">Confirm Payment</h1>
            <form action="" method="post">
                <div class="form-outline my-4 text-center w-50 m-auto">
                    <input type="text" class="form-control w-50 m-auto" name="invoice" value="<?php echo $invoice_number; ?>">
                </div>

                <div class="form-outline my-4 text-center w-50 m-auto">
                    <label for="" class="text-light">Amount :</label>
                    <input type="text" class="form-control w-50 m-auto" name="amount"  value="<?php echo $amount_due; ?>">
                </div>

                <div class="form-outline my-4 text-center w-50 m-auto">
                    <select name="mode" class="form-select w-50 m-auto">
                        <option>Select Payment Mode</option>
                        <option>Paypal</option>
                        <option>UPI</option>
                        <option>Net Banking</option>
                        <option>Cash On Delivery</option>
                    </select>
                </div>

                <div class="form-outline my-4 text-center w-50 m-auto">
                    <input type="submit" class="btn btn-info py-2 px-3" style="background: #ff523b; color: #fff;" value="Confirm" name="confirm_payment">
                </div>
            </form>
        </div>
        
    </body>
</html>