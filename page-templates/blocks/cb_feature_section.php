<?php
$img = wp_get_attachment_image_url(get_field('background'), 'full');// ?? null;
?>
<section class="feature_section" style="background-image:url(<?=$img?>);">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <h2 class="underline mb-4">
                    <?=get_field('title')?>
                </h2>
            </div>
            <div class="col-md-6" data-aos="fade">
                <?=get_field('content')?>
            </div>
        </div>
    </div>
</section>