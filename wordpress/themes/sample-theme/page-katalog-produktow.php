<?php get_header();?>

<main class="sidebar">
    <article class="page">
        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post();?>
                <h1 class="pageTitle"><?php the_title(); ?></h1>
                    <div class="maxWidth">
                        <div id="pageContent">
                            <?php the_content(); ?>
                            <br/>
                            <form id="filter" action="" method="post">
                                Pokaż tylko wybrane kategorie:<br/><br/>
                                <?php 
                                $terms = get_terms("products_categories", array('hide_empty' => true));
                                foreach ($terms as $term) {
                                    echo "<input type = 'checkbox' name = 'pcat[]' value = '$term->term_id'/> ".$term->name;
                                }
                                ?>
                                <input id = 'filterSubmit' type="submit" value="zobacz"/>
                            </form>
                            <br/>
                            <?php 
                            $pcat = $_POST["pcat"];
                            if($pcat) {
                                $args = array(
                                    'post_type'              => array( 'produkt' ),
                                    'post_status'            => array( 'publish' ),
                                    'nopaging'               => false,
                                    'posts_per_page'         => '12',
                                    'ignore_sticky_posts'    => false,
                                    'order'                  => 'DESC',
                                    'orderby'                => 'menu_order',
                                    'tax_query' => array(
                                        array(
                                                'taxonomy' => 'products_categories',
                                                'field'    => 'id',
                                                'terms'    => $pcat,
                                            ),
                                        ),
                                );
                            } else {
                                $args = array(
                                    'post_type'              => array( 'produkt' ),
                                    'post_status'            => array( 'publish' ),
                                    'nopaging'               => false,
                                    'posts_per_page'         => '12',
                                    'ignore_sticky_posts'    => false,
                                    'order'                  => 'DESC',
                                    'orderby'                => 'menu_order',
                                );
                            }

                            // The Query
                            $query = new WP_Query( $args );
                            ?>
                            <?php if ( $query->have_posts() ): ?>
                                <?php while ( $query->have_posts() ) : $query->the_post();?>
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
                            <?php endif; ?>
                            
                            
                        </div>
                        <?php get_sidebar();?>
                        <div class="clear"></div>
                    </div>    
            <?php endwhile; ?>
        <?php else: ?>       
                <h1 class="pageTitle">Błąd</h1>
                    <div class="maxWidth">
                        Coś poszło nie tak...
                    </div>  
        <?php endif; ?>
        
    </article>
</main>

<?php get_footer();?>