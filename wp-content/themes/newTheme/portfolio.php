<?php /* Template Name: Portfolio */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>

    <?php
    $args = array(
        'post_type'=>'projects',
        'order_by'=>'date',
        'order'=>'ASC',
        'posts_per_page'=>6
    );
    query_posts($args);
    while ( have_posts() ) : the_post();
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
        $img_link = esc_url($img[0]);
        ?>

        <div class="col-4 text-center project-wrapper" data-aos="fade-up" data-aos-duration="2400">
            <div class="project-image">
                <img src="<?php echo esc_url($img_link);?>" alt = '<?php the_title_attribute();?>' />
            </div>
            <div class="project-content-wrap">
                <h4 class="project-title">
                    <a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
                </h4>
                <p class="project-description"> <?php echo get_the_content(); ?></p>
            </div>
        </div>

    <?php
    endwhile;
    wp_reset_query();
    ?>

<?php endwhile;  endif;?>
<?php get_footer(); ?>