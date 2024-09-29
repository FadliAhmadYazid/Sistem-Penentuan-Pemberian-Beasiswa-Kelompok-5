<?php
session_start();

// Prevent access to the dashboard (index) if already logged in
if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="adjimuhamadzidan">
    <link rel="icon" type="image/x-icon" href="assets/img/logo_beasiswa.png">
    <title>Sistem Penentuan Pemberian Beasiswa - Login</title>

    <!-- Custom fonts and styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        body {
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
            background-image: url("assets/img/background1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .leaves-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none; /* Prevent interaction with the leaves */
        }

        .leaf {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: transparent;
            border-radius: 50%;
            animation: falling 8s ease-in-out infinite;
        }

        @keyframes falling {
            0% {
                transform: translateY(-10%);
            }
            100% {
                transform: translateY(3220%);
            }
        }

        .leaf:nth-child(1) { left: 5%; top: -5%; animation-delay: 0.5s; }
        .leaf:nth-child(2) { left: 25%; top: -10%; animation-delay: 2s; }
        .leaf:nth-child(3) { left: 45%; top: -15%; animation-delay: 3.5s; }
        .leaf:nth-child(4) { left: 65%; top: -20%; animation-delay: 1s; }
        .leaf:nth-child(5) { left: 85%; top: -25%; animation-delay: 2.5s; }
        .leaf:nth-child(6) { left: 95%; top: -15%; animation-delay: 2.5s; }
        .leaf:nth-child(7) { left: 55%; top: -15%; animation-delay: 1.5s; }
        .leaf:nth-child(8) { left: 20%; top: -15%; animation-delay: 1.0s; }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .login-box {
            display: flex;
            width: 800px;
            max-width: 90%;
            background-color: rgba(255, 255, 255, 0.2); /* Transparansi pada box utama */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-box .info-section {
            flex: 1;
            background-color: rgba(255, 255, 255, 0.4); /* Transparansi pada bagian info */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-right: 2px solid rgba(240, 240, 240, 0.4);
        }

        .login-box .info-section img {
            max-width: 120px;
            margin-bottom: 15px;
        }

        .login-box .info-section h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            color: #333;
            font-weight: bold; /* Menebalkan teks BeaSmart */
            text-align: center;
            margin: 0;
        }

        .login-box .info-section span {
            font-size: 14px;
            color: #222; /* Membuat teks lebih hitam */
            text-align: center;
        }

        .login-box .form-section {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.3); /* Transparansi pada bagian form */
            backdrop-filter: blur(10px);
        }

        .form-section h3 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 20px;
            color: #000;
        }

        .form-section input[type="text"],
        .form-section input[type="password"] {
            width: 90%;
            height: 45px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .form-section input[type="submit"] {
            background-color: #007bff; /* Warna biru untuk tombol */
            width: 90%;
            height: 45px;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-section input[type="submit"]:hover {
            background-color: #0056b3; /* Warna biru yang lebih gelap saat hover */
        }
    </style>
</head>

<body>
    <div class="leaves-container">
        <!-- Add the leaves images for animation -->
        <div class="leaf"><img src="assets/img/leave2.png"></div>
        <div class="leaf"><img src="assets/img/leave2.png"></div>
        <div class="leaf"><img src="assets/img/leave2.png"></div>
        <div class="leaf"><img src="assets/img/leave2.png"></div>
        <div class="leaf"><img src="assets/img/leave1.png"></div>
        <div class="leaf"><img src="assets/img/leave1.png"></div>
        <div class="leaf"><img src="assets/img/leave1.png"></div>
        <div class="leaf"><img src="assets/img/leave1.png"></div>
    </div>

    <div class="login-container">
        <div class="login-box">
            <div class="info-section">
                <img src="assets/img/logo_beasiswa.png" alt="Logo Beasiswa">
                <h1>BeaSmart</h1>
                <span>Sistem Penentuan Pemberian Beasiswa</span>
            </div>
            <div class="form-section">
                <h3>Admin Login</h3>
                <?php if (isset($_SESSION['status'])) : ?>
                    <div class="alert alert-danger rounded-0 small" role="alert" id="notif">
                        <?= $_SESSION['status']; ?>
                    </div>
                    <?php unset($_SESSION['status']); ?>
                <?php endif; ?>

                <form method="post" action="config/proses_login.php">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login" name="masuk">
                </form>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

    <script>
        let popup = document.getElementById('notif');
        if (popup && popup.style.display === 'block') {
            setTimeout(() => {
                popup.style.opacity = '0';
                popup.style.transition = 'opacity 1s ease-in-out';
                setTimeout(() => popup.style.display = 'none', 1000);
            }, 1000);
        }
    </script>
</body>
</html>
