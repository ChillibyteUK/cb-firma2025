<?php
/**
 * Team Slider Template
 *
 * This template displays a team slider section with team member details.
 *
 * @package cb-firma2025
 */

?>
<section class="team_slider py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="row g-4">
                    <div class="col-2">
                        <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/device-primary.svg' ); ?>" alt="">
                    </div>
                    <div class="col-10">
                        <h2 class="mb-4 underline">
                            <?= esc_html( get_field( 'title' ) ); ?>
                        </h2>
                        <div data-aos="fade">
                            <p><?= esc_html( get_field( 'content' ) ); ?></p>
                            <a class="wp-block-button__link" href="/our-team/">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="team_slider__slider splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php

							$team = get_field( 'teams' );

							$args = array(
								'post_type'      => 'people',
								'posts_per_page' => -1,
							);

							if ( ! empty( $team ) ) {
								$args['tax_query'] = array(
									array(
										'taxonomy' => 'teams',
										'field'    => 'id',
										'terms'    => $team,
									),
								);
							}

                            $q = new WP_Query( $args );

                        	while ( $q->have_posts() ) {
	                            $q->the_post();
    	                        $slug = acf_slugify( get_the_title() );
                            	?>
                                <li class="team_slider__card splide__slide">
                                    <a href="<?= esc_url( get_the_permalink( $q->ID ) ); ?>">
                                        <div class="team_slider__card_inner">
                                            <img class="team_slider__image"
												src="<?= esc_url( get_the_post_thumbnail_url( $q->ID, 'large' ) ); ?>"
												alt="<?= esc_html( get_the_title() ); ?>">
                                            <h3 class="team_slider__name"><?= esc_html( get_the_title() ); ?></h3>
                                            <div class="team_slider__role"><?= esc_html( get_field( 'role', get_the_ID() ) ); ?></div>
                                        </div>
                                    </a>
                                </li>
                            	<?php
                        	}
                        	wp_reset_postdata();
                        	?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
add_action(
	'wp_footer',
	function () {
    	?>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {
		new Splide('.team_slider__slider', {
			type: 'loop',
			perPage: 3, // Show 3 slides at a time
			perMove: 1, // Move 1 slide per scroll
			autoplay: false,
			pauseOnHover: true,
			pagination: false, // Show dots
			arrows: false, // Hide next/prev buttons
			breakpoints: {
				992: {
					perPage: 2
				}, // Show 2 slides on tablets
				768: {
					perPage: 1
				} // Show 1 slide on mobile
			}
		}).mount();
	});
</script>
		<?php
	},
	9999
);
