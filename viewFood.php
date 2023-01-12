<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title>food</title>
    <link rel = "icon" href ="image/FK4.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
  
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4 animate__animated animate__lightSpeedInLeft" id="cont">
        <div class="row">
        <?php
            $foodId = $_GET['foodid'];
            $sql = "SELECT * FROM `food` WHERE foodId = $foodId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $foodName = $row['foodName'];
            $foodPrice = $row['foodPrice'];
            $foodDesc = $row['foodDesc'];
            $foodCategorieId = $row['foodCategorieId'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $foodName; ?>"; </script> 
        <?php
        echo  '<div class="card  bg-light mt-5 shadow">
                <div class = "card-body">
            <div class="col-md-4 float-lg-start">
                <img src="image/makan-'.$foodId. '.jpg" width="249px" height="262px">
            </div>
            <div class="col-md-8 my-4 ms-5 des" >
                <h3>' . $foodName . '</h3>
                <h5 style="color: #ff0000">Rp. '.$foodPrice. '/-</h5>
                <p class="mb-0">' .$foodDesc .'</p>';

                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE foodId = '$foodId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="'.$foodId. '">
                              <button type="submit" name="addToCart" class="btn btn-primary my-2">Tambah Keranjang</button>';
                    }else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Ke Keranjang</button></a>';
                    }
                }
                else{
                    echo '<button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#loginModal">Tambah Keranjang</button>';
                }
                echo '</form>
                <h6 class="my-1"> Lihat </h6>
                <div class="mx-4">
                    <a href="viewfoodList.php?catid=' . $foodCategorieId . '" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>Semua Makanan</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="menu.php" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>Semua Menu</span>
                    </a>
                </div>
            </div>
            </div>
            </div>'
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <style>
        footer img{
    width: 150px;
}
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>