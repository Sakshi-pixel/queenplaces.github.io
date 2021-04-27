<?php
/**
 * Template part for displaying site info
 *
 * @package Gutener Corporate
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( get_theme_mod( 'footer_text', '' ) ) ); ?>
	<?php
	printf( esc_html__( 'Gutener Corporate', 'gutener-corporate' ) );
	?>
	<?php esc_html_e( 'Theme by', 'gutener-corporate' ); ?>
	<a href="<?php echo esc_url( __( 'https://keonthemes.com/', 'gutener-corporate' ) ); ?>" target="_blank">
		<?php
		printf( esc_html__( 'Keon Themes', 'gutener-corporate' ) );
		?>
	</a>
</div><!-- .site-info -->