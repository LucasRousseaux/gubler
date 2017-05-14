<?php

echo "<pre>";
var_dump($_COOKIE);

if (isset($_COOKIE['usuario'])) {
    unset($_COOKIE['usuario']);
    setcookie('usuario', '', time() - 3600, '/'); // empty value and old timestamp
}


if (isset($_COOKIE['email'])) {
    unset($_COOKIE['email']);
    setcookie('email', '', time() - 3600, '/'); // empty value and old timestamp
}

echo "<pre>";
var_dump($_COOKIE);

 ?>
