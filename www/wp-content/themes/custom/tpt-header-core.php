<!-- file:tpt-header-core -->
<div id="page" class="sxn">
	<div id="pagewidth" class="hfeed sxn">
		<div id="header" class="sxn container_<?php echo CONFIG_960GS_TYPE; ?>">
			<div id="masthead" class="sxn">
				<div id="logo" class="sxn">
				  <div class="grid_15"><h2 id="site-title" class="grid">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span>						
						<?php bloginfo( 'name' ); ?>						
					</span></a>
				  </h2></div>
				  <?php 
				  $args = array(
                    'container'       => 'div', 
                    'container_class' => 'bfr grid_4 menu omega', 
                    'menu'            => 'Social Media', 
                    'menu_id'         => 'menu-sm-ul',
                    'menu_class'      => 'sxn menu omega', 
                    'container_id'    => 'menu-sm', 
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '<span>',
                    'link_after'      => '</span>',
                    'depth'           => 0,
                    'walker'          => '',
                    'theme_location' => 'secondary'
				  );
				  wp_nav_menu($args); ?>
				</div>
				<div id="access" role="navigation" class="sxn">
				  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 
					    'container_id'    => 'menu-access',
						'container_class' => 'menu-primary', 
						'menu' => 'Main',
					    'menu_id' => 'access-ul',
					    'menu_class' => 'superfish sxn sf-menu',
						'theme_location' => 'primary'
					     ) ); ?>
				</div><!-- #access -->
				<div id="branding" role="banner" class="sxn">
					<div id="branding-overlay" class="sxn"></div>
					<div id="branding-contents" class="sxn"><?php
						// Check if this is a post or page, if it has a thumbnail, and if it's a big one
						if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
							// Houston, we have a new header image!
							echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
						else : ?>
							<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
						<?php endif; ?>
						<?php 
						// Additional Header images for slideshow
						$meta_values = get_post_meta($post->ID, "header", false);
						if (isset($meta_values) && (count($meta_values) == 1 ) ) {
						  ?>
						  <img class="slideshow" src="<?php echo $meta_values[0] ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" />
						<?php 						
						} else if ( isset($meta_values) && is_array($meta_values) ) {
						    foreach ($meta_values as $value){
						      $output = '<img src="'.$value.'" width="'.HEADER_IMAGE_WIDTH.'" height="'.HEADER_IMAGE_HEIGHT.'" /> ';
						    }
						    echo $output;
						} else { echo '<!--no images-->'; }
						?></div>
				</div><!-- #branding -->
			</div><!-- #masthead -->
		</div><!-- #header -->
		<div id="main" class="sxn grid_<?php echo CONFIG_960GS_TYPE; ?>">