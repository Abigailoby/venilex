<style>
  .body{
    padding-right: 0px !important;
  }
</style>

<!-- Modal -->
<div class="modal fade me-0" id="signupModal" tabindex="-1"  aria-labelledby="signupModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #fac031;">
        <h1 class="modal-title fs-5" id="loginModal">SignUp Disini</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 3px solid #5572fe;"></button>
      </div>
      <div class="modal-body">
      <form action="partials/_handleSignup.php" method="post">
              <div class="form-group">
                  <b><label for="username">Nama Pengguna</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Masukkan nama pengguna" type="text" required minlength="4" maxlength="12" oninvalid="this.setCustomValidity('Masukkan nama pengguna setidaknya 4 kata')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                  <b><label for="firstName">Nama Depan:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="nama depan" required oninvalid="this.setCustomValidity('Masukkan nama depan')"
  oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Last name:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="nama belakang" required oninvalid="this.setCustomValidity('Masukkan nama belakang')"
  oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required oninvalid="this.setCustomValidity('Email harus memuat karakter @')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group">
                <b><label for="phone">No Hp:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+62</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Masukkan nomor hp" pattern="[0-9]{11,}" required  maxlength="12" oninvalid="this.setCustomValidity('Harus berisi angka dan panjangnya 11 digit ')"
  oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Kata Sandi:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" type="password" required data-toggle="password" minlength="4" maxlength="21" oninvalid="this.setCustomValidity('Masukkan kata sandi ')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="text-left my-2">
                  <b><label for="password1">Konfirmasi kata sandi:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Konfirmasi kata sandi" type="password" required data-toggle="password" minlength="4" maxlength="21" oninvalid="this.setCustomValidity('Masukkan kata sandi ')"
  oninput="this.setCustomValidity('')">
              </div>
              <button type="submit" class="btn form-control mt-2" style="background-color: #5572fe; color: white; ">Kirim</button>
            </form>
            <p class="mb-0 mt-2">Sudah memiliki akun? <a href="#" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal" style="color:blue;">Login disini</a>.</p>
          </div>
    </div>
  </div>
</div>


