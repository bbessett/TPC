<div id="doctor-search" class="row"> 
<!-- 
			<form role="search" method="get" action="<?php // echo home_url( '/' ); ?>">
   	 			<ul>

   	 			<li class="field">
   	 			<input id="s" class="text input" name="s" type="text" placeholder="Practitioner Name" />
				</li>
   	 	<li class="prepend append field">
	  	<input class="xwide text input" type="text" placeholder="Text input" />
		<div class="medium primary btn"><a href="#">Go</a></div>
	  	</li> 

	  	</ul>
	  	
	  		<input type="hidden" name="post_type" value="doctors" />
	  		<div class="medium primary btn submit"><button class="search" type="submit" value="find your doctor now">Find your doctor now</button></div>
	  		</form>

	  		-->
<?php //  echo do_shortcode( '[mtsw]' ); ?>

<script>
 if (window.location.hash != '')  {
  window.location.hash = '';
 }		

var submitclicked = false;
function handlesubmit() {
submitclicked = true;
FWP.refresh();
}

(function($) {
	$(function() {
       FWP.auto_refresh = false;
        FWP.soft_refresh = false;
    });

$(document).on('facetwp-loaded', function() {
     	 $('.facetwp-facet-specialities > select.facetwp-dropdown > option:first-child').text('View All Specialties');
     	 $('.facetwp-facet-locations > select.facetwp-dropdown > option:first-child').text('View All Locations');
     	$('.facetwp-facet-locations > select.facetwp-dropdown, .facetwp-facet-specialities > select.facetwp-dropdown').on('change', function(){
	FWP.refresh();
	console.log('change');
	});
  });
$(document).on('facetwp-refresh', function() {
     if ('' == FWP_HTTP.uri && FWP.loaded) {
     		// var hash = window.location.hash;
           // window.location.hash = ''; 
		 if (submitclicked) {window.location = '/find-a-doctor-results/' + window.location.hash;
		} else { 
		FWP.set_hash();
			} 
     } 
});

})(jQuery);
</script>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="find-doctor-filters">
	<div class="picker twelve columns" style="margin-left:0; margin-top:10px;">
	<?php echo do_shortcode( '[facetwp facet="locations"]' ); ?>
	</div>

	<div class="picker twelve columns" style="margin-left:0; margin-top:10px;">
		<?php echo do_shortcode( '[facetwp facet="specialities"]' ); ?>
	</div>
	      <div class="medium primary btn submit"><button class="search" onclick="handlesubmit()"> Search </button> </div>
	</div>
 
                
                <div style="display:none">
                    <?php echo do_shortcode( '[facetwp template="doctor_simple"]' ); ?>
                </div>
        <?php endwhile; // end of the loop. ?>


<?php // echo do_shortcode('[facetwp facet=""]');?>

</div>
