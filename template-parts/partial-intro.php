<?php 
    $intro = get_field('intro');
    $subtitle = $intro['subtitle'];
    $title = $intro['title'];
    $copy = $intro['copy'];
    $button_text = $intro['button_text'];
    $button_link = $intro['button_link'];

    $image = $intro['image'];
?>

<div class="intro">
    <div class="section-content">
        <div class="intro-content">
            <div class="intro-text">
                <p class="intro-subtitle"><?php echo $subtitle; ?></p>
                <h1 class="intro-title"><?php echo $title; ?></h1>
                <span class="copy"><?php echo $copy; ?></span>

                <a href="<?php echo $button_link; ?>" class="button"><?php echo $button_text; ?></a>
            </div>
        </div>

        <div class="intro-image">
            <div class="fox-in-a-box">
                <img src="<?php echo $image['url']; ?>"
                    alt="<?php echo $image['alt']; ?>"
                    width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
</div>