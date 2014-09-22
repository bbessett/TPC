	
	<?php $args= array('post_type' => 'doctors', 'cat' => '6','posts_per_page'=>'2' );
				$posts = get_posts($args);
				foreach( $posts as $post) : setup_postdata($post);?>

		<div id="feature-block-<?php echo get_the_ID() ?>" class="four columns grid-block tablet-hide"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="block-left">
				   <h4 class="tab"><?php the_title();?></h4>
				</div>
			 	<div class="block-right">
		  	<h5 class="tab last right quick-link"><a href="#">See All</a></h5>
				</div>
		</div>
		<div class="block-content">
			<div class="block-img">
			<a href="<?php the_permalink(); ?>"?><?php the_post_thumbnail('full', array('class' => 'center')); ?></a>
				</div>
				<?php $title = get_the_title(); ?> 	
				<?php $link = get_permalink(); ?>
				<?php $relationships = get_field('doctor_associations'); ?>

		<div class='block-inner'>
			<div class="meta">
				<p class="small s-title"><a href="<?php echo $link ?>"><?php echo $title ?></a></p>
			<?php if( $relationships ): ?>
						<?php foreach( $relationships as $post ): ?>
							 <?php $ctr1++;?>
								<?php setup_postdata($post); ?>
					<span id="r-item-0<?php echo $ctr1 ?>"><?php echo get_the_title( $post->ID ); ?></span>
									<?php // the_field("location_address")?>
							<?php endforeach; ?>
			 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
			</div> <!-- meta -->
		</div> <!-- end block-inner -->
</div><!-- end block-content -->
		<?php endforeach; ?>
		<?php wp_reset_postdata();?>