<?php
/**
 * SK WP Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SK_WP_Theme
 */




if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sk_wp_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SK WP Theme, use a find and replace
		* to change 'sk-wp-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sk-wp-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sk_wp_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sk_wp_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sk_wp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sk_wp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sk_wp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sk_wp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sk-wp-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sk-wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sk_wp_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sk_wp_theme_scripts() {
	// jquery
	wp_enqueue_script( 'jQuery', 'https://code.jquery.com/jquery-3.6.0.min.js');

	// Bootstrap
	wp_enqueue_style( 'bootstrap-5-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-5-cdn-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');

	//fontawesome CDN
	wp_enqueue_style( 'fw-all-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' );
	wp_enqueue_style( 'fw-brands-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css' );
	wp_enqueue_style( 'fw-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css' );

	//owl CDN
	wp_enqueue_style( 'owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');

	//slick CDN
	wp_enqueue_style( 'slick-slider-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' );
	wp_enqueue_script( 'slick-slider-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js');

	//slick Light Box
	wp_enqueue_style( 'slick-lb-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css' );
	wp_enqueue_script( 'slick-lb-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js');
	//wp_enqueue_script( 'charts-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js');
	wp_enqueue_script( 'charts-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js');

	// custom styles
	wp_enqueue_style( 'default-style', get_template_directory_uri() . '/assets/default_style.css' , array(), _S_VERSION );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/custom_style.css' , array(), _S_VERSION );
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/assets/responsive.css' , array(), _S_VERSION );

	// custom js
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/custom_script.js', array(), '1.0.0', true);

	// 	AJAX
	wp_localize_script( 'custom-js', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) , 'siteurl' => get_stylesheet_directory_uri() ) );
	wp_enqueue_script( 'rcustom-datepicker', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array(), '1.0.0', true);
	wp_enqueue_script( 'rcustom-js', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);

	wp_enqueue_style( 'sk-wp-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sk-wp-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sk-wp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sk_wp_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* advanced custom field */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'  => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'  => false
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Theme Header Settings',
		'menu_title' => 'Header',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Theme Footer Settings',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));

}

// remove update notice for forked plugins
// function remove_update_notifications( $value ) {

//     if ( isset( $value ) && is_object( $value ) ) {
//         unset( $value->response[ 'advanced-custom-fields-pro-master/acf.php' ] );
// 		// unset( $value->response[ 'folder_name/file_name.php' ] );       // use multiple plugins
//     }
//     return $value;
// }
// add_filter( 'site_transient_update_plugins', 'remove_update_notifications' );


// Custom Functions
// Remove SVG Filters
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
	array(
		'header-menu' => esc_html__( 'Header Menu', 'sk-wp-theme' ),
		'footer-menu-1' => esc_html__( 'Footer Menu 1', 'sk-wp-theme' ),
		'footer-menu-2' => esc_html__( 'Footer Menu 2', 'sk-wp-theme' ),
	)
);

// Ex:
// 'header-menu-1' => esc_html__( 'Header Menu', 'webkarlo' ),
// 'footer-menu-1' => __( 'Footer Menu 1', 'webkarlo' ),
// 'footer-menu-2' => __( 'Footer Menu 2', 'webkarlo' ),


// Support Woocommerce *IMPORTANT
function setup_woocommerce_support(){
	add_theme_support('woocommerce');
}
add_action( 'after_setup_theme', 'setup_woocommerce_support' );


// Wrap Submenu with /sub-menu-wrap/
class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

// Auto P - Enable and Disable
// add_filter( 'the_content', 'wpautop' );
// add_filter( 'the_excerpt', 'wpautop' );

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );




/* rk Changes start */

//check login on my account
add_action( 'template_redirect', function () {
    if ( ! is_page() ) {
        return;
    }
    $page_id = [
        717 ,723 ,750,773,763,763,725,761,723,727,776,778,844 //add page ids you want to redirect  
    ];
    if ( is_page($page_id) && !is_user_logged_in()  ){
        wp_redirect(home_url('/sign-in'));
    }
});

add_action( 'template_redirect', function () {
    if ( ! is_page() ) {
        return;
    }
    $page_id = [
       712, 714,440 //add page ids you want to redirect  
    ];
    if ( is_page($page_id) && is_user_logged_in()  ){
        wp_redirect(home_url('/my-account'));
    }
});


add_action('wp_logout', 'auto_redirect_after_logout');
function auto_redirect_after_logout()
{
    // Destroy the PHP session cookie
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1, '/'); // Set expiration to 1 second in the past
        unset($_COOKIE['PHPSESSID']);
    }

    // Destroy all PHP sessions
    if (session_id()) {
        session_unset();
        session_destroy();
    }

    // Clear WordPress authentication cookies
    wp_clear_auth_cookie();
    wp_safe_redirect(home_url());
}

function custom_log_userin($user_id, $user_login, $user_pass, $user_remember = false ) {
    if( ! absint( $user_id ) || $user_id < 1 ) {
        return;
    }
    
    wp_set_auth_cookie( $user_id, $user_remember );
    wp_set_current_user( $user_id, $user_login );
    do_action( 'wp_login', $user_login, get_userdata( $user_id ) );
}


add_action('wp_ajax_nopriv_get_login_data', 'get_login_data');
add_action('wp_ajax_get_login_data', 'get_login_data');
add_action('wp_ajax_nopriv_verify_otp', 'verify_otp');
add_action('wp_ajax_verify_otp', 'verify_otp');
add_action('wp_ajax_resend_otp_login', 'resend_otp_login');
add_action('wp_ajax_nopriv_resend_otp_login', 'resend_otp_login');

function get_login_data() {
    // Start or resume a session
    session_start();

    // Implement IP-based rate limiting for OTP attempts
    $ip = $_SERVER['REMOTE_ADDR'];
    $otp_attempt_limit = 5; // Maximum number of OTP attempts allowed per IP address
    $otp_attempts_key = 'otp_attempts_' . $ip;

    // IP-based rate limiting
    $login_attempts = isset($_SESSION[$otp_attempts_key]) ? $_SESSION[$otp_attempts_key] : 0;
    if ($login_attempts >= $otp_attempt_limit) {
        // Exceeded OTP attempt limit, block further OTP generation and sending
        echo json_encode(8); // Response indicating OTP attempt limit exceeded
        die;
    }

    // Check if IP is blocked for sending OTP
    if (isset($_SESSION['blocked_login'][$ip]) && $_SESSION['blocked_login'][$ip] > time()) {
        echo json_encode(9); // IP blocked from sending OTP
        die;
    }

    // Validate user credentials
    if (isset($_POST['custom_user']) && isset($_POST['custom_pass'])) {
        $custom_user = trim($_POST['custom_user']);
        $custom_pass = trim($_POST['custom_pass']);

        if (empty($custom_user) || empty($custom_pass)) {
            echo json_encode(10); // Empty username or password
            die;
        }

        if (wp_verify_nonce((isset($_POST['custom_login_nonce']) ? $_POST['custom_login_nonce'] : ''), 'custom-login-nonce')) {
            $user_info = get_user_by('login', $custom_user);

            if (!$user_info) {
                $user_info = get_user_by('email', $custom_user);
            }

            if ($user_info && wp_check_password($custom_pass, $user_info->user_pass, $user_info->ID)) {
                // Set session variables for user
                $_SESSION['custom_user'] = $custom_user;
                $_SESSION['custom_pass'] = $custom_pass;

                // Generate and send OTP if user credentials are valid
                send_otp($user_info);

                // Increment OTP attempts for this IP
                $_SESSION[$otp_attempts_key] = isset($_SESSION[$otp_attempts_key]) ? $_SESSION[$otp_attempts_key] + 1 : 1;

                echo json_encode(5); // Response indicating OTP sent
                die;
            } else {
                echo json_encode(2); // Incorrect username/email or password
                die;
            }
        } else {
            echo json_encode(4); // Invalid nonce
            die;
        }
    } else {
        echo json_encode(11); // Missing username or password
        die;
    }
}



