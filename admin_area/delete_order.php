<?php
    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];
        // echo $delete_id;

        // delete query
        $delete_brand="delete from user_orders where order_id=$delete_id";
        $result=mysqli_query($con,$delete_brand);
        if($result){
            echo "<script>alert('Order has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?list_order','_self')</script>";
        }
    }
?>