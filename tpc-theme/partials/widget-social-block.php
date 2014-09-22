
<div class="heading-tabs row">
	 	  	<div class="twelve columns">
	 	  	 
				   <h4 class="tab left">From Social</h4>
				     <div class="block-social right">
				   	<a target="_blank" title="Follow The Portland Clinic on Facebook" href="https://www.facebook.com/ThePortlandClinic"><i class="icon-facebook-circled"></i></a>
					<a target="_blank" title="Follow The Portland Clinic on Twitter" href="https://twitter.com/portlandclinic"><i class="icon-twitter-circled"></i></a>
					</div>
				
				</div>
			 <div class="follow">
			<h5 class="tab last quick-link"><a title="Follow The Portland Clinic on Twitter" href="#">Follow Us</a></h5>
			</div> 
		</div>
<?php $args = array('post_type' => 'post', 'showposts' => '-1','cat' => '21', 'orderby'  => 'title');
		$featured = get_posts($args); ?>
<?php foreach( $featured as $post ) {
	setup_postdata($post); ?>
	<div class='feature-post'>
		<?php if ( has_post_thumbnail()) : ?>
				<div class="widget-img">
					<a href="#" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</div>
			<?php endif; ?>
				</div> 
	<?php } wp_reset_postdata();?>