function verify_otp() {
    session_start();
    if (isset($_POST['otp']) && isset($_SESSION['otp']) && $_POST['otp'] == $_SESSION['otp']) {
        // OTP verification successful

        // Retrieve user credentials from session
        $custom_user = $_SESSION['custom_user'];
        $custom_pass = $_SESSION['custom_pass'];

        // Attempt to authenticate the user
        $creds = array(
            'user_login'    => $custom_user,
            'user_password' => $custom_pass,
            'remember'      => (isset($_POST['remember_me'])) ? true : false
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            // Authentication failed
            echo json_encode(6); // Failed to authenticate user
        } else {
            // Authentication successful
            echo json_encode(1); // User authenticated successfully
        }
    } else {
        // OTP verification failed
        echo json_encode(0); // OTP verification failed
    }
    die();
}

function resend_otp_login() {
    session_start();
    
    // Get the user's IP address
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // IP-based rate limiting to prevent flooding
    $otp_attempt_limit = 5; // Maximum number of OTP attempts allowed per IP address
    $otp_attempts_key = 'otp_attempts_' . $ip;
    
    if (!isset($_SESSION[$otp_attempts_key])) {
        $_SESSION[$otp_attempts_key] = 0;
    }
    
    if ($_SESSION[$otp_attempts_key] >= $otp_attempt_limit) {
        // Set IP block expiration time to 30 minutes from now
        $_SESSION['otp_blocked_login'][$ip] = time() + (30 * 60);
        
        // Expire all existing OTPs for this session
        unset($_SESSION['otp']);
        unset($_SESSION['otp_expiry']);
        
        echo json_encode(12); // IP blocked from sending OTP due to exceeding limit
        die();
    }
    
    // Check if the IP is blocked for sending OTPs
    if (isset($_SESSION['otp_blocked_login'][$ip]) && $_SESSION['otp_blocked_login'][$ip] > time()) {
        // Expire all existing OTPs for this session
        unset($_SESSION['otp']);
        unset($_SESSION['otp_expiry']);
        
        echo json_encode(12); // IP blocked from sending OTP due to exceeding limit
        die();
    }
    
    // Continue with OTP sending if IP is not blocked
    
    if (isset($_SESSION['custom_user']) && isset($_SESSION['custom_pass'])) {
        $custom_user = $_SESSION['custom_user'];
        $custom_pass = $_SESSION['custom_pass'];
        
        $user_info = get_user_by('login', $custom_user);
        if (!$user_info) {
            $user_info = get_user_by('email', $custom_user);
        }
        
        if ($user_info) {
            send_otp($user_info);
            $_SESSION[$otp_attempts_key]++; // Increment OTP attempts for this IP
            echo json_encode(5); // Response indicating OTP resent
        } else {
            echo json_encode(7); // User not found
        }
    } else {
        echo json_encode(8); // Session data not found
    }
    die();
}





function send_otp($user_info) {
    // Generate and send OTP if user credentials are valid
    $otp = mt_rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // Send OTP via email
    $to = $user_info->user_email;
    $subject = 'One-Time Password (OTP)';
    $body = '<p>Hi ' . $user_info->display_name . ',<br>Your OTP to complete the login process is: <b>' . $otp . '</b></p><p>If you did not request this OTP, please ignore this email.</p>';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);
}


add_action( 'wp_ajax_nopriv_set_reg_data', 'set_reg_data' );
add_action( 'wp_ajax_set_reg_data', 'set_reg_data' );

function set_reg_data() {

    // IP-based session management and rate limiting
    $ip_address = $_SERVER['REMOTE_ADDR'];
    session_id(md5($ip_address));
    session_start();

    // Validate the password field
    if ($_POST['custom_pass'] != $_POST['custom_pass_confirm']) {
        echo json_encode(2); // Passwords do not match
        die;
    }

    $oEmail = $_POST['email'];
    $chkotp = get_option('val-' . $oEmail);

    // IP-based rate limiting to prevent flooding
    $registration_attempts = get_transient('registration_attempts_' . $ip_address);
    if ($registration_attempts === false) {
        // First attempt or expired, set attempt count to 1 and expire in 30 minutes
        set_transient('registration_attempts_' . $ip_address, 1, 30 * MINUTE_IN_SECONDS);
    } else {
        // Increment attempt count
        $registration_attempts++;
        // Check if attempt count exceeds limit
        if ($registration_attempts > 5) {
            // Block resending SMS for 30 minutes
            set_transient('blocked_ip_' . $ip_address, true, 30 * MINUTE_IN_SECONDS);
            echo json_encode(11); // Flooded with registration attempts
            die;
        }
        // Update attempt count and reset expiration time
        set_transient('registration_attempts_' . $ip_address, $registration_attempts, 30 * MINUTE_IN_SECONDS);
    }

    // Check if IP is blocked for resending SMS
    if (get_transient('blocked_ip_' . $ip_address)) {
        echo json_encode(12); // IP blocked from resending SMS
        die;
    }

    // Check if email already exists
    $emailexists = email_exists($_POST['email']);
    if ($emailexists) {
        echo json_encode(4); // Email already exists
        die;
    }

    // Handle profile picture upload
    $attachment_id = '';
    if (!empty($_FILES['profile_picture']) && $_FILES['profile_picture']['name']) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $upload = wp_handle_upload($_FILES['profile_picture'], array('test_form' => false));
        if (!empty($upload['error'])) {
            echo json_encode(7); // Error during file upload
            die;
        }
        $attachment_id = wp_insert_attachment(array(
            'guid'           => $upload['url'],
            'post_mime_type' => $upload['type'],
            'post_title'     => basename($upload['file']),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ), $upload['file']);
        if (is_wp_error($attachment_id) || !$attachment_id) {
            echo json_encode(7); // Error during file insertion
            die;
        }
        // Update metadata and regenerate image sizes
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']));
    }

    // Generate OTP and send email
    $otp = mt_rand(100000, 999999);
    $_SESSION['form_data'] = $_POST;
    $_SESSION['otp'] = $otp;
    $_SESSION['profile_id'] = $attachment_id;

    $to = $_SESSION['form_data']['email'];
    $subject = 'Registration OTP';
    $body = '<p>Hi, ' . $_SESSION['form_data']['custom_fname'] . ' <br>Your OTP to complete verification process is <br> <b>' . $otp . '</b></p></br>Thanks,<br> Team TEEP';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);

    // Update OTP sent count and time
    $totalSent = isset($chkotp['total_sent']) ? $chkotp['total_sent'] + 1 : 1;
    $_SESSION['val-' . $to] = array(
        'sent_time' => date('Y-m-d H:i:s'),
        'total_sent' => $totalSent
    );
    update_option('val-' . $to, array('sent_time' => date('Y-m-d H:i:s'), 'total_sent' => $totalSent));

    echo json_encode(1); // Success
    die;
}

add_filter( 'nonce_life', function () { return 60; } );

function start_session() {
#	$sessdir = dirname(dirname(__FILE__)).'/session_dir';
	ini_set('session.cookie_secure', '0');
	//setcookie("PHPSESSID", "", time() - 3600, '/');
#ini_set('session.save_path', $sessdir);    
	if( !session_id() ) {
        //session_start();
    }
}
add_action('init', 'start_session', 10);

add_action( 'wp_ajax_nopriv_match_otp_data', 'match_otp_data' );
add_action( 'wp_ajax_match_otp_data', 'match_otp_data' );

