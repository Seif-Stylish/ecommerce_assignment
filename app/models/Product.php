<?php 
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Product extends config implements operations {

    private $id;
    private $name_en;
    private $name_ar;
    private $price;
    private $code;
    private $desc_en;
    private $desc_ar;
    private $quantity;
    private $subCategory_id;
    private $brand_id;
    private $created_at;
    private $updated_at;
    private $image;
    private $product_status;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this->id;
    }

    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this->name_en;
    }

    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this->name_ar;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this->price;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this->code;
    }

    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */ 
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this->desc_en;
    }

    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */ 
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this->desc_ar;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this->quantity;
    }

    public function getSubCategory_id()
    {
        return $this->subCategory_id;
    }

    /**
     * Set the value of subCategory_id
     *
     * @return  self
     */ 
    public function setSubCategory_id($subCategory_id)
    {
        $this->subCategory_id = $subCategory_id;

        return $this->subCategory_id;
    }

    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this->brand_id;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this->updated_at;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this->image;
    }

    public function getProduct_status()
    {
        return $this->product_status;
    }

    /**
     * Set the value of product_status
     *
     * @return  self
     */ 
    public function setProduct_status($product_status)
    {
        $this->product_status = $product_status;

        return $this->product_status;
    }

    public function create()
    {
        # code...
    }
    public function read()
    {
        # code...

        $query = "SELECT * from products";

        if($this->subCategory_id > 0)
        {
            $query = "SELECT * from products WHERE subCategory_id = $this->subCategory_id";
        }

        

        return $this->runDQL($query);
    }

    public function getAllProducts()
    {
        $query = "SELECT * from products ORDER BY created_at";

        return $this->runDQL($query);
    }

    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }

    public function getSingleProduct()
    {
        $query = "SELECT * from products WHERE id = '$this->id'";

        return $this->runDQL($query);
    }

    public function getProductCategory()
    {
        $query = "SELECT categories.name_en as `category_name` from categories , subcategories , products
        WHERE categories.id = subcategories.category_id AND subcategories.id = products.subCategory_id AND products.id = $this->id";
        
        return $this->runDQL($query);
    }

    public function getProductSubCategory()
    {
        $query = "SELECT subcategories.name_en as `subcategory_name` from categories , subcategories , products
        WHERE categories.id = subcategories.category_id AND subcategories.id = products.subCategory_id AND products.id = $this->id";
        
        return $this->runDQL($query);
    }

    public function getProductBrand()
    {
        $query = "SELECT products.name_en AS 'product_name' , brands.name_en AS 'brand_name' FROM products , brands
        WHERE brands.id = products.brand_id AND products.id = $this->id";

        return $this->runDQL($query);
    }

    public function getProductBySubCategory()
    {
        $query = "SELECT * from products WHERE products.subCategory_id = $this->id";
        /*
        $query = "SELECT products.* from products , subcategories WHERE products.subCategory_id = subcategories.id
        AND subcategories.id = $subCatId";  subCatId was a parameter(subCategory id)
        */

        return $this->runDQL($query);
    }

    public function getMostOrderedProducts()
    {
        $query = "select products.id , products.name_en , products.image , count(product_id) as `no_of_orders_per_product` from product_orders , products , orders
        where products.id = product_orders.product_id and orders.id = product_orders.order_id group by products.name_en
        order by count(product_id) desc";

        return $this->runDQL($query);
    }

    

    public function getProductRate($id)
    {
        $query = "select product_specs.product_id , avg(value_en) as `average_value` from product_specs
        where product_specs.product_id = $id
        group by product_id
        ";

        return $this->runDQL($query);
    }

    public function getMostReviewedProduct()
    {

        $query = "SELECT products.id , products.name_en , products.image , products.created_at , avg(value) as 'average_reviews_value' from
        reviews , products where products.id = reviews.product_id
        group by products.name_en order by average_reviews_value";

        return $this->runDQL($query);
    }
}   