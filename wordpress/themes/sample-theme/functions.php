<?php

// Menu

add_theme_support('nav-menus');

register_nav_menus( array(
    'primary' => 'Menu glowne',
    'footer' => 'Menu w stopce'
));

// Thumbnails

add_theme_support( 'post-thumbnails',array('post','page','produkt','galeria','slider') );
add_image_size('horizontalThumb',1400,600,true);
add_image_size('productThumb',640,480,true);

// Lightbox


add_action( 'wp_enqueue_scripts', 'enqueue_fancybox' );
function enqueue_fancybox() {
 wp_enqueue_style( 'lightbox-css', get_bloginfo( 'stylesheet_directory' ) . '/js/lightbox/jquery.fancybox.css?v=2.1.5.css', array() );
 wp_enqueue_script( 'lightbox', get_bloginfo( 'stylesheet_directory' ) . '/js/lightbox/jquery.fancybox.pack.js?v=2.1.5', array( 'jquery' ), '1.3.5' );
 wp_enqueue_script( 'lightbox-init', get_stylesheet_directory_uri() . '/js/lightbox/lightbox-init.js', array( 'lightbox' ), '1.0.0', true );
}

// Sidebar

$args = array(
    'name' => 'Pasek boczny',
    'before_widget' => "<li class='widget sidebarWidget'>",
    'after_widget' => "</li>\n",
    'before_title' => "<h2 class='widgettitle'>",
    'after_title' => "</h2>\n"
);

register_sidebar($args);

// Footer

$args = array(
    'name' => 'Stopka 1',
    'before_widget' => "<div class='widget footerWidget footerWidgetHalf'>",
    'after_widget' => "</div>\n",
    'before_title' => "<h2 class='widgettitle'>",
    'after_title' => "</h2>\n"
);

register_sidebar($args);

$args = array(
    'name' => 'Stopka 2',
    'before_widget' => "<div class='widget footerWidget footerWidgetHalf'>",
    'after_widget' => "</div>\n",
    'before_title' => "<h2 class='widgettitle'>",
    'after_title' => "</h2>\n"
);

register_sidebar($args);

$args = array(
    'name' => 'Stopka 3',
    'before_widget' => "<div class='widget footerWidget footerWidgetQuarter'>",
    'after_widget' => "</div>\n",
    'before_title' => "<h2 class='widgettitle'>",
    'after_title' => "</h2>\n"
);

register_sidebar($args);

$args = array(
    'name'          => "Stopka 4",
    'before_widget' => '<div class="widget footerWidget footerWidgetQuarter">',
    'after_widget'  => "</div>\n",
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => "</h2>\n",
);

register_sidebar($args);

$args = array(
    'name'          => "Stopka 5",
    'before_widget' => '<div class="widget footerWidget footerWidgetQuarter">',
    'after_widget'  => "</div>\n",
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => "</h2>\n",
);

register_sidebar($args);

$args = array(
    'name'          => "Stopka 6",
    'before_widget' => '<li class="widget footerWidget footerWidgetQuarter">',
    'after_widget'  => "</li>\n",
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => "</h2>\n",
);

register_sidebar($args);

// Product custom post type

