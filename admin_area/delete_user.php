<?php
    if(isset($_GET['delete_user'])){
        $delete_id=$_GET['delete_user'];
        // echo $delete_id;

        // delete query
        $delete_brand="delete from user_details where user_id=$delete_id";
        $result=mysqli_query($con,$delete_brand);
        if($result){
            echo "<script>alert('User has been deleted successfully.')</script>";
            echo "<script>window.open('./index.php?list_user','_self')</script>";
        }
    }
?>