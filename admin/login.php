<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
   <title>Login</title>
    <link rel = "icon" href ="../image/FK4.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main id="main" class=" bg-dark animate__animated animate__fadeIn">
        <div id="login-left">
        <div class="logo">
            <img src="../image/FoodKita.png" alt="">
        </div>
        </div>
        <div id="login-right">
        <div class="card col-md-8">
            <div class="card-body">
            <form action="partials/_handleLogin.php" method="post">
                <div class="form-group">
                <label for="username" class="control-label"><b>Nama Pengguna</b></label>
                <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group">
                <label for="password" class="control-label mt-2"><b>Kata Sandi</b></label>
                <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary form-control mt-3">Login</button>
            </form>
            </div>
        </div>
        </div>
    </main>  

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>