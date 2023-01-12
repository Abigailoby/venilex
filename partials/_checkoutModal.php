<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #fac031;">
            <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 3px solid #5572fe;">
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <div class="form-group">
                    <b><label for="address">Alamat:</label></b>
                    <input class="form-control" id="address" name="address" placeholder="jalan kaliurang" type="text"  required minlength="3" maxlength="500" oninvalid="this.setCustomValidity('setidaknya 3 kata')"
  oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                    <b><label for="kabupaten">Kabupaten:</label></b>
                    <input class="form-control" id="kabupaten" name="kabupaten" placeholder="Sleman" type="text" title="setidaknya 3 kata" required minlength="3" maxlength="500" oninvalid="this.setCustomValidity('setidaknya 3 kata')"
  oninput="this.setCustomValidity('')">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+62</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxxx" required pattern="[0-9]{11,}" title="Harus berisi angka dan minimal 11 digit" maxlength="13" oninvalid="this.setCustomValidity('Harus berisi angka dan minimal 11 digit')"
  oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="kodePos">Kode Pos:</label></b>
                        <input type="text" class="form-control" id="kodePos" name="kodePos" placeholder="xxxxxx" required pattern="[0-9]{6}" title="Harus berisi angka dan 6 digit" maxlength="6" oninvalid="this.setCustomValidity('Harus berisi angka dan panjangnya 6 digit')"
  oninput="this.setCustomValidity('')">                    
                    </div>
                </div>
                <div class="form-group">
                    <b><label for="password">Kata Sandi:</label></b>    
                    <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password" oninvalid="this.setCustomValidity('Masukkan Kata Sandi')"
  oninput="this.setCustomValidity('')">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary d-grid gap-1 col-auto mx-auto" data-bs-dismiss="modal">Batal</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success d-grid gap-1 col-auto mx-auto" style="background-color:#5572fe;">Pesan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>