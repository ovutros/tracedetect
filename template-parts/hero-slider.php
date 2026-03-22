<?php

/**
 * Hero Slider Section
 */

$slider_images = array(
    array(
        'url' => 'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
        'title' => 'Détection Géoradar de précision',
        'subtitle' => 'Localisation millimétrique des réseaux enterrés',
    ),
    array(
        'url' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
        'title' => 'Cartographie des canalisations',
        'subtitle' => 'Visualisation complète de vos infrastructures',
    ),
    array(
        'url' => 'https://images.unsplash.com/photo-1581092160562-40aa08e7882c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
        'title' => 'Expertise technique certifiée',
        'subtitle' => 'Intervention rapide en Île-de-France',
    ),
    array(
        'url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2072&q=80',
        'title' => 'Cartographie 3D et rapports détaillés',
        'subtitle' => 'Conformité DT-DICT garantie',
    ),
    array(
        'url' => 'https://images.unsplash.com/photo-1581092335871-5c5a9c5e9b3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
        'title' => 'Matériel professionnel dernier cri',
        'subtitle' => 'Technologie GPR et inspection HD',
    ),
);
?>

<section class="hero-slider">
    <div class="swiper-container hero-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($slider_images as $index => $slide) : ?>
                <div class="swiper-slide">
                    <div class="slide-bg" style="background-image: url('<?php echo esc_url($slide['url']); ?>');">
                        <div class="slide-overlay"></div>
                    </div>
                    <div class="slide-content container" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <span class="slide-tag">📍 tracedetect · Paris</span>
                        <h1 class="slide-title"><?php echo esc_html($slide['title']); ?></h1>
                        <p class="slide-subtitle"><?php echo esc_html($slide['subtitle']); ?></p>
                        <div class="btn-group">
                            <a href="#devis" class="btn-primary">
                                <i class="fas fa-calculator"></i> Demander un devis
                            </a>
                            <a href="#contact" class="btn-outline">
                                <i class="fas fa-envelope"></i> Contact technique
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination et navigation -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<style>
    .hero-slider {
        position: relative;
        height: 100vh;
        min-height: 600px;
        overflow: hidden;
    }

    .hero-swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        position: relative;
        overflow: hidden;
    }

    .slide-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: transform 6s ease;
    }

    .swiper-slide-active .slide-bg {
        transform: scale(1.05);
    }

    .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.4) 100%);
    }

    .slide-content {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        color: white;
        padding-top: 80px;
    }

    .slide-tag {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        display: inline-block;
    }

    .slide-title {
        font-size: clamp(2rem, 5vw, 4.5rem);
        font-weight: 800;
        margin-bottom: 1rem;
        max-width: 800px;
    }

    .slide-subtitle {
        font-size: clamp(1rem, 2vw, 1.3rem);
        margin-bottom: 2rem;
        max-width: 600px;
        opacity: 0.9;
    }

    .swiper-pagination-bullet {
        background: white;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        background: var(--accent, #0f3b5c);
    }

    .swiper-button-prev,
    .swiper-button-next {
        color: white;
        background: rgba(0, 0, 0, 0.3);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        transition: all 0.3s;
    }

    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background: var(--accent, #0f3b5c);
    }

    @media (max-width: 768px) {
        .hero-slider {
            height: 80vh;
            min-height: 500px;
        }

        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }

        .slide-content {
            text-align: center;
            align-items: center;
        }

        .slide-title {
            text-align: center;
        }
    }
</style>