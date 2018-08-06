
<?php 
$categories = $categories->categories;
echo "<pre>";print_r($categories);die;
?>
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!--  -->
		<h4 class="m-text14 p-b-7">
			Categories
		</h4>

		<ul class="p-b-54">
			<?php foreach($categories as $category):?>
			<?php if($category->parentId == $category->id):?>
				<li class="p-t-4">
					<a href="<?php echo $category->id?>" class="s-text13 active1">
						<?php echo $category->fullName?>
					</a>
				</li>
			<?php endif;?>
			<?php endforeach;?>			
		</ul>		
	</div>
</div>