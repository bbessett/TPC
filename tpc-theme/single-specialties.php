	<?php get_header(); ?>


	<div class="row">
		<div class="page-wrap">
			<div id="content" <?php post_class('home-post'); ?>>

				<div id="main-content" class="eight columns two-column-tablet-view">	
					<div class="grid-block" style="display:inline-block">

						<div class="parallax" style="" gumby-parallax="0.5">
							<?php $image_big = wp_get_attachment_image_src(get_field('banner_image'), 'full'); ?>
							<?php $attachment=get_post( get_field('banner_image')); $alt=get_post_meta($attachment->ID, '_wp_attachment_image_alt', true); 
							$image_title = $attachment->post_title; $caption = $attachment->post_excerpt; $description = $attachment->post_content;?>

							<?php // var_dump($image_big[0])?>
							<?php if( $image_big ) { ?>
							<a alt="Specialities Home" title="Specialities Home" href="/our-specialties/"> <img width=100% alt="<?php echo $image_title ?>" src="<?php echo $image_big[0]; ?>" /></a>
							<?php } else { ?>
							<a alt="Specialities Home" title="Specialities Home" href="/our-specialties/">  <img width=100% alt="<?php echo $image_title ?>" src="<?php echo get_template_directory_uri(); ?>/imgs/specialty-a-default.jpg" /></a>
							<?php } ?>

							<div class="block-inner">
								<div class="post-content">
									<h5 class="post-title"><?php the_title();?></h5>
									<?php while ( have_posts() ) : the_post(); ?> 
										<?php if(get_field ('specilatiy_brochure') ) : 
										$url = get_field('specilatiy_brochure', $file['url']);
										?>
										<div class="medium primary btn submit right six columns phone-twelve tablet-twelve">
											<a target="_blank" href="<?php echo $url[url]; ?>" >Download Brochure </a>
										</div>
									<?php endif; ?>
									<?php if ( has_post_thumbnail() ) { ?>
									<div class="thumb-wrapper two columns hide-phone">	
										<?php the_post_thumbnail('thumb', array('class' => 'left')); ?> 
									</div>
									<?php } ?>
									<?php the_content(); ?>
								<?php endwhile; wp_reset_query();?>
							</div>
							<?php if(get_field( 'pdf_downloads' )): ?>
								<div style="margin-top:30px;" class="page-links first">
									<h6 class="list-heading"><?php the_title();?> Resources</h6>
									<ul class="page-menu-links">
										<?php while(has_sub_field('pdf_downloads')): ?>
											<li>
												<a class="dl-icon" target="_blank" href="<?php the_sub_field ('pdf_url')?> "><span class="pdf-ico"></span><?php the_sub_field ('pdf_link_title')?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if(get_field( 'external_links' )): ?>
								<div class="page-links">
									<h6 class="list-heading"><?php the_title();?> Links</h6>
									<ul class="page-menu-links">
										<?php while(has_sub_field( 'external_links' )): ?>
											<?php if(get_sub_field('link_type') == "external")  { ?>
											<li>
												<a target="_blank" href="<?php the_sub_field ('external_url')?> "><?php the_sub_field ('external_link_title')?> </a>
											</li>
											<?php } elseif(get_sub_field('link_type') == "internal") { ?>
											<li>
												<a href="<?php the_sub_field ('internal_url')?> "><?php the_sub_field ('internal_link_title')?> </a>
											</li>
											<?php } ?>	
											
										<?php endwhile; ?>	
									</ul>	
								</div>
							<?php endif; ?>


						</div>
					</div>
				</div>
			</div>
			<!-- sidebar -->	
			<div id="sidebar" class="four columns two-column-tablet-view">

				<?php get_template_part( 'partials/widget', 'children' ); ?>
				
				<?php if($relationships = get_field('specialty_location')); { ?> 
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( $relationships ): ?>
						<div class="grid-block">	
							<div class="block-inner">
								<h5 class="post-title"><?php the_title();?> Locations</h5>	
								<ul class="meta-list"> 
									<?php foreach( $relationships as $p): ?>
										<?php setup_postdata($p); ?>
										<li class="small"><a class="list-heading" href="<?php echo get_the_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
											<address><?php the_field('location_address', $p->ID); ?></address>
											<?php if( have_rows('locations', $p->ID) ): ?>
												<?php  while ( have_rows('locations', $p->ID) ) : the_row(); ?>
													<?php $location = get_sub_field('location', $p->ID); ?>
													<?php // print_r($location);?> 
													<span class="info">	<?php the_sub_field('location_phone_number');?>  &#124; <a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
												<?php endwhile; wp_reset_query(); ?>
											<?php endif ?>
										</li>
										<?php // the_field("location_address")?>
									<?php endforeach; wp_reset_postdata(); ?>
									<?php ?>
								</ul>
							</div>
						</div>
					<?php endif;?>
				<?php endwhile;  ?>
				<?php  } ?>
				
				<?php if ( $relation = get_field('specialty_doctors')); { ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( $relation ): ?>
						<div class="grid-block">
							<div class="block-inner">
								
								<h5 class="post-title"><?php the_title();?> Practioners</h5>	
								
								<ul class="meta-lists">
									<?php foreach( $relation as $p): ?>
										<?php setup_postdata($p); ?>
										<li ><a class="list-heading" href="<?php echo get_the_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
										<?php // the_field("location_address")?>
									<?php endforeach;  wp_reset_postdata(); ?>
									
								</ul>
								
							</div> 
							
						</div>
					<?php endif; ?>
				<?php endwhile;  wp_reset_query(); ?>
				<?php } ?>


			</div><!-- end sidebar -->
		</div> <!--end content div -->
	</div>
</div><!--end row div -->


<?php get_footer(); ?>