<section class="contact">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <ul class="fa-ul">
                    <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-phone has-accent-400-color"></i></span> <a href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a></li>
                    <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-envelope has-accent-400-color"></i></span> <a href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a></li>
                    <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-map-marker-alt has-accent-400-color"></i></span> <?=get_field('contact_address', 'options')?></li>
                </ul>
            </div>
            <div class="col-md-6 contact__container">
                <?=wp_get_attachment_image(get_field('image'), 'full', false, ['class' => 'contact__image'])?>
                <div class="contact__overlay"></div>
            </div>
            <div class="col-12">
                <h2>Send a Message</h2>
                <?=do_shortcode('[gravityform id="2" title="false"]')?>
            </div>
        </div>
    </div>
    <iframe src="<?=get_field('maps_url', 'options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>