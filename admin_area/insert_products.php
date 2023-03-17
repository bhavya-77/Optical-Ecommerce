<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){

        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_brands=$_POST['product_brands'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        // accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accessing image temp (temporary) name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];
        
        // checking empty condition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>alert('Kindly fill all the available fields.')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // insert query
            $insert_products="insert into products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) values ('$product_title', '$product_description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status' )";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('Product has been inserted successfully.')</script>";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Insert Products - Admin</title>

        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- css file  -->
        <link rel="stylesheet" href="../style.css"> 

    </head>
    <body class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Insert Products</h1>
            <form action="" method="post" enctype="multipart/form-data">

                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>

                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>

                <!-- keywords -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" name="product_keywords" id="product_keyword" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
                </div>

                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select">
                        <option value="">Select A Category</option>
                        <?php
                            $select_query="select * from categories";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $category_title=$row['category_title'];
                                $category_id=$row['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>
                        <!-- <option value="">Category 1</option>
                        <option value="">Category 2</option>
                        <option value="">Category 3</option>   -->
                    </select>
                </div>

                <!-- brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select">
                        <option value="">Select A Brand</option>
                        <?php
                            $select_query="select * from brands";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $brand_title=$row['brand_title'];
                                $brand_id=$row['brand_id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                        ?>
                        <!-- <option value="">Brand 1</option>
                        <option value="">Brand 2</option>
                        <option value="">Brand 3</option>   -->
                    </select>
                </div>

                <!-- image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>

                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product Image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>

                <!-- image 3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product Image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
                </div>

                <!-- price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>

                <!-- submit -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" style="background: #ff9966; color: #000;" value="Insert Product">
                </div>

            </form>
        </div>
    
    </body>
</html>