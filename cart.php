<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $quantity = $_POST['quantity'];
  $product_image = $_POST['product_image'];

  if (isset($_SESSION['cart'])) {
    $cart_id = array_column($_SESSION['cart'], 'product_id');
    if (!in_array($product_id, $cart_id)) {
      $carts = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'quantity' => $quantity,
        'product_image' => $product_image,
      ];

      $_SESSION['cart'][$product_id] = $carts;
    } else {
      $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    }
  } else {
    $_SESSION['cart'] = [
      $product_id => [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'quantity' => $quantity,
        'product_image' => $product_image,
      ]
    ];
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
} else if (isset($_POST['remove_product'])) {
  $product_id = $_POST['product_id'];
  if (isset($_SESSION['cart'][$product_id])) {
    unset($_SESSION['cart'][$product_id]);
  }
  header("Location: cart.php");
  exit();
} else if (isset($_POST['update_cart'])) {
  $product_id = $_POST['product_id'];
  $quantity = intval($_POST['quantity']);
  if (isset($_SESSION['cart'][$product_id])) {
    if ($quantity > 0) {
      $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    } else {
      unset($_SESSION['cart'][$product_id]);
    }
  }
  header("Location: cart.php");
  exit();
}

// Calculate Grand Total
$grand_total = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $cart_item) {
    $grand_total += $cart_item['product_price'] * $cart_item['quantity'];
  }
}

$grand_total = number_format($grand_total, 2, '.', ',');
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

  <!-- Related product Feature Start -->
  <section class="my-5 py-5">
    <div class="container py-2">
      <h2 class="display-6 fw-bold">Related Products</h2>
      <hr class="my-3" />
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="align-middle">
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col" class="text-end">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($_SESSION['cart'])): ?>
              <tr>
                <td colspan="3" class="text-center py-3">
                  <span>Your cart is empty.</span>
                  <br />
                  <a href="index.php" class="btn btn-checkout rounded-0 text-uppercase px-4 mt-3">Shop Now</a>
                </td>
              </tr>
            <?php else: ?>
              <?php foreach ($_SESSION['cart'] as $cart_item): ?>
                <tr class="align-middle">
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="assets/imgs/<?php echo $cart_item['product_image']; ?>"
                        alt="<?php echo $cart_item['product_id']; ?>" class="img-fluid" style="height: 80px" />
                      <div class="ms-1 ms-md-2">
                        <p class="fw-bold mb-1" id="product-name"><?php echo $cart_item['product_name']; ?></p>
                        <p class="text-muted mb-0" id="product-price">$<?php echo $cart_item['product_price']; ?></p>

                        <form action="cart.php" method="post">
                          <input type="hidden" name="product_id" value="<?php echo $cart_item['product_id']; ?>" />
                          <button class="btn btn-link p-0 text-danger" type="submit" name="remove_product">
                            Remove
                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                  <td>
                    <form action="cart.php" method="post" class="d-flex align-items-center gap-1 gap-sm-2">
                      <input type="number" class="form-control text-center rounded-0 quantity-input"
                        value="<?php echo $cart_item['quantity']; ?>" name="quantity" style="width: 60px;" />
                      <input type="hidden" name="product_id" value="<?php echo $cart_item['product_id']; ?>" />
                      <button class="btn btn-link p-1 text-primary" type="submit" name="update_cart">
                        Save
                      </button>
                    </form>
                  </td>
                  <td class="text-end">$<?php echo number_format($cart_item['product_price'] * $cart_item['quantity'], 2, '.', ','); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Cart Grand Total -->
      <div class="d-flex justify-content-end">
        <div class="d-flex gap-3 align-items-center">
          <h5 class="fw-bold mt-1">Grand Total:</h5>
          <p class="fs-4 mb-2">
            $<span id="cart-grand-total"><?php echo number_format($grand_total, 2, '.', ','); ?></span>
          </p>
        </div>
      </div>
      <form action="checkout.php" method="POST" class="d-flex justify-content-end">
        <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
        <button type="submit" name="checkout"
          class="btn btn-checkout rounded-0 <?php echo empty($_SESSION['cart']) ? 'disabled' : ''; ?>">Checkout</button>
      </form>
    </div>

  </section>
  <!-- Related product Feature End -->


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