<?php
session_start();
include "../database/collaction.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Please enter email and password.";
        $_SESSION['form_type'] = "login";
        header("Location: login_registration.php");
        exit();
    }

    $user = $login_registration_collection->findOne(['email' => $email]);

    if (!$user) {
        $_SESSION['error'] = "No account found with this email.";
        $_SESSION['form_type'] = "login";
        header("Location: login_registration.php");
        exit();
    }

    if (!password_verify($password, $user['password'])) {
        $_SESSION['error'] = "Incorrect password. Please try again.";
        $_SESSION['form_type'] = "login";
        header("Location: login_registration.php");
        exit();
    }

    // Login success
    $_SESSION['user_id']  = (string)$user['_id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'] ?? 'client';

    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
        header("Location: ../admin_side/dashboard.php");
    } else {
        header("Location: ../client_side/home_page.php");
    }

    exit();
}
?>
