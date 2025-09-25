<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test-project
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	

	
<header class="navbar">
    <div class="centered-container">
        <div class="buttons_mobile">
                <a href="#">GET IN TOUCH</a>
                <a href="#">BOOK ONLINE</a>
            </div>
        <nav class="nav">
            
            
                <div class="nav__left-side">
                    <div class="nav__left-side__phone">
                        <img src="<?= get_template_directory_uri(); ?>/img/mobile-icon.svg" alt="mobile">
                        <span>Call us <a href="tel:01257 822888">01257 822888</a></span>
                    </div>

                    <div class="nav__left-side__phone-mobile">
                        <a href="tel:01257 822888"><img src="<?= get_template_directory_uri(); ?>/img/mobile-tel-ico.svg" alt="mobile"></a>
                    </div>
                </div>
                <div class="nav__center-side">
                    <a href="/" class="logo-desktop">
                        <img src="<?= get_template_directory_uri(); ?>/img/logotype.svg" alt="logo">
                    </a>
                    <a href="/" class="logo-mobile">
                        <img src="<?= get_template_directory_uri(); ?>/img/mobile-logo.svg" alt="mobile logo">
                    </a>
                </div>
                <div class="burger-menu-ico">
                    <img src="<?= get_template_directory_uri(); ?>/img/burger-menu.svg" alt="menu">
                </div>
                <div class="nav__right-side">
                    <a href="#">GET IN TOUCH</a>
                    <a href="#">BOOK ONLINE</a>
                </div>
            
        </nav>
    </div>
</header>