<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'radios_register_required_plugins' );

function radios_register_required_plugins() {

    $plugins = array(
        array(
			'name'               => esc_html__('Radios Tools', 'radios'),
			'slug'               => 'radios-tools',
			'source'             => get_template_directory() . '/lib/plugins/radios-tools.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
        array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => true,
        ),
       
        array(
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
            'required' => true,
        ),
        array(
            'name'     => 'YITH WooCommerce Wishlist',
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
        ),
        array(
            'name'     => 'YITH WooCommerce Compare',
            'slug'     => 'yith-woocommerce-compare',
            'required' => true,
        ),
        array(
            'name'     => 'Side Cart Woocommerce (Ajax)',
            'slug'     => 'side-cart-woocommerce',
            'required' => true,
        ),
       
        array(
            'name'     => 'Variation Swatches for WooCommerce',
            'slug'     => 'woo-variation-swatches',
            'required' => true,
        ),
        
        array(
            'name'     => esc_html__('SVG Support', 'radios'),
            'slug'     => 'svg-support',
            'required' => false,
        ),

        array(
            'name'     => esc_html__('Contact Form 7', 'radios'),
            'slug'     => 'contact-form-7',
            'required' => false,
        ),

        array(
            'name'     => esc_html__('MC4WP: Mailchimp for WordPress', 'radios'),
            'slug'     => 'mailchimp-for-wp',
            'required' => false,
        ),

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'radios' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'Breadcrumb NavXT', 'radios' ),
            'slug'     => 'breadcrumb-navxt',
            'required' => false,
        )

    );

    $config = array(
        'id'           => 'radios',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );

    tgmpa( $plugins, $config );
}
