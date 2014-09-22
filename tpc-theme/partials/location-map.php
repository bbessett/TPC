<div id="map" class="grid-block">
   		<div class="heading-tabs row">
  			<div class="seven columns">
	 		 	<h4 class="tab">Location Map</h4>
			</div>
 	</div><!-- end heading block -->
 	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div id="map_canvas" class="acf-map"> 
	
	<?php if (is_singular('locations')) { ?>
	<?php while ( have_rows('locations') ) : the_row();  ?>
<?php $location = get_sub_field('location');
		  $name = get_sub_field('location_name');
		  $reg_hours = get_sub_field('location_reg_hours');
 		  $uc_hours = get_sub_field('location_urgent_care_hours'); ?>
	<div class="acf-map">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		<h6><?php echo $name ?></h6>
		<div class="meta">
			<span class="address"><?php echo $location['address']; ?><br/>
				<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Get Directions</a>
				</span>
				<p>Regular Hours: <?php echo $reg_hours ?></p>
				<p>Urgent Care Hours: <?php echo $uc_hours ?></p>

				</div>
		</div>

	</div>
	
	<?php // print_r('location'); ?>

	<?php endwhile; ?>

	
	<?php } else { ?> 

	<?php 
		$map_markers = new WP_Query(array(
		'post_type'      	=> 'locations',
		'orderby'          =>   'title',
	));?>	

	<?php while ($map_markers->have_posts()) : $map_markers->the_post();  ?>
	
	<?php if( have_rows('locations') ): ?> 
	<?php while ( have_rows('locations') ) : the_row(); 
 			$location = get_sub_field('location'); 
 			$name = get_sub_field('location_name'); 
 			$reg_hours = get_sub_field('location_reg_hours');
 			$uc_hours = get_sub_field('location_urgent_care_hours');
 	?>
	<?php if($ignore_map = get_field('ignore_map_marker')) { ?>
	<?php } else { ?>

		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		 	<h6><a href="<?php the_permalink(); ?>"><?php echo $name ?></a></h6>
				<span class="address"><?php echo $location['address']; ?><br/>
				<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Get Directions</a>
				</span>
					<div class="meta">
					<p>Regular Hours: <?php echo $reg_hours ?></p>
					<p>Urgent Care Hours: <?php echo $uc_hours ?></p>

					<p><?php // the_sub_field('description'); ?></p>
					</div>
		</div>
	<?php } //end ignore map marker conditional ?>
	<?php endwhile; wp_reset_query(); ?>
	<?php endif; ?> 
	<?php endwhile; wp_reset_query(); ?>
<?php } //end singular loop ?>

		</div>
	</div>
