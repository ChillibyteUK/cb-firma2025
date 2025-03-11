<?php
/**
 * Template Name: Blog Index
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$img = get_the_post_thumbnail_url(get_option('page_for_posts'), 'full');
?>
<main id="main">
<section class="hero d-flex <?=$class?>" style="background-image:url(<?=$img?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row g-4">
            <div class="col-md-6">
                <h1 data-aos="fade">Latest Insights</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-xl py-5">
        <div class="row g-4">
            <?php
            $w = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'publish_date',
                'order' => 'DESC',
            ));
while ($w->have_posts()) {
    $w->the_post();
    $categories = get_the_category();
    ?>
                <div class="col-md-6 col-lg-4 index_blog">
                    <a class="index_blog__card" href="<?=get_the_permalink()?>">
                        <img class="index_blog__image" src="<?=get_the_post_thumbnail_url($w->ID, 'large')?>">
                        <div class="index_blog__content">
                            <h2 class="index_blog__title"><?=get_the_title()?></h2>
                            <div class="index_blog__excerpt"><?=wp_trim_words(get_the_content(), 30)?></div>
                            <div class="index_blog__date"><?=get_the_date('jS F, Y', $w->ID)?></div>
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
require_once('page-templates/blocks/cb_bg_cta.php');
echo '</main>';

get_footer();
