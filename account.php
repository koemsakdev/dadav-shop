<?php
session_start();
if (!(isset($_SESSION["user_logged_in"]) || $_SESSION["user_logged_in"] == false) || !isset($_SESSION["user_email"])) {
  header("Location: login.php");
  exit();
} else if (isset($_POST["logout"])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
} else {
  $user_email = $_SESSION["user_email"];
  $user_name = $_SESSION["user_name"];
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

  <!-- User Account Start -->
  <section class="my-5 py-5">
    <div class="container py-2">
      <div class="row g-4 justify-content-between">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card border-0">
            <div class="card-header border-0 text-center bg-white">
              <h4 class="card-title">Account Info</h4>
              <hr class="mt-4 mx-auto">
              <hr class="mt-4 w-100" style="height: 1px;">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="fw-bold">Account Name:</p>
                <p id="name"><?php echo $user_name; ?></p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="fw-bold">Account Email:</p>
                <p id="email">
                  <a href="mailto:<?php echo $user_email; ?>"><?php echo $user_email; ?></a>
                </p>
              </div>
              <hr class="my-4 w-100" style="height: 1px;">
              <form action="account.php" method="POST">
                <div class="d-flex flex-column gap-2">
                  <button type="button" class="btn btn-primary rounded-0">Your Order</button>
                  <button type="submit" class="btn btn-danger rounded-0" name="logout">Logout</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card border-0">
            <div class="card-header border-0 text-center bg-white">
              <h4 class="card-title">Change Password</h4>
              <hr class="mt-4 mx-auto">
              <hr class="mt-4 w-100" style="height: 1px;">
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control rounded-0" id="password" />
                </div>
                <div class="mb-3">
                  <label for="confirm-password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control rounded-0" id="confirm-password" />
                </div>
                <button type="submit" class="btn btn-checkout mx-auto d-block">
                  Change Password
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- User Account End -->

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