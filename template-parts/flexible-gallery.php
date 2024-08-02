<?php 
	$gallery = get_sub_field('gallery');
	$gallery_count = count($gallery);
	$slide_count = 0;

	if ($gallery) :
?>

<div class="game-gallery">
	<div class="swiper-wrapper">
		<?php foreach( $gallery as $image ): 
			$slide_count ++;	
		?>
			<div class="swiper-slide gallery">
				<a href="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>">
					<img src="<?php echo $image['sizes']['hd']; ?>"
						alt="<?php echo $image['alt'];?>"
						width="<?php echo $image['sizes']['hd-width']; ?>"
						height="<?php echo $image['sizes']['hd-height']; ?>"
						loading="lazy"
					>
				</a>

				<div class="slide-info">
					<span>Gallery</span>
					<em><?php echo $slide_count; ?></em>/<?php echo $gallery_count; ?>
					<div class="slide-controls">
						<div class="gallery-prev">Previous</div>
						<div class="gallery-next">Next</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php endif; ?>