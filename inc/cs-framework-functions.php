<?php

/**
 *
 * Get radios Theme options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_option' ) ) {
    function cs_get_option( $option = '', $default = null ) {
        $options = get_option( 'radios_theme_options' ); // Attention: Set your unique id of the framework
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

/**
 *
 * Get get switcher option
 *  for theme options
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'cs_get_switcher_option' )) {

    function cs_get_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'radios_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  (is_null($return_val) || '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}

if ( ! function_exists( 'cs_switcher_option' )) {

    function cs_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'radios_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  ( '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}


/**
 * Function for get a metaboxes
 *
 * @param $prefix_key Required Meta unique slug
 * @param $meta_key Required Meta slug
 * @param $default Optional Set default value
 * @param $id Optional Set post id
 *
 * @return mixed
 */
function radios_get_meta( $prefix_key, $meta_key, $default = null, $id = '' ) {
    if ( !$id ) {
        $id = get_the_ID();
    }

    $meta_boxes = get_post_meta( $id, $prefix_key, true );
    return ( isset( $meta_boxes[$meta_key] ) ) ? $meta_boxes[$meta_key] : $default;
}

/**
 * Get Header layout
 *
 * @return string
 */
function radios_site_header() {
    $headers_layout = cs_get_option( 'header_glob_style', 'header-style-two' );
    if ( is_page() ) {
        $page_header = radios_get_meta( 'radios_page_meta', 'header_layout', 'default' );

        if ( 'default' !== $page_header ) {
            $headers_layout = $page_header;
        }
    }

    return $headers_layout;
}

 /**
  * Darios Main Logo
  */
function radios_logo(){ 
    $global_logo = cs_get_option('theme_logo');
    $page_header = radios_get_meta( 'radios_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_header['url'])):?>
        <a class="rd-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_header['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php elseif(isset($global_logo['url']) && $global_logo['url']):?>
        <a class="rd-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_logo['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="rd-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo.svg" alt="<?php esc_attr_e('Logo', 'radios'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

 /**
  * Darios Main Logo
  */
function radios_logo_v2(){ 
    $global_logo = cs_get_option('theme_logo_v2');
    $page_header = radios_get_meta( 'radios_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_header['url'])):?>
        <a class="rd-logo-v2" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_header['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php elseif(isset($global_logo['url']) && $global_logo['url']):?>
        <a class="rd-logo-v2" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_logo['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="rd-logo-v2" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-2.svg" alt="<?php esc_attr_e('Logo', 'radios'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }



/**
 * Get Header layout
 *
 * @return string
 */
function radios_site_footer() {
    $footer_layout = cs_get_option( 'footer_glob_style', 'footer-style-one' );
    if ( is_page() ) {
        $page_header = radios_get_meta( 'radios_page_meta', 'footer_layout', 'default' );

        if ( 'default' !== $page_header ) {
            $footer_layout = $page_header;
        }
    }

    return $footer_layout;
}
