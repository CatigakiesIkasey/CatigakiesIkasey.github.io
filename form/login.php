<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Data Mahasiswa</title>
  <link rel="stylesheet" href="css/style1.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
  <div class="box-login">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="user" placeholder="Username" class="input-control">
      <input type="password" name="pass" placeholder="Password" class="input-control">
      <input type="submit" name="submit" value="Login" class="btn">
    </form>
    <?php
      if (isset($_POST['submit'])) {
        session_start();
        include "db.php";

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM tb_profil WHERE username = '$user' AND password = '$pass'");

        if (mysqli_num_rows($cek) > 0) {
          $d = mysqli_fetch_object($cek);
          $_SESSION['status_login'] = true;
          $_SESSION['username'] = $d->username;
          $_SESSION['id'] = $d->admin_id;

          echo '<script>window.location="dashboard.php"</script>';
        } else {
          echo "<script>alert('Username atau Password anda salah!')</script>";
        }
      }
    ?>
  </div>
</body>
</html>
