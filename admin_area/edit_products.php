<?php
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        
        $get_data="select * from products where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];

        // fetching category name
        $select_category="select * from categories where category_id=$category_id";
        $result_category=mysqli_query($con,$select_category);
        $row_category=mysqli_fetch_assoc($result_category);
        $category_title=$row_category['category_title'];

        // fetching brand name
        $select_brand="select * from brands where brand_id=$brand_id";
        $result_brand=mysqli_query($con,$select_brand);
        $row_brand=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand['brand_title'];

    }
?>

<div class="container">
    <h2 class="text-center">Edit Product</h2>
    <form action="" method="post" enctype="multipart/form-data">

        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" value="<?php echo $product_title?>"  class="form-control" required="required">
        </div>

        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" value="<?php echo $product_description?>" class="form-control" required="required">
        </div>

        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keyword" value="<?php echo $product_keywords?>" class="form-control" required="required">
        </div>

        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_categories" class="form-label">Product Category</label>
            <select name="product_categories" id="" class="form-select">
                <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                <?php
                    $select_category_all="select * from categories";
                    $result_category_all=mysqli_query($con,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>

        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brands" class="form-label">Product Brand</label>
            <select name="product_brands" id="" class="form-select">
                <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                <?php
                    $select_brand_all="select * from brands";
                    $result_brand_all=mysqli_query($con,$select_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                        $brand_title=$row_brand_all['brand_title'];
                        $brand_id=$row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            </select>
        </div>

        <!-- image 1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>  
        </div>
        
        <!-- image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
            </div>  
        </div>
        
        <!-- image 3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">
            </div>  
        </div>

        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" value="<?php echo $product_price?>" class="form-control" required="required">
        </div>

        <!-- submit -->
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" name="update_product" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Update Product">
        </div>


    </form>
</div>

<!-- editing products -->
<?php

    if(isset($_POST['update_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_brands=$_POST['product_brands'];
        $product_image1=$_FILES['product_image1'];
        $product_image2=$_FILES['product_image2'];
        $product_image3=$_FILES['product_image3'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>alert('Kindly fill all the available fields.')</script>";
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // update query
            $update_products="update products set product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', category_id='$product_categories', brand_id='$product_brands', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price', date=NOW() where product_id=$edit_id";
            $result_update=mysqli_query($con,$update_products);
            if($result_update){
                echo "<script>alert('Product has been updated successfully.')</script>";
                echo "<script>window.open('./index.php?view_product','_self')</script>";
            }
        }
    }
?>