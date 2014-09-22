<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 */

get_header(); ?>
<div class="row">
<div id="content" class="eight columns">
<div class="grid-block">
<h4 class="block-title">	
<?php single_cat_title(''); ?>
</h4>
<div class="block-inner">

<?php
$category_description = category_description();
	if ( ! empty( $category_description ) )
			echo '' . $category_description . '';
	get_template_part( 'loop', 'category' ); 
?>
</div>
</div>
</div>
<div id="sidebar" class="four columns">
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
