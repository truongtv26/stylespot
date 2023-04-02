<?php
session_start();
ob_start();

include '../model/PDO.php';
include '../model/user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  .form-box {
    width: 300px;
    margin-top: 20%;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius: 10px;
    padding: 10px;
  }

  .container1 {
    display: flex;
    justify-content: center;

  }

  .btn-gradient-primary {
    background: -webkit-gradient(linear, left top, right top, from(#da8cff), to(#9a55ff));
    background: linear-gradient(to right, #da8cff, #9a55ff);
    border: 0;
    -webkit-transition: opacity 0.3s ease;
    transition: opacity 0.3s ease;
    color: #FFFFFF;
    font-weight: 500;
  }

  span {
    color: red;
    font-size: 14px;
  }
</style>
<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $checkuser = checkuser($username, $password);
  if (is_array($checkuser)) {
    $_SESSION['username'] = $checkuser;
    if ($_SESSION['username']['status'] == 'false') {
      $thongbao = "Tài khoản đã bị khóa.";
      unset($_SESSION['username']);
    } else {
      if ($_SESSION['username']['role'] == 1) {
        header('Location:../admin/index.php');
      } else {
        $thongbao = "Không phải tài khoản admin";
      }
    }
  } else {
    $thongbao = "Tài khoản không tồn tại.";
  }
}
?>

<body>
  <div class="container mt-3 container1">
    <div class="form-box">
      <h2>Login Admin</h2>
      <form action="login_admin.php" method="POST">
        <div class="mb-3 mt-3">
          <label for="name">Username:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
          <span class="float-left"><?= (isset($thongbao)) ? $thongbao : false ?></span>
        </div>

        <button type="submit" name="login" class="btn btn-gradient-primary float-end">Login</button>
      </form>
    </div>
  </div>

</body>

</html>