<style>
  .body{
    padding-right: 0px !important;
  }
</style>
<!-- Modal -->
<div class="modal fade me-0" id="loginModal" tabindex="-1"  aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #fac031;">
        <h1 class="modal-title fs-5" id="loginModal">Login Disini</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 3px solid #5572fe;"></button>
      </div>
      <div class="modal-body">
      <form action="partials/_handleLogin.php" method="post">
              <div class="text-left my-2">
                  <b><label for="username">Nama Pengguna</label></b>
                  <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required oninvalid="this.setCustomValidity('Masukkan Nama Pengguna')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="text-left my-4">
                  <b><label for="password">Kata Sandi</label></b>
                  <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password" oninvalid="this.setCustomValidity('Masukkan Kata Sandi')"
  oninput="this.setCustomValidity('')">
              </div>
              <button type="submit" class="btn form-control mt-3" style="background-color: #5572fe; color: white; ">Login</button>
            </form>
            <p class="mb-0 mt-2">Belum punya akun? <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signupModal" style="color: blue;">Daftar Sekarang</a>.</p>
          
      </div>
    </div>
  </div>
</div>


