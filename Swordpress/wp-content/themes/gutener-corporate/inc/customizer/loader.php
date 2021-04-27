<?php
/**
* Loads all the components related to customizer 
*
* @since Gutener Corporate 1.0.0
*/

function gutener_corporate_default_styles(){

	// begin style block
	$css = '<style>';

	# Colors
	$site_primary_color = get_theme_mod( 'site_primary_color', '#1d1b4c' );
	$blog_post_category_color = get_theme_mod( 'blog_post_category_color', '#1d1b4c' );
	$notification_bar_button_background_color = get_theme_mod( 'notification_bar_button_background_color', '#1d1b4c' );
	$notification_bar_button_text_color = get_theme_mod( 'notification_bar_button_text_color', '#ffffff' );
	$css .= '
		/* Primary Background */
		.section-title:before, .button-primary, .woocommerce span.onsale, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
			background-color: '. esc_attr( $site_primary_color ) .';
		}
		/* Primary Border */		
		.post .entry-content .entry-header .cat-links a, .attachment .entry-content .entry-header .cat-links a, .banner-content .entry-content .entry-header .cat-links a {
			border-color: '. esc_attr( $site_primary_color ) .';
		}
		/* Primary Color */
	 	blockquote:before, .post .entry-content .entry-header .cat-links a, .attachment .entry-content .entry-header .cat-links a, .banner-content .entry-content .entry-header .cat-links a, .post .entry-meta a:before, .attachment .entry-meta a:before {
			color: '. esc_attr( $site_primary_color ) .';
		}

		.banner-content .entry-meta a:before {
			color: #ebebeb;
		}

		.banner-content .entry-meta a:hover:before,
		.banner-content .entry-meta a:focus:before,
		.banner-content .entry-meta a:active:before {
			color: #a8d8ff;
		}
	';

	$css .= '
		.post .entry-content .entry-header .cat-links a {
			color: '. esc_attr( $blog_post_category_color ) .';
		}

		.banner-content .entry-content .entry-header .cat-links a {
			color: #ebebeb;
		}
		.section-banner .banner-content .entry-title a:hover,
		.section-banner .banner-content .entry-title a:focus,
		.section-banner .banner-content .entry-title a:active,
		.banner-content .entry-content .entry-header .cat-links a:hover,
		.banner-content .entry-content .entry-header .cat-links a:focus,
		.banner-content .entry-content .entry-header .cat-links a:active,
		.section-banner .banner-content .entry-meta a:hover,
		.section-banner .banner-content .entry-meta a:focus,
		.section-banner .banner-content .entry-meta a:active {
			color: #a8d8ff;
		}
	';

	$css .= '
		.post .entry-content .entry-header .cat-links a, 
		.attachment .entry-content .entry-header .cat-links a {
			border-color: '. esc_attr( $blog_post_category_color ) .';
		}

		.banner-content .entry-content .entry-header .cat-links a {
			border-color: #ebebeb;
		}

		.banner-content .entry-content .entry-header .cat-links a:hover,
		.banner-content .entry-content .entry-header .cat-links a:focus,
		.banner-content .entry-content .entry-header .cat-links a:active {
			border-color: #a8d8ff;
		}
	';

	$css .= '
		.notification-bar .button-primary {
			background-color: '. esc_attr( $notification_bar_button_background_color ) .';
			color: '. esc_attr( $notification_bar_button_text_color ) .';
		}
		.notification-bar .button-primary:hover,
		.notification-bar .button-primary:focus,
		.notification-bar .button-primary:active {
			color: #ffffff;
		}
	';

	/* Site Tagline */
	if( get_theme_mod( 'disable_site_tagline_border', true ) ){
	$css .= '
		.site-header .site-branding .site-description:before, 
		.site-header .site-branding .site-description:after {
			display: none;
		}
		.site-header .site-branding .site-description, 
		.site-header .site-branding .site-description {
			padding-left: 0;
			padding-right: 0;
		}
	';
	}

	#Header Image Height
	$header_image_height = get_theme_mod( 'header_image_height', 120 );
	$css .= '
		@media only screen and (min-width: 992px) {
			.site-header:not(.sticky-header) .header-image-wrap {
				height: '. esc_attr( $header_image_height ) .'px;
				width: 100%;
				position: relative;
			}
		}
	';

	#Highlight Posts
	$highlight_posts_height = get_theme_mod( 'highlight_posts_height', 250 );
	$css .= '
		@media only screen and (min-width: 992px) {
			.highlight-posts-content-wrap .highlight-posts-image {
				height: '. esc_attr( $highlight_posts_height ) .'px;
				overflow: hidden;
			}
		}
	';

	# Footer Widget Borders

	if( get_theme_mod( 'disable_footer_widget_list_item_border', true ) ){
		$css .= '
			.latest-posts-widget .post,
			.widget ul li {
				border-bottom: none;
			}
		';
	}


	// end style block
	$css .= '</style>';

	// return generated & compressed CSS
	echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 
}
add_action( 'wp_head', 'gutener_corporate_default_styles', 99 );