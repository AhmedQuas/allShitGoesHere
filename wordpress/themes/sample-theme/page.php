<?php get_header();?>
    
    <main class="noSidebar">
        <article>
            <?php if (have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>
                    <h1 class='pageTitle'><?php the_title(); ?></h1>
                    <div class='maxWidth'>
                        <div class='pageContent'>
                            <?php the_content(); ?>
                        </div>
                        <?php get_sidebar(); ?>
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

<?php get_footer();?>