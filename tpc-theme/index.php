<?php get_header(); ?>


<div id="blog" class="row">
	<div class="eight columns">	
	<div class="grid-block">
		<div id="content">
		<div class="page-inner">
			<?php if ( have_posts() ) : ?>
				<div class="row">

				<h4>All Posts</h4>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="twelve columns">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php the_excerpt(); ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php else : ?>
					<h4>No post found..</h4>

					<?php get_search_form(); ?>
				
					<input class="medium primary btn submit" type="button" value="< Back to Previous Page" onclick="history.back(-1)" />

			<?php endif; ?>
			</div>
		</div>
		</div>
	</div>

	<div class="four columns">
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>