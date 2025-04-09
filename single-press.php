<?php
/**
 * Template for displaying single press releases.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
$img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<main id="main" class="single_press">
    <div class="container-xl mt-5 py-5">
		<section class="breadcrumbs container-xl mt-2">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}
			?>
		</section>
		<article>
			<h1><?= esc_html( get_the_title() ); ?></h1>
			<?= wp_kses_post( get_the_content() ); ?>
		</article>
    </div>
	<?php
	get_template_part( 'page-templates/blocks/cb_bg_cta' );
	?>
</main>
<?php
get_footer();