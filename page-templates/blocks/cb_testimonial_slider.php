<section class="testimonials py-5 has-tile-bg has-tile-bg--grey">
    <div class="container-xl">
        <div class="testimonials__slider splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $q = new WP_Query( array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => -1
                    ));
                    while ($q->have_posts()) {
                        $q->the_post();
                        ?>
                <li class="testimonials__testimonial splide__slide">
                    <div class="testimonials__body mx-auto">
                        <div class="testimonials__content mb-2"><?=get_field('testimonial',get_the_ID())?></div>
                        <div class="testimonials__cite">
                            <div><strong><?=get_the_title()?></strong></div>
                            <div><?=get_field('position',get_the_ID())?>, <?=get_field('company',get_the_ID())?></div>
                        </div>
                    </div>
                </li>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function () {
    new Splide('.testimonials__slider', {
        type: 'fade', // Enables the fade effect
        autoplay: true,
        interval: 4000,
        pauseOnHover: true,
        rewind: true, // Loops back to the first slide
        pagination: false,
        arrows: false, // Hides next/prev arrows (can be enabled if needed)
    }).mount();
});
</script>
    <?php
}, 9999);