function match_otp_data() { 
    session_start();

     // Check if OTP session variable is set
     if (!isset($_SESSION['otp'])) {
        echo json_encode(10); // OTP session expired or not set
        die;
    }

    // Validate form nonce (uncomment if nonce is used in the form)
    /* if (!wp_verify_nonce((isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce')) {
        echo json_encode(6);
        die;
    } */

    // Check if OTP matches
    if ($_SESSION['otp'] == $_POST['opt-value']) {
        // Check if session token is set and not expired
        if (!isset($_SESSION['token']) || $_SESSION['token_expires'] < time()) {
            // Regenerate session ID and set new token
            session_regenerate_id(true);
            $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate new token
            $_SESSION['token_expires'] = time() + 600; // Set expiry time (10 minutes)
        }

        $user_id = wp_insert_user(array(
            'user_login' => explode('@', $_SESSION['form_data']['email'])[0],
            'user_pass' => $_SESSION['form_data']['custom_pass'],
            'user_email' => $_SESSION['form_data']['email'],
            'first_name' => $_SESSION['form_data']['custom_fname'],
            'last_name' => $_SESSION['form_data']['custom_lname'],
            'display_name' => $_SESSION['form_data']['custom_fname'] . ' ' . $_SESSION['form_data']['custom_lname'],
            'role' => (isset($_SESSION['form_data']['register_as'])) ? $_SESSION['form_data']['register_as'] : 'student'
        ));

        // Check if user creation was successful
        if (is_wp_error($user_id)) {
            echo json_encode(2); // Error during user creation
            die;
        } else {
            // Add user metadata
            add_user_meta($user_id, 'middle_name', $_SESSION['form_data']['custom_mname']);
            add_user_meta($user_id, '_middle_name', 'field_63ea3e9b37c5d');

            // Add more user metadata as needed...

            // Generate and assign school_uid
            $str = ($_SESSION['form_data']['register_as'] == 'teacher') ? 'T' : ($_SESSION['form_data']['register_as'] == 'principal' ? 'P' : 'S');
            $invPrefix = $str;
            $lastInv = get_option('last_uid_number' . $invPrefix);
            $invoice_number = ($lastInv !== '' && $lastInv !== 0) ? $lastInv + 1 : 1;
            $zerofill = 3;
            $uid = str_pad($invoice_number, $zerofill, "0", STR_PAD_LEFT);
            $studentId = date('y') . strtoupper(substr($_SESSION['form_data']['custom_fname'], 0, 1)) . strtoupper(substr($_SESSION['form_data']['custom_lname'], 0, 1)) . $uid . $str;
            add_user_meta($user_id, 'school_uid', $studentId);
            update_option('last_uid_number' . $invPrefix, $invoice_number);

            // Delete OTP and wrong OTP options
            delete_option('val-' . $_SESSION['form_data']['email']);
            delete_option('wrongotp-' . $_SESSION['form_data']['email']);

            // Clear session and cookies
            setcookie("PHPSESSID", "", time() - 3600, '/');
            unset($_SESSION['form_data']);
            unset($_SESSION['otp']);
            unset($_SESSION['profile_id']);

            echo json_encode(1); // Success
            die;
        }
    } else {
        // Handle incorrect OTP
        $to = $_SESSION['form_data']['email'];
        $chkotp = get_option('wrongotp-' . $to);
        if ($chkotp && isset($chkotp['try_time'])) {
            $currentTime = time();
            $lastTryTime = strtotime($chkotp['try_time']);
            $totalOtpTry = $chkotp['total_try'];
            $minutes = round(abs($currentTime - $lastTryTime) / 60, 2);

            // Prevent flooding of incorrect OTP attempts
            if ($minutes <= 30 && $totalOtpTry >= 5) {
                echo json_encode(11); // Flooded with wrong OTP attempts
                die;
            }
        }

        // Update wrong OTP attempt count and time
        $total_try = isset($chkotp['total_try']) ? $chkotp['total_try'] + 1 : 1;
        $arr = array('try_time' => date('Y-m-d H:i:s'), 'total_try' => $total_try);
        if (get_option('wrongotp-' . $to)) {
            update_option('wrongotp-' . $to, $arr);
        } else {
            add_option('wrongotp-' . $to, $arr);
        }
        
        echo json_encode(0); // Incorrect OTP
        die;
    }
}



add_action( 'wp_ajax_nopriv_resend_otp', 'resend_otp' );
add_action( 'wp_ajax_resend_otp', 'resend_otp' );

function resend_otp() {
    // Start or resume the session 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 

    // Set token expiry time (in seconds)
    $token_expiry_time = 3600; // 1 hour

    // Get client's IP address
    $client_ip = $_SERVER['REMOTE_ADDR'];

    // IP-based rate limiting to prevent flooding
    $resend_attempts = get_transient('resend_attempts_' . $client_ip);
    if ($resend_attempts === false) {
        // First attempt or expired, set attempt count to 1 and expire in 30 minutes
        set_transient('resend_attempts_' . $client_ip, 1, 30 * MINUTE_IN_SECONDS);
    } else {
        // Increment attempt count
        $resend_attempts++;
        // Check if attempt count exceeds limit
        if ($resend_attempts > 5) {
            // Block resending OTP for 30 minutes
            set_transient('blocked_ip_' . $client_ip, true, 30 * MINUTE_IN_SECONDS);
            echo json_encode(11); // Flooded with resend attempts
            die;
        }
        // Update attempt count and reset expiration time
        set_transient('resend_attempts_' . $client_ip, $resend_attempts, 30 * MINUTE_IN_SECONDS);
    }

    // Check if IP is blocked for resending OTP
    if (get_transient('blocked_ip_' . $client_ip)) {
        echo json_encode(12); // IP blocked from resending OTP
        die;
    }

    // Get email and check for resend attempts
    $to = isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '';
    $chkotp = get_option('resend-' . $to);

    // Check if token is expired and clear session data
    if (isset($_SESSION['token_time']) && (time() - $_SESSION['token_time']) > $token_expiry_time) {
        session_unset();
        session_destroy();
        echo json_encode(3); // Token expired
        die;
    }

    // Check if resend attempts exist and prevent flooding
    if ($chkotp && isset($chkotp['resend_time'])) {
        $lastTryTime = strtotime($chkotp['resend_time']);
        $totalOtpTry = isset($chkotp['total_resend']) ? $chkotp['total_resend'] : 0;
        $minutes = round(abs(time() - $lastTryTime) / 60, 2);

        // Adjust threshold as needed
        if ($minutes <= 30 && $totalOtpTry >= 5) {
            // Clear existing OTP data
            unset($_SESSION['otp']);
            delete_option('resend-' . $to);

            echo json_encode(2); // Rate limit exceeded
            die;
        }

        // Clear resend attempts if the last attempt was made more than 30 minutes ago
        if ($minutes > 30) {
            delete_option('resend-' . $to);
        }
    }

    // Check if IP is blocked for sending OTP
    $blocked_ips = get_option('blocked_ips', array());
    if (isset($blocked_ips[$client_ip]) && time() < $blocked_ips[$client_ip]) {
        // Clear existing OTP data
        unset($_SESSION['otp']);
        delete_option('resend-' . $to);

        echo json_encode(4); // IP blocked from resending OTP
        die;
    }

    // Generate new OTP
    $_SESSION['otp'] = mt_rand(100000, 999999);

    // Set session token time
    $_SESSION['token_time'] = time();

    // Set session IP address for logging and monitoring
    $_SESSION['client_ip'] = $client_ip;

    // Send OTP email
    $subject = 'Registration OTP Resend';
    $body = '<p>Hi, ' . $_SESSION['form_data']['custom_fname'] . '<br>Your OTP to complete the verification process is<br><b>' . $_SESSION['otp'] . '</b></p><br>Thanks,<br>Team TEEP';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    // Increment total resend attempts
    $total_resend = isset($chkotp['total_resend']) ? ($chkotp['total_resend'] + 1) : 1;
    $arr = array('resend_time' => date('Y-m-d H:i:s'), 'total_resend' => $total_resend);
    if (get_option('resend-' . $to)) {
        update_option('resend-' . $to, $arr);
    } else {
        add_option('resend-' . $to, $arr);
    }

    // Send OTP email
    wp_mail($to, $subject, $body, $headers);

    // Log the OTP resend event for monitoring
    $log_message = 'OTP resent to: ' . $to . ' | Total attempts: ' . $total_resend . ' | Client IP: ' . $client_ip;
    error_log($log_message);

    // If total resend more than 5 from specific IP, block resending for 30 minutes
    if ($total_resend >= 5) {
        $blocked_ips[$client_ip] = time() + (30 * 60); // Block for 30 minutes
        update_option('blocked_ips', $blocked_ips);
    }

    echo json_encode(1); // Success
    die;
}


