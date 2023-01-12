<?php

session_start();
session_destroy();

header("location: /foodKita/index.php");
?>