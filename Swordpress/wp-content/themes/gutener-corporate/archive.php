<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutener Corporate
 */

get_header();
?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page ">
				<?php
					echo gutener_blog_page_title();
				if ( get_theme_mod( 'breadcrumbs_controls', 'disable_in_all_pages' ) == 'disable_in_all_pages' ||get_theme_mod( 'breadcrumbs_controls', 'disable_in_all_pages' ) == 'show_in_all_page_post' ){gutener_breadcrumb_wrap();
				}
				?>
				<div class="row">
					<?php
						$sidebarClass = 'col-lg-8';
						$sidebarColumnClass = 'col-lg-4';
						$masonry_class = '';

						if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid'){
							$masonry_class = 'masonry-wrapper';
						}
						if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid' ){
							$layout_class = 'grid-post-wrap';
						}elseif( get_theme_mod( 'archive_post_layout', 'list' ) == 'single' ){
							$layout_class = 'single-post';
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){
							if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid'){
								if( !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-12";
								}	
							}else{
								if( !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){
							if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid'){
								if( !is_active_sidebar( 'left-sidebar') ){
									$sidebarClass = "col-12";
								}	
							}else{
								if( !is_active_sidebar( 'left-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
							$sidebarClass = 'col-lg-6';
							$sidebarColumnClass = 'col-lg-3';
							if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid'){
								if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-12";
								}	
							}else{
								if(!is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if( get_theme_mod( 'archive_post_layout', 'list' ) == 'grid'){
								$sidebarClass = "col-12";	
							}else{
								$sidebarClass = 'col-lg-8 offset-lg-2';
							}
						}
						if( !get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){ 
								if( is_active_sidebar( 'left-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
								<?php }
							}
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
									<?php
								}
							}
						} ?>
					
					<div id="primary" class="content-area <?php echo esc_attr( $sidebarClass ); ?>">
						<div class="row <?php echo esc_attr( $masonry_class ); ?>">
						<?php
						if ( have_posts() ) :

							if ( is_home() && !is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

						elseif ( !is_sticky() && ! have_posts() ):
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
						</div><!-- #main -->
						<?php
							if( !get_theme_mod( 'disable_pagination', false ) ):
								the_posts_pagination( array(
									'next_text' => '<span>'.esc_html__( 'Next', 'gutener-corporate' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Next page', 'gutener-corporate' ) . '</span>',
									'prev_text' => '<span>'.esc_html__( 'Prev', 'gutener-corporate' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'gutener-corporate' ) . '</span>',
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'gutener-corporate' ) . ' </span>',
								));
							endif;
						?>
					</div><!-- #primary -->
					<?php
						if( !get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){ 
								if( is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
								<?php }
							}
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
									<?php
								}
							}
						} ?>
				</div>
		</section>
<?php
get_footer();
