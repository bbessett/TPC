<?php
/*
Template Name: Whats New
*/
?>
	
<?php get_header(); ?>
<div id="news" class="row">	
<div class="eight columns">
<section id="news-content-list" class="row">
<div class="grid-block">
<h4 class="block-title"><?php the_title();?> </h4>
<hr/>
	<?php get_template_part( 'partials/widget-news', 'feature' ); ?>
<hr/>	
<div id="top-sort-filters" class="row" style="margin-top:10px;">
	<div class="picker five columns" style="margin-left:0;">
		<?php echo do_shortcode('[facetwp facet="news_categories"]'); ?>
</div>
	<div class="picker five columns" style="margin-left:10px;">
		<?php  echo do_shortcode('[facetwp sort="true"]'); ?> 	
	</div>
</div>

<div class="block-inner">
<?php  echo do_shortcode('[facetwp template="news_content"]'); ?> 
<?php  echo do_shortcode('[facetwp pager="true"]'); ?> 
</div>
</section>

</div>
<div id="sidebar" class="four columns">
	<?php get_sidebar(); ?>
	</div>

</div>

<script src="//cdn.jsdelivr.net/jquery.waypoints/2.0.4/waypoints.js"></script>
<script src="//cdn.jsdelivr.net/jquery.waypoints/2.0.4/waypoints.min.js"></script>



<script>
	var is_pager = false;
	var template_html;

	function loadMore() {
	    is_pager = true;
	    template_html = jQuery('.facetwp-template').html();
	    var next_page = parseInt(jQuery('.pager').attr('data-page'));
	    jQuery('.pager').attr('data-page', next_page + 1);
	    FWP.paged = (next_page + 1);
	    FWP.refresh();
	}

	(function($) {
	    $(document).on('facetwp-loaded', function() {
	        if ( is_pager ) {
	            var new_html = $('.facetwp-template').html();
	            $('.facetwp-template').html(template_html + new_html);
	            is_pager = false;
	            $.waypoints('enable');
	        }
	        else {
	            $('.pager').attr('data-page', 1);
	        }
$(document).on('facetwp-refresh', function() {
    $.waypoints('disable');
});	
	        $('.facetwp-pager').waypoint(function(direction) {
	        	loadMore();
	        });
	    });
	})(jQuery);

	</script>

<?php get_footer(); ?>