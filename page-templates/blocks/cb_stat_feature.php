<section class="stats has-tile-bg py-5">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <h2 class="underline"><?=get_field('title')?></h2>
            </div>
            <div class="col-md-6">
                <p><?=get_field('intro')?></p>
                <div class="stats__stat_slider">
                    <?php
                    while (have_rows('stats')) {
                        the_row();
                        $endval = get_sub_field('number');
                        $endval = preg_replace('/,/', '.', $endval);
                        $decimals = strlen(substr(strrchr($endval, "."), 1));
                        ?>
                    <div class="stats__container">
                        <div class="stats__inner">
                            <div class="stats__stat">
                                <?=get_sub_field('prefix')?>
                                <?=do_shortcode("[countup start='0' end='{$endval}' decimals='{$decimals}' duration='3' scroll='true']")?>
                                <?=get_sub_field('suffix')?>
                            </div>
                            <div class="stats__detail">
                                <?=get_sub_field('description')?>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script>
jQuery(function($){
    $('.stats__stat_slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        pauseOnHover: true,
        cssEase: 'linear',
        arrows: false,
        dots: false,
    });
});
</script>
    <?php
}, 9999);