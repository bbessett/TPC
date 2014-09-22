<div id="locations">
	<div class="grid-block">
   		<div class="heading-tabs row">
  	<div class="<?php if (is_page('about')) { ?> seven <?php } else { ?> twelve <?php } ?>columns">
	  	<h4 class="tab">Our Locations</h4>
		</div>
		
 <?php if (is_page('about')) { ?>
 		<div class="five columns">
			<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations"> See All</a></h5>
		</div> 
<?php }?>
		</div><!-- end heading block -->
<div class="block-inner">
	<div id="loading"><img src="<?php echo get_template_directory_uri(); ?>/imgs/loader.gif"></div>
	<div id="location-block-ajax">
<?php 
	$temp = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query(); 
	$wp_query->query('showposts=5&post_type=locations&orderby=title'.'&paged='.$paged); 
?>
	<ul class="location-block"><!--begin locations loop --> 
	<?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
  		<li class="list-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><address><?php the_field('location_address'); ?></address>
			<?php if( have_rows('locations') ): ?>
 			<?php  while ( have_rows('locations') ) : the_row(); ?>
 			<?php $location = get_sub_field('location'); ?>
 			<span class="info">	<?php the_sub_field('location_phone_number');?>  &#124; 
			<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
 			<?php endwhile;  ?>
			<?php endif; ?>
			<!-- end locations loop -->			
		</li>
   	 <?php endwhile; ?>
	</ul>
<div id="navigation">
  <div class="twelve columns">
  <div class="six columns"><?php previous_posts_link('&laquo; Previous') ?></div>
  <div class="six columns"><?php next_posts_link('More Locations &raquo;') ?></div>
  </div>
</div>
<?php $wp_query = null; $wp_query = $temp;?>
 <?php wp_reset_query(); ?>
    		</div>
    	</div>

	</div>
</div>

<script>
jQuery(function($) {
    $('#location-block-ajax').on('click', '#navigation a', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        $('#location-block-ajax').fadeOut(25, function(){
        	$('#loading').fadeIn(25);
            $(this).load(link + ' #location-block-ajax', function() {
    	  	$('#loading').fadeOut(25);
	                $(this).fadeIn(25);
            });
        });
    });
});
</script>
