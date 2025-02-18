<section class="testimonials py-5 has-tile-bg has-tile-bg--grey">
    <div class="container-xl">
        <div class="testimonials__slider">
            <?php
            $q = new WP_Query( array(
                'post_type' => 'testimonials',
                'posts_per_page' => -1
            ));
            while ($q->have_posts()) {
                $q->the_post();
                ?>
                <div class="testimonials__testimonial">
                    <div class="testimonials__body mx-auto">
                        <div class="testimonials__content mb-2"><?=get_field('testimonial',get_the_ID())?></div>
                        <div class="testimonials__cite">
                            <div><strong><?=get_the_title()?></strong></div>
                            <div><?=get_field('position',get_the_ID())?>, <?=get_field('company',get_the_ID())?></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
jQuery(function($){
    $('.testimonials__slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        pauseOnHover: true,
        cssEase: 'linear',
        fade: true,
        arrows: false,
        dots: true,
    });
});
</script>
    <?php
}, 9999);