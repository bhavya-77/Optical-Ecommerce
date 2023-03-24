<h2 class="text-center">All Brands</h2>

<table class="table table-bordered mt-5 text-center">
<thead>
        <tr>
            <th>Sr No.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        
    <?php
        $select_brand="select * from brands";
        $result_brand=mysqli_query($con,$select_brand);
        $number=0;

        while($row=mysqli_fetch_assoc($result_brand)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;       
    ?>

        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-dark' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id?>' class="text-light">Confirm</a></button>
      </div>
    </div>
  </div>
</div>