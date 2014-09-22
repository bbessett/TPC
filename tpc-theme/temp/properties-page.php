<?php
/**
 * Template Name: Properties
 *
 *
 * @package WordPress
 */

get_header(); ?>

<div id="content" class="large-12 columns">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<!--<h1><?php the_title(); ?></h1>-->
						<?php the_content(); ?>
						
<div id="search-widget">
	<div class="search-header large-2 small-12 columns">
		<h5 class="search">Search Properties</h5>
	</div>
	
	<div class="form-wrapper large-10 small-12 columns">
		<form action="http://randallcommercialgroup.com/property-search.php" method="POST">
			<label>Property Type:</label>
				<?php
					$termID = 14;
					$taxonomyName = "property_categories";
					$termchildren = get_term_children( $termID, $taxonomyName );

					echo '<select name="property-type"><option value="">-Choose a Property Type-</option>';
						foreach ($termchildren as $child) {
							$term = get_term_by( 'id', $child, $taxonomyName );
							echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
						}
					echo '</select>';
				?> 
			<label>State:</label>
				<?php
					$termID = 8;
					$taxonomyName = "property_categories";
					$termchildren = get_term_children( $termID, $taxonomyName );

					echo '<select name="state"><option value="">-Choose a State-</option>';
						foreach ($termchildren as $child) {
							$term = get_term_by( 'id', $child, $taxonomyName );
							echo '<option value="' . $term->name . '">' . $term->name . '</option>';
						}
					echo '</select>';
				?> 
			<label>Sort By:</label>
				<?php
					$termID = 22;
					$taxonomyName = "property_categories";
					$termchildren = get_term_children( $termID, $taxonomyName );
					echo '<select name="status"><option value="">-Choose-</option>';
						foreach ($termchildren as $child) {
							$term = get_term_by( 'id', $child, $taxonomyName );
							echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
						}
					echo '</select>';
				?> 
			<input type="submit" value="Search">
		</form>
	</div>
<div class="clear"></div>
</div>

<a href="http://www.randallcommercialgroup.com/property_categories/recent-closed-projects/" id="property-search-button" class="button">View Recent/Closed Projects</a>

<ul class="properties large-block-grid-4 small-block-grid-2">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$properties = new WP_Query(array ('post_type' => 'properties', 'posts_per_page' => '300', 'orderby' => 'menu_order', 'order' => 'ASC', 'paged' => $paged, 'tax_query' => array( array('taxonomy' => 'property_categories', 'terms' => array('recent-closed-projects'), 'field' => 'slug', 'operator' => 'NOT IN'))));
if ($properties->have_posts()) : ?>
<?php while ($properties->have_posts()) : $properties->the_post(); ?>
<?php 
	$custom = get_post_custom($post->ID);
	$properties_street = $custom["properties_street"][0];
	$properties_city = $custom["properties_city"][0]; 
	$properties_state = $custom["properties_state"][0]; 
	$properties_zip = $custom["properties_zip"][0];
	$properties_price = $custom["properties_price"][0];
	$loopnet = $custom["loopnet"][0]; 
?>
	<li class="article">
<?php if ( has_post_thumbnail() ) { ?>
		<div class="thumb-wrapper"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-image');  ?></a></div>
<?php } else { ?>
		<div class="thumb-wrapper"><a href="<?php the_permalink(); ?>">No Image</a></div>
<?php } ?>
		<ul class="post-wrapper">

		<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<li><?php $term_list = wp_get_post_terms($post->ID, 'property_categories', array("fields" => "all")); if(!empty($term_list[1])) { echo '<strong>Category:</strong> '; }  foreach ($term_list as $child) { if( $child->parent == 22) { $child_names .= $child->name.'/'; } } echo rtrim($child_names, '/'); $child_names = ''; ?></li>

			<li><?php $term_list = wp_get_post_terms($post->ID, 'property_categories', array("fields" => "all")); if(!empty($term_list[1])) { echo '<strong>Type:</strong> '; } foreach ($term_list as $child) { if( $child->parent == 14) { $child_names .= $child->name.', '; } } echo rtrim($child_names, ', '); $child_names = ''; ?></li>

			<li><strong>Price:</strong> <?php echo $properties_price; ?></li>
			<li class="address"><strong>Address:</strong>  <?php if(!empty($properties_street)) { echo $properties_street; echo ', '; } ?><?php if(!empty($properties_city)) { echo $properties_city; echo ', '; } ?> <?php echo $properties_state; ?> <?php echo $properties_zip; ?></li>
			<?php if(!empty($loopnet)) { echo '<li class="loopnet"><strong>Listing Page:</strong><a href="'.$loopnet.'"> Click to View Loopnet Details</a></li>'; } ?>
			<li class="details"><a href="<?php the_permalink(); ?>" class="read-more">View Property Details</a></li>
		</ul>
		<div class="clear"></div>
	</li>
<?php endwhile; ?>
<?php endif; ?>
</ul>
<div class="clear"></div>

						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
<?php endwhile; ?>
</div>

<?php get_footer(); ?>