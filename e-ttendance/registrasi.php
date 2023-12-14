<?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["reg_username"]) && isset($_POST["reg_password"])) {
            $username = $_POST["reg_username"];
            $password = $_POST["reg_password"];

            $encryp_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password) VALUES ('$username', '$encryp_password')";

            if($koneksi->query($query) === TRUE) {
                echo "<script>
                        window.location.href = 'index.php';
                    </script>";
            } else {
                echo "Error " . $query . "<br>" . $koneksi->error;
            }
        }
    }