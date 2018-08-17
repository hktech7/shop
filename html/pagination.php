<?php require_once 'commans.php'; ?>

<?php if (isset($total_pages) && $total_pages > 1) { ?>
	<div class="pagination flex-m flex-w p-t-26">
		
			
				<?php $first_link = getPageLink(1, $total_pages); ?>
				<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $first_link; ?>" aria-label="First" title="First"><span aria-hidden="ulue">«</span></a>
				<?php
				$previous_link = getPageLink(($page - 1), $total_pages);
				if ($page == 1) {
					?>
					<a class="item-pagination flex-c-m trans-0-4 active-pagination" href="<?php echo $previous_link; ?>" aria-label="Previous" title="Previous"><span aria-hidden="ulue">‹</span></a>
					<?php
				} else {
					?>
					<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $previous_link; ?>" aria-label="Previous" title="Previous"><span aria-hidden="ulue">‹</span></a>
					<?php
				}
				$limit = 5;
				if ($page > ($limit / 2)) {
					?>
					<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $first_link; ?>">1</a>
					<a class="item-pagination flex-c-m trans-0-4"> ...</a>
					<?php
				}
				$counter = 1;
				for ($i = max(1, $page - 1); $i <= min($page + 2, $total_pages); $i++) {
					$page_link = getPageLink($i, $total_pages);
					if ($counter < $limit) {
						if ($i == $page) {
							?>
							<a class="item-pagination flex-c-m trans-0-4 active-pagination" href="<?php echo $page_link; ?>"><?php echo $i; ?></a>
							<?php
						} else {
							?>
							<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $page_link; ?>"><?php echo $i; ?></a>
							<?php
						}
					}
					$counter++;
				}
				if ($page < $total_pages - ($limit / 2)) {
					?>
					<a>...</a>
					<?php
				}
				?>
				<?php
				$last_link = getPageLink($total_pages, $total_pages);

				$next_link = getPageLink(($page + 1), $total_pages);
				if ($page == $total_pages) {
					?>
					<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $next_link; ?>" aria-label="Next" title="Next"><span aria-hidden="ulue">›</span></a>
						<?php
					} else {
						?>
					<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $next_link; ?>" aria-label="Next" title="Next"><span aria-hidden="ulue">›</span></a>
					<?php
				}
				?>
				<a class="item-pagination flex-c-m trans-0-4" href="<?php echo $last_link; ?>" aria-label="Last" title="Last"><span aria-hidden="ulue">»</span></a>
			
		
	 </div>
 <?php
}
