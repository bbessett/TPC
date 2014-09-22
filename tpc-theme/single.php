<?php get_header(); ?>


<div id="single" class="row">

	<div id="content" <?php post_class('home-post'); ?>>
		<div class="eight columns grid-block">	
			<div class="block-inner">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<h5 class="post-title"> <?php the_title();?></h5>	
					
					<?php if ( has_post_thumbnail()) : ?>
						<div class="post-image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>
					<?php the_content();?>
					<div class="meta-links">
						<ul class="seven columns">
							<?php if (get_field('pdf_uploads', $post->ID))  {
								$attachment_id = get_field('pdf_uploads');
								$url = $attachment_id['url']; ?>
								<li>
									<h6><a class='dl-icon' target='_blank' href='<?php echo $url; ?>'><span class="pdf-ico"></span>Download </a></h6>
								</li>
								<?php } ?>
								<?php if(get_field('article_link', $post->ID)) {  ?>
								<li>
									<h6><a class='dl-icon' target='_blank' href='<?php the_field('article_link', $post->ID); ?>'> Read Full Article</a></h6>
								</li>
								<?php } ?>
							</ul>
							
						</div>
					<?php endwhile; ?>
				</div>
			</div>

			<div id="sidebar" class="four columns ">
				<?php//  get_template_part( 'partials/widget', 'related' ); ?>
				<?php get_sidebar(); ?>
			</div> <!-- end sidebar -->





		</div>	

	</div>


	<?php get_footer(); ?>