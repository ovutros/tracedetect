<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="logo-text">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <span class="logo-mark" aria-hidden="true">TD</span>
                            <span class="logo-copy">
                                <span class="logo-main">TRACEDÉTECT</span>
                                <span class="logo-sub">Detection de reseaux souterrains</span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'fallback_cb' => false
                ));
                ?>
                <a href="/devis" class="btn-devis-header">Devis gratuit</a>
            </nav>
        </div>
    </header>

    <main id="main">