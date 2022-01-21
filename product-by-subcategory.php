<?php

$title = "product by subcategory";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/Product.php";
include_once "app/models/Category.php";
include_once "app/models/Subcategory.php";

if($_GET)
{
    $product = new Product();

    $settingProductId = $product->setId($_GET["subCategoryId"]);

    //$allProductsBySubCategories = $product->getProductBySubCategory($_GET["subCategoryId"]);
    $allProductsBySubCategories = $product->getProductBySubCategory();

    $fetchingAll = [];

    if(!empty($allProductsBySubCategories))
    {
        $fetchingAll = $allProductsBySubCategories->fetch_all(MYSQLI_ASSOC);
    }

}

?>


<div class="py-4"></div>

<div class="container bg-warning p-4">
    <div class="row">

        <?php
            if(!empty($fetchingAll))
            {
                for($i = 0; $i <count($fetchingAll); $i++)
                {
        ?>
        <div class="<?php   if(count($fetchingAll) > 1){echo "col-xl-6";}else{echo "col-xl-8 m-auto";}   ?>">

            <div>
                <a href="product-details.php?productId=<?php echo $fetchingAll[$i]["id"];  ?>"><img src="assets/img/<?php echo  $fetchingAll[$i]["image"]  ?>" class="img-fluid w-100" style="height: 300px"></a>
            </div>
        </div>

        <?php    }} ?>

    </div>
</div>

<?php


include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";

?>