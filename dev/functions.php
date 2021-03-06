<?php
/**
 * WP Rig functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wprig
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wprig_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wprig, use a find and replace
		* to change 'wprig' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wprig', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'wprig' ),
			'social' => esc_html__( 'social', 'wprig'),
			'footer' => esc_html__( 'Footer', 'wprig'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background', apply_filters(
			'wprig_custom_background_args', array(
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
		'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	/**
	 * Add support for wide aligments.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add support for block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Dusty orange', 'wprig' ),
			'slug'  => 'dusty-orange',
			'color' => '#ed8f5b',
		),
		array(
			'name'  => __( 'Dusty red', 'wprig' ),
			'slug'  => 'dusty-red',
			'color' => '#e36d60',
		),
		array(
			'name'  => __( 'Dusty wine', 'wprig' ),
			'slug'  => 'dusty-wine',
			'color' => '#9c4368',
		),
		array(
			'name'  => __( 'Dark sunset', 'wprig' ),
			'slug'  => 'dark-sunset',
			'color' => '#33223b',
		),
		array(
			'name'  => __( 'Almost black', 'wprig' ),
			'slug'  => 'almost-black',
			'color' => '#0a1c28',
		),
		array(
			'name'  => __( 'Dusty water', 'wprig' ),
			'slug'  => 'dusty-water',
			'color' => '#41848f',
		),
		array(
			'name'  => __( 'Dusty sky', 'wprig' ),
			'slug'  => 'dusty-sky',
			'color' => '#72a7a3',
		),
		array(
			'name'  => __( 'Dusty daylight', 'wprig' ),
			'slug'  => 'dusty-daylight',
			'color' => '#97c0b7',
		),
		array(
			'name'  => __( 'Dusty sun', 'wprig' ),
			'slug'  => 'dusty-sun',
			'color' => '#eee9d1',
		),
	) );

	/**
	 * Optional: Disable custom colors in block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 *
	 * add_theme_support( 'disable-custom-colors' );
	 */

	/**
	 * Add support for font sizes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'wprig' ),
			'shortName' => __( 'S', 'wprig' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'regular', 'wprig' ),
			'shortName' => __( 'M', 'wprig' ),
			'size'      => 20,
			'slug'      => 'regular',
		),
		array(
			'name'      => __( 'large', 'wprig' ),
			'shortName' => __( 'L', 'wprig' ),
			'size'      => 36,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'larger', 'wprig' ),
			'shortName' => __( 'XL', 'wprig' ),
			'size'      => 48,
			'slug'      => 'larger',
		),
	) );

	/**
	 * Optional: Add AMP support.
	 *
	 * Add built-in support for the AMP plugin and specific AMP features.
	 * Control how the plugin, when activated, impacts the theme.
	 *
	 * @link https://wordpress.org/plugins/amp/
	 */
	add_theme_support( 'amp', array(
		'comments_live_list' => true,
	) );

}
add_action( 'after_setup_theme', 'wprig_setup' );

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function wprig_embed_dimensions( array $dimensions ) {
	$dimensions['width'] = 720;
	return $dimensions;
}
add_filter( 'embed_defaults', 'wprig_embed_dimensions' );

/**
 * Register Google Fonts
 */
