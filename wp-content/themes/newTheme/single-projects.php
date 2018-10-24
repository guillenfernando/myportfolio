<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-10">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php if ( get_field( 'slide_1') ) { ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php the_field( 'slide_1' ); ?>" alt="First slide">
                            </div>
                        <?php } ?>

                        <?php if ( get_field( 'slide_2') ) { ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php the_field( 'slide_2' ); ?>" alt="Second slide">
                            </div>
                        <?php } ?>

                        <?php if ( get_field( 'slide_3') ) { ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php the_field( 'slide_3' ); ?>" alt="Third slide">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php the_content(); ?>

<?php endwhile;  endif;?>
<?php get_footer(); ?>