function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

//add usrs
add_action( 'wp_ajax_nopriv_add_reg_data', 'add_reg_data' );
add_action( 'wp_ajax_add_reg_data', 'add_reg_data' );

function add_reg_data() {
    // Validate the password field
    if ($_POST['custom_pass'] != $_POST['custom_pass_confirm']) {
        echo json_encode(2);
        die;
    }

    // Check if session token is set and not expired
    if (!isset($_SESSION['token']) || $_SESSION['token_expires'] < time()) {
        // Regenerate session ID and set new token
        session_regenerate_id(true);
        $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate new token
        $_SESSION['token_expires'] = time() + 600; // Set expiry time (10 minutes)
    }

    // Check if nonce is valid
    if (wp_verify_nonce((isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce')) {
        $emailexists = email_exists($_POST['email']);
        if ($emailexists) {
            echo json_encode(4);
            die;
        }

        // Check if rate limiting data exists for the client's IP
        $rate_limit_key = 'rate_limit_' . $_SERVER['REMOTE_ADDR'];
        $rate_limit_data = get_option($rate_limit_key);

        // Check if rate limiting data exists and update rate limit counters
        if ($rate_limit_data && isset($rate_limit_data['last_request_time'])) {
            $last_request_time = $rate_limit_data['last_request_time'];
            $request_count = $rate_limit_data['request_count'];

            // Calculate the time elapsed since the last request
            $time_elapsed = time() - $last_request_time;

            // Reset the request count if the time window has passed
            if ($time_elapsed > $time_window) {
                $request_count = 0;
            }

            // Increment the request count
            $request_count++;

            // Check if the request count exceeds the rate limit
            $rate_limit_threshold = 5; // Adjust as needed
            if ($request_count > $rate_limit_threshold) {
                echo json_encode(11); // Rate limit exceeded
                die;
            }
        } else {
            // Initialize rate limiting data for the client's IP
            $rate_limit_data = array(
                'last_request_time' => time(),
                'request_count' => 1
            );
        }
            if( !empty( $_FILES[ 'profile_picture' ] ) && $_FILES[ 'profile_picture' ]['name'] ) {
                // it allows us to use wp_handle_upload() function
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                $upload = wp_handle_upload( 
                    $_FILES[ 'profile_picture' ], 
                    array( 'test_form' => false ) 
                );
    
                if( ! empty( $upload[ 'error' ] ) ) {
                    wp_die( $upload[ 'error' ] );
                }
    
                // it is time to add our uploaded image into WordPress media library
                $attachment_id = wp_insert_attachment(
                    array(
                        'guid'           => $upload[ 'url' ],
                        'post_mime_type' => $upload[ 'type' ],
                        'post_title'     => basename( $upload[ 'file' ] ),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                    ),
                    $upload[ 'file' ]
                );
    
                if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
                    wp_die( 'Upload error.' );
                }
                if( $attachment_id ) {
                    // update medatata, regenerate image sizes
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    
                    wp_update_attachment_metadata(
                        $attachment_id,
                        wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
                    );
                }
            }else{
                $attachment_id = '';
            }
            
            $user_id = wp_insert_user( array(
                  'user_login' => explode('@',$_POST['email'])[0],
                  'user_pass' => $_POST['custom_pass'],
                  'user_email' => $_POST['email'],
                  'first_name' => $_POST['custom_fname'],
                  'last_name' => $_POST['custom_lname'],
                  'display_name' => $_POST['custom_fname'].' '.$_POST['custom_lname'],
                  'role' => (isset($_POST['register_as'])) ? $_POST['register_as'] : 'student'
                ));
                if ( is_wp_error( $user_id  ) ) {
                    echo json_encode(2);die;
                    //$user_id->get_error_message();
                }else{
                    add_user_meta( $user_id, 'middle_name', $_POST['custom_mname']);
                    add_user_meta( $user_id, '_middle_name', 'field_63ea3e9b37c5d');
                    
                    add_user_meta( $user_id, 'gender', $_POST['gender']);
                    add_user_meta( $user_id, '_gender', 'field_63ea3e6837c5c');
                    
                    add_user_meta( $user_id, 'profile_pic', $attachment_id);
                    add_user_meta( $user_id, '_profile_pic', 'field_63ea49e462170');
                    
                    add_user_meta( $user_id, 'school', $_POST['school_id']);
                    add_user_meta( $user_id, 'school_name', get_the_title($_POST['school_id']));
                    add_user_meta( $user_id, '_school', 'field_63ea3d3a37c57');
                    
                    add_user_meta( $user_id, 'class_id', $_POST['class_id']);
                    add_user_meta( $user_id, '_class_id', 'field_63ea3dd737c58');
                    
                    add_user_meta( $user_id, 'section', $_POST['section']);
                    add_user_meta( $user_id, '_section', 'field_63ea3dfe37c59');
                    
                    add_user_meta( $user_id, 'contact_number', $_POST['phone_number']);
                    add_user_meta( $user_id, '_contact_number', 'field_63ea3e4337c5a');
                    
                    add_user_meta( $user_id, 'alternate_contact_number', $_POST['alter_phone_number']);
                    add_user_meta( $user_id, '_alternate_contact_number', 'field_63ea3e4e37c5b');
                    
                    add_user_meta( $user_id, 'aternate_email', $_POST['aternate_email']);
                    add_user_meta( $user_id, 'other_school_name', $_POST['other_school_name']);
                    
                    //student id generate school_uid
                    if( $_POST['register_as'] == 'teacher'){
                        $str = 'T';
                    }elseif( $_POST['register_as'] == 'principal' ){
                        $str = 'P';
                    }else{
                        $str = 'S';
                    }
                    $invPrefix = $str;
                    $lastInv = get_option( 'last_uid_number'.$invPrefix  );
                    if( $lastInv!='' && $lastInv!=0){
                        $invoice_number = $lastInv + 1;
                    }else{
                        $invoice_number =  1;
                    }
                    //$lastInv = ($lastInv>0) ? $lastInv : 0;
                    
                    $invoice_number = (int)$lastInv + 1;
                    $zerofill = 3;
                    $uid = str_pad($invoice_number, $zerofill, "0", STR_PAD_LEFT);
                    $studentId = date('y').strtoupper(substr($_POST['custom_fname'], 0, 1)).strtoupper(substr($_POST['custom_lname'], 0, 1)).$uid.$str;
                    add_user_meta( $user_id, 'school_uid', $studentId);
                    
                    /*if(isset($_POST['school_uid'])){
                        add_user_meta( $user_id, 'school_uid', $_POST['school_uid']);
                        add_user_meta( $user_id, '_school_uid', 'field_63f24767dcc10');
                    }*/
                    update_option( 'last_uid_number'.$invPrefix, $invoice_number );
                    echo json_encode(1);die;
                }
    
            
        }else{
            echo json_encode(5);die;
        }
}

add_action( 'wp_ajax_nopriv_edit_reg_data', 'edit_reg_data' );
add_action( 'wp_ajax_edit_reg_data', 'edit_reg_data' );

function edit_reg_data() {
	session_start();
	// print_r($_POST);
	// 	exit();

	// Rate Limiting Variables
    $maxAttempts = 5; // Maximum OTP attempts allowed
    $timeFrameSeconds = 1800; // Timeframe in seconds (30 minutes)
    $userKey = md5($_SERVER['REMOTE_ADDR']); // Unique identifier for the user (can be IP-based)

    // Check if a user key is stored in the session
    if (!isset($_SESSION['otp_attempts'][$userKey])) {
        $_SESSION['otp_attempts'][$userKey] = array('attempts' => 0, 'start_time' => time());
    }

    $otpAttempts = $_SESSION['otp_attempts'][$userKey]['attempts'];
    $startTime = $_SESSION['otp_attempts'][$userKey]['start_time'];
    $currentTime = time();
    $timePassed = $currentTime - $startTime;

    if ($timePassed > $timeFrameSeconds) {
        // Reset attempts and start time after the timeframe has passed
        $_SESSION['otp_attempts'][$userKey] = array('attempts' => 0, 'start_time' => $currentTime);
        $otpAttempts = 0;
    }

    if ($otpAttempts >= $maxAttempts) {
        // Limit reached, prevent further attempts
        echo json_encode(11); // Limit exceeded for OTP requests
        die;
    }

    // Validate the password field
    if( wp_verify_nonce( (isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce' ) ) {
		
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
		if( !current_user_can( 'administrator' ) && !in_array( 'event-manager' , $roles )){

			if( $_POST['otp']=='' && isset($_SESSION['otp']) ){
				//echo json_encode(9);die;
			}
			// try to find some `total_otp_sent` user meta 
			$otpSent = get_user_meta( $user->ID, 'total_otp_sent' , true);
			$otpSent = (isset($otpSent) && $otpSent>0) ? $otpSent : 0;
			// try to find some `otp_sent_time` user meta 
			$sentTime = get_user_meta( $user->ID, 'otp_sent_time',true );
			$sentTime = (isset($sentTime) && $sentTime!='') ? $sentTime : date('Y-m-d H:i:s');
			$to_time = strtotime($sentTime);
			$from_time = strtotime(date('Y-m-d H:i:s'));
			$minutes =  round(abs($to_time - $from_time) / 60,2);
			if($_POST['newemail']!=''){
				$emailexists = email_exists($_POST['newemail']);
				if($emailexists){
					echo json_encode(4);die;
				}
				if($_POST['otp']==''){

					if($otpSent<6 || $minutes>30){
						$_SESSION['otp'] = mt_rand(100000,999999);
						$to = $_POST['email'];
						//$to = 'kingisrahul5@gmail.com';
						$subject = 'Verification OTP';
						$body = '<p>Hi, '.$_POST['custom_fname'].' <br>Your OTP to complete verification process is <br> <b>'.$_SESSION['otp'].'</b></p></br>Thanks,</br> Team TEEP';
						$headers = array('Content-Type: text/html; charset=UTF-8');
						wp_mail( $to, $subject, $body, $headers );
						if( $minutes < 30){
							update_user_meta( $user->ID, 'total_otp_sent', $otpSent + 1 );
						}else{
							update_user_meta( $user->ID, 'total_otp_sent', 1 );
						}
						update_user_meta( $user->ID, 'otp_sent_time', date('Y-m-d H:i:s'));
						// Increment OTP attempts for this user
						$_SESSION['otp_attempts'][$userKey]['attempts']++;

						echo json_encode(7);die;
					}else{
						echo json_encode(11);die;
					}
				}
				if($_POST['otp']!=''){
					if( $_POST['otp'] != $_SESSION['otp'] ){
						echo json_encode(8);die;
					}
				}
				
				
			}
			
			if( ( $_POST['custom_fname'] != $_POST['old_fname'] ) || ( $_POST['custom_lname'] != $_POST['old_lname'] ) || ( $_POST['gender'] != $_POST['old_gender'] ) || ( $_POST['school_id'] != $_POST['old_school'] ) || ( $_POST['phone_number'] != $_POST['old_contact'] ) ){
				if($_POST['otp']==''){
					// check_otp_requests_limit();
					if($otpSent<6 || $minutes>30){
						$_SESSION['otp'] = mt_rand(100000,999999);
						$to = $_POST['email'];
						//$to = 'kingisrahul5@gmail.com';
						$subject = 'Verification OTP';
						$body = '<p>Hi, '.$_POST['custom_fname'].' <br>Your OTP to complete verification process is <br><b>'.$_SESSION['otp'].'</b></p></br>Thanks,<br> Team TEEP';
						$headers = array('Content-Type: text/html; charset=UTF-8');
						wp_mail( $to, $subject, $body, $headers );
						if( $minutes < 30){
							update_user_meta( $user->ID, 'total_otp_sent', $otpSent + 1 );
						}else{
							update_user_meta( $user->ID, 'total_otp_sent', 1 );
						}
						update_user_meta( $user->ID, 'otp_sent_time', date('Y-m-d H:i:s'));
						$_SESSION['otp_attempts'][$userKey]['attempts']++;
						echo json_encode(7);die;
					}else{
						echo json_encode(11);die;
					}
				}
				if($_POST['otp']!=''){
					// check_otp_requests_limit();
					if( $_POST['otp'] != $_SESSION['otp'] ){
						echo json_encode(8);die;
					}
				}
			}
		}
		
		if( !empty( $_FILES[ 'profile_picture' ] ) && $_FILES[ 'profile_picture' ]['name'] ) {
			// it allows us to use wp_handle_upload() function
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			$upload = wp_handle_upload( 
				$_FILES[ 'profile_picture' ], 
				array( 'test_form' => false ) 
			);

			if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
			}

			// it is time to add our uploaded image into WordPress media library
			$attachment_id = wp_insert_attachment(
				array(
					'guid'           => $upload[ 'url' ],
					'post_mime_type' => $upload[ 'type' ],
					'post_title'     => basename( $upload[ 'file' ] ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				),
				$upload[ 'file' ]
			);

			if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
			}
			if( $attachment_id ) {
				// update medatata, regenerate image sizes
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
				);
			}
		}else{
			$attachment_id = $_POST['old_profile'];
		}
		$user_id = $_POST['ID'];
		$args = array(
			'ID'       => $user_id,		
			'first_name' => $_POST['custom_fname'],
			'last_name' => $_POST['custom_lname'],
			'display_name' => $_POST['custom_fname'].' '.$_POST['custom_lname'],
		);
		if($_POST['custom_pass']!=''){
			$args['user_pass'] =  $_POST['custom_pass'];
		}
		if($_POST['newemail']!=''){
			$args['user_email'] =  $_POST['newemail'];
			$args['user_login'] =  explode('@',$_POST['newemail'])[0];
		}
		
		$ins = wp_update_user( $args );
			if ( is_wp_error( $ins  ) ) {
				echo json_encode(2);die;
				//$user_id->get_error_message();
			}else{
				update_user_meta( $user_id, 'middle_name', $_POST['custom_mname']);
				update_user_meta( $user_id, 'gender', $_POST['gender']);
				update_user_meta( $user_id, 'profile_pic', $attachment_id);
				update_user_meta( $user_id, 'school', $_POST['school_id']);
				update_user_meta( $user_id, 'school_name', get_the_title($_POST['school_id']));
				update_user_meta( $user_id, 'class_id', $_POST['class_id']);
				update_user_meta( $user_id, 'section', $_POST['section']);
				update_user_meta( $user_id, 'contact_number', $_POST['phone_number']);
				update_user_meta( $user_id, 'alternate_contact_number', $_POST['alter_phone_number']);
				update_user_meta( $user_id, 'aternate_email', $_POST['aternate_email']);
				update_user_meta( $user_id, 'other_school_name', $_POST['other_school_name']);
				if(isset($_POST['school_uid'])){
					//update_user_meta( $user_id, 'school_uid', $_POST['school_uid']);
				}
				unset($_SESSION['otp']);
				echo json_encode(1);die;
			}

		
    }else{
		echo json_encode(5);die;
	}
}


//add event
add_action( 'wp_ajax_nopriv_add_event_data', 'add_event_data' );
add_action( 'wp_ajax_add_event_data', 'add_event_data' );

function add_event_data() {
    // Validate the password field
    if( wp_verify_nonce( (isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce' ) ) {

		
		if( !empty( $_FILES[ 'myfile' ] ) && $_FILES[ 'myfile' ]['name']) {
			// it allows us to use wp_handle_upload() function
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			$upload = wp_handle_upload( 
				$_FILES[ 'myfile' ], 
				array( 'test_form' => false ) 
			);

			if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
			}

			// it is time to add our uploaded image into WordPress media library
			$attachment_id = wp_insert_attachment(
				array(
					'guid'           => $upload[ 'url' ],
					'post_mime_type' => $upload[ 'type' ],
					'post_title'     => basename( $upload[ 'file' ] ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				),
				$upload[ 'file' ]
			);

			if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
			}
			if( $attachment_id ) {
				// update medatata, regenerate image sizes
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
				);
			}
		}else{
			$attachment_id = '';
		}
		
		$args = array(
			'post_type'	   => 'events',
			'post_status'  => 'publish',
			'post_title' => $_POST['title'],
			'post_content' => $_POST['description'],
			'_thumbnail_id' => $attachment_id,
			'meta_input'   => array(
				'start_date' => date('Ymd',strtotime($_POST['startdate'])),
				'event_time' => (isset($_POST['starttime'])) ? date('H:i:s',strtotime($_POST['starttime'])) : '',
				'end_date' => (isset($_POST['enddate'])) ? date('Ymd',strtotime($_POST['enddate'])) : '',
				'event_mode' => (isset($_POST['mode'])) ? $_POST['mode'] : 'Offline',
				'particpants' => $_POST['participants'],
				'enable_notifications' => (isset($_POST['notify'])) ? 'Yes' : 'No',
				'terms_and_conditions' => $_POST['terms'],
				'protocols_to_follow' => $_POST['protocols'],
				'event_links' => $_POST['links'],
				'expected_outcomes' => $_POST['eventdescription'],
				'objective_of_events' => $_POST['objective'],
				'event_participation_period' => date('Ymd',strtotime($_POST['event_participation_period'])),
				'event_participation_period_time' => date('H:i:s',strtotime($_POST['event_participation_period_time'])),
			)
		);

		$id = wp_insert_post($args);

		if ( is_wp_error( $id  ) ) {
			echo json_encode(2);die;
			//$user_id->get_error_message();
		}else{
			$roles = [];
			if( in_array('Students',$_POST['participants']) ){
				$roles[] = 'student';
			}
			if( in_array('Teachers',$_POST['participants']) ){
				$roles[] = 'teacher';
			}
			if( in_array('Principals',$_POST['participants']) ){
				$roles[] = 'teacher';
			}
			$applicants   = get_users( array( 'role__in' => $roles ) );
			$usermails = array();
			$noti = (isset($_POST['notify'])) ? 'Yes' : 'No';
			if($applicants && $noti=='Yes'){
				$to = []; 
				foreach($applicants as $ap){
					$to[] = $ap->user_email;
					$tomails = $ap->user_email;
					//$tomails = 'kingisrahul5@gmail.com';
					$subject = 'TEEP '.$_POST['title'];
					//$body = '<p>Hi,<br>New Event '.$_POST['title'].' has been added.Kindly review it.</br>Thanks, Team TEEP';
					$body = '<p>Hi,<br>A New Event, "'.$_POST['title'].'" has been added.<br>To participate please login to your TEEP account.</p><br>Thanks, <br>Team TEEP';
					$headers = array('Content-Type: text/html; charset=UTF-8');
					wp_mail( $tomails, $subject, $body, $headers );
					
				}
				//$tomails = implode(',',$to);
				/*$tomails = 'kingisrahul5@gmail.com,rahul.webpress@gmail.com';
				$subject = 'New Event Added';
				$body = '<p>Hi,<br>New Event '.$_POST['title'].' has been added.Kindly review it.</br>Thanks, Team TEEP';
				$headers = array('Content-Type: text/html; charset=UTF-8');
				wp_mail( $tomails, $subject, $body, $headers );
				*/
			}
			echo json_encode(1);die;
		}
    }else{
		echo json_encode(5);die;
	}
}

//Update event
add_action( 'wp_ajax_nopriv_update_event_data', 'update_event_data' );
add_action( 'wp_ajax_update_event_data', 'update_event_data' );

function update_event_data() {
    // Validate the password field
    if( wp_verify_nonce( (isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce' ) ) {

		
		if( !empty( $_FILES[ 'myfile' ] ) && $_FILES[ 'myfile' ]['name']) {
			// it allows us to use wp_handle_upload() function
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			$upload = wp_handle_upload( 
				$_FILES[ 'myfile' ], 
				array( 'test_form' => false ) 
			);

			if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
			}

			// it is time to add our uploaded image into WordPress media library
			$attachment_id = wp_insert_attachment(
				array(
					'guid'           => $upload[ 'url' ],
					'post_mime_type' => $upload[ 'type' ],
					'post_title'     => basename( $upload[ 'file' ] ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				),
				$upload[ 'file' ]
			);

			if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
			}
			if( $attachment_id ) {
				// update medatata, regenerate image sizes
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
				);
			}
		}else{
			$attachment_id = $_POST['thumbid'];
		}
		
		$args = array(
			'ID' => $_POST['eventid'],
			'post_type'	   => 'events',
			'post_status'  => 'publish',
			'post_title' => $_POST['title'],
			'post_content' => $_POST['description'],
			'_thumbnail_id' => $attachment_id,
			'meta_input'   => array(
				'start_date' => date('Ymd',strtotime($_POST['startdate'])),
				'event_time' => (isset($_POST['starttime'])) ? date('H:i:s',strtotime($_POST['starttime'])) : '',
				'end_date' => (isset($_POST['enddate'])) ? date('Ymd',strtotime($_POST['enddate'])) : '',
				'event_mode' => $_POST['mode'],
				'particpants' => $_POST['participants'],
				'enable_notifications' => (isset($_POST['notify'])) ? 'Yes' : 'No',
				'terms_and_conditions' => $_POST['terms'],
				'protocols_to_follow' => $_POST['protocols'],
				'event_links' => $_POST['links'],
				'expected_outcomes' => $_POST['eventdescription'],
				'objective_of_events' => $_POST['objective'],
				'event_participation_period' => date('Ymd',strtotime($_POST['event_participation_period'])),
				'event_participation_period_time' => date('H:i:s',strtotime($_POST['event_participation_period_time'])),
			)
		);

		$id = wp_update_post($args);

		if ( is_wp_error( $id  ) ) {
			echo json_encode(2);die;
			//$user_id->get_error_message();
		}else{			
			$applicants   = get_posts('&post_type=applications&meta_key=event&meta_value='.$id);
			$usermails = array();
			$noti = (isset($_POST['notify'])) ? 'Yes' : 'No';
			if($applicants && $noti=='Yes'){
				foreach($applicants as $ap){
					$u_data = get_user_by( 'id', get_post_meta($ap->ID,'applicant' , true) );
					$usermails[] = $u_data->user_email;
				}
				if($usermails){
					$to = implode(',',$usermails);
					
					foreach($usermails as $um){
						$to = $um;
						//$to = 'kingisrahul5@gmail.com';
						//$subject = 'Event Update';
						$subject = 'TEEP '.$_POST['title'];
						$body = '<p>Hi,<br>Event '.$_POST['title'].' has been updated.Kindly review it.</p><br>Thanks,<br> Team TEEP';
						$headers = array('Content-Type: text/html; charset=UTF-8');
						wp_mail( $to, $subject, $body, $headers );
					}
				}

				//wp_mail( $to, $subject, $body, $headers );
			}
			echo json_encode(12);die;
		}
    }else{
		echo json_encode(5);die;
	}
}


add_action( 'wp_ajax_nopriv_update_attendance_data', 'update_attendance_data' );
add_action( 'wp_ajax_update_attendance_data', 'update_attendance_data' );

function update_attendance_data() {
    // Validate the password field
    if( wp_verify_nonce( (isset($_POST['custom_register_nonce']) ? $_POST['custom_register_nonce'] : ''), 'custom-register-nonce' ) ) {

		
		$args = array(
			'ID' => $_POST['eventid'],
			'post_type'	   => 'events',
			'post_status'  => 'publish',
			'post_title' => $_POST['title'],
			'post_content' => $_POST['description'],
			'meta_input'   => array(
				//'total_registration' => $_POST['total_registration'],
				'actual_participants' => $_POST['ac_participants'],
				'new_participants' => $_POST['new_participants'],
				'repeat_participants' => $_POST['re_participants'],
				//'winner' => $_POST['winner']
			)
		);

		$id = wp_update_post($args);

		if ( is_wp_error( $id  ) ) {
			echo json_encode(2);die;
			//$user_id->get_error_message();
		}else{
			echo json_encode(123);die;
		}
    }else{
		echo json_encode(5);die;
	}
}

add_action( 'wp_ajax_nopriv_update_status', 'update_status' );
add_action( 'wp_ajax_update_status', 'update_status' );

function update_status() {
    // Validate the password field
    if( isset($_POST['aid']) ) {
		$aid = $_POST['aid'];
		$inpval = $_POST['inpval'];
		update_post_meta( $aid, 'winning_status', $inpval);
		echo json_encode(1);die;
    }else{
		echo json_encode(1);die;
	}
}

//participate event
add_action( 'wp_ajax_nopriv_participate_now', 'participate_now' );
add_action( 'wp_ajax_participate_now', 'participate_now' );

function participate_now() {
    // Validate the password field
    if( isset($_POST['eid']) ) {

		$args = array(
			'post_type'	   => 'applications',
			'post_status'  => 'publish',
			'post_title' => 'Apply On '.get_the_title($_POST['eid']),
			'meta_input'   => array(
				'winner' => 'No',
				'event' => $_POST['eid'],
				'participated' => 'Yes',
				'applicant' => get_current_user_id(),
			)
		);

		$id = wp_insert_post($args);

		if ( is_wp_error( $id  ) ) {
			echo json_encode(2);die;
			//$user_id->get_error_message();
		}else{
			echo json_encode(1);die;
		}
    }else{
		echo json_encode(5);die;
	}
}

add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = home_url(); // Redirect to the home page
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}

