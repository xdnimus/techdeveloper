<?php
session_start(); // Memulai sesi untuk mengambil pesan

// Cek apakah ada pesan yang sudah diset di session dan tampilkan
$message = isset($_SESSION['order_message']) ? $_SESSION['order_message'] : '';
// Hapus pesan setelah ditampilkan
unset($_SESSION['order_message']);

// Proses pengiriman form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $additionalInfo = $_POST['additionalInfo'];
    
    // Simulasikan pemrosesan pesanan (misalnya, menyimpan ke database)
    // ...

    // Set pesan sukses di session
    $_SESSION['order_message'] = 'Pesanan Anda telah berhasil diterima!';
    
    // Redirect untuk menampilkan pesan sukses
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechDeveloper</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Styling untuk pesan konfirmasi */
        .confirmation-message {
            padding: 10px;
            margin: 20px 0;
            background-color: #4CAF50; /* Green color */
            color: white;
            text-align: center;
            border-radius: 5px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-left">
            <img src="logo2.jpg" alt="Logo" class="logo"> <!-- Add logo image here -->
            <h1>TechDeveloper</h1>
        </div>
        <ul class="navbar-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#service">Service</a></li>
        </ul>
    </div>
</body>
</html>
  
    <div id="home" class="container">
        <div class="content">
            <div class="text">
                <p>Bingung Cari Programmer dan Desainer Terbaik?</p>
                <h2>Kami wujudkan ide Anda dengan cepat, tepat, dan berkualitas</h2>
                <p2>Penyedia layanan pembuatan aplikasi digital yang terpercaya</p2>
            </div>
            <!-- <div class="buttons">
                <a href="#login" class="login-btn">Login</a>
                <a href="#signup" class="signup-btn">Sign up</a>
            </div> -->
        </div>
        <p class="p-footer">Version 1.0.0</p>
    </div>


<!-- <div id="loginForm" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('loginForm')">&times;</span>
        <h2>Login</h2>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>


<div id="registerForm" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('registerForm')">&times;</span>
        <h2>Register</h2>
        <form>
            <label for="newUsername">Username:</label>
            <input type="text" id="newUsername" name="newUsername" required>
            <label for="newPassword">Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>
            <label for="newPasswordConfirm">Confirm Password:</label>
            <input type="password" id="newPasswordConfirm" name="newPasswordConfirm" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</div> -->


   <!-- Pricing Section -->
<div id="pricing" class="pricing-section">
    <div class="container">
        <div class="pricing-card">
            <div class="badge">Basic</div>
            <h3>5 halaman</h3>
            <p>Free Domain<br>Free SSL<br>SEO basic<br>Free Email Bisnis<br>penyimpanan 500 MB</p>
            <div class="price">IDR 88.000</div>
            <button class="order-button" onclick="setPackageType('basic')">ORDER</button>
        </div>

        <div class="pricing-card">
            <div class="badge premium-badge">Premium</div>
            <h3>15 halaman</h3>
            <p>Free Domain<br>Free SSL<br>SEO basic<br>Free Email Bisnis<br>penyimpanan 2 GB</p>
            <div class="price">IDR 180.000</div>
            <button class="order-button" onclick="setPackageType('premium')">ORDER</button>
        </div>

        <div class="pricing-card">
            <div class="badge">Profesional</div>
            <h3>10 halaman</h3>
            <p>Free Domain<br>Free SSL<br>SEO basic<br>Free Email Bisnis<br>penyimpanan 1 GB</p>
            <div class="price">IDR 128.000</div>
            <button class="order-button" onclick="setPackageType('professional')">ORDER</button>
        </div>
    </div>
</div>


<!-- Order Form Modal -->
<div id="orderFormModal" class="modal">
    <div class="modal-content">
        <h2>Order Form</h2>
        
        <!-- Form mengarah ke orderForm.php -->
        <form id="orderForm" action="orderForm.php" method="POST">
            <!-- Hidden input untuk menyimpan tipe paket -->
            <input type="hidden" id="package_type" name="package_type" value="">
            
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" placeholder="Nama Lengkap" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            
            <label for="phone">Nomor Telepon</label>
            <input type="text" id="phone" name="phone" placeholder="Nomor Telepon" required>
            
            <textarea id="additionalInfo" name="additionalInfo" placeholder="Tuliskan kebutuhan tambahan Anda di sini..."></textarea>
            
            <button type="submit" class="order-button">Kirim Order</button>

            <span class="close" onclick="closeModal('orderFormModal')">&times;</span>
            <button class="back-button" onclick="closeModal('orderFormModal')">Back</button>
        </form>
    </div>
</div>




    <!-- Service Section -->
<div id="service" class="service-section">
    <h2>Our Services</h2>
    <p>Mengapa pilih jasa pembuatan website di Tech Developer</p>

    <div class="services">
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/clock.png" alt="Quick and Professional">
            <h3>Quick & Professional Development</h3>
        </div>
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/document.png" alt="Elegant & Responsive Design">
            <h3>Elegant & Responsive Design</h3>
        </div>
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/rocket.png" alt="SEO Friendly">
            <h3>SEO Friendly Websites</h3>
        </div>
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/easy.png" alt="Easy Management">
            <h3>Easy to Manage Websites</h3>
        </div>
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/medal.png" alt="Experienced Team">
            <h3>Experienced Development Team</h3>
        </div>
        <div class="service">
            <img src="https://img.icons8.com/ios-filled/50/6b46c1/chat.png" alt="Free Consultation">
            <h3>Free Consultation</h3>
        </div>
    </div>
</div>

<!-- Technology Section -->
<div class="tech-section">
    <h2>Technology</h2>
    <div class="tech-container">
        <img src="html.jpg" >
        <img src="js.jpg" >
        <img src="ps.jpg" >
        <img src="css.jpg" >
        <img src="react.jpg" >
        <img src="nodejs.jpg" >
        <img src="php.jpg" >
  </div>

</div>
<footer>
    <div class="footer-content">
    <div class="footer-left">
        <img src="logo2.jpg" alt="Logo" class="logo">
        <h3>TechDeveloper</h3>
        <p>Social Media</p>
        <div class="social-icons">
            <a href="https://wa.me/6285664246194"><img src="whatsapp.png"></a>
            <a href="https://www.instagram.com/techdeveloper.id"><img src="instagram.png"></a>
            <a href="https://id.linkedin.com/in/sandhikagalih"><img src="linkedln.png"></a>
        </div>
    </div>
    <div class="footer-right">
        <p>Lebih Murah! Lebih Hemat!</p>
        <span>Web Hosting Gratis Domain mulai dari <strong>IDR. 10.000/bln</strong></span>
    </div>
    
</div>
</footer>
<script>
   // Function to open modal
function openModal(formId) {
    document.getElementById(formId).style.display = "flex";
}

// Function to close modal
function closeModal(formId) {
    document.getElementById(formId).style.display = "none";
}

// Event listeners for login and signup buttons
document.querySelector(".login-btn").addEventListener("click", function(event) {
    event.preventDefault();
    openModal("loginForm");
});

document.querySelector(".signup-btn").addEventListener("click", function(event) {
    event.preventDefault();
    openModal("registerForm");
});
// Function to open modal
function openModal(formId) {
    document.getElementById(formId).style.display = "flex";
}

// Function to close modal
function closeModal(formId) {
    document.getElementById(formId).style.display = "none";
}

// Optional: Close modal when clicking outside the modal content
window.onclick = function(event) {
    var modal = document.getElementById('orderFormModal');
    if (event.target === modal) {
        closeModal('orderFormModal');
    }
}
function setPackageType(packageType) {
    // Set the hidden input value for package type
    document.getElementById('package_type').value = packageType;
    openModal('orderFormModal'); // Open the order form modal
}

    
</script>

</body>
</html>