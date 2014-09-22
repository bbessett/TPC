

		<div id="feature-block-<?php echo get_the_ID() ?>" class="grid-block"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="twelve columns">
				   <h5 class="tab">
				   <?php if (is_page('our-specialties')) { ?><a href="<?php echo site_url();?>/doctor/">Featured Doctors</a>
				   <?php } elseif (is_page('find-a-doctor')) { ?><a href="<?php echo site_url();?>/our-specialties/">Featured Specialities</a>
				   <?php }?>
				   </h5>
				</div>
		</div>
	<?php if (is_page('our-specialties')) { ?>
	<?php $args= array('post_type' => 'doctors', 'cat' => '6','posts_per_page'=>'2' );?>
	<?php } elseif (is_page('find-a-doctor')) { ?>
	<?php $args= array('post_type' => 'specialties', 'cat' => '187','posts_per_page'=>'2' );?>
	<?php } ?>
			<?php $posts = get_posts($args);
				foreach( $posts as $post) : setup_postdata($post);?>
				<?php $title = get_the_title(); ?> 
				<?php $desc = get_the_excerpt(); ?> 		
				<?php $link = get_permalink(); ?>
				<?php $relationships = get_field('doctor_associations'); ?>
		<div class="row">
		<div class="twelve columns">
		<div class="block-content">
			<?php if (is_page('find-a-doctor')) { ?>
		<div class="desc">
			<div class="inner">
			<h6 class="list-heading"><a href="<?php echo $link ?>"><?php echo $title ?></a></h6>
			<p><?php echo $desc ?></p>

			</div>
		</div>
		<?php } ?>
			<div class="wiget-block-img">
				<a href="<?php the_permalink(); ?>"?><?php the_post_thumbnail('full', array('class' => 'center')); ?></a>
			</div>
			
	<?php if (is_page('our-specialties')) { ?>
	<div class="desc">
			<div class="inner">
			<h6 class="list-heading" style="margin-bottom:0;"><a href="<?php echo $link ?>"><?php echo $title ?></a></h6>
			<?php $relationships = get_field('doctor_specialities'); ?>	
				<?php if( $relationships ): ?>
			
				<?php foreach( $relationships as $post ): setup_postdata($post); ?>
					<div class="meta"> 
					<a class="lnk-noclr" href="<?php echo get_the_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID ); ?></a>
					<?php // the_field("location_address")?>
					</div>
				<?php endforeach; ?>
		 <?php wp_reset_postdata();?>
		 <?php endif; ?>

	</div> <!-- end block-inner -->
	</div>
		</div>
	<?php } ?>	
		</div> <!-- end grid -->
		</div> <!-- end row -->
				<?php endforeach; ?>
		<?php wp_reset_postdata();?>
</div><!-- end block-content -->
</div>
