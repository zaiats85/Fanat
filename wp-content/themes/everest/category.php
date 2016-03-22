<?php get_header(); 
global $pmc_data;
wp_enqueue_script('pmc_bxSlider');		?><!-- main content start --><div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!isset($pmc_data['use_fullwidth'])) echo 'sidebar' ?>">	<div class="main clearfix">		<div class="pad"></div>					<div class="content blog">								<?php if (have_posts()) : ?>						<?php while (have_posts()) : the_post(); ?>			<?php if(is_sticky(get_the_id())) { ?>			<div class="pmc_sticky">			<?php } ?>			<?php			$postmeta = get_post_custom(get_the_id()); ?>
				
			
			<?php			if ( has_post_format( 'gallery' , get_the_id())) { 			?>			<div class="slider-category">								<div class="blogpostcategory">
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
					</div>									<?php						global $post;						$attachments = '';						$post_subtitrare = get_post( get_the_id() );						$content = $post_subtitrare->post_content;						$pattern = get_shortcode_regex();						preg_match( "/$pattern/s", $content, $match );						if( isset( $match[2] ) && ( "gallery" == $match[2] ) ) {							$atts = shortcode_parse_atts( $match[3] );							$attachments = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . get_the_id() .'&order=ASC&orderby=menu_order ID' );						}						if ($attachments) {?>
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
						<?php } ?>				<?php get_template_part('includes/boxes/loopBlog'); ?>				</div>			</div>			<?php } 			if ( has_post_format( 'video' , get_the_id())) { ?>			<div class="slider-category">							<div class="blogpostcategory">
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
					</div>									<?php										if(!empty($postmeta["video_post_url"][0])) {?>					<?php  						$video_arg  = '';						$video = wp_oembed_get( esc_url($postmeta["video_post_url"][0]), $video_arg );								$video = preg_replace('/width=\"(\d)*\"/', 'width="800"', $video);									$video = preg_replace('/height=\"(\d)*\"/', 'height="490"', $video);							echo $video;
					}					else{ 						  $image = 'http://placehold.it/800x490'; 						  					?>						  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo pmc_getImage(get_the_id(),'pmc-postBlock'); ?></a>											<?php } ?>						<?php get_template_part('includes/boxes/loopBlog'); ?>
				</div>
							</div>			<?php } 			if ( has_post_format( 'link' , get_the_id())) {
			$postmeta = get_post_custom(get_the_id()); 
			if(isset($postmeta["link_post_url"][0])){
				$link = $postmeta["link_post_url"][0];
			} else {
				$link = "#";
			}			
			?>			<div class="link-category">				<div class="blogpostcategory">
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
					<?php } ?>										<?php get_template_part('includes/boxes/loopBlogLink'); ?>												</div>			</div>						<?php 			} 	
			if ( has_post_format( 'quote' , get_the_id())) {?>
			<div class="quote-category">
				<div class="blogpostcategory">				
					<?php get_template_part('includes/boxes/loopBlogQuote'); ?>								
				</div>
			</div>
			
			<?php 
			} 						?>			<?php if ( has_post_format( 'audio' , get_the_id())) {?>			<div class="blogpostcategory">
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
				</div>							<div class="audioPlayerWrap">					<div class="audioPlayer">
						<?php 
						if(isset($postmeta["audio_post_url"][0]))
							echo do_shortcode('[soundcloud  params=”auto_play=false&hide_related=false&visual=true” width=”100%” height=”150″]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]'); ?>
					</div>				</div>				<?php get_template_part('includes/boxes/loopBlog'); ?>					</div>				<?php			}			?>														<?php			if ( !get_post_format() ) {?>		
			<div class="blogpostcategory">				<div class="topBlog">	
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
				</div>									<?php if(pmc_getImage(get_the_id(), 'pmc-postBlock') != '' && (!isset($postmeta["pmc_featured_category"][0]) || $postmeta["pmc_featured_category"][0] == 1)) { ?>	
					<a class="overdefultlink" href="<?php the_permalink() ?>">					<div class="overdefult">					</div>					</a>
					<div class="blogimage">							<div class="loading"></div>								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo pmc_getImage(get_the_id(), 'pmc-postBlock'); ?></a>					</div>					<?php } ?>					<?php get_template_part('includes/boxes/loopBlog'); ?>			</div>
						<?php } ?>					<?php if(is_sticky()) { ?>				</div>			<?php } ?>
							<?php endwhile; ?>									<?php											get_template_part('includes/wp-pagenavi');						if(function_exists('wp_pagenavi')) { wp_pagenavi(); }					?>										<?php else : ?>											<div class="postcontent">							<h1><?php pmc_security($pmc_data['errorpagetitle']) ?></h1>							<div class="posttext">								<?php pmc_security($pmc_data['errorpage']) ?>							</div>						</div>											<?php endif; ?>						</div>		<!-- sidebar -->
		<?php if(!isset($pmc_data['use_fullwidth'])) { ?>			<div class="sidebar">					<?php dynamic_sidebar( 'sidebar' ); ?>			</div>
		<?php } ?>	</div>	</div>											<?php get_footer(); ?>