add_action('init', 'export_csv'); //you can use admin_init as well

function export_csv() {
	$user = wp_get_current_user();
	$roles = ( array ) $user->roles;
    if (!empty($_GET['student_export_csv'])) {

        if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
            header("Content-type: application/force-download");
            header('Content-Disposition: inline; filename="students'.date('YmdHis').'.csv"');

            // WP_User_Query arguments
            $users    = get_users( array( 'role' => 'student' , 'orderby' =>'display_name' , 'order' => 'ASC' ));

           
            // Array of WP_User objects.
            $html = '"Student ID","Full Name","Gender","Contact No","Alternate Contact Number","Email ID","Alternate Email ID","School","Class","Section"' . "\r\n";
            foreach ( $users as $user_info ) {
                $student_id     	= get_user_meta($user_info->ID,'school_uid',true);
                $gender        		= (get_user_meta($user_info->ID,'gender',true) !='') ? str_replace('Don’t','Do not',get_user_meta($user_info->ID,'gender',true)) : 'Do not Specify';
                $contact_number     = get_user_meta($user_info->ID,'contact_number',true);
                $alt_contact_number = get_user_meta($user_info->ID,'alter_phone_number',true);
                $email			    = $user_info->user_email;
                $alt_email  		= get_user_meta($user_info->ID,'aternate_email',true);
                $school    			= get_the_title(get_user_meta($user_info->ID,'school',true));
                $class      		= get_user_meta($user_info->ID,'class_id',true);
                $section			= get_user_meta($user_info->ID,'section',true);
				if( get_user_meta($user_info->ID,'middle_name',true) !=''){
					$name       = $user_info->first_name.' '.get_user_meta($user_info->ID,'middle_name',true).''.$user_info->last_name;
				}else{
					$name       = $user_info->first_name.' '.$user_info->last_name;
				}
                
                
                $html .= '"' . $student_id . '","' . $name . '","'.ucfirst($gender).'","' . $contact_number . '","' . $alt_contact_number . '","' . $email . '","' . $alt_email . '","' . $school . '","' . $class . '","' . $section . '"' . "\r\n";
            }
            echo $html;
            exit();
        }
    }elseif( !empty($_GET['teacher_export_csv']) ){
		
		if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
            header("Content-type: application/force-download");
            header('Content-Disposition: inline; filename="teacher'.date('YmdHis').'.csv"');


            // WP_User_Query arguments
            $users    = get_users( array( 'role' => 'teacher' , 'orderby' =>'display_name' , 'order' => 'ASC' ));

           
            // Array of WP_User objects.
            $html = '"Teacher ID","Full Name","Gender","Contact No","Alternate Contact Number","Email ID","Alternate Email ID","School"' . "\r\n";
            foreach ( $users as $user_info ) {
                $student_id     	= get_user_meta($user_info->ID,'school_uid',true);
                $gender        		= (get_user_meta($user_info->ID,'gender',true) !='') ? str_replace('Don’t','Do not',get_user_meta($user_info->ID,'gender',true)) : 'Do not Specify';
                $contact_number     = get_user_meta($user_info->ID,'contact_number',true);
                $alt_contact_number = get_user_meta($user_info->ID,'alter_phone_number',true);
                $email			    = $user_info->user_email;
                $alt_email  		= get_user_meta($user_info->ID,'aternate_email',true);
                $school    			= get_the_title(get_user_meta($user_info->ID,'school',true));
                $class      		= get_user_meta($user_info->ID,'class_id',true);
                $section			= get_user_meta($user_info->ID,'section',true);
				if( get_user_meta($user_info->ID,'middle_name',true) !=''){
					$name       = $user_info->first_name.' '.get_user_meta($user_info->ID,'middle_name',true).''.$user_info->last_name;
				}else{
					$name       = $user_info->first_name.' '.$user_info->last_name;
				}

                $html .= '"' . $student_id . '","' . $name . '","'.ucfirst($gender).'","' . $contact_number . '","' . $alt_contact_number . '","' . $email . '","' . $alt_email . '","' . $school . '"' . "\r\n";
            }
            echo $html;
            exit();
        }
		
	}elseif( !empty($_GET['principal_export_csv']) ){
		
		if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
            header("Content-type: application/force-download");
            header('Content-Disposition: inline; filename="principal'.date('YmdHis').'.csv"');

            // WP_User_Query arguments
            $users    = get_users( array( 'role' => 'principal' , 'orderby' =>'display_name' , 'order' => 'ASC' ));

           
            // Array of WP_User objects.
            $html = '"Principal ID","Full Name","Gender","Contact No","Alternate Contact Number","Email ID","Alternate Email ID","School"' . "\r\n";
            foreach ( $users as $user_info ) {
                $student_id     	= get_user_meta($user_info->ID,'school_uid',true);
                $gender        		= (get_user_meta($user_info->ID,'gender',true) !='') ? str_replace('Don’t','Do not',get_user_meta($user_info->ID,'gender',true)) : 'Do not Specify';
                $contact_number     = get_user_meta($user_info->ID,'contact_number',true);
                $alt_contact_number = get_user_meta($user_info->ID,'alter_phone_number',true);
                $email			    = $user_info->user_email;
                $alt_email  		= get_user_meta($user_info->ID,'aternate_email',true);
                $school    			= get_the_title(get_user_meta($user_info->ID,'school',true));
                $class      		= get_user_meta($user_info->ID,'class_id',true);
                $section			= get_user_meta($user_info->ID,'section',true);
				if( get_user_meta($user_info->ID,'middle_name',true) !=''){
					$name       = $user_info->first_name.' '.get_user_meta($user_info->ID,'middle_name',true).''.$user_info->last_name;
				}else{
					$name       = $user_info->first_name.' '.$user_info->last_name;
				}
                

                $html .= '"' . $student_id . '","' . $name . '","'.ucfirst($gender).'","' . $contact_number . '","' . $alt_contact_number . '","' . $email . '","' . $alt_email . '","' . $school . '"' . "\r\n";
            }
            echo $html;
            exit();
        }
	}elseif( !empty($_GET['events_export_csv']) ){
		
		if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
            header("Content-type: application/force-download");
            header('Content-Disposition: inline; filename="events'.date('YmdHis').'.csv"');

            // WP_User_Query arguments
            $postslist = get_posts( array(
				'post_type' => 'events',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'title'
			) );

           
            // Array of WP_User objects.
            $html = '"Event ID","Title","Description","Event Date","Event Time","Event Participation Period","Participants","Mode","Objective of Events","Expected outcomes","Event Links and Other Details","Protocols to follow","Terms & Conditions","Total Applied","Principal Applied","Teachers Applied","Students Participated","Total Winners"' . "\r\n";
            foreach ( $postslist as $post ) {
                $ID     			= $post->ID;
                $title        		= $post->post_title;
                $description     	= $post->post_content;
                $event_date			= date('Y-m-d',strtotime(get_post_meta($post->ID,'event_participation_period',true)));
                $event_time			= date('H:i:s',strtotime(get_post_meta($post->ID,'event_participation_period_time',true)));
                $Partic_period		= date('Y-m-d',strtotime(get_post_meta($post->ID,'start_date',true))).' - '. date('Y-m-d',strtotime(get_post_meta($post->ID,'end_date',true)));
				if( get_post_meta($post->ID,'particpants',true) ){
					$Participants  		= implode(',',get_post_meta($post->ID,'particpants',true));
				}else{
					$Participants  		= '';
				}
                
                $Mode    			= get_post_meta($post->ID,'event_mode',true);
                $Objective     		= get_post_meta($post->ID,'objective_of_events',true);
                $outcomes			= get_post_meta($post->ID,'expected_outcomes',true);
                $Links				= get_post_meta($post->ID,'event_links',true);
                $Protocols			= get_post_meta($post->ID,'protocols_to_follow',true);
                $Terms				= get_post_meta($post->ID,'terms_and_conditions',true);
				
				$applicants   = get_posts('&post_type=applications&meta_key=event&meta_value='.$post->ID);
				$principal = 0;
				$teacher = 0;
				$student = 0;
				$winner = 0;
				if($applicants){
					foreach($applicants as $ap){
						$u_data = get_user_by( 'id', get_post_meta($ap->ID,'applicant' , true) );
						if( in_array('student', $u_data->roles) ){
							$student += 1;
						}elseif( in_array('teacher', $u_data->roles) ){
							$teacher += 1;
						}elseif( in_array('principal', $u_data->roles) ){
							$principal += 1;
						}
						if( get_post_meta($ap->ID,'winners' ,true) =='Yes'){
							$winner += 1;
						}
					}
				}
				
				

                $html .= '"' . $ID . '","' . $title . '","'.$description.'","' . $event_date . '","' . $event_time . '","' . $Partic_period . '","' . $Participants . '","' . $Mode . '","'.$Objective.'","'.$outcomes.'","'.$Links.'","'.$Protocols.'","'.$Terms.'","'.count($applicants).'","'.$principal.'","'.$teacher.'","'.$student.'","'.$winner.'"' . "\r\n";
            }
            echo $html;
            exit();
        }
	}
}


