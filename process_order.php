<?php
session_start();

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'your_database_name';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah ada data order_id dan action yang diterima
if (isset($_POST['order_id'], $_POST['action'])) {
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];

    // Perbarui status pesanan sesuai aksi
    if ($action === 'complete') {
        $sql = "UPDATE orders SET status = 'completed' WHERE order_id = ?";
    } elseif ($action === 'cancel') {
        $sql = "DELETE FROM orders WHERE order_id = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['order_message'] = "Pesanan berhasil diperbarui!";
    } else {
        $_SESSION['order_message'] = "Terjadi kesalahan. Silakan coba lagi.";
    }

    $stmt->close();
}

// Arahkan kembali ke halaman keranjang
header("Location: keranjang.php");
exit();
?>
