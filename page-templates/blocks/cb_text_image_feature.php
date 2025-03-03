<?php
$background = get_field('background') ?: '';
$overlay = get_field('overlay') ?: '';
$underline = !empty(get_field('underline')[0]) ? 'underline' : '';
$pattern = $overlay ? ($background == 'Blue' ? 'text_image_feature__overlay--wo' : 'text_image_feature__overlay') : null;
$device = !empty(get_field('device')[0]) ?: '';

$text = '';
$dd = 'device-primary.svg';

if ($background == 'Blue') {
    $text = 'text-white';
    $background = 'py-5 has-primary-400-background-color';
    $dd = 'device-wo.svg';
}

// var_dump($background);
// var_dump($underline);
// var_dump($overlay);
// var_dump($pattern);
// var_dump($device);

$order_left = (get_field('order') == 'text') ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$order_right = (get_field('order') == 'text') ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
?>
<section class="text_image_feature <?=$background?>">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-md-6 d-flex flex-column justify-content-center text_image_feature__content <?=$order_left?>">
            <?php
                if ($device) {
                    ?>
                    <div class="row g-4">
                        <div class="col-2">
                            <img src="<?=get_stylesheet_directory_uri()?>/img/<?=$dd?>" alt="">
                        </div>
                        <div class="col-10">
                            <h2 class="mb-4 <?=$text?> <?=$underline?>">
                                <?=get_field('title')?>
                            </h2>
                            <p data-aos="fade" class="mb-4 <?=$text?>"><?=get_field('content')?></p>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h2 class="mb-4 <?=$text?> <?=$underline?>">
                        <?=get_field('title')?>
                    </h2>
                    <p data-aos="fade" class="mb-4 <?=$text?>"><?=get_field('content')?></p>
                    <?php
                }
                ?>
                <?php
                if(get_field('cta')) {
                    $l = get_field('cta');
                    ?>
                <a href="<?=$l['url']?>" class="wp-block-button__link"><?=$l['title']?></a>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-6 <?=$order_right?> text_image_feature__container">
                <?=wp_get_attachment_image(get_field('image'),'full',false,['class' => 'text_image_feature__image'])?>
                <div class="<?=$pattern?>"></div>
            </div>
        </div>
    </div>
</section>