<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$img = wp_get_attachment_image_url(get_field('recent_deals_hero','options'), 'full');// ?? null;

get_header();
?>
<main id="main" class="caseStudies">
<header class="hero d-flex" style="background-image:url(<?=$img?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <h1 class="">
                    Recent Deals
                </h1>
            </div>
        </div>
    </div>
</header>
    <div class="container-xl py-5">
        <div class="row g-4">
            <?php
    while (have_posts()) {
        the_post();
        ?>
        <div class="col-md-6 col-lg-4">
            <a class="deal" href="<?=get_the_permalink()?>">
                <div class="deal__header">
                    <img class="deal__logo" src="<?=get_stylesheet_directory_uri()?>/img/firma-logo.svg" alt="" width=100 height=100>
                    <div class="deal__intro">Financial Intermediary For</div>
                </div>
                <div class="deal__info">
                    <div class="deal__title"><?=get_field('deal_title')?></div>
                    <div class="deal__value">&pound;<?=number_format(get_field('deal_value'))?></div>
                    <div class="deal__description_pre"><?=get_field('description_pre_title')?></div>
                    <div class="deal__description"><?=get_field('description')?></div>
                    <div class="deal__finance_pre"><?=get_field('finance_pre_title')?></div>
                    <div class="deal__finance"><?=get_field('finance_detail')?></div>
                </div>
            </a>
        </div>
        <?php
    }
?>
        </div>
    </div>
    <?php
        get_template_part('page-templates/blocks/cb_bg_cta');
        ?>
</main>
<?php
get_footer();
?>