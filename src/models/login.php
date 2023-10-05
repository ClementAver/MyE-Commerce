<?php
function checkLoginInputs($post)
{
  if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    $email = false;
  } else {
    $email = true;
  }

  if (!empty($post['password'])) {
    $password = true;
  } else {
    $password = false;
  }

  $validation = ['email' => $email, 'password' => $password];
  return $validation;
}

function getUser($email, $password)
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }

  $sqlQuery = 'SELECT * FROM users WHERE email = :email AND password = :password';
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute([
    'email' => $email,
    'password' => $password,
  ]);
  $result = $statement->fetch();
  return $result;
}


function setUserCookie($id)
{
  $arr_cookie_options = [
    'expires' => time() + 365 * 24 * 3600000,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'none',
  ];

  setcookie(
    'LOGGED_USER',
    $id,
    $arr_cookie_options,
  );
}