<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Username DB Anda
$dbpassword = "";   // Password DB Anda
$dbname = "techdeveloper";

// Buat koneksi
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah ID pesanan ada pada URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Query untuk membatalkan pesanan
    $stmt = $conn->prepare("UPDATE user SET status = 'Canceled' WHERE id = ?");
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        $_SESSION['order_message'] = "Pesanan berhasil dibatalkan!";
    } else {
        $_SESSION['order_message'] = "Error: " . $stmt->error;
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();

    header("Location: index.php"); // Redirect ke halaman utama
    exit();
} else {
    $_SESSION['order_message'] = "ID pesanan tidak ditemukan!";
    header("Location: index.php");
    exit();
}
?>
