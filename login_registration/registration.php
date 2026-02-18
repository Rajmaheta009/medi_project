<?php
session_start();
include "../database/collaction.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required!";
        $_SESSION['form_type'] = "signup";
        header("Location: login_registration.php");
        exit();
    }

    // Check username
    $existingUsername = $login_registration_collection->findOne(['username' => $username]);
    if ($existingUsername) {
        $_SESSION['error'] = "This username is already taken. Please choose another.";
        $_SESSION['form_type'] = "signup";
        header("Location: login_registration.php");
        exit();
    }

    // Check email
    $existingEmail = $login_registration_collection->findOne(['email' => $email]);
    if ($existingEmail) {
        $_SESSION['error'] = "This email is already registered. Please login instead.";
        $_SESSION['form_type'] = "signup";
        header("Location: login_registration.php");
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $login_registration_collection->insertOne([
        'username' => $username,
        'email'    => $email,
        'password' => $hashedPassword,
        'role'     => 'client'
    ]);

    $_SESSION['success'] = "Registration successful! Please login.";
    $_SESSION['form_type'] = "login";
    header("Location: login_registration.php");
    exit();
}
?>
