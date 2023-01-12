<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">    
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
<link rel = "icon" href ="../image/FK4.png" type = "image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
<title>User</title>
<?php

        require 'partials/_dbconnect.php';
        require 'partials/_nav.php';

?>

<style>
    body{
        background: #80808045;
    }
    .goo{
        background-color: #5572fe;
        color:white;
    }

    .goo:hover{
        background-color: #4169E1;
        color:white;
    }

    .pala{
        background-color: #fac031;
    }
</style>
<div class="container-fluid" style="margin-top:98px">
	
	<div class="row">
        <div class="col-lg-12 animate__animated animate__bounceInLeft">
            <button class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#newUser"><i class="fa fa-plus"></i> Pengguna Baru</button>
        </div>
	</div>
	    <br>
	<div class="row" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="100">
		<div class="card col-lg-12" style="border:1px solid #5572fe">
			<div class="card-body">
                <div class="table-responsive">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead class="pala">
                        <tr>
                            <th>Id</th>
                            <th style="width:7%">Foto</th>
                            <th>Nama Pengguna</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM users"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $username = $row['username'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $userType = $row['userType'];
                                if($userType == 0) 
                                    $userType = "user";
                                else
                                    $userType = "Admin";

                                echo '<tr>
                                    <td>' .$Id. '</td>
                                    <td><img src="/foodKita/image/urang-' .$Id. '.jpg" alt="image for this user" onError="this.src =\'/foodKita/image/profilePic.jpg\'" width="100px" height="100px"></td>
                                    <td>' .$username. '</td>
                                    <td class="p-3">
                                        <p>Nama Depan : <b>' .$firstName. '</b></p>
                                        <p>Nama Belakang : <b>' .$lastName. '</b></p>
                                    </td>
                                    <td>' .$email. '</td>
                                    <td>' .$phone. '</td>
                                    <td>' .$userType. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                        <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editUser' .$Id. '" style="width:100%">Ubah</button>';
                                if($Id == 1){
                                    echo '<button class="btn btn-danger" disabled style="width:100%">Hapus</button>';
                                }
                                else{
                                    echo'<form action="partials/_userManage.php" method="POST">
                                    <button name="removeUser" class="btn btn-danger" style="width:100%">Hapus</button>
                                    <input type="hidden" name="Id" value="'.$Id.'">
                                    </form>';
                                }
                                echo '</div> 
                                </div>
                                    </td>
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

<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pala">
        <h5 class="modal-title" id="newUser">Bikin Pengguna Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_userManage.php" method="post">
              <div class="form-group">
                  <b><label for="username">Nama Pengguna</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Nama Pengguna" type="text" required minlength="3" maxlength="11" oninvalid="this.setCustomValidity('Masukkan Nama Pengguna')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="firstName">Nama Depan:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nama Depan" required oninvalid="this.setCustomValidity('Masukkan Nama Depan')"
  oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Nama Belakang:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Nama Belakang" required oninvalid="this.setCustomValidity('Masukkan Nama Belakang')"
  oninput="this.setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Email harus memuat karakter @')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group row my-0 mt-3">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">No Hp:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Masukkan no HP" required pattern="[0-9]{11,}" maxlength="13" oninvalid="this.setCustomValidity('Harus berisi angka dan panjangnya 11 digit.')"
  oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                  <b><label for="password">Kata Sandi:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi" type="password" required data-toggle="password" minlength="4" maxlength="21" oninvalid="this.setCustomValidity('Masukkan Kata Sandi')"
  oninput="this.setCustomValidity('')">
              </div>
              <div class="form-group">
                  <b><label for="password1">Konfirmasi Kata Sandi:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Konfirmasi Kata Sandi" type="password" required data-toggle="password" minlength="4" maxlength="21"oninvalid="this.setCustomValidity('Masukkan Kata Sandi')"
  oninput="this.setCustomValidity('')">
              </div>
              <button type="submit" name="createUser" class="btn d-grid gap-2 col-4 mx-auto mt-3 goo">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `users`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $name = $userRow['username'];
        $firstName = $userRow['firstName'];
        $lastName = $userRow['lastName'];
        $email = $userRow['email'];
        $phone = $userRow['phone'];
        $userType = $userRow['userType'];


?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pala">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">User Id: <b><?php echo $Id; ?></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
        <div class="modal-body">
            
            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                <div class="form-group col-md-8">
                    <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                        <b><label for="image">Foto Profil</label></b>
                        <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Mohon upload .jpg.</small>
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn goo mt-3" name="updateProfilePhoto">Perbarui Gambar</button>
                    </form>         
                </div>
                <div class="form-group col-md-4">
                    <img src="/foodKita/image/urang-<?php echo $Id; ?>.jpg" alt="Profile Photo" width="100" height="100" onError="this.src ='/foodKita/image/profilePic.jpg'">
                    <form action="partials/_userManage.php" method="post">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn goo mt-2" name="removeProfilePhoto">Hapus Gambar</button>
                    </form>
                </div>
            </div>
            
            <form action="partials/_userManage.php" method="post">
                <div class="form-group">
                    <b><label for="username">Nama Pengguna</label></b>
                    <input class="form-control" id="username" name="username" value="<?php echo $name; ?>" type="text" disabled>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <b><label for="firstName">Nama Depan:</label></b>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="lastName">Nama Belakang:</label></b>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                </div>
                </div>
                <div class="form-group">
                    <b><label for="email">Email:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group row my-0 mt-3">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">No Hp:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Tipe:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <?php 
                            if($userType == 1) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn goo d-grid gap-2 col-4 mx-auto">Perbarui</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php
    }
?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>