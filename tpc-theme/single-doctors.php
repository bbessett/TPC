	<?php get_header(); ?>


<div id="single" class="row">
		<div id="content" <?php post_class('home-post'); ?>>
	
			<div class="four columns two-column-tablet-view">
	<div class="grid-block basic-profile-block">	
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="block-inner">	
			<div class="heading sub-title">
				<h5 class="post-title"><?php the_title()?></h5>	
				</div>	
					<?php $relationships = get_field('doctor_specialities'); ?>	

				<?php if( $relationships ): ?>
				<div class="heading sub-title">
				<?php foreach( $relationships as $post ): setup_postdata($post); ?>
					<div class="meta"> 
					<a class="lnk-noclr" href="<?php echo get_the_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID ); ?></a>
					<?php // the_field("location_address")?>
					</div>
				<?php endforeach; ?>
		 <?php wp_reset_postdata();?>
			</div>
		 <?php endif; ?>
	
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
		<div class="block-img">	
				<?php the_post_thumbnail('full', array('class' => 'center')); ?> 
			</div>
		<?php  } else {  ?>
			<div class="block-img">
			<img src="http://tpc.dev.rweststaging.com/wp-content/uploads/2014/05/placeholder.gif"/>
			</div>
		<?php } ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>	
<?php $relationships = get_field('doctor_locations'); ?>	
<!--Current Doctor Location Information -->
	<div id="doc-location" class="block-inner">
		<?php if( $relationships ) { ?>
	<?php foreach( $relationships as $post ): ?>
			<div class="meta">
	<?php setup_postdata($post); ?>
		<span class="list-heading">
		<a class="m-title" href="<?php echo get_the_permalink( $post->ID ); ?>">
		<?php echo get_the_title( $post->ID ); ?></a></span>
		<address><?php the_field('location_address');?></address>
<?php if( have_rows('locations') ): ?>
 <?php  while ( have_rows('locations') ) : the_row(); ?>
 	<?php $location = get_sub_field('location'); ?>
 	<span class="info"> <?php the_sub_field('location_phone_number');?> &#124;
 		<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
 	<?php endwhile; ?>
	<?php endif; ?>
		<?php // the_field("location_address")?>
		 </div>
		<?php endforeach; wp_reset_postdata(); ?>
		<?php  } ?>
		
	</div>
	<!-- end Current Doctor Location Information -->


	<div id="main-content">	
		<div class="block-inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_field('doctor_long_description'); ?> 
		<?php endwhile; ?>
	    </div>
			<?php wp_reset_query(); ?>
	</div>


		</div> 		<!-- end first column grid-block container -->
</div>
<div class="four columns two-column-tablet-view">
<?php get_template_part( 'partials/widget', 'related' ); ?>
</div>

<!-- sidebar -->	

<div id="sidebar" class="four columns two-column-tablet-view">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="quick-links" class="grid-block hide-phone">
			<div class="block-heading row">
			<h5 class="block-heading-title left">Love Your Specialist</h5>
			<a href="<?php site_url();?>/contact-us" class="icon-tab heart-icon right"></a>	
			</div>
			<div class="block-inner">
			<p>We value your feedback.If you had a great expericence with <?php the_title(); ?> please share! Leave your review on their profile.</p>
		</div>
			<div class="block-inner">
		<?php if (get_field('angies_list_url')) { ?>
	<div class="medium primary btn submit">
	<a title="<?php the_title(); ?> Angie's List Page" target="_blank" href="<?php the_field('angies_list_url');?>">Angie's List</a></div> 
	<?php } ?>
		
		<?php if (get_field('health_grade_url')) { ?>
		<div class="medium primary btn submit"><a title="<?php the_title(); ?> Health Grades Page" target="_blank" href="<?php the_field('health_grade_url');?>">Healthgrades</a>
		</div> 
		<?php } ?>
			<p> Is there something we could do better? </p>
			<div class="medium primary btn submit">
			<a href="<?php site_url();?>/contact-us">Contact us</a>
			</div>
			
		</div>
		</div>
		<div id="quick-links" class="grid-block just-visible-phone">
			<div class="block-heading row">
			<h5 class="block-heading-title left">Love Your Specialists</h5>
			<a class="icon-tab heart-icon right"></a>	
			</div>
			<div class="block-inner">
			<p>We value your feedback. If you had a great expericence with <?php the_title(); ?> please share! Leave your review on their profile.</p>
		<?php if (get_field('angies_list_url')) { ?><div class="medium primary btn submit"><a title="<?php the_title(); ?> Angie's List Page" target="_blank" href="<?php the_field('angies_list_url');?>">Angie's List</a></div> <?php } ?>
		<?php if (get_field('health_grade_url')) { ?><div class="medium primary btn submit"><a title="<?php the_title(); ?> Health Grades Page" target="_blank" href="<?php the_field('health_grade_url');?>">Healthgrade</a></div> <?php } ?>
			<p> Is there something we could do better? </p>
			<div class="medium primary btn submit"><a href="<?php site_url();?>/contact-us">Contact us</a></div> 
			</div>
		</div>
	<?php endwhile ?>

</div> <!-- end sidebar -->

</div> <!--end content div -->

</div><!--end row div -->


<?php get_footer(); ?>