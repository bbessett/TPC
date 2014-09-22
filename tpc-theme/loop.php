<?php
/**
 * The loop that displays posts.
 *
 * @package WordPress
 */
?>

<div id="news-feed">

<?php if ( ! have_posts() ) : ?>
	<div class="twelve columns">
		<h5 class="list-heading"><?php _e( 'Not Found', 'twentyten' ); ?></h5>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
		<?php get_search_form(); ?>
	</div>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="post">
	<div class="article">
<?php $parentscategory ="";
foreach((get_the_category()) as $category) {
if ($category->category_parent != 0) {
$parentscategory .=  $category->name . ', '; } } ?>
		<?php if ( has_post_thumbnail() ) { ?>
	<div class="thumb-wrapper three columns mobile-hide"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
	<?php } else { ?>
<div class="thumb-wrapper three columns mobile-hide no-image"><a href="<?php the_permalink(); ?>"><img src="http://tpc.dev.rweststaging.com/wp-content/uploads/2014/05/placeholder.gif"></a></div> 
<?php } ?>
	<h6 class="article-title list-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				<div class="postinfo"><?php // echo get_the_date(); ?><?php echo substr($parentscategory,0,-2); ?> </div>
				<?php the_excerpt(); ?>
				<div class="clear"></div>
				<div class="meta-links">
	<?php if (get_field('pdf_uploads', $post->ID)) { ?>
		<ul class="seven columns">
		<?php if (get_field('pdf_uploads', $post->ID))  {
		      $attachment_id = get_field('pdf_uploads');
		      $url = $attachment_id['url']; ?>
				<h6><a class='dl-icon' target='_blank' href='<?php echo $url; ?>'><span class="pdf-ico"></span>Download </a></h6>
	<?php } ?>
			<?php if(get_field('article_link', $post->ID)) {  ?>
			<li>
				<h6><a class='dl-icon' target='_blank' href='<?php the_field('article_link', $post->ID); ?>'> Read Full Article</a></h6>
			</li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>

</div>
	
	</div>
	<hr class="list"/>
<?php endwhile; ?>
<div id="navigation">
<div class="twelve columns">
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<div class="six columms"><?php next_posts_link( __( '&larr; Older posts', 'twentyten' ) ); ?></div>
			<div class="six columns"><?php previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) ); ?></div>

<?php endif; ?>
</div>
</div>


</div>
