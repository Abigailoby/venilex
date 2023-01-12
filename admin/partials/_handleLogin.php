<?php
    include ('_dbconnect.php');
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from users where userName='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userType = $row['userType'];
        if($userType == 1) {
            $userId = $row['id'];
            if (password_verify($password, $row['password'])){ 
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminusername'] = $username;
                $_SESSION['adminuserId'] = $userId;
                header("location: /foodKita/admin/index.php");
                exit();
            } 
            else{
                echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/foodKita/admin/login.php';
                    </script>";
            }
        }
        else {
            echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/foodKita/admin/login.php';
                    </script>";
        }
    } 
    else{
        echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/foodKita/admin/login.php';
                    </script>";
    }
?>