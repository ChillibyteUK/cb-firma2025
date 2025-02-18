<section class="team_slider py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-4">
                <h2 class="underline">Meet the Team</h2>
                <div data-aos="fade">
                    <p>Meet the driving force behind Firma Partners and discover the collective strength that powers our journey towards your success.</p>
                    <a class="wp-block-button__link" href="/our-team/">Find out more</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="team_slider__slider">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'people',
            'posts_per_page' => -1
        ));
        while ($q->have_posts()) {
            $q->the_post();
            $slug = acf_slugify(get_the_title());
            ?>
    <a class="team_slider__card" href="/our-team/#<?=$slug?>">
        <div class="team_slider__card_inner">
            <img class="team_slider__image" src="<?=get_the_post_thumbnail_url($q->ID,'large')?>" alt="<?=get_the_title()?>">
            <h3 class="team_slider__name"><?=get_the_title()?></h3>
            <div class="team_slider__role"><?=get_field('role',get_the_ID())?></div>
        </div>
    </a>
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
    $('.team_slider__slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        pauseOnHover: true,
        cssEase: 'linear',
        arrows: false,
        dots: true,
    });
});
</script>
    <?php
}, 9999);