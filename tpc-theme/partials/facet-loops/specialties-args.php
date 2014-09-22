<?php 

$ignorecats = get_terms('category', 'orderby=count&hide_empty=0&child_of=9');

foreach ( $ignorecats  as $ignorecat  ) :
if( 9 != $ignorecat->parent ) {	 
$term_IDs = $ignorecat->term_id;
}
endforeach; wp_reset_postdata();
return array(
'post_type' => 'specialties',
'posts_per_page' => -1,
'orderby' => 'title',
'order' => 'ASC',
'category__not_in' => $cat_ids
);


?>
