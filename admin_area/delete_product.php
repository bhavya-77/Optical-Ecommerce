<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        // echo $delete_id;

        // delete query
        $delete_products="delete from products where product_id=$delete_id";
        $result_product=mysqli_query($con,$delete_products);
        if($result_product){
            echo "<script>alert('Product has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?view_product','_self')</script>";
        }
    }
?>