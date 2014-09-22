<?php while ( have_posts() ) : the_post(); ?>


<?php
	
	if (is_page_template('single.php')) {
	
	$the_post_type = 'specialties';

	} else {
	
	$the_post_type = get_post_type( get_the_ID() );
}

 var_dump($the_post_type);

	$categories = wp_get_post_terms( $post->ID, 'category');
    $categories = wp_list_filter( $categories, array('parent'=>'8','slug'=>'doctors', 'slug'=>'locations','slug'=>'featured-doctor'),'NOT');
    //  var_dump($categories);
   //Iterate through each term
	 foreach ( $categories as $category ) :
   	 if( 0 != $category->parent ) {// the term ID you want to exclude
		  $term_IDs[] = $term->term_id;
		   //  var_dump($categories);
		  ?>
<?php 
    $current = get_the_ID($post->ID);
	$related = get_posts( array( 
	'post_type'=> $the_post_type, 
	'taxonomy' => $category->taxonomy,
	'term'  => $category->slug,
	'orderby'  => 'title',
	'post__not_in' => array($post->ID)));
	?>
<?php if( $related ) :  ?>
 <div  class="grid-block related">
	<div class="block-inner">
 <h5 class="post-title">More <?php echo $category->name; ?> at TPC </h5>
	<?php foreach( $related as $post ) {
	setup_postdata($post); ?>
<ul> 
      <li>
      <div class="meta">
        <div class="meta-title">
       		<p class="small"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
       		<?php the_title(); ?></a></p>
            <?php the_content('Read the rest of this entry &raquo;'); ?>
        </div>
  		<?php $relationships = get_field('doctor_locations'); ?>	
			<?php if( $relationships ): ?>
		      <div class="meta-location">
				<?php foreach( $relationships as $p): ?>
								<?php setup_postdata($p); ?>
					<p class="small"><?php echo get_the_title( $p->ID ); ?></p>
					<?php // the_field("location_address")?>
				<?php endforeach; ?>
			 <?php wp_reset_postdata();?>
			</div>
			</div>
			 <?php endif; ?>
     
        </li>
    </ul>   
	<?php } wp_reset_postdata(); ?>
		</div>
    </div><!--end related doctor specialites div -->
<?php endif;?>
<?php } endforeach; wp_reset_postdata(); ?>
	
	<?php endwhile;   wp_reset_query();?>