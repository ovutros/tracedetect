<?php
/**
 * Header template.
 *
 * @package TraceDetect_OnePage
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="navbar">
  <div class="nav-container">
    <div class="logo">
      <a class="brand-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Accueil <?php bloginfo('name'); ?>">
        <img class="brand-icon" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/radar.svg'); ?>" alt="Radar TraceDetect" width="52" height="52">
        <span class="brand-text">
          <span class="brand-title"><?php bloginfo('name'); ?></span>
          <span class="brand-subtitle"><?php bloginfo('description'); ?></span>
        </span>
      </a>
    </div>
    <div class="nav-links" id="navLinks">
      <a href="#home">Accueil</a>
      <div class="mega-menu-wrapper">
        <button class="mega-trigger">Services <i class="fas fa-chevron-down"></i></button>
        <div class="mega-menu">
          <h4>Detection avancee</h4>
          <a href="#services"><i class="fas fa-tachometer-alt"></i> GPR & Radar</a>
          <a href="#services"><i class="fas fa-water"></i> Canalisations</a>
          <a href="#services"><i class="fas fa-bolt"></i> Reseaux electriques</a>
          <a href="#services"><i class="fas fa-wifi"></i> Fibre optique</a>
          <h4 style="margin-top: 12px;">Diagnostics</h4>
          <a href="#services">Rapports certifies</a>
          <a href="#services">Cartographie 3D</a>
        </div>
      </div>
      <a href="#products">Outils pro</a>
      <a href="#contact">Contact</a>
      <a href="#devis" class="btn-outline" style="padding: 0.4rem 1rem;">Devis express</a>
      <button class="theme-toggle" id="themeToggle" aria-label="Basculer le theme"><i class="fas fa-moon"></i></button>
    </div>
    <button class="mobile-toggle" id="mobileToggle" aria-label="Menu mobile"><i class="fas fa-bars"></i></button>
  </div>
</nav>
