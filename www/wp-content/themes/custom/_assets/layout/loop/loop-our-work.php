<?php do_action('augusta_loop_before'); ?>
<?php 
$args = array(
    'post_type' => 'page',
    'post_status' => 'publish',
	'post_parent' => $post->ID,
    'order' => ASC,
    'orderby' => menu_order,
	'posts_per_page'=>-1
    );
 $qc = new WP_Query($args);
 $qcc = "0";
 
 function tnLarge() {
 	return get_the_post_thumbnail( $page->ID, array(894,894), 'alt='.get_the_title() );
 }
?>

<div id="content-posts" class="sxn loop-our-work"> 
	  	  <div id="content-posts-tabs" class="tabs sxn">
		  	  <?php if ($qc->have_posts()) : while ($qc->have_posts()) : $qc->the_post(); ?>
		  	  <?php 
		  	  $qcclass = '';
		  	  $qcclass = 'sxn page post';
		  	  if ( $qcc =="0" ) { $qcclass .= ' alpha'; }
		  	  else if ( $qc->current_post > 0 ) { $qclass .= ' middle'; }
		  	  else if ( $qc->current_post == $qc->$post_count ) { $qclass .=' omega'; }
		  	  else { }
		  	  ?>
				  <div <?php post_class($qcclass) ?> id="post-<?php the_ID(); ?>">
						<a class="grid_22" id="entry-link-<?php echo $post->ID ?>" href="<?php the_permalink(); ?>" class="entry-link" 
				  		title="<?php the_title(); ?>">
				  		<div class="post-title" ><h2 title="<?php the_title(); ?>"><?php the_title(); ?></h2></div>
				  		<div class="post-image"><?php echo tnLarge(); ?></div>
				  		</a>
						<div class="post_edit section"><?php edit_post_link('Edit', '<span>', '</span>'); ?></div>
				  </div>
				  
			  <?php $qcc++; endwhile; endif; rewind_posts(); $qcc = "0"; ?>
				  <?php
				  $defaultclass ='grid_3'; 
				  $classes = $defaultclass;  
				  $pc = $qc->post_count;
				  $ipr = 7; // items per row
				  ?>
			 <ul class="grid_22 sxn" >
				  <?php if ($qc->have_posts()) : while ($qc->have_posts()) : $qc->the_post(); ?>
				  <?php 
				  	if ($qcc == 0) { $classes .= ' alpha'; }
				  	else if ( ($qcc % $pc ) == 0 ) {  $classes .= ' omega'; echo 'last'; }
				  	else if ( ($qcc % $ipr) == 0 ) { $classes .= ' clearboth alpha'; }
				  	else { $classes .= ' middle'; }					  	
				  ?>
				  <li class="<?php echo $classes ?>">
				    <a id="entry-link-<?php echo $post->ID ?>" href="#post-<?php echo $post->ID ?>" class="entry-link" 
				  		title="<?php the_title(); ?>">
				  		<div class="entry-thumb">
				  			<?php echo get_the_post_thumbnail($page->ID, array(115,115)); ?>
				  			<div class="entry-thumb-caption"><?php the_title(); ?></div>
				      	</div>
				      	</a>
				  </li>					  
			  	  <?php 
			  	  		$qcc++; $classes = $defaultclass; 
			  	  		endwhile; endif; ?>
			  	  </ul>
		</div>
<?php do_action('augusta_loop_after'); ?>