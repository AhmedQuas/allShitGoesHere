<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/css/responsive.css' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body>
<div id="page">
    <header>
        <div id="blackBar">
            <div class="maxWidth">
                <div id="companyPhone">
                    Zadzwoń do nas: NUMER TELEFONU
                </div>
                <div id="companySocials">
                        <?php 
                        if(get_theme_mod("wpx_fb")){
                        ?>  
                    <a href="<?php echo get_theme_mod("wpx_fb")?>">
                        <i class="fab fa-facebook"></i>
                    </a>
                        <?php } ?>
                        <?php 
                        if(get_theme_mod("wpx_tw")){
                        ?>  
                    <a href="<?php echo get_theme_mod("wpx_tw")?>">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                        <?php } ?>
                        <?php 
                        if(get_theme_mod("wpx_inst")){
                        ?>  
                    <a href="<?php echo get_theme_mod("wpx_inst")?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                        <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="maxWidth">
            <div id="whiteBar">
                <div id='siteLogo'>
                    <a href="<?php bloginfo('url'); ?>">
                        <?php 
                        if(get_theme_mod("wpx_logo")){
                        ?>    
                        <img src="<?php echo get_theme_mod("wpx_logo") ?>" alt="logo">
                        <?php } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/logo.png'" alt="logo">
                        <?php } ?>
                        
                        <hgroup>
                            <h1>Firma krzak</h1>
                            <h2>Dbamy o zieleń od 1995 roku!</h2>
                        </hgroup>
                    </a>
                </div>
                <span id="mobileMenu"><i class="fas fa-bars"></i></span>
                <?php wp_nav_menu( array( 'theme_location' =>  'primary', 'container' => 'nav', 'container_id' => 'mainMenu' ) ); ?>
                <span id="showSearchForm"><i class="fas fa-search"></i></span>
                <div id="searchForm">
                    <?php get_search_form();?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        </header>