<!-- file:tpt-header-core -->
<div id="page" class="sxn">
	<div id="pagewidth" class="hfeed sxn">
		<div id="header" class="sxn container_<?php echo CONFIG_960GS_TYPE; ?>">
			<div id="masthead" class="sxn">
				<div id="logo" class="sxn">
					<div class="contents">
						<h2 id="site-title" class="grid">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span>						
								<?php bloginfo( 'name' ); ?>						
							</span>
						</a>
						</h2>
					</div>
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
						wp_nav_menu($args); 
					?>
				</div>
				<div id="access" role="navigation" class="sxn">
				  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php 
					wp_nav_menu( array( 
						'container_id'    => 'menu-access',
						'container_class' => 'menu-primary', 
						'menu' => 'Main',
						'menu_id' => 'access-ul',
						'menu_class' => 'superfish sxn sf-menu',
						'theme_location' => 'primary'
						) ); 
					?>
				</div><!-- #access -->
			</div><!-- #masthead -->
		</div><!-- #header -->
		<div id="main" class="sxn grid_<?php echo CONFIG_960GS_TYPE; ?>">