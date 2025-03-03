<section class="services_feature has-tile-bg has-tile-bg--wo has-tile-bg--right py-5">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="underline mb-4">
                    <?=get_field('title')?>
                </h2>
                <p data-aos="fade" class="mb-4">
                    <?=get_field('content')?>
                </p>
                <?php
                if(get_field('cta')) {
                    $l = get_field('cta');
                    ?>
                <a href="<?=$l['url']?>"
                    class="wp-block-button__link"><?=$l['title']?></a>
                <?php
                }
                    ?>
            </div>
            <div class="col-lg-6">
                <div class="cards__grid" data-aos="fade">
                    <?php
                        $active = 'active';
                    while(have_rows('services')) {
                        the_row();
                        $s = acf_slugify(get_sub_field('service_name'));
                        ?>
                    <div class="card <?=$active?>">
                        <div class="card__title">
                            <?=get_sub_field('service_name')?>
                        </div>
                        <div class="card__content <?=$active?>">
                            <div>
                                <img src="<?=get_stylesheet_directory_uri()?>/img/icon--<?=$s?>.svg"
                                    alt="">
                                <?=get_sub_field('content')?>
                            </div>
                            <div class="card__link"><a
                                    href="<?=get_sub_field('link')['url']?>">Find
                                    out more</a></div>
                        </div>
                    </div>
                    <?php
                        $active = '';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>