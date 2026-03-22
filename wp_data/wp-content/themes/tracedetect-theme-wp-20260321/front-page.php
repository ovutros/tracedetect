<?php
/**
 * Front page template.
 *
 * @package TraceDetect_OnePage
 */

$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$devis_status = isset($_GET['devis_status']) ? sanitize_key(wp_unslash($_GET['devis_status'])) : '';

get_header();
?>
<main>
  <section id="home" class="hero">
    <div class="parallax-bg" id="parallaxBg"></div>
    <div class="container hero-grid" data-aos="fade-up">
      <div>
        <span class="section-tag" style="color: var(--accent); font-weight: 600;">Paris · Expertise souterraine</span>
        <h1 class="hero-title">Precision millimetrique pour vos reseaux enterres</h1>
        <p class="hero-para">Detection non-destructive des canalisations, cables electriques, fibres et gaz. Intervention rapide IDF.</p>
        <div class="btn-group">
          <a href="#devis" class="btn-primary"><i class="fas fa-calculator"></i> Demander un devis</a>
          <a href="#contact" class="btn-outline"><i class="fas fa-envelope"></i> Contact technique</a>
        </div>
      </div>
      <div data-aos="fade-left">
        <img src="https://placehold.co/600x400/0f3b5c/white?text=tracedetect+Georadar" alt="Georadar visualization" style="width:100%; border-radius: 2rem; box-shadow: var(--shadow-md); background: var(--bg-secondary);">
      </div>
    </div>
  </section>

  <section class="section" id="services">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up">Nos prestations de detection</h2>
      <div class="cards-grid">
        <div class="card" data-aos="flip-left" data-aos-delay="100">
          <i class="fas fa-map-marked-alt"></i>
          <h3>Cartographie souterraine</h3>
          <p>Localisation precise des reseaux avant travaux, conformite DT-DICT.</p>
        </div>
        <div class="card" data-aos="flip-left" data-aos-delay="200">
          <i class="fas fa-chart-line"></i>
          <h3>Georadar (GPR)</h3>
          <p>Technologie impulsionnelle jusqu'a 4m de profondeur, resultats en temps reel.</p>
        </div>
        <div class="card" data-aos="flip-left" data-aos-delay="300">
          <i class="fas fa-hard-hat"></i>
          <h3>Inspection & securite</h3>
          <p>Prevention des dommages, rapports d'expertise pour chantiers.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="products" class="section" style="background: var(--bg-secondary);">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up">Outils de detection professionnels</h2>
      <div class="product-grid">
        <div class="product-card" data-aos="zoom-in">
          <i class="fas fa-radar" style="font-size: 2.5rem;"></i>
          <h3>Detecteur GPR Pro</h3>
          <p>Radar de sol haute frequence, compatible tablette</p>
          <div class="price">2 490EUR HT</div>
          <button class="btn-primary" style="width:100%;">Commander</button>
        </div>
        <div class="product-card" data-aos="zoom-in" data-aos-delay="100">
          <i class="fas fa-microchip"></i>
          <h3>Localisateur multi-reseaux</h3>
          <p>Detection electrique, metaux, fibres</p>
          <div class="price">1 290EUR HT</div>
          <button class="btn-primary" style="width:100%;">Commander</button>
        </div>
        <div class="product-card" data-aos="zoom-in" data-aos-delay="200">
          <i class="fas fa-camera"></i>
          <h3>Camera d'inspection</h3>
          <p>Inspection canalisation HD 360</p>
          <div class="price">3 850EUR HT</div>
          <button class="btn-primary" style="width:100%;">Commander</button>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="section">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up">Contactez nos experts</h2>
      <div class="form-grid">
        <div data-aos="fade-right">
          <h3>Formulaire de contact</h3>
          <form id="contactForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="tracedetect_contact_submit">
            <?php wp_nonce_field('tracedetect_contact_submit', 'tracedetect_contact_nonce'); ?>
            <input type="text" name="contact_name" placeholder="Nom et prenom" required>
            <input type="email" name="contact_email" placeholder="Email professionnel" required>
            <input type="tel" name="contact_phone" placeholder="Telephone">
            <textarea rows="3" name="contact_message" placeholder="Details de votre projet..."></textarea>
            <button type="submit">Envoyer <i class="fas fa-paper-plane"></i></button>
            <?php if ($contact_status === 'success') : ?>
              <p class="form-feedback form-feedback-success">Message envoye. Un expert vous repond sous 24h.</p>
            <?php elseif ($contact_status === 'invalid') : ?>
              <p class="form-feedback form-feedback-error">Merci de verifier les champs obligatoires (nom + email valide).</p>
            <?php elseif ($contact_status === 'nonce') : ?>
              <p class="form-feedback form-feedback-error">Session expirée. Merci de reessayer.</p>
            <?php elseif ($contact_status === 'error') : ?>
              <p class="form-feedback form-feedback-error">Envoi impossible pour le moment. Merci de reessayer.</p>
            <?php endif; ?>
          </form>
        </div>
        <div id="devis" data-aos="fade-left">
          <h3>Demande de devis rapide</h3>
          <form id="devisForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="tracedetect_devis_submit">
            <?php wp_nonce_field('tracedetect_devis_submit', 'tracedetect_devis_nonce'); ?>
            <input type="text" name="devis_company" placeholder="Societe / Chantier" required>
            <input type="text" name="devis_site_address" placeholder="Adresse du site (Paris / IDF)" required>
            <select name="devis_detection_type" required>
              <option value="">Type de detection</option>
              <option>Electricite / ERDF</option>
              <option>Eau / assainissement</option>
              <option>Gaz / plomberie</option>
              <option>Fibre / telecoms</option>
            </select>
            <input type="date" name="devis_date">
            <button type="submit">Obtenir un devis gratuit</button>
            <?php if ($devis_status === 'success') : ?>
              <p class="form-feedback form-feedback-success">Votre demande de devis a bien ete recue.</p>
            <?php elseif ($devis_status === 'invalid') : ?>
              <p class="form-feedback form-feedback-error">Merci de remplir tous les champs obligatoires.</p>
            <?php elseif ($devis_status === 'nonce') : ?>
              <p class="form-feedback form-feedback-error">Session expirée. Merci de reessayer.</p>
            <?php elseif ($devis_status === 'error') : ?>
              <p class="form-feedback form-feedback-error">Envoi impossible pour le moment. Merci de reessayer.</p>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </section>

  <div class="container devis-banner" data-aos="fade-up">
    <i class="fas fa-shield-alt" style="font-size: 2rem;"></i>
    <h3>Intervention rapide en Ile-de-France</h3>
    <p>Devis sous 24h | Materiel certifie | Garantie des releves</p>
  </div>
</main>
<?php
get_footer();
