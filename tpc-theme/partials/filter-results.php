<?php $args = array('post_type' => 'resources');
		$posts = get_posts($args);
		foreach( $posts as $post) : setup_postdata($post);?>
?>
<?php $taxonomies[] = array(
	'name'      => 'category',
	'query_var' => 'category_name',
	'heading'   => __( 'Filter by Category' ),
); ?>
<?php foreach ( $taxonomies as $tax ): ?>
<?php $current_term = get_query_var( $tax['query_var'] ); ?>
<h3><?php echo esc_html( $tax['heading'] ); ?></h3>
<ul class="filter-nav">
	<li>
	<?php if (! isset( $_GET[$tax['query_var']] ) ): ?>
	<strong>All</strong>
	<?php else : ?>
	<a href="<?php echo esc_url( remove_query_arg( $tax['query_var'] ) ) ?>">All</a>
	<?php endif; ?>
	</li>
	<?php foreach( get_terms( $tax['name'] ) as $term ): ?>
	<?php $tax_shortcut = $tax['query_var'] ?>
	<?php $term_shortcut = $term->slug ?>
	<li>
	<?php if ( $current_term == $term->slug ): ?>
	<strong><?php echo esc_html( $term->name ) ?></strong>
	<?php else : ?>
	<a href="<?php echo esc_url( add_query_arg( $tax_shortcut, $term_shortcut ) ) ?>"><?php echo esc_html( $term->name ) ?></a>
	<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul>

</aside>
<?php endforeach; ?>

<?php endforeach; wp_reset_postdata(); ?>