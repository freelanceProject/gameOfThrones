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
  <script src="scripts/modal.js"></script>
  <script src="http://vk.com/js/api/openapi.js?146"></script>
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="big">
  <!--Шапка и авторизация-->
  <header>
    <div class = "container">
        <a class="logo" href="/"><img src="img/logo_1.png" alt=""/><span><b>.</b> ZZZ</span></a>
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
            <div class="line1 flex">
                <div class="main-video col-3"></div>
                <div class="sidebar col-1 flex">
                    <p>Last series</p>
                    <div class="block block1 col-1"></div>
                    <div class="block block2 col-1"></div>
                    <div class="block block3 col-1"></div>
                </div>
            </div>
            <div class="line2 flex">
                <div class="info col-3"></div>
                <div class="vid col-1">
                    <!-- VK Widget -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                        VK.Widgets.Group("vk_groups", {mode: 3,width: "auto", color1: '353535', color2: 'FFF', color3: 'F7CA18'}, 50288287);
                    </script>
                    <div class="fb-page" data-href="https://www.facebook.com/GameOfThrones/?fref=ts" data-tabs="timeline" data-height="792" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/GameOfThrones/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/GameOfThrones/?fref=ts">Game of Thrones</a></blockquote></div>
                </div>
            </div>
            </div>
        </div>
    <footer>
        <span class="text"><span>&copy;2017</span> GameOfThrones.zzz - All right reserved</span>
        <div class="a">
            <a href="#">Watch online</a>
            <a href="#">Actors</a>
            <a href="#">News</a>
        </div>
    </footer>
    </div>
</body>
</html>

<?php
require_once "php/includes/bd.php";

require_once "php/login.php";
require_once "php/signup.php";
?>