<?php
	global $spEvents;
	$spEvents->loadDomainStylesScripts();
	
	get_header();
?>	

</head>
<body id="events"  <?php if (function_exists('body_class')) { body_class('event-grid-view'); } ?>>
<?php get_template_part( 'tpt-header', 'page' ); ?>
<div id="container" class="container_24">
  <div id="content">
    <div id="main" class="sxn">
    	<div id="content-body" class="grid_17 alpha">
    		<div id="tec-content" class="">
          		<div id='tec-events-calendar-header' class="clearfix">
          			<h2 class="tec-cal-title"><?php _e('Calendar of Events', $spEvents->pluginDomain) ?></h2>
          			<span class='tec-month-nav'>
          				<span class='tec-prev-month'>
          					<a href='<?php echo events_get_previous_month_link(); ?>'>
          					&#x2190; <?php echo events_get_previous_month_text(); ?>
          					</a>
          				</span>
          				<?php get_jump_to_date_calendar( "tec-" ); ?>
          				<span class='tec-next-month'>
          					<a href='<?php echo events_get_next_month_link(); ?>'>				
          					<?php echo events_get_next_month_text(); ?> &#x2192; 
          					</a>
          				</span>
          			</span>
          
          			<span class='tec-calendar-buttons'> 
          				<a class='tec-button-off' href='<?php echo events_get_listview_link(); ?>'><?php _e('Event List', $spEvents->pluginDomain)?></a>
          				<a class='tec-button-on' href='<?php echo events_get_gridview_link(); ?>'><?php _e('Calendar', $spEvents->pluginDomain)?></a>
          			</span>
          		</div><!-- tec-events-calendar-header -->
          		<?php
          		global $wp_query;
          		$tecCatObject = get_category( $wp_query->query_vars['cat'])
          		?>
          		<a class="ical" href="<?php bloginfo('home'); ?>/?ical=<?php echo $tecCatObject->slug; ?>"><?php _e('iCal Import', $spEvents->pluginDomain) ?></a>
          		<?php event_grid_view( ); // See the plugins/the-events-calendar/views/table.php template for customization ?>	
          	</div>
    	</div>
    	<div class="sidebar grid_7 omega">
    	  <?php get_sidebar('page'); ?>
    	</div>
    	<!-- end content -->
    </div><!-- end main -->
  </div>
</div>
<?php get_footer(); ?>