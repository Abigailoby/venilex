<?php
    include '_dbconnect.php';
    session_start();
    $userId = $_SESSION['userId'];
    
    
    if(isset($_POST["updateProfilePic"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $newfilename = "urang-".$userId.".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foodKita/image/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Berhasil!!');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Upload gambar gagal, Mohon coba lagi.');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Mohon pilih sebuah gambar untuk upload.");
                window.history.back(1);
            </script>';
        }
    }

    if(isset($_POST["updateProfileDetail"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password =$_POST["password"];

        $passSql = "SELECT * FROM users WHERE id='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        if (password_verify($password, $passRow['password'])){ 
            $sql = "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `phone` = '$phone' WHERE `id` ='$userId'";   
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Pembaruan berhasil.");
                        window.history.back(1);
                    </script>';
            }else{
                echo '<script>alert("Update gagal, mohon coba lagi.");
                        window.history.back(1);
                    </script>';
            } 
        }
        else {
            echo '<script>alert("Kata Sandi salah.");
                        window.history.back(1);
                    </script>';
        }
    }
    
    if(isset($_POST["removeProfilePic"])){
        $filename = $_SERVER['DOCUMENT_ROOT']."/foodKita/image/urang-".$userId.".jpg";
        if (file_exists($filename)) {
            unlink($filename);
            echo "<script>alert('Terhapus');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Foto tidak tersedia.');
                window.location=document.referrer;
            </script>";
        }
    }
    
?>