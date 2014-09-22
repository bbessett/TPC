
<?php if ( ! have_posts() ) : ?>
	<div class="twelve columns">
		<h5 class="list-heading"><?php _e( 'No Results Found', 'twentyten' ); ?></h5>
		<p><?php _e( 'Sorry, there are no results that match your search. Please click Reset Search to try again.', 'twentyten' ); ?></p>
		<?php // get_search_form(); ?>
		<?php echo do_shortcode( '[facetwp facet="doctor_search_autocomplete"]' ); ?>
		<?php echo do_shortcode( '[facetwp template="doctor_search"]' ); ?>
	</div>
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php // $parentscategory =""; foreach((get_the_category()) as $category) { if ($category->category_parent != 0) { $parentscategory .=  $category->name . ', '; } } ?>
<div class="post">
<div class="article">
		<?php if ( has_post_thumbnail() ) { ?>
	<div class="thumb-wrapper three columns mobile-hide"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
	<?php } else { ?>
<div class="thumb-wrapper three columns mobile-hide no-image"><a href="<?php the_permalink(); ?>"><img src="http://tpc.dev.rweststaging.com/wp-content/uploads/2014/05/placeholder.gif"></a></div> 
<?php } ?>
		<h6 class="article-title list-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<div class="postinfo"><?php // echo get_the_date(); ?><?php echo substr($parentscategory,0,-2); ?> </div>

<?php $specialities = get_field('doctor_specialities'); ?>

		<?php if( $specialities ): ?>
				<div class="heading sub-title">
				<?php foreach( $specialities as $post ): setup_postdata($post); ?>
					<div class="meta"> 
					<a class="lnk-noclr" href="<?php echo get_the_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID ); ?></a>
					<?php // the_field("location_address")?>
					</div>
				<?php endforeach; ?>
		 <?php wp_reset_postdata();?>
			</div>
<?php endif; ?>

<?php $locations = get_field('doctor_locations'); ?>	
<?php if( $locations ) { ?>
	<div class="meta-list" style="margin-top:10px;">
	<?php foreach( $locations as $post ): ?>
	<div class="meta">
	<?php setup_postdata($post); ?>
		<a class="m-title" href="<?php echo get_the_permalink( $post->ID ); ?>">
		<?php echo get_the_title( $post->ID ); ?></a>
		<?php // the_field("location_address")?>
	 </div>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
<?php  } ?>







				<?php the_excerpt(); ?>
				<div class="clear"></div>
				<div class="meta-links">
				</ul>
			</div>
			</div>
	</div> 
	<hr class="list"/>
 <?php endwhile; // end of the loop. ?>