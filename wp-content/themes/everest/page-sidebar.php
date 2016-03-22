<?php
/*
Template Name: Page with sidebar
*/
?>

<?php get_header(); ?>
<!-- main content start -->
<div class="mainwrap sidebar">
	<!--rev slider-->
	<?php $pmc_data_custom = get_post_custom(get_the_id()); 
	if(isset($pmc_data_custom["custom_post_rev"][0]) && ($pmc_data_custom["custom_post_rev"][0] != 'empty')) { ?>
		<div class="pmc-rev-slider">
		<?php putRevSlider(esc_html($pmc_data_custom["custom_post_rev"][0])); ?>
		</div>
		<?php
	}
	?>
	<div class="main clearfix">
		<div class="content  singlepage">
			<div class="postcontent">
				<div class="posttext">
					<?php if(!is_home()) { ?> <h1><?php the_title(); ?></h1><?php } ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<?php comments_template(); ?>
		</div>

		<div class="sidebar">	
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>