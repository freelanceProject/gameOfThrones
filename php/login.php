<?php
$data = $_POST;
$errors = '';

if ( isset($data['do_login']) )
{
  $user = R::findOne('users', 'login = ?', array($data['login']) );
  if ($user)
  {
    if (password_verify($data['password'], $user->password) )
    {
      echo '<h2 style="color:green;">Вы успешно авторизовались!. Перенаправление...</h2>'; 
      ?>
      <script type="text/javascript">
      window.location = "/"
      </script>
      <?php
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
    echo '<h3 style="color:red;">'.$errors.'</h3><br>';
  }

}