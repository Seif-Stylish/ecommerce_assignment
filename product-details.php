<?php

$title = "product details";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/Product.php";


if($_GET)
{
    if(!isset($_GET["productId"]))
    {
        header("location:shop.php");die;
    }

    $product = new Product();

    $singleProductId = $product->setId($_GET["productId"]);

    $singleProduct = $product->getSingleProduct();

    $productCategory = $product->getProductCategory();

    $productSubCategory = $product->getProductSubCategory();

    $productBrand = $product->getProductBrand();

    $singleProductObject = [];

    $singleProductCategoryObject = [];

    $singleProductSubCategoryObject = [];

    $singleBrandObject = [];

    if(!empty($singleProduct))
    {
        $singleProductObject = $singleProduct->fetch_object();
    }

    if(!empty($productCategory))
    {
        $singleProductCategoryObject = $productCategory->fetch_object();
    }

    if(!empty($productSubCategory))
    {
        $singleProductSubCategoryObject = $productSubCategory->fetch_object();
    }

    if(!empty($productBrand))
    {
        $singleBrandObject = $productBrand->fetch_object();
    }
}

?>

<div class="py-5"></div>

<div class="container" style="border: #519f10 2px solid">
    <div class="row">
        <div class="col-xl-6 d-flex justify-content-center align-items-center" style="border-right: #519f10 2px solid">
            <div class="">
                <img src="assets/img/<?php   echo $singleProductObject->image; ?> " class="img fluid w-100">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="pt-4">
                <h2 class="text-center" style="font-weight: bold; color: #519f10">Product name:  <?php   echo $singleProductObject->name_en;    ?> </h2>
                <div class="py-2"></div>
                <p style="font-size: 20px;">
                    <?php   echo $singleProductObject->desc_en; ?>    
                </p>
                <div class="d-flex py-3" style="justify-content: space-between;">
                    <label>category name: <strong><?php   echo $singleProductCategoryObject->category_name;    ?></strong></label>
                    <label>subcategory name: <strong><?php   echo $singleProductSubCategoryObject->subcategory_name; ?></strong></label>
                    <label>brand name: <strong><?php   echo $singleBrandObject->brand_name; ?></strong></label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5"></div>

<?php

include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";

?>