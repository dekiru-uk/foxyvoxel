<?php if( have_rows('social_networks', 'option') ):
    echo '<ul class="social-links">';

    while( have_rows('social_networks', 'option') ): the_row();
        $service = get_sub_field('name');
        $icon = get_sub_field('icon');
        $url = get_sub_field('url');

        if ($icon != '') :
            echo '<li class="platform"><a href="' . $url . '">';
            echo '<img src="' . $icon['url'] . '" alt="' . $service . '" loading="lazy"><span>' . $service . '</span>';
            echo '</a></li>';
        endif;

    endwhile;
    echo '</ul>';
endif; ?>