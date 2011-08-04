<?php
/**
 * Dev template file.
 *
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 * Template Name: Typeset Test
 * 
 */
get_header(); ?>
<body id="tpl-page" <?php if( function_exists( 'body_class' ) ) body_class(); ?> >
<?php do_action ('augusta_layout_before');  ?>  
<div id="zone-header" class="<?php do_action( 'zone_header_class' ) ?>">
   <?php  do_action('augusta_header'); ?>
</div>
<div id="zone-menu" class="<?php do_action( 'zone_menu_class' ) ?>">
  <?php do_action('augusta_menu'); ?>
</div>
<div id="zone-content" class="<?php do_action( 'zone_content_class' )?>">
  <div id='section-content' class='container-16'>
  <?php 
    // augusta-content.php
    do_action ( 'augusta_content_before' );
    
    // wordpress function
    get_template_part('assets/layout/loop/loop', 'page' );
    
    get_sidebar( '' ); 
  ?>
    <div id="content-test">
      <h1>Header 1</h1>
      <p>Vel lobortis interdum ididunt et ullamcorper vehicula varius. Pellentesque vestibulum Mauris mauris vel eget nam ligula dolores</p>
      <p>Diam odio fermentum duis incididunt et ullamcorper vehicula varius. Pellentesque vestibulum molestie vitae porttitor eros. Pede scelerisque diam. Suspendisse fusce habitant. Elit et tempor amet ipsum mauris sem urna lacinia.</p>
      <p>Vel lobortis interdum ididunt et ullamcorper vehicula varius. Pellentesque vestibulum Mauris mauris vel eget nam ligula dolores</p>
      <h2>Header 2</h2>
      <p>Vel lobortis interdum ididunt et ullamcorper vehicula varius. Pellentesque vestibulum Mauris mauris vel eget nam ligula dolores</p>
      <h3>Header 3</h3>
      <p>Vel lobortis interdum ididunt et ullamcorper vehicula varius. Pellentesque vestibulum Mauris mauris vel eget nam ligula dolores</p>
      <h4>Header 4</h4>
      <p>Vel lobortis interdum. Metus eu commodo. Mauris mauris vel eget nam ligula dolores vehicula habitant eleifend dolor massa. Aenean error pede. Massa congue nec a habitant nunc ornare nisl tristique quis vestibulum et sit saepe vivamus. Aliquet excepteur et. Nunc non proin. Consequatur sit inceptos. Dignissim nunc ut bibendum porttitor amet aenean turpis accumsan. Lacinia adipiscing est. Parturient ullamcorper eget penatibus vehicula orci nulla vel elit. In nunc nullam et arcu iaculis. Tortor mauris sociosqu. Ac eu integer felis fringilla maecenas eros vitae eros. Accumsan laborum in habitasse a eu. Diam facilisi cras. Dictumst nulla phasellus fusce metus eleifend sit vitae nulla. Purus voluptas maecenas. Neque commodo vivamus et suscipit metus sollicitudin porta sit. Integer nam lorem eget luctus elementum.</p>
      <h4>Header 5</h4>
      <ul>
        <li>Metus eu commodo</li>
        <li><span>Eu commodo</span></li>
        <li><a href="">Metus dolores vehicula habitant</a></li>        
      </ul>
      <p>Diam odio fermentum duis incididunt et ullamcorper vehicula varius. Pellentesque vestibulum molestie vitae porttitor eros. Pede scelerisque diam. Suspendisse fusce habitant. Elit et tempor amet ipsum mauris sem urna lacinia.</p>
      <p>Neque aliquam vestibulum bibendum pede pede pellentesque duis ut cursus vel viverra. Habitasse nulla sed non vel sed massa justo lectus. Bibendum ante vulputate. Cras porttitor pellentesque. Sit massa odio. Placerat pharetra proin. Orci convallis sit. Ante sed sed erat lacus arcu posuere a venenatis. Enim magnis lacus molestie bibendum vitae id donec lorem. Sodales eu erat. Porttitor molestie hendrerit ac vestibulum interdum volutpat non eros. Donec auctor dui fusce vestibulum nulla leo non faucibus inceptos elementum urna. In facilisi erat. In proin quis augue non sit praesent mi vitae. Sit cras sem phasellus sapien vestibulum. Pede mauris eros viverra ut etiam. Rutrum tempor est quis dolor cupidatat ut a non mauris sit praesent. Pellentesque sem eleifend dolor pellentesque risus. Eu dignissim vehicula. Vehicula sit malesuada hendrerit sollicitudin vestibulum. Tellus lacus ut amet aliquam id. Etiam scelerisque fames. Purus leo ex. A turpis vestibulum. Egestas tincidunt libero explicabo et habitasse.</p>
    </div>
    <?// augusta-content.php 
    do_action ( 'augusta_content_after' ); ?>
  </div> <!--/#section-content-->
</div><!--/#zone-content-->
<?php 
  // augusta_layout_end is called inside footer.php
  // augusta_meta is also called here
  get_footer();  
?>