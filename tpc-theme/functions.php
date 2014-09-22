<?php


function mv_browser_body_class($classes) {
                global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
                if($is_lynx) $classes[] = 'lynx';
                elseif($is_gecko) $classes[] = 'gecko';
                elseif($is_opera) $classes[] = 'opera';
                elseif($is_NS4) $classes[] = 'ns4';
                elseif($is_safari) $classes[] = 'safari';
                elseif($is_chrome) $classes[] = 'chrome';
                elseif($is_IE) {
                        $classes[] = 'ie';
                        if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                        $classes[] = 'ie'.$browser_version[1];
                } else $classes[] = 'unknown';
                if($is_iphone) $classes[] = 'iphone';
                if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                         $classes[] = 'osx';
                   } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                         $classes[] = 'linux';
                   } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                         $classes[] = 'windows';
                   }
                return $classes;
        }
        add_filter('body_class','mv_browser_body_class');


	//Set the content width based on the theme's design and stylesheet.
	 if ( ! isset( $content_width ) )
		$content_width = 600; /* pixels */


	if ( ! function_exists( 'gp_theme_setup' ) ) :
	function gp_theme_setup() {

		//Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		//Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		//Register A WordPress Nav Menu
		register_nav_menus( array(
			'primary' => ( 'Primary Menu' ),
		) );
		register_nav_menus( array(
			'tablet-menu' => ( 'Tablet Menu' ),
		) );
			//Register A WordPress Nav Menu
		register_nav_menus( array(
			'footer-menu' => ( 'Footer Menu' ),
		) );

	}
	endif;
	add_action( 'after_setup_theme', 'gp_theme_setup' );



	//Register A Sidebar Widget
	function gp_widgets_init() {
	    register_sidebar( array(
	        'name' => ( 'Right Sidebar' ),
	        'description'   => 'The Right sidebar',
	        'class'         => '',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4> ',
	        'after_title' => ' </h4>',
	    ));

	 register_sidebar(array(
		'name'=> 'Top Sidebar',
		'id' => 'top_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	     
	}
	add_action( 'widgets_init', 'gp_widgets_init' );

//Enqueue all the required stylesheet and javascript files
function gp_load_style_scripts() {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	    wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr-2.6.2.min.js','1.0', 'all');
		wp_register_script('gumby', get_template_directory_uri().'/js/gumby.min.js','1.0', 'all', true);
		wp_register_script('maps', get_template_directory_uri().'/js/maps.js','1.0', 'all', true);
	    wp_enqueue_script(  'modernizr');
	    wp_enqueue_script( 'jquery' );
	    wp_enqueue_script( 'gumby' );
	    wp_enqueue_script( 'maps' );

		wp_register_style('gumby', get_template_directory_uri().'/css/gumby.css','1.0', 'all');
		wp_register_style('gumby', get_template_directory_uri().'/css/font-awesome.min.css','2.0', 'all');

	    wp_enqueue_style( 'gumby' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );

	}
	add_action( 'wp_enqueue_scripts', 'gp_load_style_scripts' );

	//Walker Class - This add support for the dropdown menu in the Gumbyframework
	class Walker_Page_Custom extends Walker_Nav_menu{

		function start_lvl(&$output, $depth=0, $args=array()){
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
		}

		function end_lvl(&$output , $depth=0, $args=array()){
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul></div>\n";
		}
	}


function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


function gumby_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'gumby_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Gumby Press 1.0
 * @return string "Continue Reading" link
 */
function gumby_continue_reading_link() {
	return '<a class="read-more list-heading" href="'. get_permalink() . '">' . __( '<span class="meta-nav"> Read More ></span>', 'gumby' ) . '</a>';
} 

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since GumbyPress 1.0
 * @return string An ellipsis
 */
function gumby_auto_excerpt_more( $more ) {
	return ' &hellip;' . gumby_continue_reading_link();
}
add_filter( 'excerpt_more', 'gumby_auto_excerpt_more' );
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since GumbyPress 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function gumby_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= gumby_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'gumby_custom_excerpt_more' );


add_post_type_support( 'page', 'excerpt' );

add_filter('widget_text', 'do_shortcode');
	// custom stuffs here 




	// Register Custom Post Type
function doctors_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Doctors', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Doctor', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Doctors', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Doctors', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'doctor',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);

	$args = array(
		'label'               => __( 'doctors', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail','excerpt' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		// 'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'doctors', $args );
//	register_taxonomy(doctors_categories, array('doctors'), array("hierarchical" => true, "label" => 'Doctors Categories', "singular_label" => 'Doctors Category', "rewrite" => true)); 
}