function wprig_fonts_url() {
	$fonts_url = '';

	/**
	 * Translator: If Roboto Sans does not support characters in your language, translate this to 'off'.
	 */
	$roboto = esc_html_x( 'on', 'Roboto Condensed font: on or off', 'wprig' );
	/**
	 * Translator: If Crimson Text does not support characters in your language, translate this to 'off'.
	 */
	$crimson_text = esc_html_x( 'on', 'Crimson Text font: on or off', 'wprig' );
	/**
	 * Translator: If Barlow Semi Condensed does not support characters in your language, translate this to 'off'.
	 */
	$barlow_semi_condensed = esc_html_x( 'on', 'Barlow semi condensed font: on or off', 'wprig' );

	/**
	 * Translator: If Rubik does not support characters in your language, translate this to 'off'.
	 */
	$rubik = esc_html_x( 'on', 'Rubik font: on or off', 'wprig' );


	$font_families = array();

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto Condensed:400,400i,700,700i';
	}

	if ( 'off' !== $crimson_text ) {
		$font_families[] = 'Crimson Text:400,400i,600,600i';
	}

	if ( 'off' !== $barlow_semi_condensed ) {
		$font_families[] = 'Barlow Semi Condensed:400,400i,600,600i';
	}

	if ( 'off' !== $rubik ) {
		$font_families[] = 'Rubik:400,400i,500,500i,700,700i';
	}

	if ( in_array( 'on', array( $roboto, $crimson_text, $barlow_semi_condensed, $rubik  ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function wprig_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'wprig-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'wprig_resource_hints', 10, 2 );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function wprig_gutenberg_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_theme_file_uri( '/css/editor-styles.css' ), array(), '20180514' );
}
add_action( 'enqueue_block_editor_assets', 'wprig_gutenberg_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wprig_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wprig' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wprig' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widgetarea', 'wprig' ),
		'id'            => 'page-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'wprig' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wprig_widgets_init' );

/**
 * Enqueue styles.
 */
function wprig_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_stylesheet_uri(), array(), '20180514' );

	// Enqueue menu sass stylesheet
	wp_enqueue_style( 'mainmenu-style', get_theme_file_uri( '/css/mainmenu.css' ), array(), '20192801');

	// Enqueue blog sass stylesheet
	wp_enqueue_style( 'blog-style', get_theme_file_uri( '/css/blog.css' ), array(), '20192801');


	// Enqueue custom widgets sass stylesheet
	wp_enqueue_style( 'customwidget-style', get_theme_file_uri( '/css/customwidgets.css' ), array(), '20192801');

	// Enqueue FontAwesome.
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );

	// Enqueue Hamburger toggle styling
	wp_enqueue_style( 'load-hamburgers', get_theme_file_uri( '/css/hamburgers.css' ) , array(), '20180514' );

	// Enqueue SlickNav styling
	//wp_enqueue_style( 'load-slicknav', get_theme_file_uri( '/css/slicknav.css' ) , array(), '20180514' );

	// Register component styles that are printed as needed.
	wp_register_style( 'wprig-comments', get_theme_file_uri( '/css/comments.css' ), array(), '20180514' );
	wp_register_style( 'wprig-content', get_theme_file_uri( '/css/content.css' ), array(), '20180514' );
	wp_register_style( 'wprig-sidebar', get_theme_file_uri( '/css/sidebar.css' ), array(), '20180514' );
	wp_register_style( 'wprig-widgets', get_theme_file_uri( '/css/widgets.css' ), array(), '20180514' );
	wp_register_style( 'wprig-front-page', get_theme_file_uri( '/css/front-page.css' ), array(), '20180514' );
}
add_action( 'wp_enqueue_scripts', 'wprig_styles' );

/**
 * Enqueue scripts.
 */