// function destroy_sessions() {
//    setcookie("PHPSESSID", "", time() - 3600, '/');
//    $sessions->destroy_all();//destroys all sessions
//    session_destroy();
//    wp_clear_auth_cookie();//clears cookies regarding WP Auth
// }
// add_action('wp_logout', 'destroy_sessions');


/**
 * CLASS LIMIT LOGIN ATTEMPTS
 * Prevent Mass WordPress Login Attacks by setting locking the system when login fail.
 * To be added in functions.php or as an external file.
 */
if ( ! class_exists( 'Limit_Login_Attempts' ) ) {
    class Limit_Login_Attempts {

        var $failed_login_limit = 3;                    //Number of authentification accepted
        var $lockout_duration   = 1800;                 //Stop authentification process for 30 minutes: 60*30 = 1800
        var $transient_name     = 'attempted_login';    //Transient used

        public function __construct() {
            add_filter( 'authenticate', array( $this, 'check_attempted_login' ), 30, 3 );
            add_action( 'wp_login_failed', array( $this, 'login_failed' ), 10, 1 );
        }

        /**
         * Lock login attempts of failed login limit is reached
         */
        public function check_attempted_login( $user, $username, $password ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );

                if ( $datas['tried'] >= $this->failed_login_limit ) {
                    $until = get_option( '_transient_timeout_' . $this->transient_name );
                    $time = $this->when( $until );

                    //Display error message to the user when limit is reached 
                    //return new WP_Error( 'too_many_tried', sprintf( __( '<strong>ERROR</strong>: You have reached authentification limit, you will be able to try again in %1$s.' ) , $time ) );
                    return new WP_Error( 'too_many_tried', sprintf( __( 'You have reached authentification limit, you will be able to try again in %1$s.' ) , $time ) );
                }
            }

            return $user;
        }


        /**
         * Add transient
         */
        public function login_failed( $username ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
                $datas['tried']++;

                if ( $datas['tried'] <= $this->failed_login_limit )
                    set_transient( $this->transient_name, $datas , $this->lockout_duration );
            } else {
                $datas = array(
                    'tried'     => 1
                );
                set_transient( $this->transient_name, $datas , $this->lockout_duration );
            }
        }


        /**
         * Return difference between 2 given dates
         * @param  int      $time   Date as Unix timestamp
         * @return string           Return string
         */
        private function when( $time ) {
            if ( ! $time )
                return;

            $right_now = time();

            $diff = abs( $right_now - $time );

            $second = 1;
            $minute = $second * 60;
            $hour = $minute * 60;
            $day = $hour * 24;

            if ( $diff < $minute )
                return floor( $diff / $second ) . ' secondes';

            if ( $diff < $minute * 2 )
                return "about 1 minute ago";

            if ( $diff < $hour )
                return floor( $diff / $minute ) . ' minutes';

            if ( $diff < $hour * 2 )
                return 'about 1 hour';

            return floor( $diff / $hour ) . ' hours';
        }
    }
}

