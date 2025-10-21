<?php
/**
 * FAQ Block Template.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;

$faq_id = $block['anchor'] ?? null;
?>
<section class="faq_block py-5" id="<?= esc_attr( $faq_id ); ?>">
    <div class="container-xl">
        <?php
        if ( get_field( 'faq_title' ) ?? null ) {
            ?>
        <h2><?= esc_html( get_field( 'faq_title' ) ); ?></h2>
            <?php
        }

        $accordion = random_str( 5 );

        echo '<div class="faq_block__inner">';

        echo '<div itemscope="" itemtype="https://schema.org/FAQPage" id="accordion' . esc_attr( $accordion ) . '" class="accordion accordion-flush">';
        $counter   = 0;
        $show      = '';
        $collapsed = 'collapsed';
        while ( have_rows( 'faqs' ) ) {
            the_row();
            $ac = $accordion . '_' . $counter;
            ?>
            <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion-item">
                <div class="accordion-head accordion-collapse <?= esc_attr( $collapsed ); ?>" itemprop="name" data-bs-toggle="collapse" id="heading_<?= esc_attr( $ac ); ?>" data-bs-target="#c<?= esc_attr( $ac ); ?>" role="button" aria-expanded="true" aria-controls="c<?= esc_attr( $ac ); ?>">
                    <div class=""><?= esc_html( get_sub_field( 'question' ) ); ?></div>
                </div>
                <div class="collapse <?= esc_attr( $show ); ?>" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="c<?= esc_attr( $ac ); ?>" aria-labelledby="heading_<?= esc_attr( $ac ); ?>" data-bs-parent="#accordion<?= esc_attr( $accordion ); ?>">
                    <div itemprop="text" class="faq__answer">
                        <p><?= wp_kses_post( get_sub_field( 'answer' ) ); ?></p>
                    </div>
                </div>
            </div>
            <?php
            ++$counter;
            $show      = '';
            $collapsed = 'collapsed';
        }
        echo '</div>';
        ?>
    </div>
</section>