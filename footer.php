<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-4">
    <div class="container-xl pb-4">
        <div class="row pb-4">
            <div class="col-sm-3 mb-2 order-1">
                <a href="<?=get_home_url()?>"><img
                        src="<?=get_stylesheet_directory_uri()?>/img/firma-logo--wo.svg"
                        alt="Firma Partners" class="logo img-fluid mb-4"></a>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2 order-3 order-lg-2 pt-4">
                <div class="footer__title">Contact</div>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-phone-alt"></i></span> <a
                            href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a>
                    </li>
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span> <a
                            href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a>
                    </li>
                    <li><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span><?=get_field('contact_address', 'options')?></li>
                </ul>
                <?=do_shortcode('[social_icons class="fs-500"]')?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2 order-4 order-lg-3 pt-4">
                <div class="footer__title">Services</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu1')); ?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2 order-4 order-lg-3 pt-4">
                <div class="footer__title">Extra</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu2')); ?>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container-xl">
            <div>&copy; <?=date('Y')?> Firma Partners Limited.
            </div>
            <div class="colophon__links">
                <a href="/privacy/">Privacy Policy</a> |
                <a href="/cookies/">Cookie Preferences</a>
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                    title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
?>
</body>

</html>