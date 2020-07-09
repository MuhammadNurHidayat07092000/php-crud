<?php
    session_start();
    session_unset();// hilangin isi trus apus
    session_destroy();
    header('location: login.php');
?>