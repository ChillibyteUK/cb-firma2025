<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'                => 'cb_video_hero', 
            'title'               => __('CB Video Hero'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_video_hero.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_latest_insights', 
            'title'               => __('CB Latest Insights'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_latest_insights.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));

        acf_register_block_type(array(
            'name'				=> 'cb_hero',
            'title'				=> __('CB Hero'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_hero.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_feature_section',
            'title'				=> __('CB Feature Section'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_feature_section.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_services_feature',
            'title'				=> __('CB Services Feature'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_services_feature.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_text_image_feature',
            'title'				=> __('CB Text/Image Feature'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_text_image_feature.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_testimonial_slider',
            'title'				=> __('CB Testimonial Slider'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_testimonial_slider.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_bg_cta',
            'title'				=> __('CB Image CTA'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_bg_cta.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_team_slider',
            'title'				=> __('CB Team Slider'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_team_slider.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_team_detail',
            'title'				=> __('CB Team Detail'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_team_detail.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_stat_feature',
            'title'				=> __('CB Stat Feature'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_stat_feature.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_service_index',
            'title'				=> __('CB Service Index'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_service_index.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_contact',
            'title'				=> __('CB Contact'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_contact.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/columns') {
        // $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_heading';
    }
    // if ( $name == 'core/button' ) {
    //     $args['render_callback'] = 'modify_core_buttons';
    // }
    // if ( $name == 'core/quote' ) {
    //     $args['render_callback'] = 'modify_core_quote';
    // }

    // echo '<pre>' . $name . '</pre>';

    return $args;
}

function modify_core_add_container($attributes, $content)
{
    ob_start();
    // $class = $block['className'];
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_heading($attributes, $content)
{
    ob_start();
    $id = strtolower(wp_strip_all_tags($content));
    $id = cbslugify($id);
    ?>
<div class="container-xl" id="<?=$id?>">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}
/*

function modify_core_buttons($attributes, $content) {
    ob_start();

    $btn = $content;

    preg_match('/class="wp-block-button (.*?)"/', $btn, $class);

    preg_match('/href="(.*?)"/', $btn, $link);

    preg_match('/target="(.*?)" rel="(.*?)"/', $btn, $target);

    preg_match('/<a.*?>(.*?)<\/a>/', $btn, $label);

    ?>
    <!-- core/buttons -->
    <div class="container-xl clearfix mb-4"><a class="btn <?=$class[1]?>" href="<?=$link[1]?>" target="<?=$target[1]?>" rel="<?=$target[2]?>"><?=$label[1]?></a></div>
    <?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_quote($attributes, $content) {
    ob_start();

    ?>
    <!-- wp_quote -->
    <div class="container-xl">
        <div class="wp-block-quote--cb my-4 w-md-75 mx-auto">
            <div class="overlay"></div>
            <?=$content?>
        </div>
    </div>
    <?php

    $content = ob_get_clean();
    return $content;
}

*/
?>