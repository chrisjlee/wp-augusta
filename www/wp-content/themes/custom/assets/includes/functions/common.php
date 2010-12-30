<?php

/*	Add Theme Support for functionality
 ------------------------------------------------------------*/
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'editor-style' ); // add editor-style.css, editor-style-rtl.css file
add_theme_support( 'widgets' );
add_theme_support( 'custom-header' );
set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size


/*
 *	function void thm_the_subtitle
 *  return null
 *  
 *  argument: $st 
 *  $st subtitle variable 
 *	
 *	Description: Must be in loop 
 * 
 */
function thm_the_subtitle(&$custom_meta_title='subtitle') {
	do_action('thm_the_subtitle',$custom_meta_title)
    $st = get_post_custom_values("subtitle", $post->id);
    if (isset($st) && !empty($st) ) $st = $st[0];
    else $st = '';
echo $st; 
}


// Find and close unclosed xhtml tags
function thm_close_tags($text) {
    $patt_open    = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
    $patt_close    = "%((?<=</)([^>]+)(?=>))%";
    if (preg_match_all($patt_open,$text,$matches))
    {
        $m_open = $matches[1];
        if(!empty($m_open))
        {
            preg_match_all($patt_close,$text,$matches2);
            $m_close = $matches2[1];
            if (count($m_open) > count($m_close))
            {
                $m_open = array_reverse($m_open);
                foreach ($m_close as $tag) $c_tags[$tag]++;
                foreach ($m_open as $k => $tag)    if ($c_tags[$tag]--<=0) $text.='</'.$tag.'>';
            }
        }
    }
    return $text;
}

// Content Limit
	function content($num, $more_link_text = '(more...)') {  
	$theContent = get_the_content($more_link_text);  
	$output = preg_replace('/<img[^>]+./','', $theContent);  
	$limit = $num+1;  
	$content = explode(' ', $output, $limit);  
	array_pop($content);  
	$content = implode(" ",$content);  
    $content = strip_tags($content, '<p><a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>');
      echo thm_close_tags($content);
      echo "<p><a href='";
      the_permalink();
      echo "'>".$more_link_text."</a></p>";
}

/*	Nav Menu First Last
 *  Add First and last functionality
 ------------------------------------------------------------*/

function nav_menu_first_last( $items ) {
 $position = strrpos($items, 'class="menu-item', -1);
 $items=substr_replace($items, 'menu-item-last ', $position+7, 0);
 $position = strpos($items, 'class="menu-item');
 $items=substr_replace($items, 'menu-item-first ', $position+7, 0);
 return $items;
}
add_filter( 'wp_nav_menu_items', 'nav_menu_first_last' );


/*	 SEO Title	*/
function get_seotitle() {
	if ( is_single() ) {
			wp_title('');
			echo (' | ');
			bloginfo('name');	 
	} else if ( is_page() || is_paged() ) {
			bloginfo('name');
			wp_title('|');
	 
	} else if ( is_author() ) {
			bloginfo('name');
			wp_title(' | Archive for ');	  
		  
	} else if ( is_archive() ) {
			bloginfo('name');
			echo (' | Archive for ');
			wp_title('');
	 
	} else if ( is_search() ) {
			bloginfo('name');
			echo (' | Search Results');
	 
	} else if ( is_404() ) {
			bloginfo('name');
			echo (' | 404 Error (Page Not Found)');
		  
	} else if ( is_home() ) {
			bloginfo('name');
			echo (' | ');
			bloginfo('description');
	 
	} else {
			bloginfo('name');
			echo (' | ');
			echo (''.$blog_longd.'');
	}
}

