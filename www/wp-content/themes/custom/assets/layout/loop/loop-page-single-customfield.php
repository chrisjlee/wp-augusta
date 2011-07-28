<?php $getpid = stripslashes( get_post_meta($post->ID, "frontpage", true) );
if (isset($getpid) && !empty($getpid) ) { 
  $q = 'posts_per_page=1&post_type=page&post_status=publish&page_id='.$getpid; 
} else { 
 $q = 'posts_per_page=1&post_type=page&post_status=publish&page_id=1'; 
}
query_posts($q);

?>