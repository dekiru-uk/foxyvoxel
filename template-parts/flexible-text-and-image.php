<?php
    $text = get_sub_field('text');
    $image = get_sub_field('image');

    $subtitle = $text['subtitle'];
    $title = $text['title'];
    $copy = $text['copy'];

    if ($title && $image) :
?>

    <div class="text-and-image">
        <div class="text">
            <p class="subtitle"><?php echo $subtitle; ?></p>
            <h3 class="title"><?php echo $title; ?></h3>
            <div class="copy"><?php echo $copy; ?></div>
        </div>
        <div class="image">
            <img src="<?php echo $image['url']; ?>" 
                alt="<?php echo $image['alt']; ?>"
                width="<?php echo $image['width']; ?>"
                height="<?php echo $image['height']; ?>"
            >
        </div>
    </div>

<?php endif; ?>