<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="img/favicon.png" type="image/png">
  <title>Game of Thrones</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="scripts/modal.js">
  </script>
</head>
<body>
<div class="big">
  <!--Шапка и авторизация-->
  <header>
    <div class = "container">
      <a class="logo" href="index.php"><img src="img/logo_1.png" alt=""></a>
      <div class = "auth">
        <?php 
          if( !isset($_COOKIE['login']) and !isset($_SESSION['login_done']) ) // Если пользователь не авторизован, вывод входа/регистрации.
          {
        ?>
        <a class = "login" href="#" onclick="openModal()">Log in</a>
        <a class = "reg" href="#" onclick="openModal1()">Registration</a>
        <?php 
          }

          elseif(isset($_COOKIE['login']) or isset($_SESSION['login_done']))
          {
              echo '<a class="login" href="#">'.$_COOKIE['login'].'</a>'; // Если авторизован, выводим его ник.
              ?>
              <a class="reg" href="php/logout.php">Logout</a>
              <?php
          }
          ?>
      </div>
    </div>
  </header>

<?php

    if( !isset($_COOKIE['login']) and !isset($_SESSION['login_done'])  ) // Если пользователь не авторизован, вывод входа/регистрации.
    {
?>

  <div id="wrapper1" class="wrapper">
    <div class="modal">
      <a class="close" onclick="closeModal()">
        <div class="line1"></div><div class="line2"></div>
      </a>
      <form method="POST">
        <h3>Login</h3>
        <p>Username:</p>
        <input type="text" size="40" name = "login">
        <p>Password:</p>
        <input type="password" size="40" name = "password"> <br/> <br/>
        <label><input type="checkbox" name="checkbox" /> Someone else's computer</label><br /> <br>
        <button class="btn" type="submit" name = "do_login"><b>LOGIN</b></button>
      </form>
      <div class="question">
        <p>For first time on site?</p>
        <a href="#" onclick="closeOpen()">Register</a>
      </div>
    </div>
  </div>
  <div id = "wrapper2" class = "wrapper">
    <div class="modal">
      <a class="close" onclick="closeModal1()">
        <div class="line1"></div><div class="line2"></div>
      </a>
      <form action method="POST">
        <h3>Registration</h3>
        <p>Username:</p>
        <input type="text" size="40" name = "login">
        <p>Password:</p>
        <input type="password" size="40" name = "password"> <br/>
        <p>Repeat password:</p>
        <input type="password" size="40" name = "password_2"> <br/>
        <p>Email:</p>
        <input type="email" size="40" name = "email"> <br/><br/>
        <button class="btn" type="submit" name="do_signup"><b>REGISTER</b></button>
      </form>
      <div class="question">
        <p>Have already been registred?</p>
        <a href="#" onclick="closeOpen1()">Login</a>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
  <nav class="container">
      <a href="#">Watch online</a>
      <a href="#">Actors</a>
      <a href="#">News</a>
      <a href="#">Other</a>
  </nav>
    <div class="main">
        <div class="container">
            <div class="line">
            <div class="main-video">Here last video</div>
            <div class="sidebar">
                <p>Last series</p>
                <div class="block1 block"></div>
                <div class="block2 block"></div>
                <div class="block3 block"></div>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
require_once "php/includes/bd.php";

require_once "php/login.php";
require_once "php/signup.php";
?>