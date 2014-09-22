<div id="locations">
	<div class="grid-block">
		<div class="heading-tabs row">
			<div class="seven columns">
				<h4 class="tab">Our Locations</h4>
			</div>

			<?php if (is_page('about')) { ?>
			<div class="five columns">
				<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations"> See All</a></h5>
			</div> 
			<?php }?> 
		</div><!-- end heading block -->
		<div class="block-inner">
			<div class="loading"><img src="<?php echo get_template_directory_uri(); ?>/imgs/loader.gif"></div>
			<div id="location-block">
				<?php 
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query(); 
				$wp_query->query('showposts=-1&post_type=locations'.'&paged='.$paged); 
				?> 
				<ul class="location-block two_up tiles"><!--begin locations loop --> 
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?> 
						<li class="list-heading"><a href="<?php the_permalink(); ?>">
						<span class="breakme-heading"><?php the_title(); ?></span></a><address><?php the_field('location_address'); ?></address>
							<?php if( have_rows('locations') ): ?>
								<?php  while ( have_rows('locations') ) : the_row(); ?>
									<?php $location = get_sub_field('location'); ?>
									<?php $reg_hours = get_sub_field('location_reg_hours');
									$uc_hours = get_sub_field('location_urgent_care_hours'); ?>
									<span class="info"><a class="tel" href="tel:<?php the_sub_field('location_phone_number');?>"><?php the_sub_field('location_phone_number');?></a> &#124; <a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>&#44;<?php echo $location['lng']; ?>">Directions</a></span>
							<p class="ext-meta info">
								<strong> Regular: </strong> <?php echo $reg_hours; ?> <br/>
								<strong> Urgent Care Hours: </strong> <?php echo $uc_hours; ?> 
							  </p>

			
										
								<?php endwhile;  ?>
							<?php endif; ?>

						</li>
					<?php endwhile; ?>
				</ul>

				<?php $wp_query = null; $wp_query = $temp;?>
				<?php wp_reset_query(); ?>
			</div>
		</div>

	</div>
</div>
