<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>
<div class="ngg-galleryoverview horizontalscroll" id="logoParade">	<div class="scrollingHotSpotLeft" ></div>	<div class="scrollingHotSpotRight" ></div>	<div id="scrollWrapper">		<!-- Thumbnails -->		<div class="scrollableArea">				<?php foreach ( $images as $image ) : ?>				<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> style="margin-right: 10px;">					<?php if ( !$image->hidden ) { ?>					<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />					<?php } ?>				</a>		<?php if ( $image->hidden ) continue; ?>		<?php endforeach; ?>		</div>		<br style="clear: both" clear="all" />
	</div>
</div>
<?php endif; ?>