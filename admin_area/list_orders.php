<h2 class="text-center">All Orders</h2>

<table class="table table-bordered mt-5 text-center">
    <thead>

    <?php
        $get_orders="select * from user_orders";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text-danger'>No Orders Yet.</h2>";
        }
        else{
            echo "
                <tr>
                    <th>Sr No.</th>
                    <th>User ID</th>
                    <th>Due Amount</th>
                    <th>Invoice Number</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";
            
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;

                echo "
                <tr>
                    <td>$number</td>
                    <td>$user_id</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='index.php?delete_order=<?php echo $order_id?>' class='text-dark' type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id?>' class="text-light">Confirm</a></button>
      </div>
    </div>
  </div>
</div>