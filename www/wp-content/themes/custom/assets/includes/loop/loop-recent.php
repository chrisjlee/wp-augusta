<?php do_action('thm_before_loop'); ?>
	<?php 
		$pathtoinc = '/assets/';
		$p = new WP_Query($pargs);
		 $recentPosts->query('showposts=5&order');		
		
	?>
    <?php if ($p->have_posts()) : while ($p->have_posts()) : $postcnt = 0;  $p->the_post(); ?>
    <div <?php post_class('post postcnt-'.$postcnt++) ?> id="post-<?php the_ID(); ?>">
      <?php locate_template(array($pathtoinc.'/includes/post/postheader.php',true);?>
      <div class="entry sxn">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
        <?php // the_entry('Read the rest of this entry &raquo;'); ?>
      </div>
      <div class="postfooter sxn">
        <?php locate_template(array($pathtoinc.'/includes/post/postbyline.php',true);?>
        <?php locate_template(array($pathtoinc.'/includes/post/postmeta.php',true);?>
      </div>
      <?php locate_template(array($pathtoinc.'/includes/post/postedit.php',true);?>
    </div>
    <?php $postcnt++; endwhile; ?>
	  <?php locate_template(array($pathtoinc.'/includes/post/postnav.php',true);?>
    <?php else : ?>
	 	<?php locate_template(array($pathtoinc.'/includes/post/post404.php',true);?>
    <?php endif; ?>
<?php do_action('thm_after_loop'); ?>