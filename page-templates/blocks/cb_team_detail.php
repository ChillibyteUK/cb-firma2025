<?php
/**
 * Team Detail Template
 *
 * This template displays the details of team members.
 *
 * @package cb-firma2025
 */

$teams = get_field( 'team' );
?>
<section class="team_detail">
    <div class="container-xl pt-4 pb-5">
		<div class="row g-4 w-md-75 mx-auto justify-content-center">
<?php
$args = array(
	'post_type'      => 'people',
	'posts_per_page' => -1,
	'tax_query'      => array(),
);

if ( ! empty( $teams ) ) {
    $args['tax_query'][] = array(
        'taxonomy' => 'teams',
        'field'    => 'term_id',
        'terms'    => $teams,
    );
}

$q = new WP_Query( $args );

while ( $q->have_posts() ) {
    $q->the_post();
    $slug = acf_slugify( get_the_title() );
    ?>
	<div class="col-md-6 col-lg-4">
        <a class="team_detail__card" id="<?= esc_attr( $slug ); ?>" href="<?= esc_url( get_permalink() ); ?>">
			<?= get_the_post_thumbnail( $q->ID, 'large', array( 'class' => 'team_detail__image' ) ); ?>
			<div>
				<h2 class="team_detail__name"><?= esc_html( get_the_title() ); ?></h2>
				<div class="team_detail__role"><?= esc_html( get_field( 'role', get_the_ID() ) ); ?></div>
			</div>
			<div class="wp-block-button__link mx-auto">View Bio</div>
		</a>
	</div>
	<?php
}
?>
    </div>
</section>