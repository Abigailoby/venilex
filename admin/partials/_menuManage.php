<?php
    include '_dbconnect.php';

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `food` (`foodName`, `foodPrice`, `foodDesc`, `foodCategorieId`, `foodPubDate`) VALUES ('$name', '$price', '$description', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $foodId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'makan-'.$foodId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foodKita/image/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('berhasil');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('gagal');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Mohon pilih gambar untuk upload.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('gagal');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $foodId = $_POST["foodId"];
        $sql = "DELETE FROM `food` WHERE `foodId`='$foodId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/foodKita/image/makan-".$foodId.".jpg";
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
    if(isset($_POST['updateItem'])) {
        $foodId = $_POST["foodId"];
        $foodName = $_POST["name"];
        $foodDesc = $_POST["desc"];
        $foodPrice = $_POST["price"];
        $foodCategorieId = $_POST["catId"];

        $sql = "UPDATE `food` SET `foodName`='$foodName', `foodPrice`='$foodPrice', `foodDesc`='$foodDesc', `foodCategorieId`='$foodCategorieId' WHERE `foodId`='$foodId'";   
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
    if(isset($_POST['updateItemPhoto'])) {
        $foodId = $_POST["foodId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'makan-'.$foodId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/foodKita/image/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
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
            echo '<script>alert("Mohon pilih gambar untuk upload.");
            window.location=document.referrer;
                </script>';
        }
    }
?>