<?php get_header();?>
            <main class="noSidebar">
                <section id="slider">
                    <h1>Tu będzie slider</h1>
                </section>
                <section id="icons">
                    <div class="maxWidth">
                        Tu będą ikonki mocnych stron firmy
                    </div>
                </section>
                <section id="testimonials">
                    <div class="maxWidth">
                        Tu będą opinie klientów
                    </div>
                </section>
                <section id="blog">
                    <div class="maxWidth">
                        <?php if (have_posts()): ?>
                                <?php while (have_posts()) : the_post();?>
                                <div class='homeBlogPost'>
                                    <?php
                                    if (has_post_thumbnail()){
                                        the_post_thumbnail('thumbnail');
                                    }
                                    ?>
                                    <div class='mask'>
                                        <h1><?php the_title(); ?></h1>
                                        <span class='postDate'>
                                            <?php // the_date();?>
                                            <?php echo get_the_date('j F Y'); ?>
                                        </span>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <h1>Nie ma jeszcze wpisow do wyswietlenia</h1>
                            <?php endif; ?>
                        <div class='clear'></div>
                    </div>
                </section>
            </main>
<?php get_footer();?>