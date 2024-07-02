<?php
    $image_1 = get_sub_field( 'image_1' );
    $image_2 = get_sub_field( 'image_2' );
?>

<div class="section two-up-image">
    <img src="<?php echo $image_1['sizes']['large']; ?>" alt="<?php echo $image_1['alt']; ?>">
    <img src="<?php echo $image_2['sizes']['large']; ?>" alt="<?php echo $image_2['alt']; ?>">
</div>