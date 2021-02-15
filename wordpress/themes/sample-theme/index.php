<?php get_header();?>

<main class="noSidebar">
    <section id="slider" class="owl-carousel owl-theme">
        <?php   
            $args = array(
                'post_type'              => array( 'slider' ),
                'post_status'            => array( 'publish' ),
                'nopaging'               => false,
                'posts_per_page'         => '12',
                'ignore_sticky_posts'    => false,
                'order'                  => 'ASC',
                'orderby'                => 'menu_order',
            );

            // The Query
            $slider = new WP_Query( $args );
            ?>
            <?php if ( $slider->have_posts() ): ?>
                <?php while ( $slider->have_posts() ) : $slider->the_post();?> 
                    
                        <?php 
                        if ( has_post_thumbnail() ) {
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),"full");
                            echo '<div class="slide" style = "background-image: url('.$thumbnail.')">';
                            echo '<h1>'.get_the_title().'</h1>';
                            echo '</div>';
                        } 
                        ?>
                        
                <?php endwhile; ?>
            <?php endif; ?>
    </section>
    <section id="icons">
        <div class="maxWidth">
            <?php 
            $post = get_post(46);
            echo "<h1>$post->post_title</h1>";
            echo $post->post_content;
            ?>
            
                <?php   
            $args = array(
                'post_type'              => array( 'page' ),
                'post_status'            => array( 'publish' ),
                'nopaging'               => false,
                'posts_per_page'         => '4',
                'ignore_sticky_posts'    => false,
                'post_parent'            => 46,
                'order'                  => 'ASC',
                'orderby'                => 'menu_order',
            );

            // The Query
            $childs = new WP_Query( $args );
            ?>
            <?php if ( $childs->have_posts() ): ?>
                <?php while ( $childs->have_posts() ) : $childs->the_post();?> 
                    <div class="homeTile">
                        <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail("thumbnail");
                        } 
                        ?>
                        <a href="<?php the_permalink();?>">
                            <h2><?php the_title();?></h2>
                        </a>
                        <?php the_excerpt()?>
                        <a class="moreButton" href="<?php the_permalink();?>">Dowiedz się więcej</a>
                    </div>
                <?php endwhile; ?>
                <div class="clear"></div>
            <?php endif; ?>
            
        </div>
    </section>
    <section id="products">
        <div class="maxWidth">
            <h1 class="sectionTitle">Katalog produktów</h1>
            <?php 
                            
                                $args = array(
                                    'post_type'              => array( 'produkt' ),
                                    'post_status'            => array( 'publish' ),
                                    'nopaging'               => false,
                                    'posts_per_page'         => '3',
                                    'ignore_sticky_posts'    => false,
                                    'order'                  => 'DESC',
                                    'orderby'                => 'menu_order',
                                );

                            // The Query
                            $query = new WP_Query( $args );
                            ?>
                            <?php if ( $query->have_posts() ): ?>
                                <?php while ( $query->have_posts() ) : $query->the_post();?>
                                    <div class="homeBlogPost">
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
                            <?php endif; ?>
            <a href="katalog-produktow">
                <div class="homeBlogPost wievAllButton">
                    <i class="fas fa-eye"></i>
                    <h1>Zobacz wszystkie produkty</h1>
                </div>
            </a>
        </div>
    </section>
    <section id="testimonials">
        <div class="maxWidth">
            Tu będą opinie klientów
        </div>
    </section>
    <section id="blog">
        <div class="maxWidth">
        <h1 class="sectionTitle">Ostatnio na blogu</h1>
            <?php 
            $args = array(
                'post_type'              => array( 'post' ),
                'post_status'            => array( 'publish' ),
                'nopaging'               => false,
                'posts_per_page'         => '4',
                'ignore_sticky_posts'    => false,
                'order'                  => 'DESC',
                'orderby'                => 'menu_order',
            );

        // The Query
        $blogQuery = new WP_Query( $args );
        ?>
        <?php if ( $blogQuery->have_posts() ): ?>
            <?php while ( $blogQuery->have_posts() ) : $blogQuery->the_post();?>
                <div class="homeBlogPost">
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
        <?php else: ?>
            <h1>Nie ma jeszcze wpisów do wyświetlenia.</h1>
        <?php endif; ?>
            <div class="clear"></div>
        </div>
    </section>
</main>

<?php get_footer();?>