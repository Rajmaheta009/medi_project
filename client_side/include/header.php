<!DOCTYPE html>
<html lang="en">

<?php require_once "config.php"  ?> 
<?require_once BASE_PATH . '/database/collaction.php';?>


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

    
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="top-left">
            <span><i class="fas fa-map-marker-alt"></i> Surat, Gujarat</span>
            <span><i class="fas fa-phone ms-3"></i> 7600230222</span>
            <span><i class="fas fa-envelope ms-3"></i> 
                <a href="mailto:example@medicine-plus.com">R@JMAHETA.COM</a>
            </span>
        </div>

        <div class="top-right">
            <a href="<?=BASE_PATH ?>cart.php">Checkout</a>
            <a href="<?=BASE_PATH ?>profile.php">My Account</a>
            <a href="../login_registration/login_registration.html">Login</a>
        </div>
    </div>
</div>


<!-- Main Header -->
<div class="main-header">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a href="home_page.php" class="logo-area text-decoration-none d-flex align-items-center">
            <img src="https://as2.ftcdn.net/v2/jpg/02/30/64/81/1000_F_230648151_hvErfnvVFY4NVT14AlRxwW6GfbLqdX0B.jpg" alt="">
            <div class="ms-2">
                <h4 class="mb-0">Medicine <span>Plus</span></h4>
                <small>Welcome to our online store</small>
            </div>
        </a>

        <!-- Contact -->
        <div class="header-contact d-flex align-items-center">
            <img src="https://as1.ftcdn.net/v2/jpg/03/36/13/14/1000_F_336131422_TdgWcydQotDk1L9yKYiXmUHqOkQSj052.jpg" alt="">
            <div class="ms-2">
                <small>Have a Question?</small><br>
                <a href="contact_as.php">Chat with us!</a>
            </div>
        </div>

        <!-- Cart -->
        <a href="cart.php" class="cart-icon text-decoration-none">
            <i class="fas fa-shopping-cart"></i>
        </a>

    </div>
</div>

<?php include 'navigation.php'; ?>
