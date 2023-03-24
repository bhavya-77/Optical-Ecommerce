<?php
    if(isset($_GET['edit_brand'])){
        $edit_brand=$_GET['edit_brand'];
        
        $get_brand="select * from brands where brand_id=$edit_brand";
        $result=mysqli_query($con,$get_brand);
        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
    }

    if(isset($_POST['update_brand'])){
        $br_title=$_POST['brand_title'];
        $update_query="update brands set brand_title='$br_title' where brand_id=$edit_brand";
        $result_br=mysqli_query($con,$update_query);

        if($result_br){
            echo "<script>alert('Brand has been updated successfully.')</script>";
            echo "<script>window.open('./index.php?view_brand','_self')</script>";
        }
    }
?>

<div class="container">
    <h2 class="text-center">Edit brand</h2>
    <form action="" method="post">

        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand Title</label>
            <input type="text" name="brand_title" id="brand_title" value="<?php echo $brand_title;?>"  class="form-control" required="required">
        </div>

        <!-- submit -->
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" name="update_brand" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Update Brand">
        </div>

    </form>
</div>