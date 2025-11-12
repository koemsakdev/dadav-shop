<?php
include "server/api-config.php";
session_start();
$error = "";

if (isset($_POST['place_order'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $order_cost = $_SESSION['total'];
  $order_status = "pending";
  $user_id = 1;
  $order_date = date("Y-m-d H:i:s");

  $data = [
    "order_cost" => $order_cost,
    "order_status" => $order_status,
    "user_id" => $user_id,
    "user_phone" => $phone,
    "user_city" => $city,
    "user_address" => $address,
    "order_date" => $order_date,
  ];
  $order_id = insertOrder($data);

  $cards = $_SESSION['cart'];

  foreach ($cards as $card) {
    $product_id = $card['product_id'];
    $product_name = $card['product_name'];
    $product_image = $card['product_image'];
    $product_price = $card['product_price'];
    $product_quantity = $card['quantity'];
    $data = [
      "order_id" => $order_id,
      "product_id" => $product_id,
      "product_name" => $product_name,
      "product_image" => $product_image,
      "product_price" => $product_price,
      "product_quantity" => $product_quantity,
      "user_id" => $user_id,
      "order_date" => $order_date,
    ];
    
    insertOrderItems($data);
  }

  // If everything is fine, redirect to payment.php
  if ($order_id) {
    header("Location: payment.php?order_id=$order_id&order_status=$order_status");
    exit();
  } else {
    $error = "Order placement failed. Please try again.";
  }
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

  <!-- Order Placement Start -->
  <section class="my-5 py-5">
    <div class="container py-2">
      <h2 class="display-6 fw-bold text-center text-danger">Order Placement Status</h2>
      <hr class="my-3 mx-auto" />
      <p class="text-danger text-center"><?php echo $error; ?></p>
      <div class="d-flex justify-content-center">
        <a href="checkout.php" class="btn btn-checkout rounded-0">Get Back<i
            class="fa fa-arrow-right ms-2"></i></a>
      </div>
    </div>
  </section>
  <!-- Order Placement End -->

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