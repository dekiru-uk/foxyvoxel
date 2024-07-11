<?php if (have_rows('hero_carousel')) : ?>
    <section class="hero-banner">
        <?php while (have_rows('hero_carousel')) : the_row(); 
            $game = get_sub_field('game');
            $game_id = $game->ID;
            $header_area = get_field('header_area', $game_id);
                        
            // echo $game->post_title;
            // print_r($header_area);

            $game_logo = $header_area['game_logo'];
            $game_logo_url = $game_logo['url'];

            $game_bg = $header_area['background_image'];
            $game_bg_url = $game_bg['url'];

            $store_links = $header_area['store_links'];
            
            while(have_rows('header_area', $game_id)) : the_row();
                $trailer = get_sub_field('trailer', false, false);
            endwhile;
        ?>
        <div class="hero-slide swiper-slide">
            <div class="background-image">
                <img src="<?php echo $game_bg['sizes']['hd']; ?>" alt=""
                    width="<?php echo $game_bg['sizes']['hd-width']; ?>"
                    height="<?php echo $game_bg['sizes']['hd-height']; ?>"
                >
            </div>
            <div class="slide-content">
                <img src="<?php echo $game_logo_url; ?>" alt="<?php echo $game->post_title; ?>" width="200" height="200" class="game-logo">

                <div class="actions">
                    <?php if ($store_links) : ?>
                        <div class="purchase">
                            <span>Buy now:</span>
                            <?php foreach ($store_links as $store) : ?>
                                <a href="<?php echo $store['link']; ?>" class="store-link">
                                    <img src="<?php echo $store['icon']['url']; ?>"
                                        alt="<?php echo $store['icon']['alt']; ?>"
                                        width="200" height="200"
                                    >
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($trailer) : ?>
                        <a href="<?php echo $trailer; ?>" class="trailer play-trailer">
                            Trailer:
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo get_permalink($game_id); ?>" class="page-link">
                        Find out more
                    </a>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
    </section>
<?php endif; ?>