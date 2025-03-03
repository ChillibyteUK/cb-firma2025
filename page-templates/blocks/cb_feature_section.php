<?php
$background = get_field('background') ?: '';
$underline = !empty(get_field('underline')[0]) ? 'underline' : '';
$pattern = !empty(get_field('pattern')[0]) ?: '';
$pbg = $pattern ? ($background == 'Blue' ? 'has-tile-bg has-tile-bg--wo has-tile-bg--right' : 'has-tile-bg has-tile-bg--right') : null;
$device = get_field('device')[0] ?: '';

$text = '';
$dd = 'device-primary.svg';
// $pbg = $pattern ?

if ($background == 'Blue') {
    $text = 'text-white';
    $background = 'py-5 has-primary-400-background-color';
    $dd = 'device-wo.svg';
}

?>
<section class="feature_section <?=$background?> <?=$pbg?>">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-md-6">
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
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h2 class="mb-4 <?=$text?> <?=$underline?>">
                        <?=get_field('title')?>
                    </h2>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6 <?=$text?>" data-aos="fade">
                <?=get_field('content')?>
            </div>
        </div>
    </div>
</section>