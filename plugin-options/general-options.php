<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


$is_wishlist_enabled    =   defined( 'YITH_WCWL' );

$settings   =   array(

    'general'   =>  array(
        'section_save_for_later_settings' =>  array(
            'name'  => __('General Settings', 'ywsfl'),
            'type'  =>  'title',
            'id'    =>  'ywsfl_section_general_start'
        ),

        'text_add_from_list' =>  array(
            'name'      =>  __('"Save for Later" text', 'ywsfl'),
            'type'      =>  'text',
            'default'   =>  __('Save for Later', 'ywsfl'),
            'std'       =>  __('Save for Later', 'ywsfl'),
            'id'        =>  'ywsfl_text_add_button',
            'desc_tip'  =>  __('You can set the text for your "Save for Later" link', 'ywsfl')
        ),

        'save_for_later_page'   =>  array(
            'name'  =>  __('Save for Later page', 'ywsfl'),
            'type'  =>  'text',
            'default'   =>  __('Save for Later'),
            'std'       =>  'Save for Later',
            'desc'      =>  __('This page contains the [yith_wsfl_saveforlater] shortcode.<br> You can use this shortcode in other pages!.', 'ywsfl'),
            'id'        => 'ywsfl_page_name',
            'custom_attributes' => array( 'readonly'=>'readonly' )
        ),

        'general_settings_end'     => array(
            'type' => 'sectionend',
            'id'   => 'ywsfl_section_general_end'
        )

    )

);

return apply_filters( 'ywsfl_general_settings' , $settings );