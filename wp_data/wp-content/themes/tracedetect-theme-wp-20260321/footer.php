<?php
/**
 * Footer template.
 *
 * @package TraceDetect_OnePage
 */
?>
<footer>
  <div class="container" style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
    <div>
      <h3><?php bloginfo('name'); ?></h3>
      <p>Detection reseaux souterrains<br>Paris & region<br><i class="fas fa-envelope"></i> contact@tracedetect.fr</p>
    </div>
    <div>
      <h4>Navigation</h4>
      <p><a href="#home" style="color: var(--text-secondary); text-decoration: none;">Accueil</a></p>
      <p><a href="#services" style="color: var(--text-secondary); text-decoration: none;">Services</a></p>
      <p><a href="#products" style="color: var(--text-secondary); text-decoration: none;">Boutique outils</a></p>
    </div>
    <div>
      <h4>Legal</h4>
      <p>Mentions legales | RGPD</p>
      <p>&copy; <?php echo esc_html(wp_date('Y')); ?> <?php bloginfo('name'); ?> - Tous droits reserves</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
