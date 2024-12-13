<section class="newsletter">
    <div class="section-content">

        <div class="foxy-news">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foxy-mid.png" alt="Here comes Foxy!"
                width="301" height="360"
                loading="lazy" class="newsletter-foxy"
            >
        </div>

        <div class="headlines">
            <p class="subtitle">Foxy Voxel</p>
            <h1 class="title">
                Official<br>
                Newsletter
            </h1>
        </div>

        <div class="copy">

            <div class="intro-copy">
                <p>
                    Get all the latest news and updates direct to your inbox. We’ll not send you any spam, worry not!
                </p>
            </div>

            <p>
                <strong>Sign up here:</strong>
            </p>
            <?php /*
            <form class="newsletter-subscribe">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="email address…">
                <button type="submit" class="fv-button">Subscribe</button>
            </form>
            */ ?>
            <?php // [forminator_form id="209"]
                echo do_shortcode( '[forminator_form id="209"]' );
            ?>

            <?php /*
            <form action="https://foxyvoxel.us14.list-manage.com/subscribe/post?u=81a4309eafd0990394b756d4a&amp;id=8478369b9a&amp;f_id=007893e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self" novalidate="">
            <div id="mc_embed_signup_scroll" class="signup">
                <div class="mc-field-group">
                    <label for="mce-EMAIL" class="hidden">
                        Email Address <span class="asterisk">*</span>
                    </label>
                    <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="" placeholder="E.g. vulpes@foxyvoxel.io">
                    <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">
                        Go Go Go!
                    </button>
                </div>

                <div id="mce-responses" class="clear foot">
                    <div class="response" id="mce-error-response" style="display: none;"></div>
                    <div class="response" id="mce-success-response" style="display: none;"></div>
                </div>
                <div aria-hidden="true" style="position: absolute; left: -5000px;">
                  <input type="text" name="b_81a4309eafd0990394b756d4a_8478369b9a" tabindex="-1" value="">
                </div>
              </div>
            </form>
            */ ?>
            
        </div>
    </div>
</section>