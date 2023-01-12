
<!-- Modal -->
<?php 
    $itemModalSql = "SELECT * FROM `orders`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
        $userid = $itemModalRow['userId'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderid?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #5572fe;color:white;">
        <h1 class="modal-title fs-5" id="orderItem<?php echo $orderid?>">Pesanan Barang (<b>Id Pesanan: <?php echo $orderid;?> </b>)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table text">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="px-3">Barang</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="text-center">Banyak</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mysql = "SELECT * FROM `orderitems` WHERE orderId = $orderid";
                            $myresult = mysqli_query($conn, $mysql);
                            while($myrow = mysqli_fetch_assoc($myresult)){
                                $foodId = $myrow['foodId'];
                                $itemQuantity = $myrow['itemQuantity'];
                                
                                $itemsql = "SELECT * FROM `food` WHERE foodId = $foodId";
                                $itemresult = mysqli_query($conn, $itemsql);
                                $itemrow = mysqli_fetch_assoc($itemresult);
                                $foodName = $itemrow['foodName'];
                                $foodPrice = $itemrow['foodPrice'];
                                $foodDesc = $itemrow['foodDesc'];
                                $foodCategorieId = $itemrow['foodCategorieId'];
                                
                                echo '<tr>
                                <th scope="row">
                                    <div class="p-2">
                                    <img src="/foodKita/image/makan-'.$foodId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                    <div class="ml-3 d-inline-block align-middle">
                                        <h5 class="mb-0"> '.$foodName. '</h5><span class="text-muted font-weight-normal font-italic d-block">Rp. ' .$foodPrice. '/-</span>
                                    </div>
                                    </div>
                                </th>
                                <td class="align-middle text-center"><strong>' .$itemQuantity. '</strong></td>
                            </tr>';

                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php
    }
?>