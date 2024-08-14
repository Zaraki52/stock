<?php
include_once( get_template_directory() . '/lib/ocdi/codestar.php');
function radios_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Main',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'radios',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri().'/screenshot.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'radios' ),
			'preview_url'                  => 'https://themexriver.com/wp/radios/',
		),
		
	);
}
add_filter( 'pt-ocdi/import_files', 'radios_ocdi_import_files' );

function radios_ocdi_after_import( $selected_import ) {
	// Assign radios menus to their locations where will be display.
    $primary  = get_term_by( 'name', 'Primary', 'nav_menu' );

    set_theme_mod( 
        'nav_menu_locations', 
        array( 
            'main_menu' => $primary->term_id,
        ) 
    );

    // radios Assign front page and posts page Set
    $front_page_id	= get_page_by_title( 'Home' );

    $blog_page_id	= get_page_by_title( 'Blog' );


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'radios_ocdi_after_import' );

function radios_ocdi_before_content_import() {
    add_filter( 'wp_import_post_data_processed', 'radios_ocdi_wp_import_post_data_processed', 99, 2 );
}
add_action( 'pt-ocdi/before_content_import', 'radios_ocdi_before_content_import', 99 );

function radios_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    return wp_slash( $postdata );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );