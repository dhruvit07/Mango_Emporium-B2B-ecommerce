<?php

$product_obj = new product();

$product = "";
$result = $product_obj->getAllProduct();
$product_count = "";
$totalProduct = $result->num_rows;
$product = productHTMLGenterator($result,$product_obj);

function productHTMLGenterator($result,$product_obj)
{
$product = "";
while ($row = $result->fetch_assoc()) {
    $productImage = $product_obj->getProductPrimaryImage($row['id']);
    $_row = $product_obj->getProductCategory($row['product_category']);
    $productCategory = $_row['category_name'];
    $product .= '<div class="product col-md-12 col-sm-12 col-xs-12 col-12 pl-0">

    <div class="product-img col-md-5 col-sm-5 col-xs-5 pl-0">
        <img src="../../uploads/products/'.$productImage.'" class="img-responsive" alt="">

    </div>

    <div class="product-body col-md-7 col-sm-7 col-xs-7 position-unset">
        <p class="product-category">'.$productCategory.'</p>
        <h3 class="product-name"><a href="#">'.$row['product_name'].'</a></h3>
        <h4 class="product-price">'.$row['product_price'].' <del class="product-old-price">'.$row['product_price'].'</del></h4>
        <p class="product-details">
        <ul>
            <li>'.$row['product_desc'].'</li>
        </ul>
        </p>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
        </div>
        <div class="product-btnn">
            <button type="button" class="btn-color button"> Send Inquiry</button>
            <button type="button" class="button btn-color"> Contact Info</button>
        </div>
    </div>

</div>';
}
return $product;
}

$category_html = "";
$result = $product_obj->getCategory();
while($row = $result->fetch_assoc()){
    $category_html .= '<div class="checkbox-filter">

							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									'.$row['category_name'].'
									<small>('.$product_obj->getProductCountByCategory($row['id']).')    </small>
								</label>
							</div>
						</div>';
}

$seller_type_html = "";
$result = $product_obj->getSellerType();
while($row = $result->fetch_assoc()){
    $seller_type_html .= '<div class="checkbox-filter">

							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									'.$row['seller_type'].'
									<small>('.$product_obj->getProductCountBySellerType($row['id']).')    </small>
								</label>
							</div>
						</div>';
}

$location_html = "";
$result = $product_obj->getLocation();
while($row = $result->fetch_assoc()){
    $location_html .= '<div class="checkbox-filter">

							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									'.$row['location'].'
									<small>('.$product_obj->getProductCountBySellerType($row['id']).')    </small>
								</label>
							</div>
						</div>';
}