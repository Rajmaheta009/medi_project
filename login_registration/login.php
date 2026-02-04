<?php
include "../database/collaction.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ✅ CORRECT COLLECTION
    $user = $login_registration_collection->findOne(['email' => $email]);

    if ($user && $password == $user['password']) {

        $role = $user['role'] ?? 'client';

        if ($role == 'admin' || $role == 'manager') {

            echo '<script src="../admin_side/assets/js/sweetalert.js"></script>
            <script>
            window.onload = function(){
                swal({
                    title: "Login Successful",
                    icon: "success",
                    button: "Proceed to Dashboard",
                }).then(function(){
                    window.location.href = "../admin_side/dashboard.php";
                });
            };
            </script>';

        } else {

            echo '<script src="../admin_side/assets/js/sweetalert.js"></script>
            <script>
            window.onload = function(){
                swal({
                    title: "Login Successful",
                    icon: "success",
                    button: "Proceed to Home",
                }).then(function(){
                    window.location.href = "../client_side/home_page.php";
                });
            };
            </script>';
        }

    } else {

        // ✅ USE SAME COLLECTION HERE ALSO
        $check = $login_registration_collection->findOne(['email' => $email]);

        $msg = $check ? "Invalid Password" : "Invalid Email";

        echo '<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
        <script>
        window.onload = function(){
            alertify.set("notifier","position", "top-right");
            alertify.error("'.$msg.'");

            setTimeout(function(){
                window.location.href = "login_registration.html";
            }, 1200);
        };
        </script>';
    }
}
?>
