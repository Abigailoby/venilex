<?php 
    $itemModalSql = "SELECT * FROM `orders`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
        $userid = $itemModalRow['userId'];
        $orderStatus = $itemModalRow['orderStatus'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #fac031;">
        <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Status Pemesanan Dan Detail Pengiriman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="partials/_orderManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
            <div class="text-left my-2">    
                <b><label for="name">Status Pemesanan</label></b>
                    <input class=" col-6" id="status" name="status" value="<?php echo $orderStatus; ?>" type="number" min="0" max="6" required>
               
                    <button type="button" class="btn btn-secondary ml-1" data-bs-container="body" data-bs-toggle="popover" title="User Types" data-bs-placement="bottom" data-bs-html="true" data-bs-content="0=Pesanan Dikirm.<br> 1=Pesanan Diterima.<br> 2=Menyiapkan Pesanan Anda.<br> 3=Pesanan Sedang Dikirim!<br> 4=Pesanan Telah Sampai.<br> 5=Pesanan Ditolak.<br> 6=Pesanan Dibatalkan.">
                    <i class="fas fa-info"></i>
                 </button>
            </div>
            <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>">
            <button type="submit" class="btn mb-2 d-grid gap-2 col-4 mx-auto" name="updateStatus" style="background-color:#5572fe;color:white;">Perbarui</button>
        </form>
        <?php 
            $deliveryDetailSql = "SELECT * FROM `delivery` WHERE `orderId`= $orderid";
            $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = isset($deliveryDetailRow['id']);
            $deliveryBoyName = isset($deliveryDetailRow['deliveryName']);
            $deliveryBoyPhoneNo = isset($deliveryDetailRow['deliveryPhone']);
            $deliveryTime = isset($deliveryDetailRow['deliveryTime']);
            if($orderStatus>0 && $orderStatus<5) { 
        ?>
            <form action="partials/_orderManage.php" method="post">
                <div class="text-left my-2">
                    <b><label for="name">Nama Pengirim</label></b>
                    <input class="form-control" id="name" name="name" value="<?php echo $deliveryBoyName; ?>" type="text" required>
                </div>
                <div class="text-left my-2 row">
                    <div class="form-group col-md-6">
                        <b><label for="phone">No Hp</label></b>
                        <input class="form-control" id="phone" name="phone" value="<?php echo $deliveryBoyPhoneNo; ?>" type="tel" required pattern="[0-9]{11,}" maxlength="14">
                    </div>
                    <div class="form-group col-md-6">
                        <b><label for="catId">Perkirakan Waktu (menit)</label></b>
                        <input class="form-control" id="time" name="time" value="<?php echo $deliveryTime; ?>" type="number" min="1" max="120" required>
                    </div>
                </div>
                <input type="hidden" id="trackId" name="trackId" value="<?php echo $trackId; ?>">
                <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>">
                <button type="submit" class="btn d-grid gap-2 col-4 mx-auto" name="updateDeliveryDetails" style="background-color:#fac031;">Perbarui</button>
            </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>