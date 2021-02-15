<?php get_header();?>

<main class="sidebar">
    <article class="page">
        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post();?>
                <h1 class="pageTitle"><?php the_title(); ?></h1>
                    <div class="maxWidth">
                        <div id="pageContent">
                            <div class="procuctThumb">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail("productThumb"); 
                            } 
                            ?>
                            </div>
                            <?php 
                                $price = get_post_meta(get_the_ID(),"wpx_price",true);
                                $time = get_post_meta(get_the_ID(),"wpx_reltime",true);
                                $param = get_post_meta(get_the_ID(),"wpx_param",true)
                            ?>
                            <h3 class="productInfoHeader">Informacje o produkcie</h3>
                            <table class="procuctDetails">
                                <?php if($price != "") {?>
                                <tr>
                                    <td>
                                        Cena:
                                    </td>
                                    <td>
                                        <?php echo $price?> PLN.
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($time != "") {?>
                                <tr>
                                    <td>
                                        Czas realizacji
                                    </td>
                                    <td>
                                        <?php echo $time?> Dni.
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($param != "") {?>
                                <tr>
                                    <td>
                                        Trzeci parametr
                                    </td>
                                    <td>
                                        <?php echo $param ?> .
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <h3 class="productInfoHeader">Opis produktu</h3>
                            <?php the_content(); ?>
                            Produkt w kategorii:
                            <?php 
                                $terms = get_the_terms(get_the_ID(),'products_categories');
                                foreach ($terms as $term){
                                    echo "<a href = '".get_term_link($term)."'>";
                                    echo $term->name." ";
                                    echo "</a>";
                                }
                            ?> 
                            <?php comments_template();?>
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