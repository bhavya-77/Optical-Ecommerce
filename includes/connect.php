<?php 

    $con = mysqli_connect('localhost', 'root', '', 'ottica');
    if (!$con){
        die(mysqli_error($con));
    }
    
    // to check if database is connected successfully, execute the below code
    // if($con){
    //     echo "connect success";
    // }else{
    //     die(mysqli_error($con));
    // }
?>
