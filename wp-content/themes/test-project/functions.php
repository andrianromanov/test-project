<?php
/**
 * test-project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test-project
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function test_project_setup() {

	load_theme_textdomain( 'test-project', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	add_theme_support( 'title-tag' );


	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'test-project' ),
		)
	);


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
			'test_project_custom_background_args',
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
add_action( 'after_setup_theme', 'test_project_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_project_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_project_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_project_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_project_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'test-project' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'test-project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_project_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_project_scripts() {
    // Enqueue main theme stylesheet
    wp_enqueue_style( 'test-project-style', get_stylesheet_uri(), array(), '7.7.7' );
    wp_style_add_data( 'test-project-style', 'rtl', 'replace' );

    // Enqueue Owl Carousel CSS
    wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4' );

    // Enqueue Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null );

    // Add preconnect links for Google Fonts
    add_action( 'wp_head', function() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    }, 1 );

    // Enqueue jQuery (WordPress includes its own version)
    wp_enqueue_script( 'jquery' );

    // Enqueue Owl Carousel JS
    wp_enqueue_script( 'owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true );

    // Enqueue custom main.min.js
    wp_enqueue_script( 'test-project-main', get_template_directory_uri() . '/js/main.min.js', array('jquery', 'owl-carousel-js'), _S_VERSION, true );

    // Localize script for AJAX
    wp_localize_script('test-project-main', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('filter_images_nonce')
    ));

    wp_enqueue_script( 'test-project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'test_project_scripts' );


require get_template_directory() . '/inc/custom-header.php';


require get_template_directory() . '/inc/template-tags.php';


require get_template_directory() . '/inc/template-functions.php';


require get_template_directory() . '/inc/customizer.php';


if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function create_images_filter_post_type() {
    $labels = array(
        'name'                  => _x( 'Images Filter', 'Post Type General Name', 'test-project' ),
        'singular_name'         => _x( 'Image Filter', 'Post Type Singular Name', 'test-project' ),
        'menu_name'             => __( 'Images Filter', 'test-project' ),
        'name_admin_bar'        => __( 'Image Filter', 'test-project' ),
        'archives'              => __( 'Image Archives', 'test-project' ),
        'attributes'            => __( 'Image Attributes', 'test-project' ),
        'parent_item_colon'     => __( 'Parent Image:', 'test-project' ),
        'all_items'             => __( 'All Images', 'test-project' ),
        'add_new_item'          => __( 'Add New Image', 'test-project' ),
        'add_new'               => __( 'Add New', 'test-project' ),
        'new_item'              => __( 'New Image', 'test-project' ),
        'edit_item'             => __( 'Edit Image', 'test-project' ),
        'update_item'           => __( 'Update Image', 'test-project' ),
        'view_item'             => __( 'View Image', 'test-project' ),
        'view_items'            => __( 'View Images', 'test-project' ),
        'search_items'          => __( 'Search Image', 'test-project' ),
        'not_found'             => __( 'Not found', 'test-project' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'test-project' ),
        'featured_image'        => __( 'Featured Image', 'test-project' ),
        'set_featured_image'    => __( 'Set featured image', 'test-project' ),
        'remove_featured_image' => __( 'Remove featured image', 'test-project' ),
        'use_featured_image'    => __( 'Use as featured image', 'test-project' ),
        'insert_into_item'      => __( 'Insert into image', 'test-project' ),
        'uploaded_to_this_item' => __( 'Uploaded to this image', 'test-project' ),
        'items_list'            => __( 'Images list', 'test-project' ),
        'items_list_navigation' => __( 'Images list navigation', 'test-project' ),
        'filter_items_list'     => __( 'Filter images list', 'test-project' ),
    );

    $args = array(
        'label'                 => __( 'Image Filter', 'test-project' ),
        'description'           => __( 'Images for filtering gallery', 'test-project' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'            => array( 'filter_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-gallery',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'images_filter', $args );
}
add_action( 'init', 'create_images_filter_post_type', 0 );

/**
 * Register Custom Taxonomy: Filter Category
 */
