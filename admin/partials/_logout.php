<?php

session_start();
session_destroy();

header('Location: /foodKita/admin/login.php');
?>
