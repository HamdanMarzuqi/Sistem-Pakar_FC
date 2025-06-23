<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = $_POST['role'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($password != $cpass) {
         $error[] = 'password not matched!';
      } else {
         $insert = "INSERT INTO users(username, email, password, role) VALUES('$username','$email','$password','$role')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrasi</title>

   <!-- custom css file link  -->
   <link href="assets/css/registrasi_login.css" rel="stylesheet">
   <!-- Logo RSML -->
   <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>registrasi</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="username" required placeholder="Nama Lengkap">
         <input type="email" name="email" required placeholder="Masukkan Email Anda">
         <input type="password" name="password" required placeholder="Password">
         <input type="password" name="cpassword" required placeholder="Konfirmasi Password">
         <select name="role">
            <option value="Pasien">Pasien</option>
         </select>
         <input type="submit" name="submit" value="Registrasi" class="form-btn">
         <p>Sudah memiliki akun? <a href="login.php">masuk</a></p>
      </form>

   </div>

</body>

</html>