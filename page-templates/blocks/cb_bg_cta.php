<?php
$img = get_stylesheet_directory_uri() . '/img/cta-bg.jpg';
$l = get_field('cta') ?: ['url' => '/contact-us/', 'title' => 'Contact us'];
$title = get_field('title') ?: 'Ready to elevate your real estate ventures?';
$content = get_field('content') ?: 'Get in touch with use today and let\'s craft a tailored financial stragetgy.';
?>
<section class="bg_cta py-5" style="background-image:url(<?=$img?>)">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="underline mb-4"><?=$title?></h2>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mb-4"><?=$content?></div>
                <a href="<?=$l['url']?>" class="wp-block-button__link"><?=$l['title']?></a>
            </div>
        </div>
    </div>
</section>