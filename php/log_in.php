<?php 
session_start();
$check = $_SESSION['login'];

if ($_SESSION['time'] == 'on')
{
	setcookie('login', $check, 0, "/");
}
else
{
	setcookie('login', $check, time() +3600*24*365, "/");
}


header('Location: /');
?>