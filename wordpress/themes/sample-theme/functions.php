<?php

// Menu

add_theme_support('nav-menus');

register_nav_menus( array(
    'primary' => 'Menu glowne',
    'footer' => 'Menu w stopce'
));

// Thumbnails

add_theme_support('post-thumbnails');

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