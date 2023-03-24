<?php
    if(isset($_GET['delete_payment'])){
        $delete_id=$_GET['delete_payment'];
        // echo $delete_id;

        // delete query
        $delete_brand="delete from user_payments where payment_id=$delete_id";
        $result=mysqli_query($con,$delete_brand);
        if($result){
            echo "<script>alert('Payment history has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?list_payment','_self')</script>";
        }
    }
?>