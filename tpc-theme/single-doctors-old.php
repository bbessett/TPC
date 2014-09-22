	<?php get_header(); ?>


<div class="row">
		<div id="content" <?php post_class('home-post'); ?>>
			<div class="four columns">
			<div class="grid-block">	
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="block-inner">	
				<h5 class="post-title"><?php the_title()?></h5>	
			<?php $relationships = get_field('doctor_specialities'); ?>	
		<?php if( $relationships ): ?>
			<div class="meta"> 
			<?php foreach( $relationships as $post ): ?>
							<?php setup_postdata($post); ?>
				<p><?php echo get_the_title( $post->ID ); ?></p>
									<?php // the_field("location_address")?>
								
			<?php endforeach; ?>
		 <?php wp_reset_postdata();?>
				</div>
		 <?php endif; ?>

			</div>
			<div class="block-img">	
					<?php the_post_thumbnail('full', array('class' => 'center')); ?> 
				</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>	
		</div>

		<div id="quick-links" class="grid-block">
			<div class="block-inner">
			<h5 class="post-title">Love Your Doctor</h5>	
			<p>We value your feedback.If you had a great expericence with Dr. Palla please share! Leave your review on her profile.</p>
			<div class="medium primary btn submit"><a href="#">Angie's List</a></div>
			<div class="medium primary btn submit"><a href="#">Healthgrade</a></div>
			<p> Is thre something we could do better ? </p>
			<div class="medium primary btn submit"><a href="#">Contact us</a></div>
			</div>

		</div>
		</div>

		<div class="four columns grid-block">	
		<div class="block-inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<h5 class="post-title">About the Doctor</h5>	
			<div class="block-img">	
			<?php the_field('doctor_long_description'); ?> 
			</div>
			<?php endwhile; ?>
			</div>
			<?php wp_reset_query(); ?>
			</div>
		

	<!-- sidebar -->	

<div id="sidebar" class="four columns ">
		<?php while ( have_posts() ) : the_post(); ?>
<?php
				$doctors_args = array(
					 'post_type' => 'doctors',
				);
						$doctors_posts = get_posts( $doctors_args );

						$specialities_args = array(
   						 'post_type' => 'specialites',
   						 'sort_order' => 'ASC',
						);
						
						$specialities_posts = get_posts( $specialities_args );
						
						$all_posts = array_merge( $doctors_posts, $specialities_posts );

						$post_ids = wp_list_pluck( $all_posts, 'ID' );//Just get IDs from post objects
 
 $specialites = get_posts(array(
					   'post__in'  => $post_ids,
					   'orderby' => 'date',
					   'order' => 'ASC',
					   'meta_query' => array(
						array(
						'key' => 'specialty_doctors',	
						'value' => '"' . get_the_ID() . '"',
						'compare' => 'LIKE'
						)
					)
			));
	
	//var_dump($specialites);

?>


					

	
	<div class="block-inner">
					<h5><?php echo $title ?></h5>
					<?php if( $specialites ): ?>
 					<ul>
 			
						<?php foreach( $specialites as $p ): ?>
		
						 <?php setup_postdata($p); ?>
					
								<li>
								<p><a href="<?php echo get_permalink( $p->ID ); ?>">
								<span id="r-item-0"><?php echo get_the_title( $p->ID ); ?></span>
								</a></p>	
								</li>
	
									

						<?php endforeach; ?>
							 <?php wp_reset_postdata(); ?>
				</ul>
			 <?php wp_reset_postdata(); ?>
			<?php endif;?>
			<?php endwhile;?>
</div> <!-- end sidebar -->

</div> <!--end content div -->

</div><!--end row div -->


<?php get_footer(); ?>