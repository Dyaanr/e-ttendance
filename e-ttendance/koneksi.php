<?php
    $localhost      = "localhost";
    $username       = "root";
    $password       = "";
    $databaseName   = "db_pesat";

    $koneksi = new mysqli($localhost, $username, $password, $databaseName);

    if ($koneksi->connect_error) {
        die("koneksi gagal" . $koneksi->connect_error);
    }