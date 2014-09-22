<?php
/*
Template Name: Search Results
*/
?>
<?php get_header(); ?>

<div id="page" class="row">
	<div class="eight columns search-results" id="content">
		<div class="grid-block">
			<div class="search-content doctor-search-content">
				<h4 style="margin-bottom:10px">Find a Doctor</h4>
				<div class="filter-results row">

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

				<?php while ( have_posts() ) : the_post(); ?>
					<?php echo do_shortcode( '[facetwp template="doctor_search_listing"]' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div>
		</div>
	</div>


	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>

</div>
<script>
	(function($) {
		$(document).on('facetwp-loaded', function() {
			$('.facetwp-facet-specialities > select.facetwp-dropdown > option:first-child').text('View All Specialties');
			$('.facetwp-facet-locations > select.facetwp-dropdown > option:first-child').text('View All Locations');

		});
	})(jQuery);
</script>
<?php get_footer(); ?>
