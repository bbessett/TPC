<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 */

get_header(); ?>



<div id="page" class="row">
<div class="eight columns search-results" id="content">
<div class="grid-block">
<div class="search-content">
 

<?php if ( have_posts() ) :  // results found?>
 <?php //  var_dump($wp_query->query); ?>

<h4>Search Results: &quot;<?php echo get_search_query(); ?>&quot;</h4>
		<br>
	<?php while ( have_posts() ) : the_post(); $attachment_id = get_field('pdf_uploads'); $url = $attachment_id['url']; ?>
		<article>
	<?php if (get_field('pdf_uploads', $post->ID))  { ?><p class="gry-heading"><?php the_title(); ?> </p>
	<?php } else { ?> <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		<?php the_excerpt(); ?>

		<?php } ?>
		<?php if (get_field('pdf_uploads', $post->ID)) { ?>
		<ul>
		<?php if (get_field('pdf_uploads', $post->ID))  { ?>
			<li class="list-heading">
			<a class='dl-icon' target='_blank' href='<?php echo $url; ?>'><span class="pdf-ico"></span>Download</a>
			</li>
			<?php } ?>
			<?php if(get_field('article_link', $post->ID)) {  ?>
			<li>
			<a class='dl-icon' target='_blank' href='<?php the_field('article_link', $post->ID); ?>'>Read Full Article</a>
			</li>
			<?php } ?>
		</ul>
		<?php } ?>	
		<hr class="zero-sides"/>
		</article>
	<?php endwhile; ?>

<?php else :  ?>
<div class="row">
<div class="eight columns search-results" id="content">
<h4 class="twelve columns list-heading blk-heading">Sorry No Results</h4>
	<hr/>

</div>
</div>
<?php endif; ?>

</div>
</div>
</div>

<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
</div>

</div>
<?php get_footer(); ?>
