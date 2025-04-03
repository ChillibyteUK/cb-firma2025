<?php
/**
 * Contact Page Template
 *
 * This template displays the contact section with contact details and a map.
 *
 * @package cb-firma2025
 */

?>
<section class="contact">
    <div class="container-xl pb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="col-2">
                        <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/device-primary.svg' ); ?>" alt="">
                    </div>
                    <div class="col-10">
                        <h2 class="mb-4">
                            Contact Us
                        </h2>
                        <ul class="fa-ul">
                            <li class="mb-4">
								<span class="fa-li"><i class="fa-solid fa-phone has-accent-400-color"></i></span>
								<a href="<?= esc_url( 'tel:' . parse_phone( get_field( 'contact_phone', 'options' ) ) ); ?>"><?= esc_html( get_field( 'contact_phone', 'options' ) ); ?></a>
							</li>
                            <li class="mb-4">
								<span class="fa-li"><i class="fa-solid fa-envelope has-accent-400-color"></i></span>
								<a href="<?= esc_url( 'mailto:' . get_field( 'contact_email', 'options' ) ); ?>"><?= esc_html( get_field( 'contact_email', 'options' ) ); ?></a>
							</li>
                            <li class="mb-4">
								<span class="fa-li"><i class="fa-solid fa-map-marker-alt has-accent-400-color"></i></span>
								<?= wp_kses_post( get_field( 'contact_address', 'options' ) ); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 contact__container">
				<iframe src="<?= esc_url( get_field( 'maps_url', 'options' ) ); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	        </div>
        </div>
    </div>
</section>
