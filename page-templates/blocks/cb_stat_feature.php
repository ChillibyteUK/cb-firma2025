<?php
/**
 * Template for displaying the stats feature block.
 *
 * @package cb-firma2025
 */

?>
<section class="stats has-tile-bg py-5">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <h2 class="underline"><?= esc_html( get_field( 'title' ) ); ?></h2>
            </div>
            <div class="col-md-6">
                <p><?= wp_kses_post( get_field( 'intro' ) ); ?></p>
                <div class="stats__stat_slider splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
                            while ( have_rows( 'stats' ) ) {
                                the_row();
                                $endval   = get_sub_field( 'number' );
                                $endval   = preg_replace( '/,/', '.', $endval );
                                $decimals = strlen( substr( strrchr( $endval, '.' ), 1 ) );
                                ?>
                                <li class="stats__container splide__slide">
                                    <div class="stats__inner">
                                        <div class="stats__stat">
                                            <?= esc_html( get_sub_field( 'prefix' ) ); ?>
                                            <?= do_shortcode( "[countup start='0' end='{$endval}' decimals='{$decimals}' duration='3' scroll='true']" ); ?>
                                            <?= esc_html( get_sub_field( 'suffix' ) ); ?>
                                        </div>
                                        <div class="stats__detail">
                                            <?= wp_kses_post( get_sub_field( 'description' ) ); ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
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
document.addEventListener("DOMContentLoaded", function () {
    new Splide('.stats__stat_slider', {
        type: 'loop',
        autoplay: true,
        interval: 4000,
        pauseOnHover: true,
        arrows: false,
        pagination: false,
    }).mount();
});
</script>
    	<?php
	},
	9999
);
