<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/css/basic.css' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
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
                        Linki społecznościowe
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="maxWidth">
                <div id="whiteBar">
                    <div id='siteLogo'>
                        <a href="<?php bloginfo('url'); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png'" alt="logo">
                            <hgroup>
                                <h1>Kirma krzak</h1>
                                <h2>Dbamy o zieleń od 1995 roku!</h2>
                            </hgroup>
                        </a>
                    </div>
                    <nav id="mainMenu">
                        <ul>
                            <li><a href="#">Strona główna</a></li>
                            <li><a href="#">O nas</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Produkty</a></li>
                            <li><a href="#">Kontakt</a></li>
                        </ul>
                    </nav>
                    <div id="searchForm">
                        Tu będzie wyszukiwarka
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </header>