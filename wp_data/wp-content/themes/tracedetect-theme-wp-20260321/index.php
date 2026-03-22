<?php
/**
 * Fallback template.
 *
 * @package TraceDetect_OnePage
 */

get_header();
?>
<main>
  <section class="section">
    <div class="container">
      <h1 class="section-title"><?php bloginfo('name'); ?></h1>
      <p style="text-align:center; color: var(--text-secondary);">
        Assignez une page statique a l'accueil pour afficher le template one-page.
      </p>
    </div>
  </section>
</main>
<?php
get_footer();
