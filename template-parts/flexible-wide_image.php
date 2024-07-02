<?php
    $image = get_sub_field( 'image' );
    $shorter_height = get_sub_field( 'shorter_height' );

?>

<div class="section wide-image">
    <img src="<?php echo $image['sizes']['hero-xl']; ?>" alt="<?php echo $image['alt']; ?>">
</div>