<?php
/* Template name: Bez paska landing*/
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/css/basic.css' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<main class="noSidebar">
    <article>
        <?php if (have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <h1 class='pageTitle'><?php the_title(); ?></h1>
                <div class='maxWidth'>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <h1 class='pageTitle'>Blad</h1>
            <div class='maxWidth'>
                Cos poszlo nie tak...
            </div>
        <?php endif; ?>
    </article>
</main>
<?php wp_footer() ?>
</body>
</html>