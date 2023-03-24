<h2 class="text-center">All Payments</h2>

<table class="table table-bordered mt-5 text-center">
    <thead>

    <?php
        $get_payments="select * from user_payments";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text-danger'>No Payments Received Yet.</h2>";
        }
        else{
            echo "
                <tr>
                    <th>Sr No.</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";
            
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;

                echo "
                <tr>
                    <td>$number</td>
                    <td>$invoice_number</td>
                    <td>$amount</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                    <td><a href='index.php?delete_payment=<?php echo $payment_id?>' class='text-dark' type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id?>' class="text-light">Confirm</a></button>
      </div>
    </div>
  </div>
</div>