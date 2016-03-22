<?php global $pmc_data; ?>
	
	<div class="entry">
		<div class = "meta">		
			<div class="blogContent">
				<div class="blogcontent"><?php pmc_security(the_content(__('<div class="pmc-read-more">Continue reading</div>','pmc-themes'))) ?></div>
			<?php if($pmc_data['display_post_meta'] || $pmc_data['display_socials'] != 0) { ?>
			
				<div class="bottomBlog">
			
					<?php if(isset($pmc_data['display_socials'])) { ?>
					
					<div class="blog_social"> <?php pmc_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
					
				</div> <!-- end of socials -->
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
			
			
		
</div>		
	</div>
