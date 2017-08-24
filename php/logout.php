<?php 
session_start();
// Убираем куки и сессии авторизации + перенаправление.

unset($_SESSION['login']);
setcookie('login', ' ', time() -1, "/");
header('Location: /');
?>