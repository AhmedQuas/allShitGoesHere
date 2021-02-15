<?php get_header();?>

<main class="sidebar">
    <article class="page">
        <?php the_archive_title( '<h1 class="pageTitle">', '</h1>' ); ?>

        <div class="maxWidth">
            <div id="pageContent">
                    <?php if ( have_posts() ): ?>
                        <?php while ( have_posts() ) : the_post();?>

                <div class="blogPost">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail("thumbnail");
                    } 
                    ?>
                    <div class="mask">
                        <h1>
                            <a href="<?php the_permalink();?>">
                            <?php the_title(); ?>
                            </a>
                        </h1>
                        <span class="postDate"><?php echo get_the_date('j F Y');?></span>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                        <?php endwhile; ?>
                <div class="clear"></div>
                <?php # posts_nav_link(); ?>
                <?php 
                if(function_exists("wp_paginate")){
                    wp_paginate();
                } else {
                        posts_nav_link();
                }
                ?>
                    <?php else: ?>       
                        Coś poszło nie tak...
                    <?php endif; ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div> 
    </article>
</main>

<?php get_footer();?>