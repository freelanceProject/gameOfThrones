<?php
$data = $_POST['do_login'];
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password'])
$errors = '';

if ( isset($data) )
{
  $user = R::findOne('users', 'login = ?', array($login) );
  if ($user)
  {
    if (password_verify($password, $user->password) )
    {
      echo '<h2 style="color:green;">Вы успешно авторизовались!. Перенаправление...</h2>'; 
      header('/')
    }
    else
    {
      $errors = 'Пароль не верный.';
    }
  }
  else{
    $errors = 'Пользователь с таким логином не найден.';
  }

  if(!empty($errors) )
  {
    echo '<h3 style="color:#ff0000;">' .$errors.'</h3><br>';
  }

}