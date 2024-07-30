<section class="newsletter">
    <div class="section-content">
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
            
        </div>
    </div>
</section>