<?php
/**
 * Template for displaying single press releases.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
$img = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'full' );
?>
<main id="main">
<section class="hero d-flex <?= esc_attr( $class ); ?>" style="background-image:url(<?= esc_url( $img ); ?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row g-4">
            <div class="col-md-6">
                <h1 data-aos="fade"><?= esc_html( get_the_title() ); ?></h1>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-xl py-5">
		<section class="breadcrumbs container-xl mt-2">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}
			?>
		</section>
		<article class="text_image_feature">
			<div class="row g-5">
				<div class="col-lg-4 text_image_feature__container">
					<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'text_image_feature__image' ) ); ?>
				</div>

				<div class="col-md-8 text_image_feature__content">
					<h2 class="mb-4">
						<?= esc_html( get_field( 'role' ) ); ?>
					</h2>
					<p data-aos="fade" class="mb-4"><?= wp_kses_post( get_field( 'biography' ) ); ?></p>
					<?php
					if ( get_field( 'linkedin_profile' ) ) {
						?>
					<a href="<?= esc_url( get_field( 'linkedin_profile' ) ); ?>" target="_blank" class="wp-block-button__link">LinkedIn</a>
						<?php
					}
					?>
				</div>
			</div>
		</article>
    </div>
	<?php
	get_template_part( 'page-templates/blocks/cb_bg_cta' );
	?>
</main>
<?php
get_footer();