//Enable it:
new Limit_Login_Attempts();

//Disabled xmlrpc
add_filter( 'xmlrpc_enabled', '__return_false' );
 
add_action( 'send_headers', 'send_frame_options_header', 10, 0 );
add_filter('login_errors','login_error_message');

function login_error_message($error){
    //check if that's the error you are looking for
    $pos = strpos($error, 'incorrect');
    if (is_int($pos)) {
        //its the right error so you can overwrite it
        $error = "The username/password you entered is incorrect.";
    }
    echo '<script type="text/javascript">
                jQuery(document).ready(function($) {
                    jQuery("#user_login").val("");
                    jQuery("#user_pass").val("");
                });
              </script>';
	return 'Something went wrong!';
    //return $error;
}
/* rk Changes start end*/


// users will not be accessible by wp-json
add_filter('rest_pre_dispatch', function ($response, $server, $request) {
    if ($request->get_route() === '/wp/v2/users' || $request->get_route() === '/wp/v2') {
        if (!is_user_logged_in() || !current_user_can('manage_options')) { // Adjust capability if needed
            return new WP_Error('rest_forbidden', 'You do not have permission to access this endpoint.', array('status' => 403));
        }
    }
    return $response;
}, 10, 3);

// users will not be access registration page
function restrict_registration_page() {
    if (isset($_GET['action']) && $_GET['action'] === 'register') {
        wp_redirect(home_url());
        exit();
    }
}
add_action('init', 'restrict_registration_page');


function custom_session_expiration( $expiration, $user_id, $remember ) {
    // Set expiration time to 30 minutes (1800 seconds)
    return 30 * MINUTE_IN_SECONDS;
}
add_filter( 'auth_cookie_expiration', 'custom_session_expiration', 10, 3 );

function force_logout_after_expiration() {
    $expiration_time = 30 * MINUTE_IN_SECONDS;
    $last_activity = get_user_meta( get_current_user_id(), '_last_activity', true );

    if ( $last_activity && ( time() - $last_activity ) > $expiration_time ) {
        wp_logout();
        wp_redirect( wp_login_url() );
        exit;
    }
}
add_action( 'init', 'force_logout_after_expiration' );

function update_last_activity( $user_login, $user ) {
    update_user_meta( $user->ID, '_last_activity', time() );
}
add_action( 'wp_login', 'update_last_activity', 10, 2 );


function update_user_activity() {
    if ( is_user_logged_in() ) {
        update_user_meta( get_current_user_id(), '_last_activity', time() );
    }
}
add_action( 'wp', 'update_user_activity' );


