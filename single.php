<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<main id="main" class="single_blog">
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);
    $sidebar = array();
    $after;
    ?>
    <section class="breadcrumbs container-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    </section>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9">
                <img src="<?=$img?>" alt="" class="single_blog__image">
                <h1 class="single_blog__title"><?=get_the_title()?></h1>
                <?php
                $count = estimate_reading_time_in_minutes( get_the_content(), 200, true, true );
                echo $count;

                foreach ($blocks as $block) {
                    // if ($block['blockName'] == 'core/heading') {
                    //     if (!array_key_exists('level', $block['attrs'])) {
                    //         $heading = strip_tags($block['innerHTML']);
                    //         $id = acf_slugify($heading);
                    //         echo '<a id="' . $id . '" class="anchor"></a>';
                    //         $sidebar[$heading] = $id;
                    //     }
                    // }
                    echo render_block($block);
                }
                ?>
                <div class="post-navigation mt-4 d-flex flex-wrap justify-content-between">
                    <?php 
                        previous_post_link('<div class="prev">%link</div>', '&larr; Previous'); 
                        next_post_link('<div class="next">%link</div>', 'Next &rarr;'); 
                    ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="h5 underline mb-4">Recent Posts</div>
                    <?php
            $r = new WP_Query(array(
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID())
            ));
            while ($r->have_posts()) {
                $r->the_post();
                ?>
                <a class="single_blog_card" href="<?=get_the_permalink()?>">
                    <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>" alt="" class="single_blog_card__image">
                    <h3 class="single_blog_card__title"><?=get_the_title()?></h3>
                    <div class="single_blog_card__date"><?=get_the_date('jS F, Y', $r->ID)?></div>
                </a>
                <?php
            }
            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once('page-templates/blocks/cb_bg_cta.php');
    ?>
</main>
<?php
get_footer();