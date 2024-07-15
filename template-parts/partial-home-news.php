<?php
    $news_block = get_field('news_block');
    $num_posts = $news_block['news_articles_to_show'];
    $subtitle = $news_block['subtitle'];

	$args = array(
        'numberposts' => $num_posts,
        'order' => 'DESC',
        'orderby' => 'date'
    );
	$postslist = get_posts( $args );


	// print_r($colors_for_tags);
?>

<section class="news-scroll">
    <div class="swiper-wrapper">
        <?php
            foreach ($postslist as $post) : setup_postdata($post);

                if ( get_the_post_thumbnail() ) :
                    $thumb = get_the_post_thumbnail_url($post,'thumb');
                else :
                    $thumb = get_template_directory_uri() . '/assets/images/placeholder.png';
                endif;
            
        ?>
            <div class="news-block swiper-slide">
                <div class="featured-thumbnail">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>

                <div class="post-content">
                    <p class="subtitle"><?php echo $subtitle; ?></p>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <p class="posted-on"><?php the_time('d/m/Y'); ?></p>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php echo esc_url( get_permalink($post->ID) ); ?>" class="fv-button">Read More</a>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <div class="slide-control">
        <div class="slide-navigation">
            <div class="button-prev"><span>Previous</span></div>
            <div class="button-next"><span>Next<span></div>
        </div>
        <div class="slide-pagination"></div>
    </div>
</section>