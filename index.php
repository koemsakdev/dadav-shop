<?php
include "server/api-config.php";
$featured = getProducts(4);
$coats = getProducts(4, "Coats");
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
  <input type="hidden" name="page" value="home" id="pages" />
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <span class="loader"></span>
  </div>
  <!-- Spinner End -->

  <div id="navbar"></div>

  <!-- Carousel Swipper Start -->
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="assets/imgs/banner.jpg" alt="Hero Image" class="img-fluid" />
        <div class="carousel-caption">
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-lg-7 col-md-7 col-sm-8 col-8">
                <h6 class="text-uppercase text-light animated slideInDown text-dark-shadow">
                  New Arrival
                </h6>
                <h1 class="display-5 fw-bold mb-2 animated slideInDown text-dark-shadow">
                  Best Prices <span class="text-light">This Season</span>
                </h1>
                <p class="animated slideInDown text-dark-shadow">
                  <strong>DaDav Shop</strong>
                  <span class="text-light">offer the best products for the mosth affordable
                    prices</span>
                </p>
                <a href="" class="btn btn-outline-light rounded-0 animated slideInDown py-sm-2 px-sm-4">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- Brand Start -->
  <section class="container-fluid py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 col-md-3 col-sm-6 col-6 wow fadeIn cursor-pointer" data-wow-delay="0.1s">
          <div class="brand-item">
            <img class="img-fluid" src="assets/imgs/brand-1.jpg" alt="Banner-1" />
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-md-3 col-sm-6 col-6 wow fadeIn cursor-pointer" data-wow-delay="0.3s">
          <div class="brand-item">
            <img class="img-fluid" src="assets/imgs/brand-2.jpg" alt="Banner-2" />
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-md-3 col-sm-6 col-6 wow fadeIn cursor-pointer" data-wow-delay="0.5s">
          <div class="brand-item">
            <img class="img-fluid" src="assets/imgs/brand-3.jpg" alt="Banner-3" />
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-md-3 col-sm-6 col-6 wow fadeIn cursor-pointer" data-wow-delay="0.7s">
          <div class="brand-item">
            <img class="img-fluid" src="assets/imgs/brand-4.jpg" alt="Banner-4" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Brand End -->

  <!-- News  Start -->
  <section>
    <div class="row g-0">
      <div class="col-lg-4 wow fadeIn cursor-pointer" data-wow-delay="0.1s">
        <div class="card border-0 shadow-none rounded-0 outline-0">
          <img src="assets/imgs/news-1.jpg" class="card-img img-fluid rounded-0" alt="news-1" />
          <div
            class="card-img-overlay shadow-none border-0 outline-0 rounded-0 bg-dark p-2 text-dark bg-opacity-50 d-flex align-items-center justify-content-lg-start justify-content-center">
            <div class="text-lg-start text-center">
              <h2 class="card-title text-danger text-light-shadow">Extemly Awesome Shoes</h2>
              <a href="#" class="btn btn-outline-light rounded-0 text-uppercase">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 wow fadeIn cursor-pointer" data-wow-delay="0.1s">
        <div class="card border-0 shadow-none rounded-0 outline-0">
          <img src="assets/imgs/news-2.jpg" class="card-img img-fluid rounded-0" alt="news-2" />
          <div
            class="card-img-overlay shadow-none border-0 outline-0 rounded-0 bg-dark p-2 text-dark bg-opacity-50 d-flex align-items-center justify-content-center">
            <div class="text-center">
              <h2 class="card-title text-danger text-light-shadow">Awesome Jacket</h2>
              <a href="#" class="btn btn-outline-light rounded-0 text-uppercase">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 wow fadeIn cursor-pointer" data-wow-delay="0.1s">
        <div class="card border-0 shadow-none rounded-0 outline-0">
          <img src="assets/imgs/news-3.jpg" class="card-img img-fluid rounded-0" alt="news-3" />
          <div
            class="card-img-overlay shadow-none border-0 outline-0 rounded-0 bg-dark p-2 text-dark bg-opacity-50 d-flex align-items-center justify-content-lg-end justify-content-center">
            <div class="text-lg-end text-center">
              <h2 class="card-title text-danger text-light-shadow">50% OFF Watches</h2>
              <a href="#" class="btn btn-outline-light rounded-0 text-uppercase">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News End -->

  <!-- Product Feature Start -->
  <section class="my-5">
    <div class="container text-center py-2">
      <h2 class="display-6 fw-bold">Our Feature</h2>
      <hr class="my-3 mx-auto">
      <p class="text-muted">Here you can check out our fetured products.</p>
    </div>
    <div class="row mx-auto container">
      <?php
      if (!empty($featured)) {
          foreach ($featured as $product) {
              echo "
                <div class='product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer'
                  data-wow-delay='0.1s'>
                  <img src='assets/imgs/{$product['product_image']}' alt='Product 1' class='img-fluid' />
                  <div class='stars mt-3'>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                  </div>
                  <h5 class='mt-2 mb-1 text-muted'>{$product['product_name']}</h5>
                  <p class='text-muted mb-1'>$<span>{$product['product_price']}</span></p>
                  <a href='product_details.php?id={$product['product_id']}' class='btn btn-dark rounded-0 text-uppercase px-4 btn-feature'>Buy Now</a>
                </div>
              ";
          }
        }
      ?>
    </div>
  </section>
  <!-- Product Feature End -->

  <!-- Banner Start -->
  <section class="my-5 banner">
    <div class="container py-2">
      <h6 class="text-uppercase text-light animated slideInDown">
        Mid Season's Sale
      </h6>
      <h2 class="display-6">Authmn Collection <br />Up to 30% Off</h2>
      <a href="#" class="btn btn-custom rounded-0 text-uppercase px-4 btn-banner">Shop Now</a>
    </div>
  </section>
  <!-- Banner -->

  <!-- Cloth Start -->
  <section class="my-5">
    <div class="container text-center py-2">
      <h2 class="display-6 fw-bold">Dresses & Coats</h2>
      <hr class="mx-auto my-3">
      <p class="text-muted">Here you can check out our amazing cloths.</p>
    </div>
    <div class="row mx-auto container">
      <?php
      if (!empty($coats)) {
          foreach ($coats as $product) {
              echo "
                <div class='product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer'
                  data-wow-delay='0.1s'>
                  <img src='assets/imgs/{$product['product_image']}' alt='Product 1' class='img-fluid' />
                  <div class='stars mt-3'>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                    <i class='fas fa-star text-yellow'></i>
                  </div>
                  <h5 class='mt-2 mb-1 text-muted'>{$product['product_name']}</h5>
                  <p class='text-muted mb-1'>$<span>{$product['product_price']}</span></p>
                  <a href='product_details.php?id={$product['product_id']}' class='btn btn-dark rounded-0 text-uppercase px-4 btn-feature'>Buy Now</a>
                </div>
              ";
          }
        }
      ?>
    </div>
  </section>
  <!-- Cloth End -->

  <!-- Shoes Start -->
  <section class="my-5">
    <div class="container text-center py-2">
      <h2 class="display-6 fw-bold">Shoes</h2>
      <hr class="mx-auto my-3">
      <p class="text-muted">Here you can check out our amazing shoes.</p>
    </div>
    <div class="row mx-auto container">
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.1s">
        <img src="assets/imgs/shoes-1.jpg" alt="Shoes 1" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Life Retro Culture Sneaker</h5>
        <p class="text-muted mb-1">$21.48</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-2.jpg" alt="Shoes 2" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Life Racing Sneakers</h5>
        <p class="text-muted mb-1">$40.98</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-3.jpg" alt="Shoes 3" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Running Sneaker</h5>
        <p class="text-muted mb-1">$48.71</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-4.jpg" alt="Shoes 4" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Running Sneaker</h5>
        <p class="text-muted mb-1">$41.71</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-5.jpg" alt="Shoes 5" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Crocs Sandals With Charms</h5>
        <p class="text-muted mb-1">$25.16</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-6.jpg" alt="Shoes 6" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Sport Life Cushion Sneakers</h5>
        <p class="text-muted mb-1">$36.11</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-7.jpg" alt="Shoes 7" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Block Heels</h5>
        <p class="text-muted mb-1">$11.75</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/shoes-8.jpg" alt="Shoes 8" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Leather Flip Flops Heels</h5>
        <p class="text-muted mb-1">$10.17</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
    </div>
  </section>
  <!-- Shoes End -->

  <!-- Watch Start -->
  <section class="my-5">
    <div class="container text-center py-2">
      <h2 class="display-6 fw-bold">Watches</h2>
      <hr class="mx-auto my-3">
      <p class="text-muted">Here you can check out our amazing watches.</p>
    </div>
    <div class="row mx-auto container">
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.1s" onclick="window.location.href='product_details.php'">
        <img src="assets/imgs/watch-1.png" alt="Watch 1" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Apple Watch SE</h5>
        <p class="text-muted mb-1">$249.00</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/watch-2.png" alt="Watch 2" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Apple Watch Series 10</h5>
        <p class="text-muted mb-1">$399.00</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/watch-3.png" alt="Watch 3" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Apple Watch Hermès Ultra 2</h5>
        <p class="text-muted mb-1">$1399.00</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
      <div class="product-feature text-center col-lg-3 col-md-4 col-sm-12 wow fadeIn cursor-pointer"
        data-wow-delay="0.3s">
        <img src="assets/imgs/watch-4.png" alt="Watch 4" class="img-fluid" />
        <div class="stars mt-3">
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
          <i class="fas fa-star text-yellow"></i>
        </div>
        <h5 class="mt-2 mb-1 text-muted">Apple Watch Hermès Series 10</h5>
        <p class="text-muted mb-1">$1249.00</p>
        <a href="#" class="btn btn-dark rounded-0 text-uppercase px-4 btn-feature">Buy Now</a>
      </div>
    </div>
  </section>
  <!-- Watch End -->

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