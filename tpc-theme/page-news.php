<?php
/*
Template Name: News
*/
?>
	
<?php get_header(); ?>

<?php $args = array('post_type' => 'post','news-categories' => 'featured-story','orderby'  => 'title');
		$featured = get_posts($args); ?>



<div id="news" class="row">	
<div class="nine columns">
<?php if( $featured ) :  ?>
	<section id="featured-content">
		<div class="grid-block">
	<div class="inner-block">
<?php foreach( $featured as $post ) {
	setup_postdata($post); ?>
	<article class='twelve columns'>
		<div class='post-content feature-post'>
		<div class="block-inner">
		<?php if ( has_post_thumbnail()) : ?>
				<div class="post-image">
		<a class="left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				   <?php the_post_thumbnail(); ?>
				   </a>
				</div>
			<?php endif; ?>
			<h6 class='list-heading'><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h6>
			<p><?php the_excerpt();?></p>
			</div>
			</div>
			</article>
		<?php } ?>
	<?php wp_reset_postdata(); ?>
	</div></div>
	</section>
	<hr class="flat"/>
<?php endif;?>
<section id="news-content-list" class="row">
<div class="grid-block">
<div id="top-sort-filters" class="sort row" style="margin-top:10px;">
<div class="picker five columns" style="margin-left:0;">
	<?php echo do_shortcode('[facetwp facet="news_categories"]'); ?>
</div>
<div class="sort">
<div class="picker five columns" style="margin-left:10px;">
	<?php  echo do_shortcode('[facetwp sort="true"]'); ?> 	
</div>

</div>
</div>
<div class="block-inner">
<?php  echo do_shortcode('[facetwp template="news_content"]'); ?> 
<?php  echo do_shortcode('[facetwp pager="true"]'); ?> 

</div>
</section>

</div>
<div id="sidebar" class="three columns">
<div class="row">
<div class='twelve columns'>
<div class="widget grid-block">
<div class="heading-tabs row">
	 	  	<div class="twelve columns">
	 	  	 
				   <h4 class="tab left">From Social</h4>
				     <div class="block-social right">
				   	<i class="icon-facebook-circled"></i>
					<i class="icon-twitter-circled"></i>
					</div>
				
				</div>
			 <div class="follow">
			<h5 class="tab last quick-link"><a href="#">Follow Us</a></h5>
			</div> 
		</div>
<?php $args = array('post_type' => 'post', 'showposts' => '-1','cat' => '21', 'orderby'  => 'title');
		$featured = get_posts($args); ?>
<?php foreach( $featured as $post ) {
	setup_postdata($post); ?>
	<div class='post-content feature-post'>
		<?php if ( has_post_thumbnail()) : ?>
				<div class="post-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</div>
			<?php endif; ?>
				</div>
	<?php }   wp_reset_postdata();?>
		</div>
	</div>
</div>
	
<div class="row">
<div class='twelve columns'>
<div class="widget grid-block">
<div class="heading-tabs row">
	 	  	<div class="twelve columns">
	 	  	 <h4 class="tab left">Newletter Archive</h4>
			</div>
</div>
		<?php $args = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'DESC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 204,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( '' ),
	'show_option_none'   => __( ''),
	'taxonomy'           => 'news-categories',
	'walker'             => null
); ?>

	<div class='post-content feature-post'>
	<ul id="newsletter-menu" class="menu">
 		<?php wp_list_categories( $args ); ?> 
	</ul>
	</div>
		</div>
	</div>
</div>	
	
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