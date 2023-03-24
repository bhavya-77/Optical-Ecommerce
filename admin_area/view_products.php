<h2 class="text-center">All Products</h2>

<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Quantity Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $get_products="select * from products";
            $result=mysqli_query($con,$get_products);
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
        ?>

                    <tr>
                        <td><?php echo $product_id;?></td>
                        <td><?php echo $product_title;?></td>
                        <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
                        <td>₹ <?php echo $product_price;?></td>
                        <td><?php
                            $get_count="select * from orders_pending where product_id=$product_id";
                            $result_count=mysqli_query($con,$get_count);
                            $rows_count=mysqli_num_rows($result_count);
                            echo $rows_count;
                        ?></td>
                        <td><?php echo $status;?></td>
                        <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_product=<?php echo $product_id?>' class='text-dark' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
            
        <?php
            }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Confirm Delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_product=<?php echo $product_id?>' class="text-light">Confirm</a></button>
      </div>
    </div>
  </div>
</div>