// Hook into the 'init' action
add_action( 'init', 'doctors_custom_post_type', 1 );



// Register Custom Post Type
function locations_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Locations', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Locations', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Location', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'locations', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'rewrite' => array('slug' => 'location'),
		// 'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'locations', $args );

// register_taxonomy(locations_categories, array('locations'), array("hierarchical" => true, "label" => 'Locations Categories', "singular_label" => 'Locations Category', "rewrite" => true)); 
}

// Hook into the 'init' action
add_action( 'init', 'locations_custom_post_type', 0 );

// Register Custom Post Type
function specialties_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Specialties', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Specialty', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Specialties', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'specialties', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','thumbnail','excerpt' ),
		'taxonomies'          => array( 'category', 'post_tag'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		//'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'specialties', $args );

// register_taxonomy(specialties_categories, array('specialties'), array("hierarchical" => true, "label" => 'Specialties Categories', "singular_label" => 'Specialties Category', "rewrite" => true)); 
}
// Hook into the 'init' action
add_action( 'init', 'specialties_custom_post_type', 0 );


// Register Custom Post Type
function resources_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Resources', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Resources', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New ', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'resources',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'resources', 'text_domain' ),
		'description'         => __( 'Resource Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor','excerpt'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true, 
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
//		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'resources', $args );

}

// Hook into the 'init' action
add_action( 'init', 'resources_custom_post_type', 0 );


// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'News Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'News Categorie', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'News Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$rewrite = array(
		'slug'   					=> 'whats-new',
		'with_front'                 => true,
		'hierarchical'               => true,
	); 
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'news-categories', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 1 );
 
/*Filtro per modificare il permalink*/
add_filter('post_link', 'brand_permalink', 1, 3);
add_filter('post_type_link', 'brand_permalink', 1, 3);

