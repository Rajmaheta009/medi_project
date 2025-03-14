<!DOCTYPE html>
<html lang="en">
<?php include '../database/collaction.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/scss/owl.theme.default.scss">
</head>

<body>
    <div class="top-bar" id="header">
        <i class="fas fa-map-marker-alt">Surat,Gujarat</i>
        <i class="fas fa-phone">7600230222</i>
        <i class="fas fa-envelope"><a href="mailto:example@medicine-plus.com">R@JMAHETA.COM</a></i>
        <a href="cart.php">CHECKOUT</a>
        <a href="profile.php">MY ACCOUNT</a>
        <a href="../login_registration/login_registration.html">LOG IN</a>
    </div>
    <div class="header">
        <div class="logo">
            <a href="home_page.php" class="text-decoration-none">
                <img src="https://as2.ftcdn.net/v2/jpg/02/30/64/81/1000_F_230648151_hvErfnvVFY4NVT14AlRxwW6GfbLqdX0B.jpg" alt="Shopping cart with a medical cross">
                <div>
                    <h1>Medicine <span>Plus</span></h1>
                    <p>welcome to our online store</p>
                </div>
            </a>
        </div>
        <div class="contact-info">
            <img src="https://as1.ftcdn.net/v2/jpg/03/36/13/14/1000_F_336131422_TdgWcydQotDk1L9yKYiXmUHqOkQSj052.jpg" alt="Customer service representative">
            <div>
                <p>Have A Question?</p>
                <a href="contact_as.php">Chat with us!</a>
            </div>
        </div>
        <a href="cart.php" class="text-decoration-none">
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </a>
    </div>
    <?php include 'navigation.php'; ?>