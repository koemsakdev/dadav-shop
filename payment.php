<?php
include "server/api-config.php";
session_start();

if (isset($_GET['order_id']) && $_GET['order_status'] != "") {
  $order_id = $_GET['order_id'];
  $order_status = $_GET['order_status'];
  $order = getOrderById($order_id)[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DaDav Shop</title>
  <link rel="shortcut icon" href="assets/public/favicon.svg" type="image/x-icon" />
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
      <h2 class="display-6 fw-bold text-center text-primary">Payment Detail</h2>
      <hr class="my-3 mx-auto border-primary border-2" />
      <p class="text-muted text-center">
        Thank you for your order!
      </p>
      <p class="text-muted text-center">
        Your total payment is: <strong class="fw-bold text-success fs-4">$<?php echo $order['order_cost']; ?></strong>.
      </p>
      <p class="text-muted text-center">
        Your order status is <span class="text-capitalize text-danger fw-bold"><?php echo $order_status; ?></span>.
      </p>

      <div class="d-flex justify-content-center">
        <a href="index.php" class="btn btn-success rounded-0">Pay Now <i
            class="fa fa-credit-card ms-2"></i></a>
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