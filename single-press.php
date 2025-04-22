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
			<div class="row">
				<div class="col-md-4 order-md-2">
                    <?php 
                    $image = get_field('image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid mb-3" />
                    <?php endif; ?>
				</div>
				<div class="col-md-8 order-md-1">
					<h1><?= esc_html( get_the_title() ); ?></h1>
					<div class="mb-2 fs-7" style="font-size: 0.8rem;"><?php echo get_the_date('jS F Y'); ?></div>
					<?= wp_kses_post( get_the_content() ); ?>
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