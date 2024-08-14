<?php

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function radios_theme_options_style() {

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'radios-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $css_output = '';
    $theme_color_1 = cs_get_option('theme-color-1'); 
    $theme_color_2 = cs_get_option('theme-color-2'); 
    $theme_color_3 = cs_get_option('theme-color-3'); 
    $theme_color_4 = cs_get_option('theme-color-4'); 
    $theme_color_5 = cs_get_option('theme-color-5'); 
    

    if(!empty($theme_color_1)){
        $css_output .= '       
        :root {
            --color-primary: '.esc_attr($theme_color_1).'
        }            
        ';
    }
    if(!empty($theme_color_2)){
        $css_output .= '       
        :root {
            --color-primary-2: '.esc_attr($theme_color_2).'
        }            
        ';
    }
    if(!empty($theme_color_3)){
        $css_output .= '       
        :root {
            --color-primary-3: '.esc_attr($theme_color_3).'
        }            
        ';
    }
    if(!empty($theme_color_4)){
        $css_output .= '       
        :root {
            --color-red: '.esc_attr($theme_color_4).'
        }            
        ';
    }
    if(!empty($theme_color_5)){
        $css_output .= '       
        :root {
            --color-primary-4: '.esc_attr($theme_color_5).'
        }            
        ';
    }

    
    wp_add_inline_style( 'radios-theme-custom-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'radios_theme_options_style' );
