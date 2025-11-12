<?php
include "server/api-config.php";
session_start();
$error = "";
if ((isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true) && isset($_SESSION["user_email"])) {
  header("Location: index.php");
  exit();
} else if (isset($_POST["login"])) {
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  $user = loginUserByEmail($email, $password);

  if (!$user) {
    // Either email not found or incorrect password
    $error = "Invalid email or password";
  } else {
    // Login successful
    $_SESSION["user_email"] = $user["user_email"];
    $_SESSION["user_name"] = $user["user_name"];
    $_SESSION["user_logged_in"] = true;

    // redirect to home or dashboard
    header("Location: index.php");
    exit;
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

  <!-- Login Form Start -->
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
          <form method="post" action="login.php">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control rounded-0" id="email" name="email" value="<?php echo $email ?? ""; ?>" required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control rounded-0" id="password" name="password" value="<?php echo $password ?? ""; ?>" required />
            </div>
            <button type="submit" class="btn btn-checkout w-100" name="login">
              Login
            </button>
            <span class="d-block text-center mt-3">
              Don't have an account? <a href="register.php" class="link-text">Register</a>
            </span>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Login Form End -->


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