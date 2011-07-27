<?php 
$args = array(
    'post_type' => 'page',
    'numberposts' => -1,
    'post_status' => null,
	'post_parent' => $post->ID,
    'order' => ASC,
    'orderby' => menu_order
    );
 $qc = new WP_Query($args);
 $qcc = "0";
?>

<div id="content-posts" class="section"> 
	  	  <?php if ($qc->have_posts()) : while ($qc->have_posts()) : $qc->the_post(); ?>
	  	  <?php 
	  	  
	  	  $qcclass = '';
	  	  $qcclass = 'sxn page post grid_6';
	  	  if ( $qcc =="0" ) { $qcclass .= ' alpha'; }
	  	  else if ( $qcc > 0 ) { $qclass .= ' middle'; }
	  	  else if ( $qcc == $qc->post_count ) { $qclass .=' last'; }
	  	  else { }
	  	  ?>
		  <div <?php post_class($qcclass) ?> id="post-<?php the_ID(); ?>">
		    <!--<h2>
			<?php the_title(); ?>
		    </h2>-->
			<div class="entry section">
				<a id="entry-link-<?php echo $post->ID; ?>" href="<?php the_permalink(); ?>" class="entry-link" title="<?php the_title(); ?>">
					<div class="entry-image">
						<?php if(the_post_thumbnail('ps-thumbnail')) the_post_thumbnail('ps-thumbnail'); ?>
					</div>		  		
					<h3><?php the_title(); ?></h3>
				</a>
				<div class="post_edit section"><?php edit_post_link('Edit', '<span>', '</span>'); ?></div>
			</div>
		  </div>
		  <?php $qcc++; endwhile; endif; rewind_posts(); ?>
		  <?php if ($qc->have_posts()) : while ($qc->have_posts()) : $qc->the_post(); ?>
		  <?php endwhile; endif; ?>
</div>