function brand_permalink($permalink, $post_id, $leavename) {
	//con %brand% catturo il rewrite del Custom Post Type
    if (strpos($permalink, '%news-categories%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'news-categories');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        	$taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = '';

    return str_replace('%news-categories%', $taxonomy_slug, $permalink);
}

function acervo_permalink($permalink, $post_id, $leavename){
    if (get_option('permalink_structure') != ''){
        $post = get_post($post_id);
        $rewritecode = array(
            '%news-categories%'
        );
        if (strpos($permalink, '%news-categories%') !== FALSE){   
            $terms = wp_get_object_terms($post->ID, 'news-categories');  
            if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $acervo = $terms[0]->slug;
            else $acervo = '';
        }
        $rewritereplace = array(
            $acervo
        );
        $permalink = str_replace($rewritecode, $rewritereplace, $permalink);
    } 
    return $permalink;
}
// custom taxonomy permalinks


function splitStrByWords($sentence, $wordCount=2) {
		$words = get_the_title( $post->ID );
        $words = array_chunk(explode(' ', $sentence), $wordCount);
        return array_map('implode', $words, array_fill(0, sizeof($words), ' '));
 }

function splitWords($text, $cnt = 2) 
{

	$text = get_the_title( $post->ID );
	
    $words = explode(' ', $text);

    $result = array();

    $icnt = count($words) - ($cnt-1);

    for ($i = 0; $i < $icnt; $i++)
    {
        $str = '';

        for ($o = 0; $o < $cnt; $o++)
        {
            $str .= $words[$i + $o] . ' ';
        }

        array_push($result, trim($str));
    }

    return $result;
}



function custom_admin_logo() {
  echo '<style type="text/css">
          #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo-admin.png) !important; }
        </style>';
}
add_action('admin_head', 'custom_admin_logo');
 



add_action( 'init', 'myprefix_autocomplete_init' );


function myprefix_autocomplete_init() {
    // Register our jQuery UI style and our custom javascript file
    wp_register_style('myprefix-jquery-ui','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    wp_register_script( 'my_acsearch', get_template_directory_uri() . '/js/custom.js', array('jquery','jquery-ui-autocomplete'),null,true);
	wp_localize_script( 'my_acsearch', 'MyAcSearch', array('url' => admin_url( 'admin-ajax.php' )));
    // Function to fire whenever search form is displayed
    add_action( 'get_search_form', 'myprefix_autocomplete_search_form' );
 
    // Functions to deal with the AJAX request - one for logged in users, the other for non-logged in users.
    add_action( 'wp_ajax_myprefix_autocompletesearch', 'myprefix_autocomplete_suggestions' );
    add_action( 'wp_ajax_nopriv_myprefix_autocompletesearch', 'myprefix_autocomplete_suggestions' );

  //  add_action( 'wp_ajax_doctor_autocompletesearch', 'doctor_autocomplete_suggestions' );
  //  add_action( 'wp_ajax_nopriv_doctor_autocompletesearch', 'doctor_autocomplete_suggestions' );
}

function myprefix_autocomplete_search_form(){
    wp_enqueue_script( 'my_acsearch' );
    wp_enqueue_style( 'myprefix-jquery-ui' );
}




function myprefix_autocomplete_suggestions(){
    // Query for suggestions
    $posts = get_posts( array(
            's' => trim( $_REQUEST['term'] ), 'post_type' => array('page','post', 'doctors', 'specialties', 'locations')
        ));
    $suggestions=array();
 
    global $post;
    $args = array('post_type' => array('page','post', 'doctors','specialties', 'locations' ), 'posts_per_page' => 5, 'post_status'  => 'publish');
    $post = get_posts($args);

    foreach ($posts as $post): 
        setup_postdata($post);
        $suggestion = array();
        $suggestion['label'] = esc_html($post->post_title);
        $suggestion['link'] = get_permalink();
        $suggestions[]= $suggestion;
    endforeach;


    $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";  
    echo $response;  
    exit;
}



/**
 * Check if a post is a custom post type.
 * @param  mixed $post Post object or ID
 * @return boolean
 */
function is_custom_post_type( $post = NULL )
{
    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

    // there are no custom post types
    if ( empty ( $all_custom_post_types ) )
        return FALSE;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type )
        return FALSE;

    return in_array( $current_post_type, $custom_types );
}





function custom_query_shortcode($atts) {
// EXAMPLE USAGE:
// [loop the_query="showposts=100&post_type=page&post_parent=453"]
 // Defaults
   extract(shortcode_atts(array(
      "the_query" => '',
      "relationship_field" => '',
      "title" =>'',
      'featured'=>'',
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

   // query is made               
   query_posts($the_query);
   
   // Reset and setup variables

   $relationship ='';
   $test = '';
   $output = '';
   $temp_title = '';
   $temp_link = '';
   $rel_title ='';
   $attachment_id = '';
   $url = '';
   $link_title = '';
  // $featured = ''; 
 // $title = '';
   // file info

//featured table id
if($featured) { $output .= '<table id="featured-results" class="striped"><tbody>'; 
   } else {
//normal table output   	
	$output .="<table class='striped'><tbody>";
   }
 //custom table title 
	if($title) { $output .="<thead><tr><th><h5 class='table-title'>$title</h5></th><th></th><th></th></tr></thead>"; } else {
    $temp_title = get_the_title($post->ID);	 
   	$output .="<thead><tr><th><h5 class='table-title'>$temp_title</h5><th></th><th></th></tr></thead>";
  	}
	// the loop
	$loop = new WP_Query( $the_query );
	while ( $loop->have_posts() ) : $loop->the_post();

 	  $temp_title = get_the_title($post->ID);	
      $temp_link = get_permalink($post->ID);
   	  $relationship = get_field($relationship_field); 

      //file upload field attachment 
      $attachment_id = get_field('pdf_uploads');
   	  $url = $attachment_id['url'];
   	  $link_title = $attachment_id['title'];

    $output .="<tr>"; 
  	if (get_field('pdf_uploads')) :
    $output .="<td><a class='dl-link' target='_blank' href='$url'>$temp_title</a>";
	else:
	$output .= "<td><h5><a href='$temp_link'>$temp_title</a></h5>";
 	endif;
	// output all findings - CUSTOMIZE TO YOUR LIKING
 	if ($relationship) : 
  	 rewind_posts();
  	foreach( $relationship as $relate ): setup_postdata($relate);
  	      $rel_title = get_the_title($relate->ID);
  	      $rel_link = get_the_permalink($relate->ID);
 	$output.="<p><a href='$rel_link'>$rel_title</a><p><td>";
	endforeach;
 	else: 
	endif;
	wp_reset_postdata();
	if (get_field('pdf_uploads')) :
    $output .="<td><a class='dl-icon' target='_blank' href='$url'>Download</a></td>";
	endif;
	$output .="</tr>";
	endwhile;
	$output .="</table></tbody>";

   //	$output .= "<div class='alert twelve columns'>nothing found.</div>";
      
 

   wp_reset_query();

   return $output;

}

add_shortcode("loop", "custom_query_shortcode");




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
   	$output .="<section id='two-col-sec' class='featured-content tablet-view full'>"; 
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
	<a class='feat-img-link' href='$the_link'><div class='feat-post-img'>$the_thumb</div></a>
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
add_shortcode("basic-loop", "two_column_query_shortcode"); 




function my_gettext( $translated_text, $text, $domain ) {
    if ( 'fwp' == $domain && 'Any' == $text) {
        $translated_text = 'See All'; // left this blank so nothing would appear by default
    
}    return $translated_text;
}
add_filter( 'gettext', 'my_gettext', 10, 3 );




add_action('pre_get_posts', 'advanced_search_query', 1000);


function my_facetwp_sort_options( $options, $params ) {
    unset( $options['distance'] );
    return $options;
}

add_filter( 'facetwp_sort_options', 'my_facetwp_sort_options', 10, 2 );

//custom taxonomy hack

add_filter('rewrite_rules_array', 'mmp_rewrite_rules');


function mmp_rewrite_rules($rules) {
    $newRules  = array();
    $newRules['whats-new/(.+)/(.+)/(.+)/?$'] = 'index.php?post=$matches[3]'; 
    $newRules['whats-new/(.+)/?$']           = 'index.php?news-categories=$matches[1]';

    return array_merge($newRules, $rules);
} 
add_filter('rewrite_rules_array', 'mmp_rewrite_rules');



function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'post')
        return $link;

    if ($cats = get_the_terms($post->ID, 'news-categories'))
    {
        $link = str_replace('%news-categories%', get_taxonomy_parents(array_pop($cats)->term_id, 'news-categories', false, '/', true), $link); // see custom function defined below
    }
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

// my own function to do what get_category_parents does for other taxonomies
function get_taxonomy_parents($id, $taxonomy, $link = false, $separator = '/', $nicename = false, $visited = array()) {    
    $chain = '';   
    $parent = &get_term($id, $taxonomy);

    if (is_wp_error($parent)) {
        return $parent;
    }

    if ($nicename)    
        $name = $parent -> slug;        
else    
        $name = $parent -> name;

    if ($parent -> parent && ($parent -> parent != $parent -> term_id) && !in_array($parent -> parent, $visited)) {    
        $visited[] = $parent -> parent;    
        $chain .= get_taxonomy_parents($parent -> parent, $taxonomy, $link, $separator, $nicename, $visited);

    }

    if ($link) {
        // nothing, can't get this working :(
    } else    
        $chain .= $name . $separator;    
    return $chain;    
}

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}


add_action( 'pre_get_posts', 'search_by_cat' );

function search_by_cat()
{
    if ( is_search() )
    {
        $cat = empty( $_GET['cat'] ) ? '' : (int) $_GET['cat'];
        add_query_arg( 'cat', $cat );
    }
}

