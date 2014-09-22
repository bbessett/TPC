	<?php get_header(); ?>

<div class="page-wrap">
<div id="content"<?php post_class('home-post'); ?>>

<div id="main-content" class="row">
<div class="eight columns two-column-tablet-view">
	<div class="grid-block">	
			<?php while ( have_posts() ) : the_post(); ?>
		<div class="block-inner">	
			<div class="heading">
				<h4 class="post-title"><?php the_title()?></h4>	
			<?php $relationships = get_field('doctor_specialities'); ?>	
				<?php if( $relationships ): ?>
		<div class="meta"> 
				<?php foreach( $relationships as $post ): setup_postdata($post); ?>
					<p><a class="lnk-noclr" href="<?php echo get_the_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID ); ?></a></p>
				<?php // the_field("location_address")?>
				<?php endforeach; ?>
		 			<?php wp_reset_postdata();?>
		</div>
		 <?php endif; ?>
			</div>
			</div>
			
		<div class="block-img">	
				<?php get_template_part( 'partials/location', 'map' ); ?>
		</div>
	
			<?php endwhile; ?>

			<?php wp_reset_query(); ?>	

<!--Current Location Information -->
	<div class="block-inner">
	<p><address><?php the_field('location_address');?></address></p>
		<?php if( have_rows('locations') ): ?>
 			<?php  while ( have_rows('locations') ) : the_row(); ?>
 			<?php $location = get_sub_field('location'); ?>
 			<span class="info">	<?php the_sub_field('location_phone_number');?>  &#124; 
			<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
 			<?php endwhile;  ?>
			<?php endif; ?>
	</div>
	<!-- end Current Doctor Location Information -->
	</div>	


		<?php while ( have_posts() ) : the_post(); ?>
				<div class="grid-block">
		<div class="block-inner">
				<?php $relationships = get_field('location_doctors'); ?>
			<h5 class="post-title">Location Doctors</h5>	
			<?php if( $relationships ): ?>
			<ul class="meta-list doctors">
				<?php foreach( $relationships as $p): ?>
					<?php setup_postdata($p); ?>
					<li class="small"><a class="list-heading" href="<?php echo get_the_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
					<?php // the_field("location_address")?>
				<?php endforeach; ?>
			 <?php wp_reset_postdata();?>
			 </ul>
			
			 <?php endif; ?>	
				<?php endwhile;   wp_reset_query();?>
					<?php ?>
			 </div>
		</div>	
</div><!-- end -->

<div id="sidebar" class="four columns two-column-tablet-view">
<?php // get_template_part( 'partials/widget', 'related' ); ?>
		
<div class="grid-block">
<div class="block-inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $relationships = get_field('location_specialities'); ?>
		<h5 class="post-title">Location Specialites</h5>	
			<?php if( $relationships ): ?>
			<ul class="meta-list">
				<?php foreach( $relationships as $p): ?>
					<?php setup_postdata($p); ?>
					<li class="small"><a class="list-heading" href="<?php echo get_the_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
					<?php // the_field("location_address")?>
				<?php endforeach; ?>
			 <?php wp_reset_postdata();?>
			 </ul>
		
		
			 <?php endif; ?>

			<?php endwhile; ?>
		</div>

</div>

</div>
</div> <!--end content div -->
</div>
</div><!--end row div -->

<script type="text/javascript">
jQuery(document).ready(function($){
            $('ul.meta-list li:even').addClass('even');
            $('ul.meta-list li:odd').addClass('odd');
        });
</script>


<?php get_footer(); ?>