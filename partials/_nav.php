<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"> -->
<link rel="stylesheet" href="../css/nav.css">

<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

echo '<nav class="navbar navbar-expand-lg bg-light sticky-top ">
<div class="container-fluid">
  <a class="navbar-brand img-fluid" href="index.php"><img src="image/FoodKita.png" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link ms-1" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ms-1" href="menu.php">Menu</a>
      </li>

      <li class="nav-item">
      <a class="nav-link ms-1" href="order.php">Orders</a>
    </li>

      <li class="nav-item">
        <a class="nav-link ms-1" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ms-1" href="contact.php">Contact</a>
      </li>
    </ul>';

       $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }
    echo ' <a href="viewCart.php"><button type="button" class="btn btncart mx-2 me-3">
      <i class="keranjang bi-cart3 me-1">Cart (' .$count. ')</i>
    </button>
    </a> ';
    echo '
    <form  method="get" action="/foodKita/search.php" class="d-flex" role="search">
      <input class="px-2 search" type="search" placeholder="Search" name="search" id="search" aria-label="Search" required>
      <button class="btn0 me-2" type="submit">Search</button>
    </form>
    ';

    if($loggedin) {
      echo '<ul class="navbar-nav dd me-3">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> Welcome ' .$username. '</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="partials/_logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small pp">
            <a href="viewProfile.php"><img src="image/urang-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'image/profilePic.jpg\'" style="width:40px; height:40px"></a>
          </div>';
    }

    else {
      echo '
      <button type="button" class="btnL"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button type="button" class="btnS"  data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
    }

    echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show mb-0 animate__animated animate__fadeInDown" role="alert">
              <strong>Berhasil!</strong> Anda Bisa login Sekarang.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '
      <div class="alert alert-warning alert-dismissible fade show mb-0 animate__animated animate__fadeInDown" role="alert">
              <strong>Peringatan!</strong> ' .$_GET['error']. '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show mb-0 animate__animated animate__fadeInDown" role="alert">
              <strong>Berhasil!</strong> Anda Telah Berhasil Login
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-danger alert-dismissible fade show mb-0 animate__animated animate__fadeInDown" role="alert">
      <strong>Maaf,</strong> username Anda atau password Anda salah.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>
    </div>';
    }
?>

<style>
  .modal-open{
    padding-right: 0px !important;
  }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
