<?php

require_once '../../../ShopStyle/API.php';
include '../../../ShopStyle/Query/IQuery.php';
include '../../../ShopStyle/Query/BasicQuery.php';
$shop = new API('uid761-40030819-76');
$product_id = (int)$_GET['pid'];
$product = $shop->getProduct($product_id);
 ///echo "<pre>";print_r($product);die;
$meta_name = $product->name;
$meta_description = strip_tags($product->description);
$meta_keyword = $product->name;
$category = $product->categories[0]->fullName;
$cat_id = $product->categories[0]->id;

$product_arr = array('fts' => $cat_id);
$related_products = $shop->getProducts(12,12,$product_arr)->products;


require_once '../../header.php';
?>
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			<?php echo $category?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>		

		<span class="s-text17">
			<?php echo $product->name;?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<?php if(count($product->alternateImages) > 0):?>
							<?php foreach($product->alternateImages as $altimg):?>
							<div class="item-slick3" data-thumb="<?php echo $altimg->sizes->Best->url?>">
								<div class="wrap-pic-w">
									<img src="<?php echo $altimg->sizes->Best->url?>" alt="<?php echo $product->name;?>">
								</div>
							</div>
							<?php endforeach;?>
						<?php endif?>

						
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $product->name;?>
				</h4>

				<span class="m-text17">
					<?php echo $product->priceLabel;?>
				</span>

				<p class="s-text8 p-t-10">
					<?php echo $product->brandedName?>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<?php if(count($product->sizes) > 0):?>
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<?php foreach($product->sizes as $size): ?>
										<option value="<?php echo $size->name?>"><?php echo $size->name?></option>
								<?php endforeach;?>	
							</select>
						</div>
					</div>
					<?php endif;?>
					<?php if(count($product->colors) > 0): ?>
					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<?php foreach($product->colors as $color): ?>
										<option value="<?php echo $color->name?>"><?php echo $color->name?></option>
								<?php endforeach;?>	
							</select>
						</div>
					</div>
					<?php endif;?>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a href="<?php echo  $product->clickUrl?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Buy 
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<!--<span class="s-text8 m-r-35">SKU: MUG-01</span>-->
					<span class="s-text8">Categories: <?php echo $category?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $product->description?>
						</p>
					</div>
				</div>

				<!--<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>-->

				<!--<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>-->
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php if(count($related_products) > 0):?>
						<?php foreach($related_products as $product):?>
							<div class="item-slick2 p-l-15 p-r-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<div class="productThumb">
											<img src="<?php echo $product->image->sizes->Best->url?>" alt="<?php echo $product->name?>">
										</div>
										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<a href="product/view/<?php echo $product->id?> class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													View Product
												</a>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product/view/<?php echo $product->id?> class="block2-name dis-block s-text3 p-b-5">
											<?php echo $product->name;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											<?php echo $product->priceLabel;?>
										</span>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					<?php endif;?>						
				</div>
			</div>
		</div>
	</section>

<?php require_once '../../footer.php';?>
 <style>
 .productThumb {
    background: #fff none repeat scroll 0 0;
    height: 300px;
    margin: 0 0 5px;
    overflow: hidden;
    text-align: center;
    width: 98%;
}
</style>
