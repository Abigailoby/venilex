<?php
    include '_dbconnect.php';

    if(isset($_POST['createCategory'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO `kategori` (`categorieName`, `categorieDesc`, `categorieCreateDate`) VALUES ('$name', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $catId = $conn->insert_id;
        if($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newfilename = "kateg-".$catId.".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foodKita/image/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('berhasil');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('gagal upload gambar');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Mohon pilih sebuah gambar untuk upload.");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/foodKita/image/kateg-".$catId.".jpg";
        $sql = "DELETE FROM `kategori` WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Terhapus');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];

        $sql = "UPDATE `kategori` SET `categorieName`='$catName', `categorieDesc`='$catDesc' WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Perbarui');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCatPhoto'])) {
        $catId = $_POST["catId"];
        $check = getimagesize($_FILES["catimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'kateg-'.$catId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foodKita/image/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Berhasil');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Gagal');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Mohon Pilih gambar untuk upload.");
            window.location=document.referrer;
                </script>';
        }
    }
?>