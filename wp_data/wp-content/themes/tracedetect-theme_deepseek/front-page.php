<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Experts en détection<br>de réseaux souterrains</h1>
                <p class="hero-description">Localisation précise de vos réseaux avant travaux. Intervention rapide partout en France avec certification NF S70-003.</p>
                
                <div class="hero-buttons">
                    <a href="/devis" class="btn btn-primary">Demander un devis</a>
                    <a href="/services" class="btn btn-outline">Nos services</a>
                </div>
                
                <div class="hero-stats">
                    <div><span class="stat-number">15+</span> Ans d'expérience</div>
                    <div><span class="stat-number">2500+</span> Chantiers</div>
                    <div><span class="stat-number">48h</span> Intervention</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Nos services</h2>
            <p>Des solutions adaptées à vos besoins</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">📡</div>
                <h3>Détection tous réseaux</h3>
                <p>Localisation précise des réseaux AEP, électricité, gaz, télécoms</p>
                <a href="/services/detection" class="service-link">En savoir plus →</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🗺️</div>
                <h3>Cartographie 3D</h3>
                <p>Plans précis au format DWG/SIG pour vos projets</p>
                <a href="/services/cartographie" class="service-link">En savoir plus →</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Assistance DICT</h3>
                <p>Accompagnement dans vos démarches réglementaires</p>
                <a href="/services/dict" class="service-link">En savoir plus →</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background: var(--secondary); padding: 60px 0; text-align: center; color: white;">
    <div class="container">
        <h2 style="color: var(--primary);">Prêt à sécuriser votre chantier ?</h2>
        <p style="margin: 20px 0; font-size: 18px;">Demandez votre devis gratuit en quelques clics</p>
        <a href="/devis" style="background: var(--primary); color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 700; display: inline-block;">OBTENIR UN DEVIS</a>
    </div>
</section>

<?php get_footer(); ?>