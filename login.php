<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);

   $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['role'] == 'Admin') {
         $_SESSION['username'] = $row['username'];
         $_SESSION['role'] = $row['role'];
         header('Location: index.php');
         exit();
      } elseif ($row['role'] == 'Pasien') {
         $_SESSION['username'] = $row['username'];
         $_SESSION['role'] = $row['role'];
         header('Location: index.php');
         exit();
      }
   } else {
      $error[] = 'Incorrect email or password!';
   }
};
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link href="assets/css/registrasi_login.css" rel="stylesheet">
   <!-- Logo RSML -->
   <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">

</head>

<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Login</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Masukkan Email Anda">
         <input type="password" name="password" required placeholder="Password">
         <input type="submit" name="submit" value="Login" class="form-btn">
         <p>Belum memiliki akun? <a href="Register.php">Registrasi sekarang</a></p>
      </form>
   </div>
</body>

</html>