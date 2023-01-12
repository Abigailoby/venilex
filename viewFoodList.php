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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title id="title">Category</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel = "icon" href ="image/FK4.png" type = "image/x-icon">

    <style>
        
    .kosong{
        min-height: 570px;
    }
    </style>
  
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div>&nbsp;
        <a href="menu.php" class="active text-dark">
        <i class="fas fa-qrcode"></i>
            <span>Semua Menu</span>
        </a>
    </div>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `kategori` WHERE categorieId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categorieName'];
            $catdesc = $row['categorieDesc'];
        }
    ?>
  
    <!-- food container starts here -->
    <div class="container my-3 "  id="cont">
        <div class="col-lg-6 text-center bg-warning my-3 animate__animated animate__fadeInDown" style="margin:auto;border-top: 2px groove #5572fe;border-bottom: 2px groove #5572fe;">     
            <h2 class="text-center"><span id="catTitle">Items</span></h2>
        </div>
        <div class="row ">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `food` WHERE foodCategorieId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $foodId = $row['foodId'];
                $foodName = $row['foodName'];
                $foodPrice = $row['foodPrice'];
                $foodDesc = $row['foodDesc'];
            
                echo '<div class="col-xs-3 col-sm-3 col-md-3 mt-3 " data-aos="fade-right"
                data-aos-offset="300"
                data-aos-easing="ease-in-sine">
                        <div class="card" style="width: 18rem;border: 1px groove #5572fe;">
                            <img src="image/makan-'.$foodId. '.jpg" class="card-img-top" alt="image for this food" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($foodName, 0, 20). '...</h5>
                                <h6 style="color: #ff0000">Rp. '.$foodPrice. '/-</h6>
                                <p class="card-text">' . substr($foodDesc, 0, 29). '...</p>   
                                <div class="row justify-content-center" style="display:block;">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE foodId = '$foodId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST" style="display:contents;">
                                              <input type="hidden" name="itemId" value="'.$foodId. '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-3 btn-sm " style="width:48%;height:35px" >Tambah Keranjang</button>';
                                    }else {
                                        echo ' <a href="viewCart.php"><button class="btn btn-primary mx-3 btn-sm " style="width:39%;height:35px">Ke Keranjang</button></a>';
                                    }
                                }
                                else{
                                    echo '<button class="btn btn-primary mx-3 btn-sm " data-bs-toggle="modal" data-bs-target="#loginModal" style="width:50%;height:35px">Tambah Keranjang</button>';
                                }
                            echo '</form>                            
                                <a href="viewfood.php?foodid=' . $foodId . '" class="mx-auto btn-sm" style="display:contents;"><button class="btn btn-primary " style="width:30%">Lihat</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '
                    <div class="container kosong">
                        <p class="display-4">Maaf Dalam Menu ini Tidak ada barang yang tersedia.</p>
                        <p class="text-center">Akan segera kami perbarui.</p>
                    </div>
                 ';
            }
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
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
    <script>
  AOS.init();
</script>
</body>
</html>