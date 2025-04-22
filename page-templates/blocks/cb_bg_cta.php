<?php
/**
 * Background Call-to-Action Block Template
 *
 * This template renders a call-to-action section with a background image,
 * title, content, and a button link.
 *
 * @package cb-firma2025
 */

$img       = get_stylesheet_directory_uri() . '/img/cta-bg.jpg';
$l         = get_field( 'cta' ) ? get_field( 'cta' ) : array(
    'url'   => '/contact-us/',
    'title' => 'Contact us',
);
$cta_title = get_field( 'title' ) ? get_field( 'title' ) : 'Contact Us';
$content   = get_field( 'content' ) ? get_field( 'content' ) : 'Contact us to discuss how we can create a tailored lending strategy.';
?>
<section class="bg_cta py-5" style="background-image:url(<?= esc_url( $img ); ?>)">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="underline mb-4"><?= esc_html( $cta_title ); ?></h2>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mb-4"><?= wp_kses_post( $content ); ?></div>
                <a href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>" class="wp-block-button__link"><?= esc_html( $l['title'] ); ?></a>
            </div>
        </div>
    </div>
</section>