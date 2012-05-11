<?php

function seotitle() {
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

?>
