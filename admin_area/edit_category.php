<?php
    if(isset($_GET['edit_category'])){
        $edit_category=$_GET['edit_category'];
        
        $get_category="select * from categories where category_id=$edit_category";
        $result=mysqli_query($con,$get_category);
        $row=mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];
    }

    if(isset($_POST['update_category'])){
        $cat_title=$_POST['category_title'];
        $update_query="update categories set category_title='$cat_title' where category_id=$edit_category";
        $result_cat=mysqli_query($con,$update_query);

        if($result_cat){
            echo "<script>alert('Category has been updated successfully.')</script>";
            echo "<script>window.open('./index.php?view_category','_self')</script>";
        }
    }
?>

<div class="container">
    <h2 class="text-center">Edit Category</h2>
    <form action="" method="post">

        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" value="<?php echo $category_title;?>"  class="form-control" required="required">
        </div>

        <!-- submit -->
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" name="update_category" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Update Category">
        </div>

    </form>
</div>