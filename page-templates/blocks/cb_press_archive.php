<?php
/**
 * Press Archive Block Template
 *
 * Displays a list of press posts in a card layout.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'press',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>
<div class="container-xl py-5">
	<div class="row card-group">
		<?php
		while ( $q->have_posts() ) {
			$q->the_post();
			?>
		<div class="card col-md-4 mb-4 d-flex flex-column justify-content-between">
			<div class="shadow h-100 d-flex flex-column">
				<?php
				$image = get_field( 'image', get_the_ID() );
				if ( ! empty( $image ) ) {
					?>
					<a href="<?= esc_url( get_the_permalink() ); ?>"><img src="<?= esc_url( $image['url'] ); ?>" alt="<?= esc_attr( $image['alt'] ); ?>" class="card-img-top" /></a>
					<?php
				}
				?>
				<div class="card-body p-3 d-flex flex-column justify-content-between h-100">
					<h2 class="card-title h4"><?= esc_html( get_the_title() ); ?></h2>
					<div class="mb-2" style="font-size: 0.8rem"><?= get_the_date( 'jS F Y' ); ?></div>
					<p class="card-text"><?= wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?></p>
					<a href="<?= esc_url( get_the_permalink() ); ?>" class="text-center btn d-block text-white p-2">Read more</a>
				</div>
			</div>
		</div>
			<?php
		}
		?>
	</div>
</div>