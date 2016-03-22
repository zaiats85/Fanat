<?php get_header(); 
global $pmc_data;
wp_enqueue_script('pmc_bxSlider');		
				
			
			<?php
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'pmc-themes' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(isset($pmc_data['display_post_meta'])) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>				
							<div id="slider-category" class="slider-category">
							<script type="text/javascript">
							jQuery(document).ready(function($){
								jQuery('.bxslider').bxSlider({
								  easing : 'easeInOutQuint',
								  captions: true,
								  speed: 800,
								   buildPager: function(slideIndex){
									switch(slideIndex){
									<?php
									foreach ($attachments as $key => $attachment) { 
										$image =  wp_get_attachment_image_src( $attachment, 'pmc-gallery' );
										echo 'case '.$key.':return "<img src=\"'.$image[0] .'\"";';
									} ?>									
									}
								  }
								});
							});	
							</script>	
								<ul id="slider" class="bxslider">
									<?php
										foreach ($attachments as $attachment) {
											$image =  wp_get_attachment_image_src( $attachment, 'pmc-postBlock' ); 
											?>	
												<li>
													<img src="<?php echo esc_url($image[0]) ?>" alt="<?php echo get_post_meta($attachment, '_wp_attachment_image_alt', true) ?>" title="<?php echo get_post_meta($attachment, '_wp_attachment_image_alt', true) ?>"/>							
												</li>
												<?php } ?>
								</ul>

							</div>
						<?php } ?>
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'pmc-themes' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(isset($pmc_data['display_post_meta'])) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>				
					}
				</div>
				
			$postmeta = get_post_custom(get_the_id()); 
			if(isset($postmeta["link_post_url"][0])){
				$link = $postmeta["link_post_url"][0];
			} else {
				$link = "#";
			}			
			?>
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'pmc-themes' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(isset($pmc_data['display_post_meta'])) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>			
					<?php if(pmc_getImage(get_the_id(), 'pmc-postBlock') != '') { ?>	

					<a class="overdefultlink" href="<?php echo esc_url($link) ?>">
					<div class="overdefult">
					</div>
					</a>

					<div class="blogimage">	
						<div class="loading"></div>		
						<a href="<?php echo esc_url($link) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo pmc_getImage(get_the_id(), 'pmc-postBlock'); ?></a>
					</div>
					<?php } ?>					
			if ( has_post_format( 'quote' , get_the_id())) {?>
			<div class="quote-category">
				<div class="blogpostcategory">				
					<?php get_template_part('includes/boxes/loopBlogQuote'); ?>								
				</div>
			</div>
			
			<?php 
			} 			
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'pmc-themes' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if(isset($pmc_data['display_post_meta'])) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
				</div>			
						<?php 
						if(isset($postmeta["audio_post_url"][0]))
							echo do_shortcode('[soundcloud  params=”auto_play=false&hide_related=false&visual=true” width=”100%” height=”150″]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]'); ?>
					</div>
			<div class="blogpostcategory">
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'pmc-themes' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if(isset($pmc_data['display_post_meta'])) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
				</div>					
					<a class="overdefultlink" href="<?php the_permalink() ?>">
					<div class="blogimage">	
			
			
		<?php if(!isset($pmc_data['use_fullwidth'])) { ?>
		<?php } ?>