function wprig_scripts() {

	// If the AMP plugin is active, return early.
	if ( wprig_is_amp() ) {
		return;
	}

	// Enqueue the navigation script.
	wp_enqueue_script( 'wprig-navigation', get_theme_file_uri( '/js/navigation.js' ), array(), '20180514', false );
	wp_script_add_data( 'wprig-navigation', 'defer', true );
	wp_localize_script( 'wprig-navigation', 'wprigScreenReaderText', array(
		'expand'   => __( 'Expand child menu', 'wprig' ),
		'collapse' => __( 'Collapse child menu', 'wprig' ),
	));

	// Enqueue skip-link-focus script.
	wp_enqueue_script( 'wprig-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), '20180514', false );
	wp_script_add_data( 'wprig-skip-link-focus-fix', 'defer', true );

	// Enqueue comment script on singular post/page views only.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Enqueue the clear searchfield script */
	wp_enqueue_script( 'wprig-clear-searchfield', get_theme_file_uri( '/js/clear-searchfield.js' ), array( 'jquery'), '1.0', false );
	wp_script_add_data( 'wprig-clear-searchfield', 'async', false );

	/**Enqueue the stickyheader javascript */
	wp_enqueue_script( 'wprig-stickyheader', get_theme_file_uri( '/js/stickyheader.js' ), array(), '1.0', false );
	wp_script_add_data( 'wprig-stickyheader', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'wprig_scripts' );

/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

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
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
require get_template_directory() . '/pluggable/lazyload/lazyload.php';

/**
 * Custom nav walker for our sub menus
 */
require get_template_directory() . '/inc/custom-walker.php';

function get_url_of_page_id() {
	$page_id = get_theme_mod( 'frontpage_dropdown_page', 'default_value' );
		return get_permalink( $page_id );
}
add_action( 'after_setup_theme' ,'get_url_of_page_id' );

function get_txt_of_page_id() {
	$page_txt = get_theme_mod( 'frontpage_dropdown_text', 'default_value' );
		return $page_txt;
}
add_action( 'after_setup_theme' ,'get_txt_of_page_id' );

/**
 * Custom Post Type Kurskatalog
 */

 //register meta-boxes
function wprig_courses_metabox( WP_Post $post ) {
	add_meta_box( 'courses_metabox', 'Course Details', function() use ($post) {
		wp_nonce_field( 'courses_nonce', 'courses_nonce' );
		?>
		<table class="form-table">
			<tr>
				<th> <label for="url">Enter url:</label></th>
				<td>
					<input id="url"
						name="url"
						type="url"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'url', true )); ?>"
					/>
				</td>
			</tr>
			<tr>
				<th> <label for="sted">Sted:</label></th>
				<td>
					<input id="sted"
						name="sted"
						type="text"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'sted', true )); ?>"
					/>
				</td>
			</tr>
			<tr>
				<th> <label for="start">Starter:</label></th>
				<td>
					<input id="start"
						name="start"
						type="date"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'start', true )); ?>"
					/>
				</td>
			</tr>
			<tr>
				<th> <label for="slutt">Slutter:</label></th>
				<td>
					<input id="slutt"
						name="slutt"
						type="date"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'slutt', true )); ?>"
					/>
				</td>
			</tr>
			<tr>
				<th> <label for="frist">Søknadsfrist:</label></th>
				<td>
					<input id="frist"
						name="frist"
						type="date"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'frist', true )); ?>"
					/>
				</td>
			</tr>
		</table>
		<?php
	});
}

//save metabox
function wprig_save_courses_metabox( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
	$fields = [
		'url',
		'sted',
		'start',
		'slutt',
		'frist',
	];
	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			update_post_meta ( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
		}
	}
}
add_action( 'save_post', 'wprig_save_courses_metabox' );

