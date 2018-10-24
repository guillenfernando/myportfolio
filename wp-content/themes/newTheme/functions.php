<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'custom' ),
) );
function custom_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'custom' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ) );
}
add_action( 'widgets_init', 'custom_widgets_init' );

// always show admin bar
function pjw_login_adminbar( $wp_admin_bar) {
    if ( !is_user_logged_in() )
        $wp_admin_bar->add_menu( array( 'title' => __( 'Log In' ), 'href' => wp_login_url() ) );
}
add_action( 'admin_bar_menu', 'pjw_login_adminbar' );
add_filter( 'show_admin_bar', '__return_true' , 1000 );

/*Custom CSS*/

add_action( 'wp_enqueue_scripts', 'enqueue_custom_css' );
function enqueue_custom_css() {

    wp_enqueue_style( 'css', '/wp-content/themes/newTheme/style.css' );

}


/* Font Awesome */

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {

    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' );

}

function load_aos() { // load external file
    wp_deregister_script( 'aos' ); // deregisters the default WordPress jQuery
    wp_register_script('aos', ("https://unpkg.com/aos@2.3.1/dist/aos.js"), false);
    wp_enqueue_script('aos');
}
add_action('wp_enqueue_scripts', 'load_aos');

function js() { // load external file
    wp_deregister_script( 'js' ); // deregisters the default WordPress jQuery
    wp_register_script('js', ("https://code.jquery.com/jquery-3.3.1.min.js"), false);
    wp_enqueue_script('js');
}
add_action('wp_enqueue_scripts', 'js');

function popper() { // load external file
    wp_deregister_script( 'bpopper' ); // deregisters the default WordPress jQuery
    wp_register_script('bpopper', ("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"), false);
    wp_enqueue_script('bpopper');
}
add_action('wp_enqueue_scripts', 'popper');

function bootstrap() { // load external file
    wp_deregister_script( 'bjquery' ); // deregisters the default WordPress jQuery
    wp_register_script('bjquery', ("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"), false);
    wp_enqueue_script('bjquery');
}
add_action('wp_enqueue_scripts', 'bootstrap');

function customJS(){
    wp_deregister_script('script');
    wp_register_script('script', ('/wp-content/themes/newTheme/script.js'), true);
    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'customJS');


// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Projects', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add Project', 'text_domain' ),
		'new_item'              => __( 'New Project', 'text_domain' ),
		'edit_item'             => __( 'Edit Project', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'project', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'custom_post_type', 0 );


/*Menu*/
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );



add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);

function discard_menu_classes($classes, $item) {

    return (array)get_post_meta( $item->ID, '_menu_item_classes', true );
}

/*Walter menu*/

class IBenic_Walker extends Walker_Nav_Menu {
    // Our Code
}

class Walker_Quickstart_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     *
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "\n<a class='nav-link' href='%s'%s>%s</a>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

}