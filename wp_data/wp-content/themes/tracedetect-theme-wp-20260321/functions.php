<?php
/**
 * Theme setup and assets registration.
 *
 * @package TraceDetect_OnePage
 */

if (!defined('ABSPATH')) {
    exit;
}

function tracedetect_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'tracedetect_theme_setup');

function tracedetect_enqueue_assets() {
    wp_enqueue_style(
        'tracedetect-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'tracedetect-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
        array(),
        '6.0.0-beta3'
    );

    wp_enqueue_style(
        'tracedetect-aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        array(),
        '2.3.1'
    );

    wp_enqueue_style(
        'tracedetect-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'tracedetect-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('tracedetect-style'),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'tracedetect-aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        array(),
        '2.3.1',
        true
    );

    wp_enqueue_script(
        'tracedetect-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('tracedetect-aos'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'tracedetect_enqueue_assets');

/**
 * Build a redirect URL for form feedback.
 *
 * @param string $form Form slug.
 * @param string $status Status slug.
 * @return string
 */
function tracedetect_form_redirect_url($form, $status) {
    $referrer = wp_get_referer();
    if (!$referrer) {
        $referrer = home_url('/');
    }

    $url = remove_query_arg(array('contact_status', 'devis_status'), $referrer);
    $url = add_query_arg($form . '_status', $status, $url);

    if ($form === 'devis') {
        return $url . '#devis';
    }

    return $url . '#contact';
}

/**
 * Handle contact form submission.
 */
function tracedetect_handle_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_safe_redirect(home_url('/'));
        exit;
    }

    if (!isset($_POST['tracedetect_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tracedetect_contact_nonce'])), 'tracedetect_contact_submit')) {
        wp_safe_redirect(tracedetect_form_redirect_url('contact', 'nonce'));
        exit;
    }

    $name = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $phone = isset($_POST['contact_phone']) ? sanitize_text_field(wp_unslash($_POST['contact_phone'])) : '';
    $message = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';

    if ($name === '' || $email === '' || !is_email($email)) {
        wp_safe_redirect(tracedetect_form_redirect_url('contact', 'invalid'));
        exit;
    }

    $to = get_option('admin_email');
    $subject = '[TraceDetect] Nouveau message de contact';
    $body = "Nom: {$name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Telephone: " . ($phone !== '' ? $phone : '-') . "\n\n";
    $body .= "Message:\n" . ($message !== '' ? $message : '-');

    $headers = array('Content-Type: text/plain; charset=UTF-8');
    if (is_email($email)) {
        $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    }

    $sent = wp_mail($to, $subject, $body, $headers);

    wp_safe_redirect(tracedetect_form_redirect_url('contact', $sent ? 'success' : 'error'));
    exit;
}
add_action('admin_post_nopriv_tracedetect_contact_submit', 'tracedetect_handle_contact_form');
add_action('admin_post_tracedetect_contact_submit', 'tracedetect_handle_contact_form');

/**
 * Handle quote request form submission.
 */
function tracedetect_handle_devis_form() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_safe_redirect(home_url('/'));
        exit;
    }

    if (!isset($_POST['tracedetect_devis_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tracedetect_devis_nonce'])), 'tracedetect_devis_submit')) {
        wp_safe_redirect(tracedetect_form_redirect_url('devis', 'nonce'));
        exit;
    }

    $company = isset($_POST['devis_company']) ? sanitize_text_field(wp_unslash($_POST['devis_company'])) : '';
    $site_address = isset($_POST['devis_site_address']) ? sanitize_text_field(wp_unslash($_POST['devis_site_address'])) : '';
    $detection_type = isset($_POST['devis_detection_type']) ? sanitize_text_field(wp_unslash($_POST['devis_detection_type'])) : '';
    $intervention_date = isset($_POST['devis_date']) ? sanitize_text_field(wp_unslash($_POST['devis_date'])) : '';

    if ($company === '' || $site_address === '' || $detection_type === '') {
        wp_safe_redirect(tracedetect_form_redirect_url('devis', 'invalid'));
        exit;
    }

    $to = get_option('admin_email');
    $subject = '[TraceDetect] Nouvelle demande de devis';
    $body = "Societe / Chantier: {$company}\n";
    $body .= "Adresse du site: {$site_address}\n";
    $body .= "Type de detection: {$detection_type}\n";
    $body .= "Date souhaitee: " . ($intervention_date !== '' ? $intervention_date : '-') . "\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8');
    $sent = wp_mail($to, $subject, $body, $headers);

    wp_safe_redirect(tracedetect_form_redirect_url('devis', $sent ? 'success' : 'error'));
    exit;
}
add_action('admin_post_nopriv_tracedetect_devis_submit', 'tracedetect_handle_devis_form');
add_action('admin_post_tracedetect_devis_submit', 'tracedetect_handle_devis_form');
