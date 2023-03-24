<h2 class="text-center">All Users</h2>

<table class="table table-bordered mt-5 text-center">
    <thead>

    <?php
        $get_users="select * from user_details";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text-danger'>No Users Yet.</h2>";
        }
        else{
            echo "
                <tr>
                    <th>Sr No.</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";
            
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;

                echo "
                <tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'/></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='index.php?delete_user=<?php echo $user_id?>' class='text-dark' type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
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
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id?>' class="text-light">Confirm</a></button>
      </div>
    </div>
  </div>
</div>