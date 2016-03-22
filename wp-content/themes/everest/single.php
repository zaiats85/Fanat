<?php get_header();  ?>
<?php global $pmc_data;
wp_enqueue_script('pmc_bxSlider');		
?>
<!-- top bar with breadcrumb and post navigation -->

<!-- main content start -->
<div class="mainwrap single-default <?php if(!isset($pmc_data['use_fullwidth'])) echo 'sidebar' ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post();  $postmeta = get_post_custom(get_the_id());  ?>
	<!--rev slider-->
	<?php
	if(isset($postmeta["custom_post_rev"][0]) && ($postmeta["custom_post_rev"][0] != 'empty')) { ?>
		<div class="pmc-rev-slider">
		<?php putRevSlider($postmeta["custom_post_rev"][0]); ?>
		</div>
		<?php
	}
	?>
	
	<div class="main clearfix">	
	<div class="content singledefult">
		<div class="postcontent singledefult" id="post-<?php  get_the_id(); ?>" <?php post_class(); ?>>		
			<div class="blogpost">		
				<div class="posttext">
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
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a><a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','pmc-themes'); echo get_the_author(); ?></a><a href="#commentform"><?php comments_number(); ?></a>		
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>		
					<?php if ( !has_post_format( 'gallery' , get_the_id())) { ?>
						 
						<div class="blogsingleimage">			
							
							<?php	
							if ( !get_post_format() && (!isset($postmeta["pmc_featured_post"][0]) || $postmeta["pmc_featured_post"][0] == 1)) { ?>
							
								<?php echo pmc_getImage(get_the_id(), 'pmc-postBlock'); ?>
							<?php } ?>
							<?php if ( has_post_format( 'video' , get_the_id())) {?>
							
								<?php  
									if(isset($postmeta["video_post_url"][0])){
										$video = '';
										$video_arg  = '';
										$video = wp_oembed_get( esc_url($postmeta["video_post_url"][0]), $video_arg );		
										$video = preg_replace('/width=\"(\d)*\"/', 'width="570"', $video);			
										$video = preg_replace('/height=\"(\d)*\"/', 'height="420"', $video);	
										echo $video;	
									}
								?>
							<?php } ?>	
							<?php if ( has_post_format( 'audio' , get_the_id())) {?>
							<div class="audioPlayer">
								<?php 
								if(isset($postmeta["audio_post_url"][0]))
									echo do_shortcode('[soundcloud  params=”auto_play=false&hide_related=false&visual=true” width=”100%” height=”150″]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]'); ?>
							</div>
							<?php
							}
							?>	

						</div>
		

					<?php } else {?>
						<?php
						global $post;
						$post_subtitrare = get_post( get_the_id() );
						$content = $post_subtitrare->post_content;
						$pattern = get_shortcode_regex();
						preg_match( "/$pattern/s", $content, $match );
						if( isset( $match[2] ) && ( "gallery" == $match[2] ) ) {
							$atts = shortcode_parse_atts( $match[3] );
							$attachments = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . get_the_id() .'&order=ASC&orderby=menu_order ID' );
						}
						if ($attachments) {?>
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
					<?php }  ?>
					<div class="sentry">
						<?php if ( has_post_format( 'video' , get_the_id())) {?>
							<div><?php the_content(); ?></div>
						<?php
						}
					    if ( has_post_format( 'audio' , get_the_id())) { ?>
							<div><?php the_content(); ?></div>
						<?php
						}						
						if(has_post_format( 'gallery' , get_the_id())){?>
							<div class="gallery-content"><?php the_content(); 	?></div>
						<?php } 
						if( !get_post_format()){?> 
						    <?php add_filter('the_content', 'pmc_addlightbox'); ?>
							<div><?php the_content(); ?></div>		
						<?php } ?>
						<div class="post-page-links"><?php wp_link_pages(); ?></div>
						<div class="singleBorder"></div>
					</div>
				</div>
				
				<?php if(isset($pmc_data['single_display_tags'])) { ?>
				<?php if(has_tag()) { ?>
					<div class="tags"><?php the_tags('',' ',''); ?></div>	
				<?php } ?>
				<?php } ?>
				
				<?php if($pmc_data['single_display_post_meta'] || $pmc_data['single_display_socials'] != 0) { ?>
				<div class="blog-info">
					
				
					<?php if(isset($pmc_data['single_display_socials'])) { ?>
					<div class="blog_social"> <?php pmc_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>	
					<?php } ?>
				
				</div>
				<?php } ?> <!-- end of blog-info -->
				
				<?php if(isset($pmc_data['display_author_info'])) { ?>
				<div class = "author-info-wrap">
					<div class="blogAuthor">
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta( 'ID' ), 100); ?></a>
					</div>
					<div class="authorBlogName">	
						<?php esc_html_e('Written by ','pmc-themes'); ?> <?php echo get_the_author(); ?>  
					</div>
					<div class = "bibliographical-info"><?php echo get_the_author_meta('description')?></div>
				</div>
				<?php } ?> <!-- end of author info -->
				
			</div>						
			
		</div>	
		
		<?php if(isset($pmc_data['display_related'])) { ?>
		<?php
		$posttags = wp_get_post_tags(get_the_id(), array( 'fields' => 'ids' ));
		$query_custom = new WP_Query(
			array( "tag__in" => $posttags,
				   "orderby" => 'rand',
				   "showposts" => 2,
				   "post__not_in" => array(get_the_id())
			) );
		if ($query_custom->have_posts()) : ?>
			<div class="titleborderOut">
				<div class="titleborder"></div>
			</div>
		
			<div class="relatedPosts">
				<div class="relatedtitle">
					<h4><?php  esc_html_e('Related Posts','pmc-themes'); ?></h4>
				</div>
				<div class="related">	
				
				<?php
				$count = 0;
				while ($query_custom->have_posts()) : $query_custom->the_post(); 
					if(!has_post_format( 'quote' , get_the_id()) && !has_post_format( 'link' , get_the_id())) {
					if(pmc_getImage(get_the_id(), 'pmc-related') !=''){
						$image_related = pmc_getImage(get_the_id(), 'pmc-related');
					}
					else{
						$image_related = '<img src="http://placehold.it/235x130">';
					}
					if($count != 2){ ?>
						<div class="one_third">
					<?php } else { ?>
						<div class="one_third last">
					<?php } ?>
							<div class="image"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo $image_related ?></a></div>
							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<?php
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a>						
						</div>
							
					<?php 
					$count++;
					}
				endwhile; ?>
				</div>
				</div>
			<?php endif;
			wp_reset_postdata(); 
			
			?>	
		<?php } ?> <!-- end of related -->
		
		
		<?php comments_template(); ?>
		
		<?php if(isset($pmc_data['single_display_post_navigation'])) { ?>
		<div class = "post-navigation">
			<?php next_post_link('%link', '<div class="link-title-previous"><span>&#171; '.esc_html__('Previous post','pmc-themes').'</span><div class="prev-post-title">%title</div></div>' ,false,''); ?> 
			<?php previous_post_link('%link','<div class="link-title-next"><span>'.esc_html__('Next post','pmc-themes').' &#187;</span><div class="next-post-title">%title</div></div>',false,''); ?> 
		</div>
		<?php } ?> <!-- end of post navigation -->
		
		<?php endwhile; else: ?>
						
			<?php get_template_part('404'); ?>
		<?php endif; ?>
		</div>
		
		
	<?php if(!isset($pmc_data['use_fullwidth'])) { ?>
		<div class="sidebar">	
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	<?php } ?>
</div>
</div>
<?php get_footer(); ?>
