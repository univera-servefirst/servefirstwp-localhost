<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package serve-first
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<!--button icon for iPhone-->
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-57x57.png" sizes="57x57"/>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-72x72.png" sizes="72x72"/>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-76x76.png" sizes="76x76"/>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-120x120.png" sizes="120x120"/>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-152x152.png" sizes="152x152"/>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/apple-touch-icon-180x180.png" sizes="180x180"/>
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/icon-normal.png" sizes="128x128"/>
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-icons/icon-hires.png" sizes="192x192"/>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'serve-first' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

            
           
            <?php if(is_front_page() ) { ?>
             <div class="sflogo"><a href="http://localhost/servefirst-test/"><img src="http://localhost/servefirst-test/wp-content/uploads/2015/01/servefirst_greencropped.png"></a></div>
             <div class="tag-line-box"><div class="tag-line">Bringing the best of nature to the youngest of human kind.</div></div>
                <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) { ?>
                    <figure class="header-image">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php header_image(); ?>" width="< ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                        </a>
                    </figure>
                <?php } // End header image check. ?>
                <?php 
                    if ( get_header_image() && !('blank' == get_header_textcolor()) ) { 
                        echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">'; 
                    } else {
                        echo '<div class="site-branding">';
                    }
                ?>
          
            </div><!-- .site-branding -->
             <?php } //end if is front page?>
 <nav id="site-navigation" class="main-navigation" role="navigation">
     <a class="logoicon-a" href="http://localhost/servefirst-test/"><img class="logo-icon" src="http://localhost/servefirst-test/wp-content/uploads/2014/12/servefirst_grhandsicon.png"></a>
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'serve-first' ); ?></button>
			<?php 
                        
                        
                            if (is_front_page()){
                                /*custom menu*/
                                    wp_nav_menu( array( 'menu' => 'Front Page Menu' ) );
                            } else {
                                /*default menu*/
                                    wp_nav_menu( array( 'theme_location' => 'primary' ) );
                            }

                        
                        
                        //wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
                        
                        
                        ?>
                        <div class="search-toggle">
                            <i class="fa fa-search"></i>
                            <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'serve-first' ); ?></a>
                        </div>
                        <?php serve_first_social_menu(); ?>
		</nav><!-- #site-navigation -->
		
                <div id="search-container" class="search-box-wrapper clear">
                    <div class="search-box clear">
                        <?php get_search_form(); ?>
                    </div>
                </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
