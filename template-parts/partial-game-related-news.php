<?php 
    $news_tag = get_field('news_tag');

    if ($news_tag) :
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category__and' => $news_tag,
            'post__not_in' => array(get_the_ID())
        );

        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
?>

<div class="game-related-news">
    <div class="section-content">
        <p class="subtitle">Related news</p>

        <div class="news-blocks">
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="news-item">
                    <?php the_post_thumbnail('medium_large'); ?>
                    <div class="news-content">
                        <p class="news-title"><?php the_title(); ?></p>
                        <p class="posted-on"><?php the_time('d/m/Y'); ?></p>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

    </div>
</div>

<?php 
        endif;
        wp_reset_postdata();
    endif;
?>