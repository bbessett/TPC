<?php get_header(); ?>


<div class="row">

		<div id="content" <?php post_class('home-post'); ?>>
			<div class="four columns grid-block">	
		
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
		<div class="four columns grid-block">	
		<div class="block-inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<h5 class="post-title">About the Doctor</h5>	
			<div class="block-img">	
			<?php the_field('doctor_long_description'); ?> 
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			</div>
		</div>

		
		<?php while ( have_posts() ) : the_post(); ?>
	<?php $relationships = get_field('doctor_specialities'); ?>	
<?php if( $relationships ): ?>
		
<?php // the_field("location_address")?>


<?php foreach( $relationships as $post ): ?>
<?php $title = get_the_title( $post->ID ); ?>
<?php 
	$title = get_the_title($ID);
	$word = explode(' ', $title);
	$totalwords = count($word);
	$halfnumber = $totalwords / 2;
	$string1 = implode(' ', array_slice($word, 0, $halfnumber));
	$string2 = implode(' ', array_slice($word, $halfnumber));
?>	


<?php  $specialites = get_posts(array(
							'post_type' => 'doctors',
							'meta_query' => array(
							'relation' => 'OR',
						array(
						
							'value' =>  $totalwords,
							'compare' => 'LIKE'
						)
					)
			));
//var_dump($string2);
?>
					
	<?php setup_postdata($post); ?>
	<div class="four columns grid-block">	
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
	
										 <?php wp_reset_postdata(); ?>

						<?php endforeach; ?>
				</ul>
			 <?php wp_reset_postdata(); ?>
		<?php endif; ?>
</div>
    </div><!--end related doctor specialites div -->
	<?php endforeach; ?>
	<?php endif; ?>
	<?php // echo  $totalwords ?>



<?php endwhile; ?>
 <?php wp_reset_query(); ?> 







	</div> <!--end content div -->

</div><!--end row div -->


<?php get_footer(); ?>