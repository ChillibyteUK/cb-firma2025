<section class="contact">
    <div class="container-xl pb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="col-2">
                        <img src="<?=get_stylesheet_directory_uri()?>/img/device-primary.svg" alt="">
                    </div>
                    <div class="col-10">
                        <h2 class="mb-4">
                            Contact Us
                        </h2>
                        <ul class="fa-ul>
                            <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-phone has-accent-400-color"></i></span><a href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a></li>
                            <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-envelope has-accent-400-color"></i></span><a href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a></li>
                            <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-map-marker-alt has-accent-400-color"></i></span><?=get_field('contact_address', 'options')?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 contact__container">
                <?=wp_get_attachment_image(get_field('image'), 'full', false, ['class' => 'contact__image'])?>
                <div class="contact__overlay"></div>
            </div>
            <div class="col-12 col-md-8 offset-md-2">
                <h2>Send a Message</h2>
                <?=do_shortcode('[gravityform id="' . get_field('form_id') . '" title="false"]')?>
            </div>
        </div>
    </div>
</section>
<iframe src="<?=get_field('maps_url', 'options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>