<?php
include "database/collaction.php";

$email = "r@gmail.com";

$user = $login_registration_collection->findOne(['email' => $email]);

var_dump($user);
?>
