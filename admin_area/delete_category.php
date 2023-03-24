<?php
    if(isset($_GET['delete_category'])){
        $delete_id=$_GET['delete_category'];
        // echo $delete_id;

        // delete query
        $delete_category="delete from categories where category_id=$delete_id";
        $result=mysqli_query($con,$delete_category);
        if($result){
            echo "<script>alert('Category has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?view_category','_self')</script>";
        }
    }
?>