//register the cpt
function wprig_post_type_courses() {

	$supports = array(
		'title', // post title
		'editor', // post content
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'post-formats', // post formats
		);
		$labels = array(
		'name' => _x('courses', 'plural', 'wprig'),
		'singular_name' => _x('course', 'singular', 'wprig'),
		'menu_name' => _x('Course catalogue', 'admin menu', 'wprig'),
		'name_admin_bar' => _x('Courses', 'admin bar', 'wprig'),
		'add_new' => _x('Add New', 'add new', 'wprig'),
		'add_new_item' => __('Add New course', 'wprig'),
		'new_item' => __('New course', 'wprig'),
		'edit_item' => __('Edit course', 'wprig'),
		'view_item' => __('View course', 'wprig'),
		'all_items' => __('All courses', 'wprig'),
		'search_items' => __('Search course', 'wprig'),
		'not_found' => __('No course found.', 'wprig'),
		);
		$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'descripton' => 'Coursecatalogue for nbsk',
		'menu_icon' => 'dashicons-welcome-learn-more',
		'query_var' => true,
		'rewrite' => array('slug' => 'course'),
		'has_archive' => true,
		'hierarchical' => false,
		'register_meta_box_cb' => 'wprig_courses_metabox',
		);
		register_post_type('course', $args);

		// change title placeholder text
		add_filter( 'enter_title_here', function( $title) {
			$screen = get_current_screen();

			if ( 'course' == $screen->post_type ) {
				$title = 'Enter name of course here';
			}

			return $title;
		});
		}
		add_action('init', 'wprig_post_type_courses');

		//adding taxonomies for the courses post type
		function wprig_taxonomies_courses() {
				$labels = array(
					'name'              => _x( 'Fagfelt', 'taxonomy general name', 'wprig' ),
					'singular_name'     => _x( 'Fagfelt', 'taxonomy singular name', 'wprig' ),
					'search_items'      => __( 'Search Fagfelt', 'wprig' ),
					'all_items'         => __( 'All Fagfelt', 'wprig' ),
					'parent_item'       => __( 'Parent Fagfelt', 'wprig' ),
					'parent_item_colon' => __( 'Parent Fagfelt:', 'wprig' ),
					'edit_item'         => __( 'Edit Fagfelt', 'wprig' ),
					'update_item'       => __( 'Update Fagfelt', 'wprig' ),
					'add_new_item'      => __( 'Add New Fagfelt', 'wprig' ),
					'new_item_name'     => __( 'New Fagfelt Name', 'wprig' ),
					'menu_name'         => __( 'Fagfelt', 'wprig' ),
				);

				$args = array(
					'public' => true,
					'show_in_rest' => true,
					'hierarchical'          => true,
					'labels'                => $labels,
					'show_ui'               => true,
					'show_admin_column'     => true,
					'query_var'             => true,
					'rewrite'               => array( 'slug' => 'fagfelt' ),
				);

			register_taxonomy( 'fagfelt', array( 'course' ), $args );

				$labels = array(
					'name'                       => _x( 'Coursecodes', 'taxonomy general name', 'wprig' ),
					'singular_name'              => _x( 'Coursecode', 'taxonomy singular name', 'wprig' ),
					'search_items'               => __( 'Search Coursecodes', 'wprig' ),
					'popular_items'              => __( 'Popular Coursecodes', 'wprig' ),
					'all_items'                  => __( 'All Coursecodes', 'wprig' ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __( 'Edit Coursecode', 'wprig' ),
					'update_item'                => __( 'Update Coursecode', 'wprig' ),
					'add_new_item'               => __( 'Add New Coursecode', 'wprig' ),
					'new_item_name'              => __( 'New Coursecode', 'wprig' ),
					'separate_items_with_commas' => __( 'Separate coursecodes with commas', 'wprig' ),
					'add_or_remove_items'        => __( 'Add or remove coursecodes', 'wprig' ),
					'choose_from_most_used'      => __( 'Choose from the most used coursecodes', 'wprig' ),
					'not_found'                  => __( 'No coursecodes found.', 'wprig' ),
					'menu_name'                  => __( 'Coursecodes', 'wprig' ),
				);

					$args = array(
						'public' => true,
						'show_in_rest' => true,
						'hierarchical'          => false,
						'labels'                => $labels,
						'show_ui'               => true,
						'show_admin_column'     => true,
						'update_count_callback' => '_update_post_term_count',
						'query_var'             => true,
						'rewrite'               => array( 'slug' => 'coursecode' ),
					);

			register_taxonomy( 'coursecode', 'course', $args );
		}

	add_action( 'init', 'wprig_taxonomies_courses' );

/**
 * Display advanced TinyMCE editor in taxonomy page
 */
function add_form_fields_example($term, $taxonomy){

    ?>
    <tr valign="top">
        <th scope="row">Description</th>
        <td>
            <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => false)); ?>
            <script>
                jQuery(window).ready(function(){
                    jQuery('label[for=description]').parent().parent().remove();
                });
            </script>
        </td>
    </tr>
    <?php
}
add_action("coursecode_edit_form_fields", 'add_form_fields_example', 10, 2);
