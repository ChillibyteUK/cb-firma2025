<?php
/**
 * Template Name: Blog Index
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$img = get_the_post_thumbnail_url(get_option( 'page_for_posts' ),'full');
?>
<main id="main">
<section class="hero" style="background-image:url(<?=$img?>);">
    <div class="container-xl">
        <div>
            <div class="preTitle text-white">Read our latest posts</div>
            <h1>
                Blog
            </h1>
        </div>
    </div>
</section>
<section class="has-secondary-200-background-color mb-5">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-lg-9 order-2 order-lg-1">
                <div class="h2 text--black mb-4">Latest News</div>
                <div class="row g-4">
            <?php
            $w = new WP_Query( array (
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'orderby' => 'publish_date',
                'order' => 'DESC',
            ));
            while ($w->have_posts()) {
                $w->the_post();
                $categories = get_the_category();
                ?>
                <div class="col-md-6 index_blog">
                    <a class="index_blog__card" href="<?=get_the_permalink()?>">
                        <img class="index_blog__image" src="<?=get_the_post_thumbnail_url($w->ID, 'large')?>">
                        <div class="index_blog__content">
                            <?php
                            if ( ! empty( $categories ) ) {
                                ?>
                                <div class="index_blog__cat"><?=esc_html( $categories[0]->name )?></div>
                                <?php
                            }
                            ?>
                            <h2 class="index_blog__title pb-2"><?=get_the_title()?></h2>
                            <div class="d-flex flex-column">
                                <div class="index_blog__read"><?=estimate_reading_time_in_minutes(get_the_content(null, false, $w->ID), 200, true, false)?>m read</div>
                                <div class="index_blog__meta">
                                    <div class="index_blog__date"><?=get_the_date('jS F, Y', $w->ID)?></div>
                                    <div class="readmore">Read more</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            
            ?>
                    </div>
            </div>
            <div class="col-lg-3 order-1 order-lg-3 mb-4">
                <div class="index_blog__category">
                    <div class="h4 ff-title">By category</div>
                    <ul class="insights-nav d-none d-lg-block">
                    <?php
                        $categories = get_categories();
                    ?>
                        <li>
                            <a class="active" href="<?=get_post_type_archive_link( 'post' );?>">All</a>
                        </li>
                    <?php
                    foreach( $categories as $cat ) {
                        ?>
                        <li>
                            <a class="" href="<?=get_category_link( $cat->term_id )?>"><?=$cat->name?></a>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                    <div class="d-lg-none">
                        <select name="cat" id="category" class="form-select">
                            <option value="/blog/">All</option>
                            <?php
                            foreach( $categories as $cat ) {
                                ?>
                            <option value="<?=get_category_link( $cat->term_id )?>"><?=$cat->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$section = 0;
foreach (get_categories() as $c) {
    /*
    if ($section == 0) {
        ?>
<section class="py-5">
    <div class="container">
        <div class="shadow rounded-5 pb-5 heroContent bg-light">
            <?php
            $h = new WP_Query(array(
                'post_type' => 'page',
                'meta_query' => array(
                    array(
                        'key' => 'is_hero',
                        'value' => 'Yes',
                        'compare' => 'LIKE'
                    )
                )
            ));
            while ($h->have_posts()) {
                $h->the_post();
                ?>
                <div class="heroContent__post">
                    <a href="<?=get_the_permalink($h->ID)?>">
                        <div class="row bg-white">
                            <div class="col-md-4">
                                <div class="heroContent__image" style="background-image:url('<?=get_the_post_thumbnail_url($h->ID, 'large')?>'"></div>
                            </div>
                            <div class="col-md-8 heroContent__words"">
                                <h2><?=get_the_title($h->ID)?></h2>
                                <div class="heroContent__intro"><?=wp_trim_words(get_the_content($h->ID))?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
        <?php
    }
    */
    ?>
<section class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="h2 text--black mb-4"><?=$c->name?></div>
            <a href="<?=get_category_link($c->term_id)?>" class="view-all">View All</a>
        </div>
        <div class="row g-4">
        <?php
        $q = get_posts(array(
            'numberposts' => 4,
            'category' => $c->term_id
        ));
        foreach ($q as $p) {
            ?>
            <div class="col-lg-3 col-md-6 index_blog">
                <a class="index_blog__card" href="<?=get_the_permalink($p->ID)?>">
                    <img class="index_blog__image" src="<?=get_the_post_thumbnail_url($p->ID, 'large')?>">
                    <div class="index_blog__content">
                        <h2 class="fs-5 index_blog__title pb-2 mb-0"><?=get_the_title($p->ID)?></h2>
                        <div class="d-flex flex-column">
                            <div class="index_blog__read"><?=estimate_reading_time_in_minutes(get_the_content(null, false, $p->ID), 200, true, false)?>m read</div>
                            <div class="index_blog__meta">
                                <div class="index_blog__date"><?=get_the_date('jS F, Y', $p->ID)?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>
    <?php
    $section++;
}?>
    </div>
</div>
<?php

add_action('wp_footer', function(){
    ?>
<script>
(function($){
    $('.form-select').on('change',function(){
        window.location.href = this.value;
    });

    $('.heroContent').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true
    });

})(jQuery);
</script>
    <?php
},9999);

get_footer();