<?php /* Template Name: Portfolio */ ?>
<?php get_header();



?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <div class="container-fluid">
        <div class="row portfolio-wrapper justify-content-center">
            <div class="col-10">
                <div class="row align-items-center justify-content-center no-gutters">
                    <?php
                    $args = array(
                        'post_type'=>'projects',
                        'order_by'=>'post_date',
                        'order'=>'DESC',
                        'posts_per_page'=>-1
                    );
                    query_posts($args);
                    while ( have_posts() ) : the_post();
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
                        $img_link = esc_url($img[0]);
                        ?>

                        <div class="col-10 col-md-4 col-lg-3 text-center project-wrapper">
                            <div class="project-image">
                                <img src="<?php echo esc_url($img_link);?>" alt = '<?php the_title_attribute();?>'/>
                            </div>
                            <div class="project-content-wrap">
                                <h4 class="project-title">
                                    <a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
                                </h4>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile;  endif;?>
<?php get_footer(); ?>