<?php get_header();  /**
 * Template Name: Front-Page
 *
 * @package WordPress
 */
?>



<div class="page-wrap">
<section id="first-row" class="banner">
<div class="row">
<div id="banner" class="grid-block eight columns tablet-view">
 	<div class="heading-tabs right">
	<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/about">About Us</a></h5>
	</div>

   <section class="pill tabs">
   	<ul class="tab-nav">
	   	<?php while(has_sub_field( 'banner_content', 4)): ?>
		 <?php $ctr1++;?>
			<li class="nav-0<?php echo $ctr1 ?>">
			<span class="divider">&nbsp;|</span><a href="#"><?php the_sub_field ('banner_header')?> </a>
			</li>
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
	<div class="twelve columns banner-slides">
        <div class="banner-content white-gradient push-three columns">
        <ul class="indicate">
        <li class="ind-01"></li><li class="ind-02"></li><li class="ind-03"></li> 
		</ul>
     	<h4 class="main-heading-big"><?php the_sub_field ('announcement_topic')?></h4>
   		<h6 class="list-heading"><?php the_sub_field ('banner_sub_header')?></h6>
   		<p><?php the_sub_field ('banner_content')?></p>
  		<?php if(get_sub_field('b_link_title')) { ?>'
  		  <div class="white large primary btn">
  	<a class="list-heading" href="<?php the_sub_field('banner_content_link'); ?>"><?php the_sub_field('b_link_title'); ?></a>
  		</div>
<?php } else { ?>
   		<div class="white large primary btn">
 		<a class="list-heading" href="<?php site_url();?>/doctor/">Find your doctor now </a> 
  		</div>
   	<?php } ?>
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
  	<div id="locations" class='four columns grid-block hide-phone tablet-hide'>
  	<div class="heading-tabs">
  	<div class="eight columns">
	  	<h4 class="tab">Find a Location</h4>
	</div>
 	<div class="four columns">
	  	<h5 class="tab last right quick-link"><a href="<?php echo site_url();?>/locations">See All</a></h5>
	</div>
	</div>
  	<div class="block-content">
	<?php $args = array('post_type' => 'page','page_id' => '52');
		$posts = get_posts($args);
		foreach( $posts as $post) : setup_postdata($post);?>
		<?php the_post_thumbnail('full', array('class' => 'center')); ?>
		<?php $post_objects = get_field('locations_content'); ?>
		<!-- get locations -->
		<?php endforeach; ?>
		<?php wp_reset_postdata();?>
		</div>
		</div>
	</div> <!--End First Row -->
  </section><!--End First Row -->
 <section id="second-row">
 <div class="row">
	<div id="ur-care" class='four columns hide-phone tablet-hide'>
	<div class="grid-block">
	<div class="heading-tabs">
			<div class="block-heading row">
		   		<h4 class="block-heading-title left">Urgent Care</h4>
		   		<a alt="After Normal Business Hours/Urgent Care" href="<?php echo site_url();?>/specialties/after-normal-business-hoursurgent-care/" class="icon-tab uc-icon right"></a>
			</div>
  		</div>
  		<div class='block-inner'>
  			<p class="ovr-content"> <?php the_field('uc_description'); ?></p>
		<div class="block-content">

			<?php while(has_sub_field( 'ucl_fp_home_content', 4)): ?>
				<div class="post-content">
				<h5 class="heading-small list-heading"><?php the_sub_field ('ucl_title')?></h5>
   				<p>
   				<?php the_sub_field ('ucl_description')?>
   				<span class="info">
   		<a class="tel" href="tel:<?php the_sub_field ('ucl_phone_link')?>"><?php the_sub_field ('ucl_phone_link')?></a> | 
			<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php the_sub_field ('ucl_lat')?>,<?php the_sub_field ('ucl_lng')?>">Directions</a></span>
   				<a href="#"><?php the_sub_field ('ucl_direction_link')?></a>
			  </p>
				</div>
			<?php endwhile ?>
		</div>
	</div>
