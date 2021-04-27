<?php
	add_action( 'wp_enqueue_scripts', 'cafe_coffee_shop_enqueue_styles' );
	function cafe_coffee_shop_enqueue_styles() {
    	$parent_style = 'vw-bakery-basic-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );		
		wp_enqueue_style( 'cafe-coffee-shop-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-bakery-basic-style',$vw_bakery_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'cafe-coffee-shop-style',$vw_bakery_custom_css );
		wp_enqueue_style( 'cafe-coffee-shop-block-style', get_theme_file_uri('/css/blocks.css') );
		wp_enqueue_style( 'cafe-coffee-shop-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	}

	add_action( 'init', 'cafe_coffee_shop_remove_parent_function');
	function cafe_coffee_shop_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_bakery_activation_notice' );
		remove_action( 'wp_enqueue_scripts', 'vw_bakery_header_style' );
		remove_action( 'admin_menu', 'vw_bakery_gettingstarted' );
		unregister_sidebar( 'social-icon' );
	}

	function cafe_coffee_shop_remove_parent_theme_locations(){
    	unregister_nav_menu( 'primary-right' );
    	unregister_nav_menu( 'responsive-menu' );
	}
	add_action( 'after_setup_theme', 'cafe_coffee_shop_remove_parent_theme_locations', 20 );

	function cafe_coffee_shop_customize_register() {
		global $wp_customize;
		$wp_customize->remove_setting( 'vw_bakery_topbar_hide_show' );
		$wp_customize->remove_control( 'vw_bakery_topbar_hide_show' );
		$wp_customize->remove_setting( 'vw_bakery_topbar_padding_top_bottom' );
		$wp_customize->remove_control( 'vw_bakery_topbar_padding_top_bottom' );
		$wp_customize->remove_setting( 'vw_bakery_search_hide_show' );
		$wp_customize->remove_control( 'vw_bakery_search_hide_show' );
		$wp_customize->remove_setting( 'vw_bakery_search_font_size' );
		$wp_customize->remove_control( 'vw_bakery_search_font_size' );
		$wp_customize->remove_setting( 'vw_bakery_location_address_icon' );
		$wp_customize->remove_control( 'vw_bakery_location_address_icon' );
		$wp_customize->remove_setting( 'vw_bakery_location' );
		$wp_customize->remove_control( 'vw_bakery_location' );
		$wp_customize->remove_setting( 'vw_bakery_timing_icon' );
		$wp_customize->remove_control( 'vw_bakery_timing_icon' );
		$wp_customize->remove_setting( 'vw_bakery_opening_text' );
		$wp_customize->remove_control( 'vw_bakery_opening_text' );
		$wp_customize->remove_setting( 'vw_bakery_opening_time' );
		$wp_customize->remove_control( 'vw_bakery_opening_time' );
		$wp_customize->remove_setting( 'vw_bakery_contact_link' );
		$wp_customize->remove_control( 'vw_bakery_contact_link' );
		$wp_customize->remove_setting( 'vw_bakery_cart_icon' );
		$wp_customize->remove_control( 'vw_bakery_cart_icon' );
		$wp_customize->remove_setting( 'vw_bakery_resp_topbar_hide_show' );
		$wp_customize->remove_control( 'vw_bakery_resp_topbar_hide_show' );
		$wp_customize->remove_setting( 'vw_bakery_stickyheader_hide_show' );
		$wp_customize->remove_control( 'vw_bakery_stickyheader_hide_show' );
		$wp_customize->remove_setting( 'vw_bakery_sticky_header' );
		$wp_customize->remove_control( 'vw_bakery_sticky_header' );	
		$wp_customize->remove_setting( 'vw_bakery_sticky_header_padding' );
		$wp_customize->remove_control( 'vw_bakery_sticky_header_padding' );	
		$wp_customize->remove_setting( 'vw_bakery_contact_button_text' );
		$wp_customize->remove_control( 'vw_bakery_contact_button_text' );
		$wp_customize->remove_setting( 'vw_bakery_slider_button_text' );
		$wp_customize->remove_control( 'vw_bakery_slider_button_text' );		
	}
	add_action( 'customize_register', 'cafe_coffee_shop_customize_register', 11 );

	function cafe_coffee_shop_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        #header{
				background-image:url('".esc_url(get_header_image())."');
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'cafe-coffee-shop-style', $custom_css );
		endif;
	}
	add_action( 'wp_enqueue_scripts', 'cafe_coffee_shop_header_style' );

	function cafe_coffee_shop_scripts() {	
		wp_enqueue_script( 'Custom JS ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'cafe_coffee_shop_scripts' );

	function cafe_coffee_shop_font_url() {
		$font_url      = '';
		$font_family   = array();
		$font_family[] = 'Playfair Display';
		$font_family[] = 'Poppins:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
		$query_args = array(
			'family' => rawurlencode(implode('|', $font_family)),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
		return $font_url;
	}
	
	function cafe_coffee_shop_customizer ( $wp_customize ) {

		//About section
		$wp_customize->add_section( 'cafe_coffee_shop_about_section' , array(
	    	'title'      => __( 'About us Section', 'cafe-coffee-shop' ),
			'priority'   => 20,
			'panel' => 'vw_bakery_panel_id'
		) );

		$wp_customize->add_setting('cafe_coffee_shop_section_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('cafe_coffee_shop_section_title',array(
			'label'	=> __('Add Section Text','cafe-coffee-shop'),
			'input_attrs' => array(
	            'placeholder' => __( 'OUR STORY', 'cafe-coffee-shop' ),
	        ),
			'section'=> 'cafe_coffee_shop_about_section',
			'type'=> 'text'
		));

		$wp_customize->add_setting( 'cafe_coffee_shop_about_page' , array(
			'default'           => '',
			'sanitize_callback' => 'cafe_coffee_shop_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'cafe_coffee_shop_about_page' , array(
			'label'    => __( 'Select About Page', 'cafe-coffee-shop' ),
			'section'  => 'cafe_coffee_shop_about_section',
			'type'     => 'dropdown-pages'
		) );

		$wp_customize->add_setting( 'cafe_coffee_shop_about_excerpt_number', array(
			'default'              => 30,
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'cafe_coffee_shop_sanitize_number_range'
		) );
		$wp_customize->add_control( 'cafe_coffee_shop_about_excerpt_number', array(
			'label'       => esc_html__( 'About Excerpt length','cafe-coffee-shop' ),
			'section'     => 'cafe_coffee_shop_about_section',
			'type'        => 'range',
			'settings'    => 'cafe_coffee_shop_about_excerpt_number',
			'input_attrs' => array(
				'step'             => 5,
				'min'              => 0,
				'max'              => 50,
			),
		) );
	}
	add_action( 'customize_register', 'cafe_coffee_shop_customizer' );

	define('CAFE_COFFEE_SHOP_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-cafe-coffee-shop/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_SUPPORT',__('https://wordpress.org/support/theme/cafe-coffee-shop/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_REVIEW',__('https://wordpress.org/support/theme/cafe-coffee-shop/reviews','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_BUY_NOW',__('https://www.vwthemes.com/themes/cafe-wordpress-theme/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_LIVE_DEMO',__('https://www.vwthemes.net/vw-cafe/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-cafe-pro/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_FAQ',__('https://www.vwthemes.com/faqs/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_CONTACT',__('https://www.vwthemes.com/contact/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','cafe-coffee-shop'));
	define('CAFE_COFFEE_SHOP_CREDIT',__('https://www.vwthemes.com/themes/free-cafe-wordpress-theme/','cafe-coffee-shop'));

	if ( ! function_exists( 'cafe_coffee_shop_credit' ) ) {
		function cafe_coffee_shop_credit(){
			echo "<a href=".esc_url(CAFE_COFFEE_SHOP_CREDIT).">".esc_html__('Cafe WordPress Theme','cafe-coffee-shop')."</a>";
		}
	}

	/**
	 * Enqueue block editor style
	 */
	function cafe_coffee_shop_block_editor_styles() {
		wp_enqueue_style( 'cafe-coffee-shop-font', cafe_coffee_shop_font_url(), array() );
	    wp_enqueue_style( 'cafe-coffee-shop-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'cafe_coffee_shop_block_editor_styles' );

	function cafe_coffee_shop_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function cafe_coffee_shop_sanitize_select( $input, $setting ){      
	    $input = sanitize_key($input);
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
	}

	function cafe_coffee_shop_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function cafe_coffee_shop_sanitize_number_range( $number, $setting ) {
		$number = absint( $number );
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

// Customizer Pro
require_once( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Cafe_Coffee_Shop_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'cafe-coffee-shop';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class VW_Bakery_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Cafe_Coffee_Shop_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Cafe_Coffee_Shop_Customize_Section_Pro( $manager, 'cafe_coffee_shop_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'COFFEE SHOP PRO', 'cafe-coffee-shop' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'cafe-coffee-shop' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/cafe-wordpress-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new Cafe_Coffee_Shop_Customize_Section_Pro($manager,'cafe_coffee_shop_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'cafe-coffee-shop' ),
			'pro_text' => esc_html__( 'DOCS', 'cafe-coffee-shop' ),
			'pro_url'  => admin_url('themes.php?page=cafe_coffee_shop_guide'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'cafe-coffee-shop-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'cafe-coffee-shop-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
VW_Bakery_Customize::get_instance();

/* Theme Setup */
if ( ! function_exists( 'cafe_coffee_shop_setup' ) ) :
 
function cafe_coffee_shop_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
}
endif;

// Theme Activation Notice
global $pagenow;

if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
add_action( 'admin_notices', 'cafe_coffee_shop_activation_notice' );
}

add_action( 'after_setup_theme', 'cafe_coffee_shop_setup' );

// Notice after Theme Activation
function cafe_coffee_shop_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing Cafe Coffee Shop Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Cafe Coffee Shop Theme.', 'cafe-coffee-shop' ) .'</p>';
	echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=cafe_coffee_shop_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'cafe-coffee-shop' ) .'</a></p>';
	echo '</div>';
}

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Block Pattern */
require get_theme_file_path('/inc/block-patterns/block-patterns.php');