function create_filter_category_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Filter Categories', 'Taxonomy General Name', 'test-project' ),
        'singular_name'              => _x( 'Filter Category', 'Taxonomy Singular Name', 'test-project' ),
        'menu_name'                  => __( 'Filter Categories', 'test-project' ),
        'all_items'                  => __( 'All Categories', 'test-project' ),
        'parent_item'                => __( 'Parent Category', 'test-project' ),
        'parent_item_colon'          => __( 'Parent Category:', 'test-project' ),
        'new_item_name'              => __( 'New Category Name', 'test-project' ),
        'add_new_item'               => __( 'Add New Category', 'test-project' ),
        'edit_item'                  => __( 'Edit Category', 'test-project' ),
        'update_item'                => __( 'Update Category', 'test-project' ),
        'view_item'                  => __( 'View Category', 'test-project' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'test-project' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'test-project' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'test-project' ),
        'popular_items'              => __( 'Popular Categories', 'test-project' ),
        'search_items'               => __( 'Search Categories', 'test-project' ),
        'not_found'                  => __( 'Not Found', 'test-project' ),
        'no_terms'                   => __( 'No categories', 'test-project' ),
        'items_list'                 => __( 'Categories list', 'test-project' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'test-project' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );

    register_taxonomy( 'filter_category', array( 'images_filter' ), $args );
}
add_action( 'init', 'create_filter_category_taxonomy', 0 );


/**
 * AJAX handler for filtering images
 */
function filter_images_ajax_handler() {

    if (!wp_verify_nonce($_POST['nonce'], 'filter_images_nonce')) {
        wp_send_json_error('Security check failed');
        return;
    }
    
    $category_id = sanitize_text_field($_POST['category_id']);
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 6;
    
    $args = array(
        'post_type' => 'images_filter',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'post_status' => 'publish'
    );

    if ($category_id !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'filter_category',
                'field'    => 'term_id',
                'terms'    => intval($category_id),
            ),
        );
    }
    
    $images_query = new WP_Query($args);
    
    $output = '';
    $pagination = '';
    
    if ($images_query->have_posts()) {
        while ($images_query->have_posts()) {
            $images_query->the_post();
            $categories = get_the_terms(get_the_ID(), 'filter_category');
            $category_classes = '';
            if ($categories && !is_wp_error($categories)) {
                $category_ids = array();
                foreach ($categories as $category) {
                    $category_ids[] = 'cat-' . $category->term_id;
                }
                $category_classes = implode(' ', $category_ids);
            }
            
            $output .= '<div class="images-filter__wrapper__item ' . esc_attr($category_classes) . '">';
            $output .= '<a href="' . get_permalink() . '">';
            
            if (has_post_thumbnail()) {
                $output .= get_the_post_thumbnail(get_the_ID(), 'medium', array('alt' => get_the_title()));
            } else {
                $output .= '<img src="' . get_template_directory_uri() . '/img/image-filter.webp" alt="' . esc_attr(get_the_title()) . '">';
            }
            
            $output .= '</a>';
            $output .= '</div>';
        }
        
        // Generate pagination
        $total_pages = $images_query->max_num_pages;
        if ($total_pages > 1) {
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagination .= '<span class="active" data-page="' . $i . '">' . $i . '</span>';
                } else {
                    $pagination .= '<a href="#" data-page="' . $i . '">' . $i . '</a>';
                }
            }
        }
        
        wp_reset_postdata();
    } else {
        $output = '<p>No images found in this category.</p>';
    }
    
    wp_send_json_success(array(
        'html' => $output,
        'pagination' => $pagination,
        'show_pagination' => $images_query->found_posts > 6
    ));
}

// Hook for logged in users
add_action('wp_ajax_filter_images', 'filter_images_ajax_handler');
// Hook for non-logged in users
add_action('wp_ajax_nopriv_filter_images', 'filter_images_ajax_handler');