<?php get_header(); ?>

<?php if (is_page('about')) { ?>

<div id="about">
	<section id="first-row" class="row">
		<!-- Begin Page Banner -->
		<div class="eight tablet-view full columns">
			<div id="banner">	
				<div id class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="grid-block">
							<div class="twelve columns">
								<div class="heading-tabs row">
									<h4 style="width: 100%;" class="tab left"><?php// the_title(); ?> <?php the_field('alt_title') ?> </h4>
								</div>
								<div class="content-wrap">
									<?php if( have_rows('core_values_list') ): ?>
										<!-- Core Value List -->
										<div class="content-inner">
											<a class="play-img four columns switch" href="#" gumby-trigger="#modal1">
												<img src="<?php echo get_template_directory_uri();?>/imgs/play.png"/>
											</a>
											<ul class="eight columns banner-list">
												<div class="banner-content white-gradient-long">
													<h5 class="title">Our Core Values</h5>
													<?php while( have_rows('core_values_list') ): the_row(); 
													$list_title= get_sub_field('cvl_item_title');
													$list_content = get_sub_field('cvl_item_desc'); 
													?>
													<li>
														<h4 class="heading-sans"><?php echo($list_title); ?></h4>
														<p class="list-desc"><?php echo($list_content); ?></p>
													</li>
												<?php endwhile; wp_reset_query(); ?>
											</div>
										</ul>
									</div>
								<?php endif; ?>
								<!-- Banner Image -->
								<div style="position:relative;" class="banner-image">
									<img class="banner-img" src="<?php the_field('image_placeholder')?>"/>
								</div>
							</div>		<!-- end content wrap -->
						</div> <!-- end grid class -->
					</div><!-- end grid-block -->
				</div>	<!-- end nested row -->
			</div><!-- End Page Banner -->

			<div class="grid-block medium-block">
				<?php get_template_part( 'partials/widget', 'news-feature' ); ?>
			</div>
			<?php get_template_part( 'partials/locations', 'two-column' ); ?>
		</div><!-- End First Column Grid-Block -->
		
		<div class="four columns tablet-view full tablet-alpha-left ovr"> 
			<?php while( have_rows('service_blocks') ): the_row(); 
			$list_title= get_sub_field('service_title'); $count++; ?>
			<div class="tablet-view half">
				<div class="grid-block block_<?php echo $count++?>">
					<!--block-content -->
					<div class="heading-tabs row">
						<div class="twelve columns">
							<h4 class="tab"><?php echo $list_title;?></h4>
						</div>
					</div>
					<div class="block-content">
						<ul class='block-list <?php if(get_sub_field('service_list_type') == "SL") 
						{ ?>bullet<?php } else { (get_sub_field('service_list_type') == "SD") ?>no-bullet<?php } ?>'>
						<?php while( have_rows('service_descriptions') ): the_row(); 
						$list_items = get_sub_field('service_desc_items');
						$content_item = get_sub_field('service_paragraph'); ?>
						<?php if ($list_items) { ?>
						<li class="list-item">
							<?php echo($list_items); ?>
						</li>
						<?php } elseif ($content_item) { ?>			
						<li>
							<p class="list-desc"><?php echo($content_item); ?></p>
						</li>
						<?php }?>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
			</div><!--end block-content -->
		</div>
	</div> <!--end grid-block -->

<?php endwhile; wp_reset_query(); ?>
</div><!--end grid -->

<?php endwhile; wp_reset_query(); ?>

</section> <!-- end First Row -->
</div>  <!-- end  About Page-->


<?php } elseif (is_page('locations')) { ?>
<div id="page">
	<section id="first-row">
		<div class="row">
			<div class="twelve columns">
				<?php get_template_part( 'partials/location', 'map' ); ?>
			</div>
		</div>
	</section>
	<section id="second-row" class="row">
		<div class="row">
			<div class="eight tablet-view full columns">	
				<?php get_template_part( 'partials/locations', 'two-column' ); ?>
			</div>


			<?php get_template_part( 'partials/widget', 'ucare' ); ?>

		</div>
	</section>
</div>
<?php } elseif (is_page('health-resources')) { ?>

<!-- start health resources page -->

<div id="page" class="row"> 
	<div id="content" class="eight columns">	
		<div class="row">
			<div class="grid-block">
				<div class="twelve columns">
					<?php while ( have_posts() ) : the_post(); ?>
						<h4 class="block-title"><?php the_title(); ?></h4>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>

				<div class="block-content">
					<?php // if(function_exists('tptn_show_daily_pop_posts')) tptn_show_daily_pop_posts(); ?>
					<div class="row"> 
<!-- <div class="six columns">
   <?php // echo do_shortcode('[loop the_query="post_type=resources&orderby=title&tag=popular-resources&posts_per_page=5" title="Most Popular Resources" relationship_field="resource_specialties"]'); ?>
</div> -->
<div class="twelve columns"> 
	<?php // echo do_shortcode('[loop the_query="post_type=resources&posts_per_page=5" featured="true" title="Most Recent Resources" relationship_field="resource_specialties"]'); ?>
	<hr/>
	<?php echo do_shortcode('[basic-loop the_query="post_type=resources&posts_per_page=2&cat=185" featured="1"]'); ?>
</div>
<hr/>
</div> 

<?php // get_template_part( 'partials/resources', 'loop' ); ?>

<div id="top-sort-filters" class="sort row">

	<div class="picker five columns" style="margin-left:0;">
		<?php echo do_shortcode('[facetwp facet="sort_by_speciality"]');?>
	</div>

	<div class="twelve columns" style="margin-left:0";>
		<?php echo do_shortcode('[facetwp facet="alphabet_filter"]');?>
	</div>

</div>
<div class="row">
	<?php echo do_shortcode('[facetwp template="resources"]'); ?> 
	<?php // depreciated get_template_part('partials/filter','results'); ?>
	<?php // depreceated echo do_shortcode('[loop title="Resources" the_query="post_type=resources" relationship_field="resource_specialties"]'); ?>
</div> 
</div>
</div>
</div>
</div> <!--end content-->
<div id="sidebar" class="four columns">
	<?php get_sidebar(); ?>
</div>
</div>
</div>

<script>
	(function($) {
		$(document).on('facetwp-loaded', function() {
			$('.facetwp-facet-sort_by_speciality > select.facetwp-dropdown > option:first-child').text('View All Specialties');
		});
	})(jQuery);
</script>
<!-- end health resources page -->
<?php } elseif (is_page('patient-information')) { ?>
<!-- Begin Patient Information page -->
<div id="page" class="row">
	<div class="eight columns">
		<div class="grid-block">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<div class="twelve columns">
						<h4 class="block-title"><?php the_title();?></h4>
					</div>
				</div>
				<?php get_template_part( 'partials/widget', 'quicklinks' ); ?>
			<?php endwhile; ?>
		</div>
	</div>

	<div class="four columns"> 
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="row">
		<div  class="four left-margin columns">
			<nav id="sidebar-nav-holder" class="" gumby-fixed="top" gumby-pin="toggle_<?php echo $count0++; ?>">

				<div class="index-nav">

					<div class="widget">
						<h6 class="widget-title"> Patient Information Topics</h6>
						<div class="block-inner">
							<ul>
								<?php while( have_rows('faq_content_blocks') ): the_row(); 
								$block_topic_link = get_sub_field('faq_content_tp_title');
								$count1++; 
								?> 
								<li class="list-heading" > 
									<a class="skip" gumby-update gumby-offset="-40" gumby-goto="[data-target='toggle_<?php echo $count1++; ?>']" href="#"><?php echo $block_topic_link ?></a>
								</li>
							<?php endwhile; wp_reset_postdata(); ?>	
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

</div>

<?php } elseif (is_page('our-specialties')) { ?>
<div id="page" class="row">
	<div class="eight columns grid-block">	
		<div id="content">
			<div class="row">
				
				<?php while ( have_posts() ) : the_post(); ?>
					<h4 class="block-title">Our <?php the_title(); ?></h4>

					<?php// the_content(); ?>
					<div id="featured">
						<hr class="top">
						<div class="twelve columns">
							<div class="block-inner">	
								<h6 class="list-heading grey-txt">Featured Specialities</h6>
							</div>
						</div>
						<?php echo do_shortcode('[basic-loop the_query="post_type=specialties&posts_per_page=2&cat=187" featured="1"]'); ?>
					</div>
					<hr class="bottom"/>

					<section id='two-col-sec'>
						<div class="row">
							<div class="twelve columns">
								<?php echo do_shortcode('[facetwp facet="alphabet_filter"]'); ?>
								<?php // echo do_shortcode('[facetwp sort="true"]'); ?>
							</div>
							<?php echo do_shortcode('[facetwp template="specialities"]'); ?> 
						</div>
					</section> 
				<?php endwhile; ?>


			</div>
		</div>
	</div>
	

	<div class="four columns">
		<div id="sidebar">
			
			<?php get_template_part( 'partials/widget', 'featured' ); ?>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<script>
	jQuery(function() {
		FWP.auto_refresh = false;
	});
</script>
<?php } elseif (is_page('find-a-doctor')) { ?>
<div id="page" class="row">
	<div class="eight columns grid-block">	
		<div id="content">

			<?php while ( have_posts() ) : the_post(); ?>
				<h4 class="block-title">Our <?php the_title(); ?></h4>

				<?php// the_content(); ?>
				<div id="featured">
					<hr class="top">
					<div class="twelve columns">
						<div class="block-inner">	
							<h6 class="list-heading grey-txt">Featured Doctors</h6>

						</div>
					</div>
					<?php echo do_shortcode('[basic-loop the_query="post_type=doctors&posts_per_page=2&cat=6" featured="1"]'); ?>
				</div>
				<hr class="bottom"/>
				<?php // echo do_shortcode('[basic-loop the_query="post_type=doctors&posts_per_page=-1&order=ASC&paged=$paged,&orderby=title&ignore_sticky_posts=1&post_not_in=$sticky"]'); ?>


				<?php // echo do_shortcode('[facetwp facet="alphabet_filter"]'); ?>
				<?php // echo do_shortcode('[facetwp sort="true"]'); ?>

				<div class="doctor-search"> 

					<script>
						(function($) {

						function handlefacetSubmit(excClick) {
									$(".facetwp-search").val($(".facetwp-autocomplete").val());
									$(".facetwp-autocomplete").val("");
									FWP.refresh();
									
								}


							$(document).on('facetwp-loaded', function() {
								
								$('.facetwp-facet-doctor_search_autocomplete').remove('.loading');
								$('.lrg-spin').fadeOut();
								$('.facetwp-template').show(".autocomplete-suggestions");	
								$(".facetwp-autocomplete").val($(".facetwp-search").val());
				



								$('input.facetwp-autocomplete').keypress(function (e) {

									console.log("updating ",$(".facetwp-search").val(),$(".facetwp-autocomplete").val())

									$(".facetwp-search").val($(".facetwp-autocomplete").val());
								
									if (e.which == 13) {
									// $(".facetwp-autocomplete").val("");
									// $(".facetwp-search").val($(".facetwp-autocomplete").val());
									// $('.btn-search').click();
									handlefacetSubmit(true);
 
								} 

							});

								$('.facetwp-facet-specialities > select.facetwp-dropdown > option:first-child').text('View All Specialties');
								$('.facetwp-facet-locations > select.facetwp-dropdown > option:first-child').text('View All Locations');

									//
									$('.facetwp-autocomplete-update').hide();
									$('.facetwp-autocomplete').attr("placeholder", "Search For Doctors");
									$('.facetwp-search').attr("type","hidden");
									if (1 > $('.btn-search').length) {
									$('.facetwp-type-autocomplete').after('<div class="medium primary btn searchsubmit"><button type="submit" class="btn-search"></button></div>');
									

									 $('.btn-search').on('click', function() { 
									 	console.log('submit');
										handlefacetSubmit(false);

									});

									}
								});
$(document).on('facetwp-refresh', function() {
	$('body > .autocomplete-suggestions').remove();	
	$('.facetwp-loading').remove();
	$('#doctor-search-results').prepend('<div class="lrg-spin">Loading</div>');
	$('.facetwp-template').fadeOut("fast");	

});
})(jQuery);
</script>


<?php// echo do_shortcode('[facetwp facet="find_docters"]');?>
<div class="filter-results block-inner">
	<div class="twelve columns auto-complete-wrapper">

		<?php echo do_shortcode('[facetwp facet="doctor_search_autocomplete"]');?>

			<?php echo do_shortcode('[facetwp facet="find_docters"]');?>

	</div>
	<div class="picker one six columns">
		<?php echo do_shortcode( '[facetwp facet="locations"]' ); ?>
	</div>
	<div class="picker two six columns">
		<?php echo do_shortcode( '[facetwp facet="specialities"]' ); ?>
	</div>
	<div style="margin-top:5px; margin-left:0;" class="twelve columns">
		<div class="medium primary btn submit"><button value="Reset" onclick="FWP.reset()"> Reset Search </button> </div>
		<hr class="list" />
	</div>
</div>

</div>

<?php // echo do_shortcode('[facetwp template="doctors"]'); ?> 
<section id="doctor-search-results">
	<div class="block-inner">
		<?php echo do_shortcode( '[facetwp template="doctor_search_listing"]' ); ?>
	</div>
</section>

<?php endwhile; ?>

</div>
</div>


<div class="four columns">
	<div id="sidebar">
		<?php get_template_part( 'partials/widget', 'featured' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
</div>
</div>	
<script>
	jQuery(function() {
		FWP.auto_refresh = true;
	});
</script>

<?php } else { ?>

<div id="page" class="row">
	<div class="eight columns grid-block">	
		<div id="content">
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="twelve columns">
						<div class="page-inner">
							<h4 id="page-title"><?php the_title(); ?></h4>
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<div class="four columns">
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php } //end page type conditionals ?>

<?php get_footer(); ?>