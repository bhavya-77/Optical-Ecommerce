<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile - My Orders</title>
    </head>
    <body>

        <?php
            $username=$_SESSION['username'];
            $get_user="select * from user_details where username='$username'";
            $result=mysqli_query($con,$get_user);
            $row_fetch=mysqli_fetch_assoc($result);
            $user_id=$row_fetch['user_id'];
        ?>

        <h3 class="mb-4">All Orders</h3>

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Amount Due</th>
                    <th>Invoice Number</th>
                    <th>Total Products</th>
                    <th>Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $get_order_details="select * from user_orders where user_id=$user_id";
                    $result_orders=mysqli_query($con,$get_order_details);
                    $number=1;

                    while($row_orders=mysqli_fetch_assoc($result_orders)){
                        $order_id=$row_orders['order_id'];
                        $amount_due=$row_orders['amount_due'];
                        $invoice_number=$row_orders['invoice_number'];
                        $total_products=$row_orders['total_products'];
                        $order_date=$row_orders['order_date'];
                        $order_status=$row_orders['order_status'];
                        if($order_status=='Pending'){
                            $order_status='Incomplete';
                        }
                        else{
                            $order_status="Complete";
                        }

                        echo "
                        <tr>
                            <td>$number</td>
                            <td>$amount_due</td>
                            <td>$invoice_number</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                            <td>$order_status</td>";
                ?>
                <?php
                        if($order_status=='Complete'){
                            echo "<td>Paid</td>";
                        }
                        else{
                            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                        </tr>";
                        }   
                        $number++;
                    }
                ?>

            </tbody>
        </table>
    </body>
</html>