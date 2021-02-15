<?php

// Menu

add_theme_support('nav-menus');

register_nav_menus( array(
    'primary' => 'Menu glowne',
    'footer' => 'Menu w stopce'
));

// Thumbnails

add_theme_support('post-thumbnails');
add_image_size('horizontalThumb',1400,600,true);
add_image_size('productThumb',640,480,true);

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