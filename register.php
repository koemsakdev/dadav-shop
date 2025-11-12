<?php
include "server/api-config.php";
$error = "";
session_start();
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];

  if ($password != $confirm_password) {
    $error = "Password and confirm password do not match";
  } else if (strlen($password) < 6) {
    $error = "Password must be at least 6 characters long";
  } else {
    // Check if user already exists
    $userExists = checkUserExists($email);
    if ($userExists) {
      $error = "User already exists";
    } else {
      $data = [
        'user_name' => $name,
        'user_email' => $email,
        'user_password' => password_hash($password, PASSWORD_DEFAULT)
      ];
      $result = registerUser($data);
      if ($result) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_logged_in'] = true;
        header("Location: account.php?message=Registration successful");
        exit();
      } else {
        $error = "Registration failed";
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DaDav Shop</title>
  <link rel="shortcut icon" href="assets//public/favicon.svg" type="image/x-icon" />
  <link href="libs/animate/animate.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="libs/swiper-bundle.min.css" />
  <link rel="stylesheet" href="libs/fontawesome-6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="libs/boostrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="libs/owlcarousel/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/style-responsive.css" />
</head>

<body class="overflow-hidden">
  <input type="hidden" name="page" value="cart" id="pages" />
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <span class="loader"></span>
  </div>
  <!-- Spinner End -->

  <div id="navbar"></div>

  <!-- Register Form Start -->
  <section class="my-5 py-5">
    <div class="container py-2">
      <h2 class="display-6 fw-bold text-center">Login</h2>
      <hr class="my-3 mx-auto" />

      <div class="row justify-content-center">
        <div class="col-md-6">
          <?php if ($error != "") { ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
              <?php echo $error; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>
          <form action="register.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control rounded-0" id="name" name="name" value="<?php echo $name ?? ""; ?>" />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control rounded-0" id="email" name="email" value="<?php echo $email ?? ""; ?>" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control rounded-0" id="password" name="password" value="<?php echo $password ?? ""; ?>" />
            </div>
            <div class="mb-3">
              <label for="confirm-password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control rounded-0" id="confirm-password" value="<?php echo $confirm_password ?? ""; ?>" name="confirm-password" />
            </div>
            <button type="submit" class="btn btn-checkout w-100" name="register">
              Register
            </button>
            <span class="d-block text-center mt-3">
              Have an account yet? <a href="login.php" class="link-text">Login</a>
            </span>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Register Form End -->


  <div id="footer"></div>

  <script src="libs/swiper-bundle.min.js"></script>
  <script src="libs/fontawesome-6.6.0/js/all.min.js"></script>
  <script src="libs/boostrap-5.3.3/js/popper.min.js"></script>
  <script src="libs/boostrap-5.3.3/js/bootstrap.min.js"></script>
  <script src="libs/jquery-3.7.1.min.js"></script>
  <script src="libs/wow/wow.min.js"></script>
  <script src="libs/easing/easing.min.js"></script>
  <script src="libs/waypoints/waypoints.min.js"></script>
  <script src="libs/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>