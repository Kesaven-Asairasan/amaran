<?php

if ( ! function_exists( 'touchup_include_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function touchup_include_masonry_scripts() {
		wp_enqueue_script( 'isotope', TOUCHUP_INC_ROOT . '/masonry/assets/js/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', TOUCHUP_INC_ROOT . '/masonry/assets/js/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
	}
}

if ( ! function_exists( 'touchup_enqueue_masonry_scripts_for_templates' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for templates
	 */
	function touchup_enqueue_masonry_scripts_for_templates() {
		$post_type = apply_filters( 'touchup_filter_allowed_post_type_to_enqueue_masonry_scripts', '' );
		
		if ( ! empty( $post_type ) && is_singular( $post_type ) ) {
			touchup_include_masonry_scripts();
		}
	}
	
	add_action( 'touchup_action_before_main_js', 'touchup_enqueue_masonry_scripts_for_templates' );
}

if ( ! function_exists( 'touchup_enqueue_masonry_scripts_for_shortcodes' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for shortcodes
	 *
	 * @param $atts array
	 */
	function touchup_enqueue_masonry_scripts_for_shortcodes( $atts ) {
		
		if ( isset( $atts['behavior'] ) && $atts['behavior'] == 'masonry' ) {
			touchup_include_masonry_scripts();
		}
	}
	
	add_action( 'touchup_core_action_list_shortcodes_load_assets', 'touchup_enqueue_masonry_scripts_for_shortcodes' );
}

if ( ! function_exists( 'touchup_register_masonry_scripts_for_list_shortcodes' ) ) {
	/**
	 * Function that set module 3rd party scripts for list shortcodes
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function touchup_register_masonry_scripts_for_list_shortcodes( $scripts ) {

		$scripts['isotope'] = array(
			'registered' => true
		);
		$scripts['packery'] = array(
			'registered' => true
		);

		return $scripts;
	}

	add_filter( 'touchup_core_filter_register_list_shortcode_scripts', 'touchup_register_masonry_scripts_for_list_shortcodes' );
}