<?php
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    session_destroy();
    header("Location: login.php");
?>