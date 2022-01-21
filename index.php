<?php 
$title = "Home";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/models/Product.php";
include_once "app/models/Category.php";
include_once "app/models/Subcategory.php";

$product = new Product();

$allProducts = $product->getAllProducts();

$allProductsArray = [];

if($allProducts->num_rows)
{
    $allProductsArray = $allProducts->fetch_all(MYSQLI_ASSOC);
}

$orderedProductsRank = $product->getMostOrderedProducts();

$orderedProductsRankArray = [];

if($orderedProductsRank)
{
    $orderedProductsRankArray = $orderedProductsRank->fetch_all(MYSQLI_ASSOC);
}

$mostReviewedProducts = $product->getMostReviewedProduct();

$mostReviewedProductsArray = [];

if($mostReviewedProducts)
{
    $mostReviewedProductsArray = $mostReviewedProducts->fetch_all(MYSQLI_ASSOC);
}

?>
    <!-- Slider Start -->
    <div class="slider-area">
        <div class="slider-active owl-dot-style owl-carousel">
            <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1.jpg);">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                        <h1 class="animated">drink matcha.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1-1.jpg);">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                        <h1 class="animated">drink matcha.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->
    <!-- Product Area Start -->
    <div class="product-area bg-image-1 pt-100 pb-95">
        <div class="container">
            <h2 class="text-center">Newest Products</h2>
            <div class="row p-3">

                <?php if(!empty($allProductsArray)){for($i = 0; $i < 4; $i++){ ?>

                <div class="col-xl-3">
                    <div class="product-img">
                        <a href="product-details.php?productId=<?php echo $allProductsArray[$i]["id"]; ?>">
                            <img alt="" src="assets/img/<?php echo $allProductsArray[$i]["image"]; ?>" class="img-fluid w-100" style="height: 350px;">
                        </a>
                        <span>-20%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="ion-android-favorite-outline"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="ion-ios-shuffle-strong"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-left">
                        <div class="product-hover-style">
                            <div class="product-title">
                                <h4>
                                    <a href="#">Nature Close Tea</a>
                                </h4>
                            </div>
                            <div class="cart-hover">
                                <h4><a href="#">+ Add to cart</a></h4>
                            </div>
                        </div>
                        <div class="product-price-wrapper">
                            <span>$100.00 -</span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
                
                <?php  }}  ?>
                
                
                
            </div>
        </div>
    </div>
    <!-- Product Area End -->
    <!-- Banner Start -->
    <div class="banner-area pt-100 pb-70">
        <div class="container">
            <div class="banner-wrap">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner img-zoom mb-30">
                            <a href="#">
                                <img src="assets/img/banner/banner-1.png" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>-50% Sale</h4>
                                <h5>Summer Vacation</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner img-zoom mb-30">
                            <a href="#">
                                <img src="assets/img/banner/banner-2.png" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>-20% Sale</h4>
                                <h5>Winter Vacation</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- New Products Start -->
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Most Ordered Products</h3>
                    <!-- orderedProductsRankArray -->
                </div>
            </div>
            <div class="container p-5">
                <div class="row">
                    <?php if(!empty($orderedProductsRankArray)){for($x = 0; $x < 4; $x++){ ?>
                    <div class="mb-30 col-xl-3">
                        <div class="product-img">
                            <a href="product-details.php?productId=<?php echo $orderedProductsRankArray[$x]["id"] ?>">
                                <img alt="" src="assets/img/<?php echo $orderedProductsRankArray[$x]["image"]; ?>" class="img-fluid w-100" style="height: 400px;">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
                                    <i class="ion-android-favorite-outline"></i>
                                </a>
                                <a class="action-cart" href="#" title="Add To Cart">
                                    <i class="ion-ios-shuffle-strong"></i>
                                </a>
                                <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content text-left">
                            <div class="product-hover-style">
                                <div class="product-title">
                                    <h4>
                                        <a href="#"><?= $orderedProductsRankArray[$x]["name_en"]; ?></a>
                                    </h4>
                                </div>
                                <div class="cart-hover">
                                    <h4><a href="#">+ Add to cart</a></h4>
                                </div>
                            </div>
                            <div class="product-price-wrapper">
                                <span>$100.00 -</span>
                                <span class="#">$120.00 </span>
                            </div>
                        </div>
                    </div>
                    <?php  }}  ?>
                </div>
            </div>
        </div>
    </div>
    <!-- New Products End -->
    <!-- Testimonial Area Start -->
    <div class="testimonials-area bg-img pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="testimonial-active owl-carousel">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img alt="" src="assets/img/icon-img/testi.png">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                            <h4>Gregory Perkins</h4>
                            <h5>Customer</h5>
                        </div>
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img alt="" src="assets/img/icon-img/testi.png">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                            <h4>Khabuli Teop</h4>
                            <h5>Marketing</h5>
                        </div>
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img alt="" src="assets/img/icon-img/testi.png">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore </p>
                            <h4>Lotan Jopon</h4>
                            <h5>Admin</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Area End -->
    <!-- News Area Start -->
    <div class="blog-area bg-image-1 pt-90 pb-70">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Most Reviewed Products</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            
                <?php if(!empty($mostReviewedProductsArray)){ for($i = 0; $i < 4; $i++){ ?>
                <div class="col-lg-3 col-md-3">
                    <div class="blog-single mb-30">
                        <div class="blog-thumb">
                            <a href="product-details.php?productId=<?php echo $mostReviewedProductsArray[$i]["id"] ?>"><img src="assets/img/<?php echo $mostReviewedProductsArray[$i]["image"] ?>" alt="" class="w-100 img-fluid" style="height: 400px;" /></a>
                        </div>
                        <div class="blog-content pt-25 pl-2 ">
                            <span class="blog-date">20 Dec</span>
                            <h3><a href="#"><?php echo $mostReviewedProductsArray[$i]["name_en"]; ?></a></h3>
                        </div>
                    </div>
                </div>
                <?php }} ?>
                
            </div>
        </div>
    </div>
    <!-- News Area End -->
    <!-- Newsletter Araea Start -->
    <div class="newsletter-area bg-image-2 pt-90 pb-100">
        <div class="container">
            <div class="product-top-bar section-border mb-45">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Join to our Newsletter</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-10 col-md-auto">
                    <div class="footer-newsletter">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input type="email" value="" name="EMAIL" class="email" placeholder="Your Email Address*" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <div class="submit-button">
                                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Araea End -->
<?php 
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>