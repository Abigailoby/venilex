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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Rubik&display=swap" rel="stylesheet">

  <!-- css modif -->
  <link rel="stylesheet" href="css/nav.css">
  
 </head>
<body >
    
<?php include 'partials/_dbconnect.php';?>
  <?php require 'partials/_nav.php'; ?>

    <!-- product -->
  <div class="container my-3 mb-5" >
  <div class="row py-5 text-center">
     <div class="col-lg-6 m-auto bg-warning animate__animated animate__fadeInDown" style="margin:auto;border-top: 2px groove #5572fe;border-bottom: 2px groove #5572fe;">
          <h2 >Menu</h2>
        </div>
       
      </div>
    
      <div class="row">
      <?php 
        $sql = "SELECT * FROM `kategori`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['categorieId'];
          $cat = $row['categorieName'];
          $desc = $row['categorieDesc'];
          echo '<div class=" col-auto mx-xs-auto mt-3 animate__animated animate__fadeInLeft">
                  <div class="card" style="width: 20rem;border: 1px groove #5572fe;">
                    <img src="image/kateg-'.$id. '.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                    <div class="card-body">
                      <h5 class="card-title"><a href="viewFoodList.php?catid=' . $id . '">' . $cat . '</a></h5>
                      <p class="card-text">' . substr($desc, 0, 25). '... </p>
                      <a href="viewFoodList.php?catid=' . $id . '" class="btn btn-primary d-grid gap-2 col-auto mx-auto">Selengkapnya</a>
                    </div>
                  </div>
                </div>';
        }
      ?>
    </div>
  </div>
  <!-- product end -->

  <?php require 'partials/_footer.php' ?>

<style>
    footer img{
width: 150px;
}
</style>

</body>
</html>