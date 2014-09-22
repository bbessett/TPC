
<!--Begin Homepage Location List -->
   	<div id="location-list-1" class="four columns grid-block small-block tablet-view loc-block location-list">
   	  	<div class="heading-tabs visible-mobile">
  			<div class="seven columns">
	  <h5 class="tab">Find a Location</h5>
	</div>
 	<div class="five columns">
	  	<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations">See All</a></h5>
	</div>
	</div>

  	<div class="block-content">
  	<?php $args = array('post_type' => 'page','page_id' => '52');
		$posts = get_posts($args);
		foreach( $posts as $post) : setup_postdata($post);?>
		<!-- get locations -->
		<div class="block-img">
			<?php the_post_thumbnail('full', array('class' => 'center hide-phone just-visible-tablet')); ?>
		</div>
<?php 
		$post_objects = get_posts(array(
		'post_type'      	=> 'locations',
		'posts_per_page'	=> 4
		));
	?>	
	 <?php if( $post_objects ): ?> 	
		<div class="location-block block-inner tablet-hide just-visible-desktop">
	 	<ul>	 
 		<?php foreach( $post_objects as $post): ?>
		<?php setup_postdata($post); ?>
  				<li> 
  				<a class="list-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
  				<address><?php the_field('location_address'); ?></address>
  		<?php if( have_rows('locations') ): ?>
  			<?php  while ( have_rows('locations') ) : the_row(); ?>
 			<?php $location = get_sub_field('location'); ?>
  				<?php // print_r($location);?> 
  				<span class="info">	<a class="tel" href="tel:<?php the_sub_field('location_phone_number');?>"><?php the_sub_field('location_phone_number');?></a>   &#124; 
	<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
  				<?php endwhile; wp_reset_query(); ?>
  				<?php endif ?>
  				</li>
   	 <?php endforeach; wp_reset_postdata(); ?>

   	 </ul>
    		</div>
	<?php endif; //end desktop locations ?>




<?php 
		$post_objects = get_posts(array(
		'post_type'      	=> 'locations',
		'posts_per_page'	=> -1,

		));
	?>	
	 <?php if( $post_objects ): ?> 	
		<div class="location-block block-inner grid-max tablet-hide just-visible-phone">
	 	<ul>	 
 		<?php foreach( $post_objects as $post): ?>
		<?php setup_postdata($post); ?>
  				<li> 
  				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
  				<address><?php the_field('location_address'); ?></address>
  	

  <?php if( have_rows('locations') ): ?>
  			<?php  while ( have_rows('locations') ) : the_row(); ?>
 			<?php $location = get_sub_field('location'); ?>
  						<?php // print_r($location);?> 
  	<span class="info">	
  	<a class="tel" href="tel:<?php the_sub_field('location_phone_number');?>"><?php the_sub_field('location_phone_number');?></a>   &#124; 
			<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
  				<?php endwhile; ?>
  				<?php endif ?>
  			</li>

<?php endforeach; wp_reset_postdata(); ?>
  </ul>
    	</div>	
	<?php endif; //end desktop locations ?>

		<?php endforeach;  wp_reset_postdata(); ?> <!--end locations loop -->


</div></div>
<!--End Location List -->	