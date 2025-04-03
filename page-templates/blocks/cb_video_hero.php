<?php
/**
 * Video Hero Block Template
 *
 * This template renders the video hero block with optional title and subtitle.
 *
 * @package cb-firma2025
 */

$class = $block['className'] ?? null;
$mp4   = get_field( 'video_mp4' ) ?? null;
$webm  = get_field( 'video_webm' ) ?? null;
?>
<section class="video_hero">
    <video autoplay loop muted playsinline>
        <source src="<?= esc_url( $webm ); ?>" type="video/webm">
        <source src="<?= esc_url( $mp4 ); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row g-4">
            <div class="col-md-6">
                <h1 data-aos="fade">
                    <?= esc_html( get_field( 'title' ) ); ?>
                </h1>
                <?php
                if ( get_field( 'subtitle' ) ) {
                    ?>
                <div class="text-white" data-aos="fade"><?= wp_kses_post( get_field( 'subtitle' ) ); ?></div>
                    <?php
                }
				?>
            </div>
        </div>
    </div>
</section>


