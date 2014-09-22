<?php get_header();  /**
 * Template Name: Front-Page
 *
 * @package WordPress
 */
?>
<div class="page-wrap">
<section id="first-row" class="banner">
<div class="row">
<div id="banner" class="grid-block eight columns">
<div class="row">
 	<div class="heading-tabs right">
	<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations">See All</a></h5>
	</div>

   <section class="pill tabs">
   	<ul class="tab-nav">
   <?php while(has_sub_field( 'banner_content', 4)): ?>
	 <?php $ctr1++;?>
	<li class="nav-0<?php echo $ctr1 ?>"><span class="divider">&nbsp;|</span><a href="#"><?php the_sub_field ('banner_header')?> </a></li>

<?php endwhile ?>
</ul>

   <?php while(has_sub_field( 'banner_content', 4)): ?>
         <?php $ctr2++;?>
    <div class="tab-content tab-0<?php echo $ctr2 ?>">
            <?php // $image = wp_get_attachment_image_src(get_sub_field( 'banner_image'), 'medium'); ?>
            <?php $image_big = wp_get_attachment_image_src(get_sub_field('banner_image'), 'full'); ?>
   			<?php $attachment=get_post( get_sub_field('banner_image')); $alt=get_post_meta($attachment->ID, '_wp_attachment_image_alt', true); 
   		$image_title = $attachment->post_title; $caption = $attachment->post_excerpt; $description = $attachment->post_content;?>
	<div class="row">
	<div class="twelve columns">
        <div class="banner-content push-three columns">
     		<h3 class="main-heading-big"><?php the_sub_field ('banner_header')?></h3>
   		<h5 class="main-heading-small"><?php the_sub_field ('banner_sub_header')?></h5>
   		<p><?php the_sub_field ('banner_content')?></p>
   		</div>
			<div class="banner-image" rel="<?php echo $ctr ?>">
                <img width=100% alt="<?php echo $image_title ?>" src="<?php echo $image_big[0]; ?>" />
            </div>	
     </div> 
     </div>
         
</div>
        <?php endwhile ?>
        <?php wp_reset_postdata();?>
</section>
</div>
    </div>
  	<div class='four columns grid-block'>
  	<div class="heading-tabs">
  	<div class="seven columns">
	  	<h5 class="tab">Find a Location</h5>
	</div>
 	<div class="five columns">
	  	<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations">See All</a></h5>
	</div>

	</div>
  	<div class="block-content">
		<?php $args = array('post_type' => 'page','page_id' => '52');
		$posts = get_posts($args);
		foreach( $posts as $post) : setup_postdata($post);?>
		<?php the_post_thumbnail('large', array('class' => 'center')); ?>
	<?php $post_objects = get_field('locations_content'); ?>
		   <?php if( $post_objects ): ?> 
		 <div class="location-block"><ul>
		    <?php foreach( $post_objects as $post): ?>
    		<?php setup_postdata($post); ?>
  				<li>
  				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
  				<address><?php the_field('location_address'); ?></address>
  				</li>
   	 <?php endforeach; ?>
    	<?php wp_reset_postdata();?>
    		</ul></div>
	<?php endif; ?>

		<?php endforeach; ?>
		<?php wp_reset_postdata();?>


	
		</div>
	</div>


  </div> <!--End First Row -->
  </section><!--End First Row -->
 <section id="second-row">
 <div class="row">

   <div class='four columns grid-block'>
	<article id="ur-care">
   		<div class="heading-tabs">
			<div class="block-heading row">
		   		<h5 class="block-heading-title left">Urgent Care</h5>
		   		<a class="icon-tab uc-icon right"></a>
			</div>
  		</div>
  		<div class='block-inner'>
		<div class="block-content">


			<p class="ovr-content"> <?php the_field('uc_description'); ?></p>
			<?php while(has_sub_field( 'ucl_fp_home_content', 4)): ?>
				<div class="post-content">
				<h5 class="heading-small"><?php the_sub_field ('ucl_title')?></h5>
   				<p><?php the_sub_field ('ucl_description')?>
   				<span class="info">
   				<?php the_sub_field ('ucl_phone_link')?> | <?php the_sub_field ('ucl_direction_link')?>
				</span>
				</p>
				</div>
			<?php endwhile ?>
		</div>
	</div>
