<?php
/**
 * Twenty Twenty-Five functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty_Twenty-Five
 * @since Twenty Twenty-Five 1.0
 */

// Aktifkan fitur thumbnail post
add_theme_support('post-thumbnails');

// Aktifkan fitur title-tag
add_theme_support('title-tag');

// Fungsi untuk memformat tanggal ke Bahasa Indonesia
function format_tanggal_indonesia($tanggal) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

// Aktifkan fitur excerpt
add_post_type_support('post', 'excerpt');

// Custom excerpt length
function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Custom excerpt more
function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Tambahkan social media fields ke user profile
function add_social_media_fields($user_contact) {
    $user_contact['twitter'] = 'Twitter URL';
    $user_contact['facebook'] = 'Facebook URL';
    $user_contact['instagram'] = 'Instagram URL';
    $user_contact['linkedin'] = 'LinkedIn URL';
    
    return $user_contact;
}
add_filter('user_contactmethods', 'add_social_media_fields');

// Add custom favicon
function add_custom_favicon() {
    $favicon_url = get_template_directory_uri() . '/assets/images/android-chrome-logo.png';
    ?>
    <!-- High-resolution favicon for better visibility -->
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="256x256" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_url; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon_url; ?>">
    
    <!-- Apple devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon_url; ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon_url; ?>">
    
    <!-- Standard favicon -->
    <link rel="shortcut icon" href="<?php echo $favicon_url; ?>" type="image/png">
    <link rel="icon" href="<?php echo $favicon_url; ?>" type="image/png">
    
    <!-- For older browsers -->
    <meta name="msapplication-TileImage" content="<?php echo $favicon_url; ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <?php
}
add_action('wp_head', 'add_custom_favicon');

// Custom image sizes
add_image_size('article-featured', 1200, 628, true);
add_image_size('article-thumbnail', 600, 400, true);

// Nonaktifkan Gutenberg editor styles di frontend
function dequeue_gutenberg_theme_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'dequeue_gutenberg_theme_css', 100);

// Daftarkan lokasi menu
register_nav_menus(array(
    'primary' => 'Menu Utama',
    'footer' => 'Menu Footer'
));

// Pastikan template single.php digunakan untuk post
function use_custom_template($template) {
    if (is_single()) {
        $new_template = locate_template(array('single.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'use_custom_template');

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

/**
 * ===================================================================
 * YouTube Video Grid Manager - Admin Settings
 * ===================================================================
 * Adds a theme options page to manage the YouTube videos on the landing page.
 */

// 1. Add the admin menu page under "Appearance"
function youtube_video_grid_add_admin_menu() {
    add_theme_page(
        'YouTube Video Grid',          // Page Title
        'YouTube Video Grid',          // Menu Title
        'manage_options',              // Capability
        'youtube_video_grid',          // Menu Slug
        'youtube_video_grid_options_page_html' // Function to render the page
    );
}
add_action('admin_menu', 'youtube_video_grid_add_admin_menu');

// 2. Register settings, sections, and fields
function youtube_video_grid_settings_init() {
    // Register a single option to store all our settings in an array
    register_setting('youtube_video_grid_page', 'youtube_video_grid_options', 'youtube_video_grid_options_sanitize');

    // Add a settings section
    add_settings_section(
        'youtube_video_grid_section',
        'Manage Landing Page Videos',
        null,
        'youtube_video_grid_page'
    );

    // Add fields for each video
    add_settings_field('featured_video_url', 'Featured Video URL', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'featured_video_url', 'label' => 'Main large video on the left']);
    add_settings_field('featured_video_title', 'Featured Video Title', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'featured_video_title', 'label' => 'Title for the featured video']);
    
    add_settings_field('video_2_url', 'Video 2 URL', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'video_2_url', 'label' => 'Top-right video']);
    add_settings_field('video_2_title', 'Video 2 Title', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'video_2_title', 'label' => 'Title for video 2']);

    add_settings_field('video_3_url', 'Video 3 URL', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'video_3_url', 'label' => 'Bottom-right video']);
    add_settings_field('video_3_title', 'Video 3 Title', 'youtube_video_grid_field_html', 'youtube_video_grid_page', 'youtube_video_grid_section', ['id' => 'video_3_title', 'label' => 'Title for video 3']);
}
add_action('admin_init', 'youtube_video_grid_settings_init');

// 3. Callback function to render the input fields
function youtube_video_grid_field_html($args) {
    $options = get_option('youtube_video_grid_options');
    $value = isset($options[$args['id']]) ? $options[$args['id']] : '';
    ?>
    <input type="text" name="youtube_video_grid_options[<?php echo esc_attr($args['id']); ?>]" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <p class="description"><?php echo esc_html($args['label']); ?></p>
    <?php
}

// 4. Callback function to sanitize the input
function youtube_video_grid_options_sanitize($input) {
    $sanitized_input = [];
    if (isset($input['featured_video_url'])) {
        $sanitized_input['featured_video_url'] = esc_url_raw($input['featured_video_url']);
    }
    if (isset($input['featured_video_title'])) {
        $sanitized_input['featured_video_title'] = sanitize_text_field($input['featured_video_title']);
    }
    if (isset($input['video_2_url'])) {
        $sanitized_input['video_2_url'] = esc_url_raw($input['video_2_url']);
    }
    if (isset($input['video_2_title'])) {
        $sanitized_input['video_2_title'] = sanitize_text_field($input['video_2_title']);
    }
    if (isset($input['video_3_url'])) {
        $sanitized_input['video_3_url'] = esc_url_raw($input['video_3_url']);
    }
    if (isset($input['video_3_title'])) {
        $sanitized_input['video_3_title'] = sanitize_text_field($input['video_3_title']);
    }
    return $sanitized_input;
}

// 5. Function to render the main admin page HTML
function youtube_video_grid_options_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p>Enter the full YouTube video URLs below. The theme will automatically extract the video ID and generate thumbnails.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields('youtube_video_grid_page');
            do_settings_sections('youtube_video_grid_page');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}