</div>
</div>
<div id="doctors" class='four columns grid-block tablet-view'>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="heading-tabs row ">
		  	<div class="seven columns">
			   <h4 class="tab">Find a Doctor</h4>
			</div>
		 	<div class="five columns">
			  	<h5 class="tab last right quick-link"><a alt="find doctors" href="<?php echo site_url();?>/doctor">All Doctors</a></h5>
			</div>
	</div>
	
	
		<h6 class="list-heading sm">We Offer 47 specialties of premium care</h6>
		<div class="block-inner">
		<div class="post-description">
		<p>Enter one or more fields to find the doctor that’s right for you. Search any criteria.</p>
		</div>
			 <?php endwhile; ?>
 	<?php get_template_part( 'partials/doctor', 'search' ); ?>

   	 	</div>
   
</div> <!--end doctors -->

<!--Begin Homepage Location List -->
  <?php get_template_part( 'partials/home-location', 'list' ); ?>
<!--End Location List -->	
	<div id="newsletter" class="four columns grid-block small-block tablet-hide">
	 <div class="heading-tabs row">
			<h4 class="tab">Quarterly eNewletter</h4>
		</div>
		<div class='block-inner'>
	 	<p>Health and wellness topics spcifically for design for Pacific Northwest living.</p>

		<div class="block-content">
<!-- <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<form action="//theportlandclinic.us2.list-manage.com/subscribe/post?u=287777de6aef95669152b8f18&amp;id=63241277d8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<ul>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="FREE! SIGNUP NOW!" required>
 

    <div style="position: absolute; left: -5000px;"><input type="text" name="b_287777de6aef95669152b8f18_63241277d8" tabindex="-1" value=""></div>
    <div class="clear">
	     <div class="medium primary btn submit">
	    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
	    </div>
    </div>
    </ul>
</form>
			<ul>
				<li class="field">
		<input class="text input" type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="FREE! SIGNUP NOW!" required>
				</li>
				<div class="medium primary btn submit">
			
   <input type="submit" value="FREE! SIGNUP NOW" name="subscribe" id="mc-embedded-subscribe" class="button">
				</div>
		</ul>
-->
<form action="//r-west.us2.list-manage.com/subscribe/post?u=287777de6aef95669152b8f18&amp;id=5f2facc6ec" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<ul>
				<li class="field">
		<input style="text-transform: initial;" class="text input" type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter Your Email Address Here" required>
				</li>
				<div style="margin-bottom:0; " class="medium primary btn submit">
			<input style="margin-bottom:0;" type="submit" value="FREE! SIGNUP NOW" name="subscribe" id="mc-embedded-subscribe" class="button">
				</div>
		</ul>
</form>
	</div>	
	</div>
</div><!-- end gridblock -->
</div> <!-- end row -->
</section><!-- END Section Two -->

