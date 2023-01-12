<?php
    include '_dbconnect.php';

    if(isset($_POST['updateStatus'])) {
        $orderId = $_POST['orderId'];
        $status = $_POST['status'];

        $sql = "UPDATE `orders` SET `orderStatus`='$status' WHERE `orderId`='$orderId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Pembaruan berhasil');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('gagal');
                window.location=document.referrer;
                </script>";
        }
    }
    
    if(isset($_POST['updateDeliveryDetails'])) {
        $trackId = $_POST['trackId'];
        $orderId = $_POST['orderId'];
        $name = $_POST['name'];
        $time = $_POST['time'];
        $phone = $_POST['phone'];
        if($trackId == NULL) {
            $sql = "INSERT INTO `delivery` (`orderId`, `deliveryName`, `deliveryPhone`, `deliveryTime`, `dateTime`) VALUES ('$orderId', '$name', '$phone', '$time', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            $trackId = $conn->insert_id;
            if ($result){
                echo "<script>alert('Pembaruan berhasil');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('gagal');
                    window.location=document.referrer;
                    </script>";
            }
        }
        else {
            $sql = "UPDATE `delivery` SET `deliveryName`='$name', `deliveryPhone`='$phone', `deliveryTime`='$time',`dateTime`=current_timestamp() WHERE `id`='$trackId'";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('Pembaruan berhasil');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('gagal');
                    window.location=document.referrer;
                    </script>";
            }
        }
    }

?>