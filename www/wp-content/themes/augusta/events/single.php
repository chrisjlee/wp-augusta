<?php
	global $spEvents;
	$spEvents->loadDomainStylesScripts();
	
	get_header();
?>
</head>
<body id="events"  <?php if (function_exists('body_class')) { body_class('event-single'); } ?> >
<?php get_template_part( 'tpt-header', 'page' ); ?>
  <div id="container" class="sxn">
    <div id="content" class="bfl" >
    <div id="main" class="sxn">
      <div class="bfl grid_7 alpha" role='complementary'>
        <?php get_sidebar('page'); ?>
      </div>
          <div id="content-body" class="grid_17 omega">
          <div id="tec-content" class="tec-event grid_16">
            <?php the_post(); global $post; ?>
            <div id="post-<?php the_ID() ?>"
              <?php post_class() ?>
>
              <span class="back"><a href="<?php echo events_get_events_link(); ?>">
                  <?php _e('&laquo; Back to Events', $spEvents->pluginDomain); ?>
                </a></span>
              <h2 class="entry-title">
                <?php the_title() ?>
              </h2>
              <a class="ical" href="<?php bloginfo('home'); ?>/?ical=<?php echo $post->ID; ?>">
                <?php _e('iCal Import', $spEvents->pluginDomain) ?>
              </a>
              <?php if (the_event_end_date() > time()  ) { ?>
              <small>
                <?php  _e('This event has passed.', $spEvents->pluginDomain) ?>
              </small>
              <?php } ?>
              <div id="tec-event-meta">
                <dl class="column">
                  <dt>
                    <?php _e('Start:', $spEvents->pluginDomain) ?>
                  </dt>
                  <dd>
                    <?php echo the_event_start_date(); ?>
                  </dd>
                  <?php if (the_event_start_date() !== the_event_end_date() ) { ?>
                  <dt>
                    <?php _e('End:', $spEvents->pluginDomain) ?>
                  </dt>
                  <dd>
                    <?php echo the_event_end_date();  ?>
                  </dd>
                  <?php } ?>
                  <?php if ( the_event_cost() ) : ?>
                  <dt>
                    <?php _e('Cost:', $spEvents->pluginDomain) ?>
                  </dt>
                  <dd>
                    <?php echo the_event_cost(); ?>
                  </dd>
                  <?php endif; ?>
                </dl>
                <dl class="column">
                  <?php if(the_event_venue()) : ?>
                  <dt>
                    <?php _e('Venue:', $spEvents->pluginDomain) ?>
                  </dt>
                  <dd>
                    <?php echo the_event_venue(); ?>
                  </dd>
                  <?php endif; ?>
                  <?php if(the_event_phone()) : ?>
                  <dt>
                    <?php _e('Phone:', $spEvents->pluginDomain) ?>
                  </dt>
                  <dd>
                    <?php echo the_event_phone(); ?>
                  </dd>
                  <?php endif; ?>
                  <?php if( tec_address_exists( $post->ID ) ) : ?>
                  <dt>
                    <?php _e('Address:', $spEvents->pluginDomain) ?>
                    <br/>
                    <?php if( get_post_meta( $post->ID, '_EventShowMapLink', true ) == 'true' ) : ?>
                    <?php $mapArgs = array("f"=>"q","source"=>"s_q","geocode"=>""); ?>
                    <a class="gmap" href="<?php event_google_map_link( null, $mapArgs ) ?>" title="<?php _e('Click to view a Google Map', $spEvents->pluginDomain); ?>" target="_blank">
                      <?php _e('Google Map', $spEvents->pluginDomain ); ?>
                    </a>
                    <?php endif; ?>
                  </dt>
                  <dd>
                    <?php tec_event_address( $post->ID ); ?>
                  </dd>
                  <?php endif; ?>
                </dl>
              </div>
              <?php if( get_post_meta( $post->ID, '_EventShowMap', true ) == 'true' ) : ?>
              <?php if( tec_address_exists( $post->ID ) ) event_google_map_embed(); ?>
              <?php endif; ?>
              <div class="entry">
                <?php the_content(); ?>
                <?php if (function_exists('the_event_ticket_form')) { the_event_ticket_form(); } ?>
              </div>
              <?php edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?>
            </div>
            <!-- post -->
            <?php if(eventsGetOptionValue('showComments','no') == 'yes'){ comments_template();} ?>
          </div>
          <!-- tec-content --></div>
          <br clear="all" />
          <?php
		global $wp_query;
		$tecCatObject = get_category( $wp_query->query_vars['cat'])
		?>
          <a class="ical" href="<?php bloginfo('home'); ?>/?ical=<?php echo $tecCatObject->slug; ?>">
            <?php _e('iCal Import', $spEvents->pluginDomain) ?>
          </a>
          <?php event_grid_view( ); // See the plugins/the-events-calendar/views/table.php template for customization ?>
      </div>
      <!-- end contentinside -->
    </div>
    <!-- end content -->
  </div>
  <!-- end main -->
  <?php get_footer(); ?>
