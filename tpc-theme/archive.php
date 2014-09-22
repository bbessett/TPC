<?php
/**
 * The template for displaying Archive pages.
 * @package WordPress
 */

get_header(); ?>
<div class="row" id="page">
<div id="content" class="eight columns">
<div class="grid-block">
<?php
	if ( have_posts() )
		the_post();
?>

<h4 class="block-title">
<?php if ( is_day() ) : ?>
	<?php printf( __( 'Daily Archives: %s', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
	<?php printf( __( 'Monthly Archives: %s', 'twentyten' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
	<?php printf( __( 'Yearly Archives: %s', 'twentyten' ), get_the_date('Y') ); ?>
<?php else : ?>
	<?php single_cat_title(''); ?>
<?php endif; ?>
</h4>

<?php 
	rewind_posts();
	get_template_part( 'loop', 'archive' );
?>

</div>
</div>
<div id="sidebar" class="four columns">
<?php get_sidebar(); ?>
</div>

</div>

<?php get_footer(); ?>
