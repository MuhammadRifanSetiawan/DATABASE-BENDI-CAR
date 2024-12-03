<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    if (empty($username) || empty($password)) {
        echo "Semua kolom wajib diisi!";
        exit;
    }

    $query = "SELECT * FROM petugas WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            header("Location: petugas.php");
            exit;
        } else {
            echo "Username atau password salah.";
        }

    if (empty($username) || empty($password)) {
        echo "Semua kolom wajib diisi!";
        exit;
    }

    $query = "SELECT * FROM login WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            header("Location: penyewaan.html");
            exit;
        } else {
            echo "Username atau password salah.";
        }
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}

    $stmt->close();
    $conn->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>