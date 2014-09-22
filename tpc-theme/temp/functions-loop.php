function two_column_query_shortcode($atts) {
// EXAMPLE USAGE:
// [basic-loop the_query="showposts=100&post_type=page&post_parent=453"]
// Defaults


   extract(shortcode_atts(array(
      "the_query" => '',
      "title" =>'',
      "featured" =>'',
   ), $atts));

   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);   
   $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
   $sticky = get_option( 'sticky_posts' );
   query_posts($the_query);
   $output = '';
   $the_title = ''; 
   $the_link = '';
   $link_title = ''; 
   $pagination = '';
   $the_thumb = '';

// todo filter Nav
   	if($featured) { 
   	$output .="<section id='two-col-sec' class='featured-content'>"; 
   	} else {
   	$output .= "<section id='two-col-sec' class='post-list'>"; 
   }
	 //custom table title 
	// the loop
   	$temp = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query($the_query); 
	while ($wp_query->have_posts() ) : $wp_query->the_post();
	  //  var_dump($loop);
	  $the_title = get_the_title($post->ID);	
	  $the_excerpt = get_the_excerpt($post->ID);
      $the_link = get_permalink($post->ID);
     if ( has_post_thumbnail() ) {
      $the_thumb = get_the_post_thumbnail($post->ID, array(300 , 300) );
       } else {
       $the_thumb = "" ;
      }
	 // $relationship = get_field($relationship_field); 
	 //file upload field attachment 
     // $attachment_id = get_field('pdf_uploads');
   	 // $url = $attachment_id['url'];  
   	// $link_title = $attachment_id['title'];
   
	$output .="<article class='two-col'>"; 
	
	if($featured) {	
	$output .= "<div class='post-content'>
	<a href='$the_link'><div class='feat-post-img'>$the_thumb</div></a>
	<h6 class='list-heading'><a href='$the_link'>$the_title</a></h6>
	<p>$the_excerpt</p></div>";
	} else {
	$output .= "<div id='primary' class='post-content'><h6 class='list-heading'><a href='$the_link'>$the_title</a></h6>";	
	$output .= "<p>$the_excerpt</p></div>";
	}
	// output all findings - CUSTOMIZE TO YOUR LIKING
	wp_reset_postdata();
	$output .="</article>";
	endwhile;
//	$output .= "<div class='alert twelve columns'>nothing found.</div>";
    wp_reset_query(); wp_reset_postdata();

   return $output;
}
add_shortcode("basic-loop", "two_column_query_shortcode")