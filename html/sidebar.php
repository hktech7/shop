
<?php 
$categories = $categories->categories;
//echo "<pre>";print_r($categories);die;
?>
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!--  -->
		<h4 class="m-text14 p-b-7">
			Categories
		</h4>

		<ul class="p-b-54">
			<?php 
			foreach($categories as $category){
				if( $category->id == 'mens-clothes'){  ?>
					<li class="allMenswear">
						<a href="#<?php echo $category->id?>/">See All Menswear »</a>
					</li>
				<?php }
				
				if(($category->parentId == 'mens-clothes' || $category->parentId == "men") && ( $category->id != 'mens-clothes')){
				$textColor = "";
				if(isset($_REQUEST['cat'])&& $category->id == $_REQUEST['cat']){
						$textColor = "color:#e65540";
				}
				?>
					<li class="catActive" data-value="<?php echo $category->id?>">
						<a href="?cat=<?php echo $category->id ?>" style="<?php echo $textColor?>" rel="nofollow"><?php echo $category->name?></a>
					</li>	
				<?php 		
				
				 }
				 
				 if(isset($_REQUEST['cat']) && !empty($_REQUEST['cat']) && $_REQUEST['cat'] == $category->parentId ){
					$stextColor = ''; 
					if(isset($_GET['sb']) && $_GET['sb'] == $category->id){
						$stextColor  = "color:#e65540";
					}								
					?>
						 <li class="subcategory">
						<a style="<?php echo $stextColor ?>" href="?cat=<?php echo trim($_REQUEST['cat']).'&sb='.$category->id ?>" rel="nofollow"><?php echo $category->name?></a>
						</li>
					<?php 
					}
				 
			}	
			?>			
		</ul>		
	</div>
</div>