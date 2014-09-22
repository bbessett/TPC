<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 */

get_header(); ?>

<div id="content" class="large-8 columns">

	<h1><?php
		printf( __( 'Tag Archives: %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' );
	?></h1>

	<?php get_template_part( 'loop', 'tag' ); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