</article>
</div>

	

	<div id="doctors" class='four columns grid-block'>
		<div class="heading-tabs row">
		  	<div class="seven columns">
			   <h5 class="tab">Doctors</h5>
			</div>
		 	<div class="five columns">
			  	<h5 class="tab last right quick-link"><a>Specialties</a></h5>
			</div>
	</div>
		<div class="post-content">
		<div class="post-description">
		<h5 class="heading-small">We Offer 47 specialties of premium care</h5>
		<p>Enter 1 or more fields to find the doctor that’s right for you. Search any criteria.</p>
		</div>
   	 		 	<div id="doctor-search" class="row"> 
   	 			<form>
   	 			<ul>
   	 			<li class="field">
   	 			<input class="text input" type="text" placeholder="Practitioner Name" />
   	 		</li>
   	 	<!-- <li class="prepend append field">
	  	<input class="xwide text input" type="text" placeholder="Text input" />
		<div class="medium primary btn"><a href="#">Go</a></div>
	  	</li> -->

		<li class="field">
		Gender
		    <label class="radio checked" for="radio1">
	    	<input name="radio" id="male" value="male" type="radio">
	    	<span></span> Male 
	  		</label>
	  		    <label class="radio checked" for="radio2">
	    	<input name="radio" id="female" value="female" type="radio">
	    	<span></span> Female
	  		</label>
	  		 <label class="radio checked" for="radio3">
	    	<input name="radio" id="any" value="any" type="radio" checked="checked">
	    	<span></span> Any
	  		</label>
	  	</li>	
			<li class="field">
				  <div class="picker">
				    <select>
			<option value="All" selected="selected">Speciality</option>
			<option value="37">Anesthesiology &amp; Pain Management</option>
			<option value="36">Anticoagulation Clinic</option>
			<option value="1">Audiology</option>
	
				    </select>
				  </div>
			</li>
			<li class="field">
   	 			<input class="text input" type="text" placeholder="Your Condition" />
   	 		</li>


	  	</ul>
	  	<div class="medium primary btn submit"><a href="#">Find a doctor</a></div>
	  		</form>
   	 	</div>

   	 	</div>
	</div>
   	
  
   	<div class='four columns'>

	<div id="myChart" class="grid-block two-row">
	<div class="heading-tabs">
   	 	<div class="block-heading row">
		   		<h5 class="block-heading-title left">After Hours Care</h5>
		   		<a class="icon-tab cal-icon right"></a>
			</div>
	</div>
		<div class='block-inner'><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper eros mauris, et dignissim massa blandit congue. Integer suscipit justo odio, ac elementum elit vestibulum id.</p>
	</div>
	</div>
		<div id="myChart" class="grid-block two-row">
		<div class="heading-tabs">
			<div class="block-heading row">
			   		<h5 class="block-heading-title left">My Chart</h5>
			   		<a class="icon-tab fi-icon right"></a>
			</div>
		</div>	
		<div class='block-inner'>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper eros mauris, et dignissim massa blandit congue. Integer suscipit justo odio, ac elementum elit vestibulum id.
		</p>
	</div>
	</div>

	</div> 	<!-- END Grid-Block -->
</section><!-- END row two -->

<section id="third-row">
<div class="row short-block">

	<div id="newsletter" class="four columns grid-block">
	 
   	 	 <div class="heading-tabs row">
			<h5 class="tab">Get Our Free Quarterly eNewletter</h5>
		</div>
		<div class='block-inner'>
	 	<p>Health and wellness topics spcifically for design for Pacific Northwest living.</p>
		<div class="block-content">
			<ul>
				<li class="field">
				<input class="text input" type="text" placeholder="Subscribe" />
				</li>
				<div class="medium primary btn submit">
				<a href="#">SIGNUP NOW</a></div>
		</ul>
	</div>	
	</div>
</div><!-- end gridblock -->


	<div class="four columns grid-block"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="seven columns">
				   <h5 class="tab">Featured Doctor</h5>
				</div>
			 	<div class="five columns">
		  	<h5 class="tab last right quick-link"><a href="#">Appointments</a></h5>
				</div>
		</div>
		<div class="block-content">
				<?php $args= array('post_type' => 'doctors', 'cat' => '6','posts_per_page'=>'1' );
				$posts = get_posts($args);
				foreach( $posts as $post) : setup_postdata($post);?>
	
				<div class="block-img">
				<?php the_post_thumbnail('full', array('class' => 'center')); ?>
				</div>
				<?php $title = get_the_title(); ?> 	
				<?php $link = get_permalink(); ?>
				<?php $relationships = get_field('doctor_associations'); ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata();?>
		<div class='block-inner'>
		<div class="meta">
		<p class="small"><a href="<?php echo $link ?>"><?php echo $title ?></a></p>
			<?php if( $relationships ): ?>
						<?php foreach( $relationships as $post ): ?>
								<?php setup_postdata($post); ?>
								<p><?php echo get_the_title( $post->ID ); ?>
									<!-- <?php the_field("location_address")?> --></p>
								
			<?php endforeach; ?>
			 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		</div> <!-- meta -->
		</div> <!-- end block-inner -->
	</div><!-- end block-content -->	

			</div> <!-- end block -->


	<div class="four columns grid-block"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="seven columns">
				   <h5 class="tab">From Social</h5>
				</div>
			 	<div class="five columns">
		  	<h5 class="tab last right"><a href="#">Follow Us</a></h5>
				</div>
		</div>
			<div class="block-content">
				<?php $socialshare = new WP_Query(array('posts_per_page'=>1, 'category_name'=>'social-share-feed')); if ($socialshare->have_posts()) : ?>
				<div id="social-news">
				<?php while ($socialshare->have_posts()) : $socialshare->the_post(); ?>
					
			<?php if ( has_post_thumbnail() ) { ?><div class="block-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div><?php } ?>
						
					
				<?php endwhile; ?>
			
			</div>
		<?php endif; ?>
		</div>
			</div>
	
	</div>


	</div><!-- end third row -->


</section>

</div> <!--end page wrap -->

<!--
	<div class="four columns">
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
-->
   	   <script>  
jQuery(document).ready(function($){
   	   $("li.nav-01").addClass('active'); 
   	   $(".tab-01").addClass('active');
});
   	   </script>
<?php get_footer(); ?>

