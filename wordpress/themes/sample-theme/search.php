<?php get_header();?>
    
    <main class="noSidebar">
        <article>
            <h1 class='pageTitle'>Wyniki wyszukiwania</h1>
            <div class='maxWidth'>
                <div class='pageContent'>
                    <?php if (have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                            <div>
                                <h2>
                                    <a href='<?php the_permalink(); ?>'>
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <h2>Brak wynikow wyszukiwania</h2>
                        <div class='maxWidth'>
                            Cos
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    </main>

<?php get_footer();?>