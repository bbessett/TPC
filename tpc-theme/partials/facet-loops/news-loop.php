

<?php
$taxonomy = 'news-categories';

// get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
// separator between links
$separator = ', ';

if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

	$term_ids = implode( ',' , $post_terms );
	$terms = wp_list_categories( 'title_li=&style=none&echo=0&depth=2&taxonomy=' . $taxonomy . '&include=' . $term_ids );
	$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

	// display post categories
}
?>
  
<article  class="post-content">
<h6 class='list-heading twelve columns'><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h6>
<div class="post-meta"><?php echo $terms ?> &nbsp;|&nbsp; <?php echo get_the_date(); ?></div>
<?php if ( has_post_thumbnail()) : ?>
<div class="post-image">
   <a class="left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
  <?php echo get_the_post_thumbnail($post_id, 'thumbnail', array('class' => 'alignleft post-thumb')); ?>
   </a>
</div>
<?php endif; ?>
<div class="post-desc">
<?php the_excerpt();?>
<div class="meta-links">
<ul>
<?php if (get_field('pdf_uploads', $post->ID))  {
      $attachment_id = get_field('pdf_uploads');
      $url = $attachment_id['url']; ?>
<li><h6><a class='dl-icon' target='_blank' href='<?php echo $url; ?>'><span class="pdf-ico"></span> Download PDF</a></h6>
</li>
<?php } ?>
<?php if(get_field('article_link', $post->ID)) {  ?>
<li>
<h6><a class='dl-icon' target='_blank' href='<?php the_field('article_link', $post->ID); ?>'> Read Full Article</a>
</h6>
</li>
</ul>
</div>

<?php }?>
</div>
</article>  
<hr class="list"/>


