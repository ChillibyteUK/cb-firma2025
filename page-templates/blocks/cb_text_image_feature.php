<?php
/**
 * Template for the Text Image Feature block.
 *
 * @package cb-firma2025
 */

$background  = get_field( 'background' ) ? get_field( 'background' ) : '';
$overlay     = get_field( 'overlay' ) ? get_field( 'overlay' ) : '';
$underline   = ! empty( get_field( 'underline' )[0] ) ? 'underline' : '';
$pattern     = $overlay ? ( 'Blue' === $background ? 'text_image_feature__overlay--wo' : 'text_image_feature__overlay' ) : null;
$device      = ! empty( get_field( 'device' )[0] ) ? get_field( 'device' )[0] : '';
$text_colour = '';
$dd          = 'device-primary.svg';

if ( 'Blue' === $background ) {
    $text_colour = 'text-white';
    $background  = 'py-5 has-primary-400-background-color';
    $dd          = 'device-wo.svg';
}

// phpcs:disable
// var_dump($background);
// var_dump($underline);
// var_dump($overlay);
// var_dump($pattern);
// var_dump($device);
// phpcs:enable

$order_left  = ( get_field( 'order' ) === 'text' ) ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$order_right = ( get_field( 'order' ) === 'text' ) ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
?>
<section class="text_image_feature <?= esc_attr( $background ); ?>">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-md-6 d-flex flex-column justify-content-center text_image_feature__content <?= esc_attr( $order_left ); ?>">
            <?php
			if ( $device ) {
				?>
				<div class="row g-4">
					<div class="col-2">
						<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/' . $dd ); ?>" alt="">
					</div>
					<div class="col-10">
						<h2 class="mb-4 <?= esc_attr( trim( "$text_colour $underline" ) ); ?>">
							<?= esc_html( get_field( 'title' ) ); ?>
						</h2>
						<p data-aos="fade" class="mb-4 <?= esc_attr( $text_colour ); ?>"><?= wp_kses_post( get_field( 'content' ) ); ?></p>
					</div>
				</div>
				<?php
			} else {
				?>
				<h2 class="mb-4 <?= esc_attr( trim( "$text $underline" ) ); ?>">
					<?= esc_html( get_field( 'title' ) ); ?>
				</h2>
				<p data-aos="fade" class="mb-4 <?= esc_attr( $text ); ?>"><?= wp_kses_post( get_field( 'content' ) ); ?></p>
				<?php
			}
			?>
			<?php
			if ( get_field( 'cta' ) ) {
				$l = get_field( 'cta' );
				?>
			<a href="<?= esc_url( $l['url'] ); ?>" class="wp-block-button__link"><?= esc_html( $l['title'] ); ?></a>
				<?php
			}
			?>
            </div>
            <div class="col-lg-6 <?= esc_attr( $order_right ); ?> text_image_feature__container">
                <?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'text_image_feature__image' ) ); ?>
                <div class="<?= esc_attr( $pattern ); ?>"></div>
            </div>
        </div>
    </div>
</section>