// Loop Independant Function
function archivetitle ($display=TRUE) {
	if ($display == TRUE && is_archive()) {
	  // Hack. Set $post so that the_date() works.
	  $post = $posts[0];
 	  /* Category archive */    if (is_category()) {  	echo '<h2 class="pagetitle">Archive for the &#8216;'; single_cat_title(); echo '&#8217; Category</h2>'; }
 	  /* Tag archive */ 		elseif (is_tag()) {  	echo '<h2 class="pagetitle">Posts Tagged &#8216;'; single_tag_title(); echo '&#8217;</h2>'; }
 	  /* Daily archive */ 		elseif (is_day()) { 	echo '<h2 class="pagetitle">Archive for '; the_time('F jS, Y'); echo '</h2>'; }
 	  /* Monthly archive */  	elseif (is_month()) {   echo '<h2 class="pagetitle"> Archive for'; the_time('F, Y'); echo '</h2>'; }
 	  /* Yearly archive */  	elseif (is_year()) { 	echo '<h2 class="pagetitle">Archive for'; the_time('Y'); echo '</h2>'; }
	  /* Author archive */  	elseif (is_author()) { 	echo '<h2 class="pagetitle">Author Archive</h2>'; } 
 	  /* Paged archive */  		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { echo '<h2 class="pagetitle">Blog Archives</h2>'; }
	}
}

function set_page_class( $classes='' ) { 
	sanitize_html_class($classes, '');
	if(!empty($classes)) {
		$output = 'class="' . $classes . '"';
	}
	return $output;
}
add_filter('page_class','set_page_class'); 

function display_my_customs($id = 0){
	//if we want to run this function on a page of our choosing them the next section is skipped.
	//if not it grabs the ID of the current page and uses it from now on.
	if ($id == 0) :
	global $wp_query;
	$content_array = $wp_query->get_queried_object();
	$id = $content_array->ID;
	endif;
	
	//knocks the first 3 elements off the array as they are WP entries and i dont want them.
	$first_array = array_slice(get_post_custom_keys($id), 3);
	
	//first loop puts everything into an array, but its badly composed
	foreach ($first_array as $key => $value) :
	$second_array[$value] = get_post_meta($id, $value, FALSE);
	
	//so the second loop puts the data into a associative array
		foreach($second_array as $second_key => $second_value) :
		$result[$second_key] = $second_value[0];
		endforeach;
	endforeach;
	
	//and returns the array.
	return $result;
}

/*	Added IE6 sniffing
 ------------------------------------------------------------*/
function is_ie6(){
	return strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== FALSE;
}

add_filter('body_class','browser_body_class');	
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {	$classes[] = 'ie';	if(is_ie6()) $classes[] = 'ie6';	}	
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
function new_excerpt_length($length) {
	return 55;
}
add_filter('excerpt_length', 'new_excerpt_length');

/*	is_sidebar_active
 ------------------------------------------------------------*/
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolumns = wp_get_sidebars_widgets();
		 
  if ($widgetcolumns[$index]) return true;
	return false;
}
/*	List Hooked Functions
 *	Description: lists all functions for debugging hooks  
 ------------------------------------------------------------*/
function list_hooked_functions($tag=false){
 global $wp_filter;
 if ($tag) {
  $hook[$tag]=$wp_filter[$tag];
  if (!is_array($hook[$tag])) {
  trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
  return;
  }
 }
 else {
  $hook=$wp_filter;
  ksort($hook);
 }
 echo '<pre>';
 foreach($hook as $tag => $priority){
  echo "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
  ksort($priority);
  foreach($priority as $priority => $function){
  echo $priority;
  foreach($function as $name => $properties) echo "\t$name<br />";
  }
 }
 echo '</pre>';
 return;
}

/*	GRS Site Generator
 ------------------------------------------------------------*/
function grs_site_generator () {?>
<div id="site-generator" class="grid_6 omega">
	<?php do_action( 'twentyten_credits' ); ?>
	<a href="<?php echo esc_url( __('http://globerunnerseo.com/', 'Globerunnerseo') ); ?>"
			title="<?php esc_attr_e('Dallas SEO', 'Globerunnerseo'); ?>" rel="generator">
		Dallas SEO, GloberunnerSEO.com
	</a>
</div><!-- #site-generator -->	
<?php }
add_action('thm_site_generator','grs_site_generator');
?>