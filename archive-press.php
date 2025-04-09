<?php
/**
 * Archive Deals Template
 *
 * This template is used to display the archive page for deals.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;

$img = wp_get_attachment_image_url( get_field( 'press_hero', 'options' ), 'full' );

get_header();
?>
<main id="main" class="press">
<header class="hero d-flex" style="background-image:url(<?= esc_url( $img ); ?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <h1 data-aos="fade">
                    Press
                </h1>
            </div>
        </div>
    </div>
</header>
    <div class="container-xl py-5">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
        <div class="press__row mb-5">
            <a class="press__link" href="<?= esc_url( get_the_permalink() ); ?>">
				<h2><?= esc_html( get_the_title() ); ?></h2>
				<div><?= wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?></div>
            </a>
        </div>
			<?php
		}
		?>
        </div>
    </div>
    <?php
	get_template_part( 'page-templates/blocks/cb_bg_cta' );
	?>
</main>
<?php
get_footer();
?>