<?php

require 'koneksi.php';
session_start();

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];


    // cek username dan password
    if (($username == "ADM01" && $password == "sehatqure01") || ($username == "ADM02" && $password == "sehatqure02")) {
        $_SESSION['login'] = true;
        header("location: ../dashboard.php");
    } else {
        header("location: ../../../index.php?error=true");
    }
}
