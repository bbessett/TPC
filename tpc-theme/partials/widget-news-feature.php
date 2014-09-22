<?php
/*
Partial Name: News Feature
*/
?> 

<?php $args = array('post_type' => 'post','posts_per_page' => 2,'post__in' => get_option('sticky_posts'),'ignore_sticky_posts' => 1,'orderby'  => 'title');
	$featured = get_posts($args); 
?>


<?php if( $featured ) :  ?>
	<div class="row">
	<div id="featured-news-content" class="twelve columns">
	<div class="block-inner">
	<?php if(is_page('whats-new')) { ?>
			<h6 class="list-heading grey-txt">Featured Stories</h6>
	<?php } else { ?> 
	<a href="<?php echo site_url();?>/whats-new"><h4 class="tab">Featured Stories</h4></a>
	<?php } ?>
	</div>
	<?php foreach( $featured as $post ) { setup_postdata($post); ?>
	<div class="feat-news-block">
	<div class="six columns tablet-view full-small">
			<?php if ( has_post_thumbnail()) : ?>
			<div class="post-image">
				<a class="left" href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php endif; ?>
  <article>
		<div class='post-content feature-post'>
			<div class="block-inner">
			<h6 class='list-heading'><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h6>
			<p><?php the_excerpt();?></p>
			</div>
			</div>
	</article>
	
		</div>
		</div>
		<?php } ?>
	<?php wp_reset_postdata(); ?>

	</div>
	</div>
<?php endif;?>