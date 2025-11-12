<?php
include "server/api-config.php";
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $product = getProductById($product_id)[0];
  if (empty($product)) {
    header("Location: index.php");
    exit();
  }
} else {
  header("Location: index.php");
  exit();
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
  <input type="hidden" name="page" value="single_product" id="pages" />
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <span class="loader"></span>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <div id="navbar"></div>
  <!-- Navbar End -->

  <!-- Single Product Start -->
  <div class="my-5 py-2 row container g-5 mx-auto">
    <div class="col-md-6">
      <div class="row g-3">
        <div class="col-12" id="main-product">
          <img src="assets/imgs/<?php echo $product['product_image']; ?>" alt="Product Image" class="img-fluid w-100"
            id="main-img" />
        </div>

        <?php
        for ($i = 1; $i <= 4; $i++) {
          $imageKey = ($i == 1) ? 'product_image' : "product_image$i";
          $activeClass = ($i == 1) ? 'border-purple' : '';
          echo "
                <div class='col-lg-3 col-md-3 col-3'>
                  <img
                    src='assets/imgs/{$product[$imageKey]}'
                    alt='Product Image'
                    class='img-fluid cursor-pointer w-100 p-3 border sub-product $activeClass'
                  />
                </div>
              ";
        }
        ?>
      </div>
    </div>
    <div class="col-md-6">
      <h6 class="text-uppercase text-muted animated slideInDown">
        <?php echo $product['product_category']; ?>
      </h6>
      <h2 class="display-6"><?php echo $product['product_name']; ?></h2>
      <p class="fs-2 fw-bold mt-3">$<?php echo $product['product_price']; ?></p>

      <form action="cart.php" method="post" class="d-flex gap-2 mb-4">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $product['product_image']; ?>">
        <input type="number" min="1" value="1" name="quantity" class="rounded-0 form-control w-25 text-center" />
        <button class="btn btn-add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>
      </form>
      <h3 class="display-6">Product Details</h3>
      <p class="text-secondary">
        <?php echo $product['product_description']; ?>
      </p>
    </div>
  </div>
  <!-- Single Product End -->

  <!-- Related product Feature Start -->
  <section class="my-5">
    <div class="container text-center py-2">
      <h2 class="display-6 fw-bold">Related Products</h2>
      <hr class="my-3 mx-auto" />
    </div>
    <div class="row mx-auto container">
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn" data-wow-delay="0.1s">
        <img src="assets/imgs/product-feature-1.jpg" alt="Product 1" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Shoes</h5>
        <p class="text-muted mb-1">$199.80</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
        <img src="assets/imgs/product-feature-2.jpg" alt="Product 2" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Bag</h5>
        <p class="text-muted mb-1">$79.80</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
        <img src="assets/imgs/product-feature-3.jpg" alt="Product 3" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Bag</h5>
        <p class="text-muted mb-1">$55.90</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
        <img src="assets/imgs/product-feature-4.jpg" alt="Product 4" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Bag</h5>
        <p class="text-muted mb-1">$199.80</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
    </div>
  </section>
  <!-- Related product Feature End -->

  <!-- Footer start -->
  <div id="footer"></div>
  <!-- Footer end -->

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