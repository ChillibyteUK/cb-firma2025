<?php
$order_left = (get_field('order') == 'text') ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$order_right = (get_field('order') == 'text') ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
?>
<section class="text_image_feature">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-md-6 d-flex flex-column justify-content-center text_image_feature__content <?=$order_left?>">
                <h2 class="underline mb-4"><?=get_field('title')?></h2>
                <p data-aos="fade" class="mb-4"><?=get_field('content')?></p>
                <?php
                if(get_field('cta')) {
                    $l = get_field('cta');
                    ?>
                <a href="<?=$l['url']?>" class="wp-block-button__link"><?=$l['title']?></a>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-6 <?=$order_right?>">
                <div class="text_image_feature__image" style="background-image:url(<?=wp_get_attachment_image_url(get_field('image'),'full')?>)"></div>
            </div>
        </div>
    </div>
</section>