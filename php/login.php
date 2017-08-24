<?php
$data = $_POST;
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$errors = '';

if ( isset($data['do_login']) )
{
  $user = R::findOne('users', 'login = ?', array($login) );
  if ($user)
  {
    if (password_verify($password, $user->password) )
    {
      echo '<h2 style="color:green;">Вы успешно авторизовались!. Перенаправление...</h2>'; 
      $_SESSION['login'] = $user->login;
      $_SESSION['time'] = $data['checkbox'];
      ?>
    <script type="text/javascript">
    window.location = "/php/log_in.php"
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
    echo '<h3 style="color:#ff0000;">' .$errors.'</h3><br>';
  }

}