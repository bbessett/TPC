     	<div class="block-content">
  <?php 
    $post_objects = get_posts(array(
    'post_type'       => 'locations',
    'posts_per_page'  => -1,
    ));
  ?>  
   <?php if( $post_objects ): ?>  
    <div class="location-block block-inner tablet-hide just-visible-desktop">
    <ul>   
    <?php foreach( $post_objects as $post): ?>
    <?php setup_postdata($post); ?>
          <li class="list-heading"> 
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
          <address><?php the_field('location_address'); ?></address>
      <?php if( have_rows('locations') ): ?>
        <?php  while ( have_rows('locations') ) : the_row(); ?>
      <?php $location = get_sub_field('location'); ?>
          <?php // print_r($location);?>  
          <span class="info"> <a href="tel:<?php the_sub_field('location_phone_number');?>"><?php the_sub_field('location_phone_number');?></a>   &#124; 
  <a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
          <?php endwhile; wp_reset_query(); ?>
          <?php endif ?>
          </li>
     <?php endforeach; wp_reset_postdata(); ?>

     </ul>
        </div>
  <?php endif; //end desktop locations ?>
		</div>