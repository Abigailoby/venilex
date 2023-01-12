<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Kita</title>
  <link rel = "icon" href ="image/FK4.png" type = "image/x-icon">
    <!-- bs cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Lobster&family=Nunito:wght@600;700&family=Rubik&display=swap"
    rel="stylesheet">

    <!-- css modif -->
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/nav.css">
  
</head>

<body>
  
<?php include 'partials/_dbconnect.php';?>
<?php require 'partials/_nav.php'; ?>
  

  <!-- kontak -->
  <section class="kontak text-center pb-5 ">
    <div class="container py-5">
      <div class="row py-5">
        <div class="col-lg-6 m-auto">
          <h1> Our Contact</h1>
          <div class="line2 my-4"></div>
          <p>Silahkan menghubungi kontak kami yang ada dibawah apabila ada keperluan.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 text-bg-light my-3 mb-3 animate__animated animate__backInLeft">
          <div class="wa card ">
            <div class="card-body py-5 wa">
                <h5 class="head1 py-3"><i class="bi bi-whatsapp"> </i>Whatsapp</h5>
                <p>081255421255</p>
                <!-- <i class="bi bi-whatsapp"> 081255421255</i> -->
            </div>
          </div>
        </div>

        <div class="col-lg-6 text-bg-light my-3 mb-3 animate__animated animate__backInRight" >
            <div class="gmail card">
              <div class="card-body py-5 gmail">
                  <h5 class="head1 py-3"> <i class="bi bi-envelope"> </i>Gmail</h5>
                  <p>FoodKita523@gmail.com</p>
              </div>
            </div>
          </div>

    </div>
    </div>
  </section>
  
  <!-- kontak end -->

  <?php require 'partials/_footer.php' ?>

<style>
    footer img{
width: 150px;
}

</style>


    <!-- JavaScript Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script> -->
</body>

</html>