<section id="third-row">

   <div class="row short-block">
	<div class='four columns tablet-view'>
		<div id="afterHours" class="grid-block two-row ">
	<div class="heading-tabs">
   	 	<div class="block-heading row">
		   		<h4 class="block-heading-title left">After Hours Care</h4>
		   		<a alt="After Normal Business Hours/Urgent Care" href="<?php echo site_url();?>/specialties/after-normal-business-hoursurgent-care/" class="icon-tab cal-icon right"></a>
			</div>
	</div>
		<div class='block-inner'><p>When you need immediate care after normal business hours, call <a class="tel" href="tel:(503) 221-0161">(503) 221-0161</a>. A Portland Clinic physician may be reached 24 hours a day. You will receive a return phone call from the physician on-call within at least one hour of your message.</p><p>In case of a medical emergency call 911.</p>
	</div>
	</div>
		<div id="myChart" class="grid-block two-row hide-phone tablet-hide">
		<div class="heading-tabs">
			<div class="block-heading row">
			   		<h4 class="block-heading-title left">My Chart</h4>
			   		<a href="https://mychart.tpcllp.com/MyChart/" target="_blank" class="icon-tab fi-icon right"></a>
			</div>
		</div>	
	<div class='block-inner'>
	<p>MyChart is a convenient, secure way to pay your Portland Clinic bill by credit card.</p>
	<P>View your current outstanding balance.Pay bills through a secure payment portal using Visa, MasterCard, American Express or Discover. Print your online payment receipt or have it emailed to you.</P>
	</div>
	</div>

	</div> 	<!-- END Grid-Block -->

   	<div id="location-list-2" class="four columns grid-block small-block just-visible-tablet tablet-view loc-block location-list">
     	<div class="block-content">
  	<?php $args = array('post_type' => 'page','page_id' => '52');
		$posts = get_posts($args);
		foreach( $posts as $post) : setup_postdata($post);?>
		<?php $post_objects = get_field('locations_content'); ?>
		<?php if( $post_objects ): ?>  
		<!-- get locations -->
		 <div class="location-block block-inner">
		 <ul>
 		<?php foreach( $post_objects as $post): ?>
    		<?php setup_postdata($post); ?>

  				<li>
  				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
  				<address><?php the_field('location_address'); ?></address>
  				<?php if( have_rows('locations') ): ?>
  			
 				<?php  while ( have_rows('locations') ) : the_row(); ?>
 								<?php $location = get_sub_field('location'); ?>
  						<?php // print_r($location);?>  
  	<span class="info">	<a class="tel" href="tel:<?php the_sub_field('location_phone_number');?>"><?php the_sub_field('location_phone_number');?></a>  &#124; 
			<a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">Directions</a></span>
  				<?php endwhile; ?>
  				<?php endif ?>
  				</li>
   	 <?php endforeach; ?>
    	<?php wp_reset_postdata();?>
    		</ul></div>
	<?php endif; ?>

		<?php endforeach; ?>
		<?php wp_reset_postdata();?>
		</div>
	</div>	

	<div id="feature-block" class="four columns grid-block tablet-hide"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="block-left">
				   <h4 class="tab">Featured Doctor</h4>
				</div>
			 	<div class="block-right">
		  	<h5 class="tab last right quick-link"><a href="<?php echo site_url(); ?>/doctor/">See All</a></h5>
				</div>
		</div>
		<div class="block-content">
				<?php $args= array('post_type' => 'doctors', 'cat' => '6','posts_per_page'=>'1' );
				$posts = get_posts($args);
				foreach( $posts as $post) : setup_postdata($post);?>
			<div class="block-img">
			<a href="<?php the_permalink(); ?>"?><?php the_post_thumbnail('full', array('class' => 'center')); ?></a>
				</div>
				<?php $title = get_the_title(); ?> 	
				<?php $link = get_permalink(); ?>
				<?php $relationships = get_field('doctor_associations'); ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata();?>
		<div class='block-inner'>
			<div class="meta">
				<p class="small s-title"><a href="<?php echo $link ?>"><?php echo $title ?></a></p>
			<?php if( $relationships ): ?>
						<?php foreach( $relationships as $post ): ?>
							 <?php $ctr1++;?>
								<?php setup_postdata($post); ?>

								<span id="r-item-0<?php echo $ctr1 ?>"><?php echo get_the_title( $post->ID ); ?></span>
									<?php // the_field("location_address")?>
								
			<?php endforeach; ?>
			 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		</div> <!-- meta -->
		</div> <!-- end block-inner -->
	</div><!-- end block-content -->	

			</div> <!-- end block -->


	<div id="social" class="four columns grid-block tablet-hide"> 
	 	  	<div class="heading-tabs row">
	 	  	<div class="block-left">
	 	  	   <div class="block-social right">
	   	<a target="_blank" title="Follow The Portland Clinic on Facebook" href="https://www.facebook.com/ThePortlandClinic"><i class="icon-facebook-circled"></i></a>
					<a target="_blank" title="Follow The Portland Clinic on Twitter" href="https://twitter.com/portlandclinic"><i class="icon-twitter-circled"></i></a>
					</div>
				   <h4 class="tab">From Social</h4>
				
				</div>
			 	<div class="block-right">
			<h5 class="tab last right quick-link"><a href="#">Follow Us</a></h5>
				</div> 
		</div>
			<div class="block-content">
				<?php $socialshare = new WP_Query(array('posts_per_page'=>1, 'category_name'=>'social-share-feed')); if ($socialshare->have_posts()) : ?>
				<div id="social-news">
				<?php while ($socialshare->have_posts()) : $socialshare->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?><div class="block-img"><a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?></a></div><?php } ?>
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
   	   $('#r-item-04').append( document.createTextNode( " &" ));
   	   $(".mtsw-select-wrapper").addClass('picker'); 
   	   $( ".mtsw-select-wrapper > label" ).remove();
   	   $('select#mtsw-form-children-term-ids-8 > option:first-child').text('Choose a Location');
   	   $('select#mtsw-form-children-term-ids-9 > option:first-child').text('Choose a Specialty');
});

   	   </script>
<?php get_footer(); ?>

