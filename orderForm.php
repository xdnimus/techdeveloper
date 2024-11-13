<?php
session_start(); // Mulai sesi untuk pesan

// Ambil pesan dari session jika ada
$message = isset($_SESSION['order_message']) ? $_SESSION['order_message'] : '';
unset($_SESSION['order_message']); // Hapus pesan setelah ditampilkan

// Pastikan formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $package_type = $_POST['package_type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $additional_info = $_POST['additionalInfo'];

    // Koneksi database
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "techdeveloper";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menyimpan data pesanan
    $stmt = $conn->prepare("INSERT INTO user (package_type, name, email, phone, additional_info) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $package_type, $name, $email, $phone, $additional_info);

    // Eksekusi query
    if ($stmt->execute()) {
        // Pesan pembayaran dengan beberapa pilihan bank
        $_SESSION['order_message'] = "Order berhasil dikirim! Silakan lakukan pembayaran ke salah satu rekening berikut:";

        // Tutup koneksi
        $stmt->close();
        $conn->close();
        header("Location: payment.php"); // Redirect ke halaman pembayaran
        exit();
    } else {
        $_SESSION['order_message'] = "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: index.php"); // Redirect ke halaman formulir jika gagal
        exit();
    }
}
?>
