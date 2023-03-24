<?php
    if(isset($_GET['delete_brand'])){
        $delete_id=$_GET['delete_brand'];
        // echo $delete_id;

        // delete query
        $delete_brand="delete from brands where brand_id=$delete_id";
        $result=mysqli_query($con,$delete_brand);
        if($result){
            echo "<script>alert('Brand has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?view_brand','_self')</script>";
        }
    }
?>