if ( ! function_exists('wpx_products_posttype') ) {

// Register Custom Post Type
function wpx_products_posttype() {

    $labels = array(
        'name'                  => _x( 'Produkty', 'Post Type General Name', 'wpx' ),
        'singular_name'         => _x( 'Produkt', 'Post Type Singular Name', 'wpx' ),
        'menu_name'             => __( 'Katalog produktów', 'wpx' ),
        'name_admin_bar'        => __( 'Katalog produktów', 'wpx' ),
        'archives'              => __( 'Lista produktów', 'wpx' ),
        'attributes'            => __( 'Atrybuty produktu', 'wpx' ),
        'parent_item_colon'     => __( 'Rodzic', 'wpx' ),
        'all_items'             => __( 'Wszystkie produkty', 'wpx' ),
        'add_new_item'          => __( 'Dodaj nowy produkt', 'wpx' ),
        'add_new'               => __( 'Dodaj produkt', 'wpx' ),
        'new_item'              => __( 'Nowy produkt', 'wpx' ),
        'edit_item'             => __( 'Edytuj produkt', 'wpx' ),
        'update_item'           => __( 'Zaktualizuj produkt', 'wpx' ),
        'view_item'             => __( 'Zobacz produkt', 'wpx' ),
        'view_items'            => __( 'Zobacz produkty', 'wpx' ),
        'search_items'          => __( 'Znajdź produkt', 'wpx' ),
        'not_found'             => __( 'Nie znaleziono', 'wpx' ),
        'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'wpx' ),
        'featured_image'        => __( 'Zdjęcie główne produktu', 'wpx' ),
        'set_featured_image'    => __( 'Ustaw zdjęcie główne', 'wpx' ),
        'remove_featured_image' => __( 'Usuń zdjęcie główne', 'wpx' ),
        'use_featured_image'    => __( 'Użyj jako zdjęcia głównego', 'wpx' ),
        'insert_into_item'      => __( 'Wstaw do produktu', 'wpx' ),
        'uploaded_to_this_item' => __( 'Wgraj do tego produktu', 'wpx' ),
        'items_list'            => __( 'Lista produktów', 'wpx' ),
        'items_list_navigation' => __( 'Nawigacja listy produktów', 'wpx' ),
        'filter_items_list'     => __( 'Filtruj produkty', 'wpx' ),
    );
    $args = array(
        'label'                 => __( 'Produkt', 'wpx' ),
        'description'           => __( 'Katalog produktów', 'wpx' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'products_categories' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-screenoptions',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
                'register_meta_box_cb' => 'wpx_add_produkt_metaboxes',
    );
    register_post_type( 'produkt', $args );

}
add_action( 'init', 'wpx_products_posttype', 0 );

}

if ( ! function_exists( 'wpx_products_taxonomy' ) ) {

// Register Custom Taxonomy
function wpx_products_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Kategorie produktów', 'Taxonomy General Name', 'wpx' ),
        'singular_name'              => _x( 'Kategoria produktów', 'Taxonomy Singular Name', 'wpx' ),
        'menu_name'                  => __( 'Kategorie produktów', 'wpx' ),
        'all_items'                  => __( 'Wszystkie kategorie', 'wpx' ),
        'parent_item'                => __( 'Kategoria nadżędna', 'wpx' ),
        'parent_item_colon'          => __( 'Kategoria nadżędna', 'wpx' ),
        'new_item_name'              => __( 'Nowa kategoria', 'wpx' ),
        'add_new_item'               => __( 'Dodaj kategorię', 'wpx' ),
        'edit_item'                  => __( 'Edytuj kategorię', 'wpx' ),
        'update_item'                => __( 'Zaktualizuj kategorię', 'wpx' ),
        'view_item'                  => __( 'Zobacz kategorię', 'wpx' ),
        'separate_items_with_commas' => __( 'Oddzielone przecinkami', 'wpx' ),
        'add_or_remove_items'        => __( 'Dodaj lub usuń elementy', 'wpx' ),
        'choose_from_most_used'      => __( 'Wybierz z najczęstszych', 'wpx' ),
        'popular_items'              => __( 'Popularne kategorie', 'wpx' ),
        'search_items'               => __( 'Wyszukaj', 'wpx' ),
        'not_found'                  => __( 'Nie znaleziono', 'wpx' ),
        'no_terms'                   => __( 'Brak elementów', 'wpx' ),
        'items_list'                 => __( 'Lista kategorii', 'wpx' ),
        'items_list_navigation'      => __( 'Nawigacja listy kategorii', 'wpx' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'products_categories', array( 'produkt' ), $args );

}
add_action( 'init', 'wpx_products_taxonomy', 0 );

}

function wpx_add_produkt_metaboxes() {
    add_meta_box(
        'wpx_produkt_location',             // ID metaboxu
        'Parametry produktu',                   // Tytuł
        'wpx_produkt_parameters',             // Funkcja wywołana przy ładowaniu metaboxu (zawiera jego treść)
        'produkt',                          // Slug typu wpisu
        'normal',                           // położenie metaboxu normal - pod treścią, side - w pasku bocznym
        'default'                           // priorytet wyświetlania
    );
}


