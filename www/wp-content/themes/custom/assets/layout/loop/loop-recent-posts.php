

<div id="recent-posts-frame" class="bfl">
		<?php // Set up the arguments for retrieving the pages
			// $post->ID gets the ID of the current page
			$args = array(
				'post_type' => 'post',
				'numberposts' => 15,
				'post_status' => null,
				'order' => ASC,
				'orderby' => date
				);
			 $q = new WP_Query($args);
			 // Just another Wordpress Loop 
			 if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();	
			 ?>
			 if($q->current_post == $q->post_count-1) echo 'omega';
              <div id="recentpost-<?php echo $post->ID; ?>" <?php post_class('recentpost post'.&$q->current_post)?>>
                <div class="posttitle"><h2> <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?> -                 
                  <span class="postinfo_time">
                  <?php the_time('F j, Y') 
						//the_time('m\/d\/Y') ?>
                </span>
                  </a></h2></div>

                <div class="postexcerpt">
                  <?php the_excerpt('Read More'); ?>
                </div>
              </div>
              <?php endwhile; endif; ?>
     </div>	

