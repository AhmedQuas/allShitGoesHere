<?php get_header();?>

<main class="sidebar">
    <article class="page">
        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post();?>
                <h1 class="pageTitle"><?php the_title(); ?></h1>
                    <div class="maxWidth">
                        <div id="pageContent">
                        <?php 
                            if ( get_post_gallery() ) :
                            $gallery = get_post_gallery( get_the_ID(), false );
                            $ids = explode(',',$gallery['ids']);
                            $i = 0;
                            foreach( $ids as $id ) {
                                $thumb = wp_get_attachment_image_src($id,'productThumb');
                                $thumbSrc = $thumb[0];
                                $image = wp_get_attachment_image_src($id,'full');
                                $imageSrc = $image[0];
                                ?>
                                <a class="fancybox galleryItem" href="<?php echo $imageSrc; ?>" rel="galeria">
                                    <div class="galleryMask"><i class="fas fa-search"></i></div>
                                    <img src="<?php echo $thumbSrc; ?>" alt="Gallery image" />
                                </a>
                            <?php
                            }
                            else:
                                echo "Brak obrazków do wyświetlenia. <br/>Ten album jest pusty.";
                            endif;
                                ?>
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