//Treść metaboxa
function wpx_produkt_parameters() {
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'event_fields' ); // Zabezpieczenie przed zmianą z zewnątrz

        
    $price = get_post_meta( $post->ID, 'wpx_price', true ); 
        $reltime = get_post_meta( $post->ID, 'wpx_reltime', true ); 
        $param = get_post_meta( $post->ID, 'wpx_param', true ); 
    echo 'Cena: <input type="text" name="wpx_price" value="' . esc_textarea( $price )  . '" class="widefat">';
        echo '<br/>Czas realizacji: <input type="text" name="wpx_reltime" value="' . esc_textarea( $reltime )  . '" class="widefat">';
        echo '<br/>Inny parametr: <input type="text" name="wpx_param" value="' . esc_textarea( $param )  . '" class="widefat">';
}

//Funkcja zapisu
function wpx_save_produkt_meta( $post_id, $post ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) { //Sprawdzamy prawa użytkownika
        return $post_id;
    }
        
    if ( ! isset( $_POST['wpx_price'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) { //Sprawdzamy czy metabox nie został wywołany z zewnątrz
        return $post_id;
    }
    
        // Dla wygody pakujemy dane do tablicy 
    $wpx_post_meta['wpx_price'] = esc_textarea( $_POST['wpx_price'] );
        $wpx_post_meta['wpx_reltime'] = esc_textarea( $_POST['wpx_reltime'] );
        $wpx_post_meta['wpx_param'] = esc_textarea( $_POST['wpx_param'] );
        
    foreach ( $wpx_post_meta as $key => $value ) :
        // Nie zapisujemy danych dla rewizji wpisów (oszczędność miejca w bazie danych)
        if ( 'revision' === $post->post_type ) {
            return;
        }
        if ( get_post_meta( $post_id, $key, false ) ) {
            //Jeśli to aktualizacja - aktualizujemy wartość
            update_post_meta( $post_id, $key, $value );
        } else {
            // Jeśli nie to dodajemy wartość
            add_post_meta( $post_id, $key, $value);
        }
        if ( ! $value ) {
            // Jeśli wartość to pusty string usuwamy post_meta (kolejna oszczędność bazy danych)
            delete_post_meta( $post_id, $key );
        }
    endforeach;
}
add_action( 'save_post', 'wpx_save_produkt_meta', 1, 2 );

// ACF Gallery

if ( ! function_exists('wpx_gallery_posttype') ) {

// Register Custom Post Type
function wpx_gallery_posttype() {

    $labels = array(
        'name'                  => _x( 'Galeria', 'Post Type General Name', 'wpx' ),
        'singular_name'         => _x( 'Galeria', 'Post Type Singular Name', 'wpx' ),
        'menu_name'             => __( 'Galeria', 'wpx' ),
        'name_admin_bar'        => __( 'Galeria', 'wpx' ),
        'archives'              => __( 'Galerie', 'wpx' ),
        'attributes'            => __( 'Atrybuty gaelerii', 'wpx' ),
        'parent_item_colon'     => __( 'Rodzic', 'wpx' ),
        'all_items'             => __( 'Wszystkie galerie', 'wpx' ),
        'add_new_item'          => __( 'Dodaj nowy album', 'wpx' ),
        'add_new'               => __( 'Dodaj album', 'wpx' ),
        'new_item'              => __( 'Nowy album', 'wpx' ),
        'edit_item'             => __( 'Edytuj album', 'wpx' ),
        'update_item'           => __( 'Zaktualizuj album', 'wpx' ),
        'view_item'             => __( 'Zobacz album', 'wpx' ),
        'view_items'            => __( 'Zobacz albumy', 'wpx' ),
        'search_items'          => __( 'Znajdź album', 'wpx' ),
        'not_found'             => __( 'Nie znaleziono', 'wpx' ),
        'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'wpx' ),
        'featured_image'        => __( 'Zdjęcie główne albumu', 'wpx' ),
        'set_featured_image'    => __( 'Ustaw zdjęcie główne', 'wpx' ),
        'remove_featured_image' => __( 'Usuń zdjęcie główne', 'wpx' ),
        'use_featured_image'    => __( 'Użyj jako zdjęcia głównego', 'wpx' ),
        'insert_into_item'      => __( 'Wstaw do albumu', 'wpx' ),
        'uploaded_to_this_item' => __( 'Wgraj do tego albumu', 'wpx' ),
        'items_list'            => __( 'Lista albumów', 'wpx' ),
        'items_list_navigation' => __( 'Nawigacja listy albumów', 'wpx' ),
        'filter_items_list'     => __( 'Filtruj albumy', 'wpx' ),
    );
    $args = array(
        'label'                 => __( 'Galeria', 'wpx' ),
        'description'           => __( 'Galeria', 'wpx' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'taxonomies'            => array( '' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-image',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'galeria', $args );

}
add_action( 'init', 'wpx_gallery_posttype', 0 );

}

// ACF Slider

if ( ! function_exists('wpx_slider_posttype') ) {

// Register Custom Post Type
function wpx_slider_posttype() {

    $labels = array(
        'name'                  => _x( 'Slider', 'Post Type General Name', 'wpx' ),
        'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'wpx' ),
        'menu_name'             => __( 'Slider', 'wpx' ),
        'name_admin_bar'        => __( 'Slider', 'wpx' ),
        'archives'              => __( 'Slider', 'wpx' ),
        'attributes'            => __( 'Atrybuty slajdu', 'wpx' ),
        'parent_item_colon'     => __( 'Rodzic', 'wpx' ),
        'all_items'             => __( 'Wszystkie slajdy', 'wpx' ),
        'add_new_item'          => __( 'Dodaj nowy slajd', 'wpx' ),
        'add_new'               => __( 'Dodaj slajd', 'wpx' ),
        'new_item'              => __( 'Nowy slajd', 'wpx' ),
        'edit_item'             => __( 'Edytuj slajd', 'wpx' ),
        'update_item'           => __( 'Zaktualizuj slajd', 'wpx' ),
        'view_item'             => __( 'Zobacz slajd', 'wpx' ),
        'view_items'            => __( 'Zobacz slajdy', 'wpx' ),
        'search_items'          => __( 'Znajdź slajd', 'wpx' ),
        'not_found'             => __( 'Nie znaleziono', 'wpx' ),
        'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'wpx' ),
        'featured_image'        => __( 'Zdjęcie główne slajdu', 'wpx' ),
        'set_featured_image'    => __( 'Ustaw zdjęcie główne', 'wpx' ),
        'remove_featured_image' => __( 'Usuń zdjęcie główne', 'wpx' ),
        'use_featured_image'    => __( 'Użyj jako zdjęcia głównego', 'wpx' ),
        'insert_into_item'      => __( 'Wstaw do slajdu', 'wpx' ),
        'uploaded_to_this_item' => __( 'Wgraj do tego slajdu', 'wpx' ),
        'items_list'            => __( 'Lista slajdów', 'wpx' ),
        'items_list_navigation' => __( 'Nawigacja listy slajdów', 'wpx' ),
        'filter_items_list'     => __( 'Filtruj slajdy', 'wpx' ),
    );
    $args = array(
        'label'                 => __( 'Slider', 'wpx' ),
        'description'           => __( 'Slider', 'wpx' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail'),
        'taxonomies'            => array( '' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-image',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'slider', $args );

}
add_action( 'init', 'wpx_slider_posttype', 0 );

}

// Load slider carousel js

add_action( 'wp_enqueue_scripts', 'enqueue_owl' );

function enqueue_owl() {
    wp_enqueue_style( 'owl-css', get_bloginfo( 'stylesheet_directory' ) . '/js/owl/dist/assets/owl.carousel.min.css', array() );
    wp_enqueue_style( 'owl-css2', get_bloginfo( 'stylesheet_directory' ) . '/js/owl/dist/assets/owl.theme.default.min.css', array() );
    
    wp_enqueue_script( 'owl', get_bloginfo( 'stylesheet_directory' ) . '/js/owl/dist/owl.carousel.min.js', array( 'jquery' ), '1.3.5' );
    wp_enqueue_script( 'owl-init', get_stylesheet_directory_uri() . '/js/owl/owl-init.js', array( 'lightbox' ), '1.0.0', true );
}