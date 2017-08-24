<?php

$data = $_POST;

$errors = array();

$data['login'] = htmlspecialchars(trim($data['login'] ));
$data['email'] = htmlspecialchars(trim($data['email'] ));
$password = htmlspecialchars($data['password']);


if ( isset($data['do_signup']) ){

  #1
  if ( R::count('users', "login = ?", array($data['login']) ) > 0 ){
    $errors[] = 'Пользователь с таким логином уже зарегистрирован.';
  }

  #2
  if (R::count('users', "email = ?", array($data['email']) ) > 0 ){
    $errors[] = 'Пользователь с таким эмейл адресом уже зарегистрирован.';
  }

  #3
  if ( strlen($password) < 6){
    $errors[] = 'Длина пароля должна быть больше 6 символов.';
  }

  #4
  if ( $password != $data['password_2']  ){
    $errors[] = 'Ваши пароли не совпадают.';
  }

  #5
  if ($data['login'] == ''){
    $errors[] = 'Недопустимый логин.';
  }

  #6
  if ($data['email'] == ''){
    $errors[] = 'Недопустимый емейл адрес.';
  }


  if ( empty($errors) )
  {
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->password = password_hash($password, PASSWORD_DEFAULT);
    $user->email = $data['email'];
    R::store($user);
    echo '<h2 style="color:green;">Регестрация успешно выполнена. Перенаправление...</h2>'; 
    $_SESSION['login'] = $user->login;
    ?>
    <script type="text/javascript">
    window.location = "/php/log_in.php"
    </script>

  <?php
  }
  else
  {
    foreach($errors as $error)
    {
      echo '<h3 style="color:red;">'.$error.'</h3><br>';
    }
  }


}