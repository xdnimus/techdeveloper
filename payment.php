<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .payment-container {
            padding: 20px;
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .bank-option {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            background-color: #f8f8f8;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .bank-option:hover {
            background-color: #f1f1f1;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .bank-name {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
        }
        .account-number {
            font-size: 1.2em;
            margin: 10px 0;
            color: #555;
        }
        .copy-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .copy-button:hover {
            background-color: #45a049;
        }
        .back-button {
        background-color: #2196F3;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
        text-decoration: none;
        
        margin-left: 639px;
        margin-bottom: 50px;
        display: inline-block;
        transition: background-color 0.3s ease;
        text-align: center; /* Menyelaraskan teks di dalam tombol */
    }
        .back-button:hover {
            background-color: #1976D2;
        }
        /* Popup notification styling */
        .popup-notification {
            visibility: hidden;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(76, 175, 80, 0.9);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: visibility 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            font-size: 0.9em;
        }
        .popup-notification.show {
            visibility: visible;
            opacity: 1;
        }
        .cara-pembayaran {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            background-color: #f8f8f8;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="navbar-left">
          
            <h1>TechDeveloper</h1>
        </div>
        <ul class="navbar-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#product">Product</a></li>
        </ul>
    </div>
    <div class="payment-container">
        <?php if (isset($_SESSION['order_message'])) : ?>
            <p><?= $_SESSION['order_message']; ?></p>
        <?php endif; ?>

        <!-- Pilihan Bank -->
        <div class="bank-option">
            <p class="bank-name">Bank BCA</p>
            <img src="bca.png" alt="Bank BCA" style="width: 100px; height: auto;">
            <p class="account-number" id="bcaAccount">123-456-789</p>
            <button class="copy-button" onclick="copyToClipboard('bcaAccount')">Salin Nomor Rekening</button>
        </div>

        <div class="bank-option">
            <p class="bank-name">Bank Mandiri</p>
            <img src="mandiri.png" alt="Bank BCA" style="width: 100px; height: auto;">
            <p class="account-number" id="mandiriAccount">987-654-321</p>
            <button class="copy-button" onclick="copyToClipboard('mandiriAccount')">Salin Nomor Rekening</button>
        </div>

        <div class="bank-option">
            <p class="bank-name">Bank BNI</p>
            <img src="bni.png" alt="Bank BCA" style="width: 100px; height: auto;">
            <p class="account-number" id="bniAccount">555-666-777</p>
            <button class="copy-button" onclick="copyToClipboard('bniAccount')">Salin Nomor Rekening</button>
        </div>
    </div>
    <div class="cara-pembayaran" >
        <p>
            Cara Pembayaran : <br>
            1. Pilih salah satu bank yang tersedia <br>
            2. Salin nomor rekening bank <br>
            3. Lakukan pembayaran ke nomor rekening yang sudah disalin <br>
            4. Setelah melakukan pembayaran, kirimkan bukti pembayaran ke email kami <br>
            5. Tunggu konfirmasi pembayaran dari kami <br>
            6. Silahkan melakukan meeting dengan kami untuk membicarakan project anda melalui contact kami<br>
        </p>
        <div class="contact" >
            <p>
                Contact : <br>
                Email : Techdeveloperr1@gmail.com <br>
                Phone : 08123456789 <br>
        </div>
    </div>
    <!-- Tombol Kembali -->
    <a href="index.php" class="back-button">Kembali ke Halaman Utama</a>
    <!-- Popup Notification -->
    <div class="popup-notification" id="popupNotification">Nomor rekening berhasil disalin!</div>

    <!-- Script Salin Nomor Rekening -->
    <script>
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId).textContent;
            navigator.clipboard.writeText(copyText).then(() => {
                showPopupNotification();
            }).catch(err => {
                alert("Gagal menyalin nomor rekening, silakan coba lagi.");
            });
        }

        function showPopupNotification() {
            var popup = document.getElementById("popupNotification");
            popup.classList.add("show");
            setTimeout(() => {
                popup.classList.remove("show");
            }, 3000); // Hapus notifikasi setelah 3 detik
        }
    </script>
</body>
</html>
