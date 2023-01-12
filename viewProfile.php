<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Food Kita</title>
  <link rel = "icon" href ="image/FK4.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/profile.css">
   
   <style>
        #notfound {
        position: relative;
        height: 89vh;
        background-color: aliceblue;
        }

        #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        }

        .notfound {
        max-width: 410px;
        width: 100%;
        text-align: center;
        }

        .notfound .notfound-404 {
        height: 280px;
        position: relative;
        z-index: -1;
        }

        .notfound .notfound-404 h1 {
        font-family: 'Montserrat', sans-serif;
        font-size: 230px;
        margin: 0px;
        font-weight: 900;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background: url('image/bg.jpg') no-repeat;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: cover;
        background-position: center;
        }


        .notfound h2 {
        font-family: 'Montserrat', sans-serif;
        color: #000;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 0;
        }


        .notfound a {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #0046d5;
        display: inline-block;
        padding: 15px 30px;
        border-radius: 40px;
        color: #fff;
        font-weight: 700;
        box-shadow: 0px 4px 15px -5px #0046d5;
        }


        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
            height: 142px;
            }
            .notfound .notfound-404 h1 {
            font-size: 112px;
            }
        }
    </style>

</head>
<body class="bg-light">
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php'; ?>
    <?php
        if($loggedin) {
    ?>
    
    <div class="container">
        <?php 
            $sql = "SELECT * FROM users WHERE id='$userId'"; 
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $username = $row['username'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $userType = $row['userType'];
            if($userType == 0) {
                $userType = "User";
            }
            else {
                $userType = "Admin";
            }

        ?>
            <!-- poto -->
      <div class="row mt-5">
        <div class="col-lg-6 mx-auto mt-3">
          <div class="card inpo bg-warning shadow ">
            <div class="card-body py-5">
              <div class="text-center">
                <img src="image/urang-<?php echo $userId;?>.jpg" onError="this.src = 'image/profilePic.jpg'" alt="error euy" class="rounded-circle bg-dark mb-3">
              </div>
                <form action="partials/_manageProfile.php" method="POST">
                    <small style="font-size: 14px;">Hapus Gambar: </small><button type="submit" class="btn btn-primary " name="removeProfilePic" style="font-size: 14px;padding: 3px 8px;border-radius: 9px;">Hapus</button>
                </form>
                <form action="partials/_manageProfile.php" method="POST" enctype="multipart/form-data" style="margin-top: 7px;">
                    <div class="upload-btn-wrapper">
                      <small style="font-size: 14px;">Ubah Gambar:</small>
                        <button class="btn upload" >Pilih</button>
                        <input type="file" name="image" id="image" accept="image/*" required>
                    </div>
                    <button type="submit" name="updateProfilePic" class="btn btn-primary updatebtn" style="font-size:13px;padding: 3px 8px;margin-top: -24px;">Perbarui</button>
                </form>
                <ul class="meta list list-unstyled mt-2" style="text-align:center;">
                  <li class="name"><?php echo $firstName." ".$lastName;?>
                      <label class="label label-info">(<?php echo $userType ?>)</label>
                  </li>
                  <li class="email"><?php echo $email?></li>
                  <li class="my-2"><a href="partials/_logout.php"><button class="btn btn-primary" style="font-size: 15px;padding: 3px 8px;">Keluar</button></a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- profile -->

    <div class="card prof col-lg-6 bg-light mx-auto shadow rounded py-3 mt-3">
         <div class="card-body">
            <h2 class="title text-center">Profile<span class="pro-label label label-warning"> (<?php echo $userType?>)</span></h2>
           
            <form action="partials/_manageProfile.php" method="post">
            
            <b><label for="username" class="form-label">Nama Pengguna</label></b>
                
            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" disabled value="<?php echo $username?>">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="firstName" class="form-label">Nama Depan:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required value="<?php echo $firstName?>">
                </div>

                <div class="col">
                    <label for="lastName" class="form-label">Nama Belakang:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="lastName" required value="<?php echo $lastName?>">
                </div>
            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email?>" >
            </div>

            <div class="row">
                <div class="col">
                    <b><label for="phone" class="form-label">No Hp:</label> </b>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number"  pattern="[0-9]{11,}" title="numbers only and are at least 11 digits" maxlength="12" value="<?php echo $phone?>" required>
                        </div>
                </div>
                <div class="col">
                        <b><label class="form-label">Kata Sandi:</label> </b>
                    
                        <div class="input-group mb-3" >
              
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              <input name="password" type="password" class="input form-control" id="txtPassword" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              
                <span class="input-group-text" onclick="password_show_hide()" >
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
          
            </div>

                </div>
            
            </div>
            <div class="mb-3 text-center py-2">
            <button type="submit" name="updateProfileDetail" class="btn btn-primary form-control">Update</button>
                    </div>
               </from>
        </div>
    </div>
        

</div>
        
            
        

    <?php
        }
        else {
            echo '<div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <a href="index.php">Go To Homepage</a>
                </div>
            </div>';
        }
    ?>
    
     
    <script type="text/javascript">
    function password_show_hide() {
  var x = document.getElementById("txtPassword");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type == "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
    
  }
};
</script>

<script>
        $('#image').change(function() {
            var i = $(this).prev('button').clone();
            var file = ($('#image')[0].files[0].name).substring(0, 5) + "..";
            $(this).prev('button').text(file);
        });
        
    </script>

</body>

</html>
