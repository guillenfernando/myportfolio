<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
include( get_home_template() );
} else { ?>


    <?php

    get_header(); ?>

    <div id="home" class="container-fluid hero-wrapper">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-4 offset-lg-2 col-xl-4 offset-xl-2">
                <h1 class="main-title">Hi, I'm Fernando Guillén</h1>
                <p class="main-description">Computer Engineer focused on Web Development, with passion for E-learning platforms.</p>
            </div>
        </div>
    </div>

    <div id="portfolio" class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-10" data-aos="fade-up" data-aos-duration="2400">
                <h2 class="subtitle-fpage">My Latest Work</h2>
                <p class="subtitle-description">Take a look at some of my recent projects. <a href="" class="portfolio-button"></a></p>
                <button type="button" onclick="window.location.href='portfolio/'" class="btn button-viewAll">View All</button>
            </div>
        </div>
        <div class="row portfolio-wrapper justify-content-center">
            <div class="col-10">
                <div class="row align-items-center justify-content-center no-gutters">
                    <?php
                    $args = array(
                        'post_type'=>'projects',
                        'order_by'=>'post_date',
                        'order'=>'DESC',
                        'posts_per_page'=>6
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

    <div id="resume" class="container-fluid timeline-section">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-10" data-aos="fade-up" data-aos-duration="2400">
                    <h2 class="subtitle-fpage">Professional Experience</h2>
                    <p class="subtitle-description">Professional Experience and Education <a href="" class="portfolio-button"></a></p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-10">
                    <ul class="timeline">
                        <?php
                        $args = array(
                            'post_type'=>'Experience',
                            'posts_per_page'=>20,
                            'order'=>'ASC'
                        );
                        query_posts($args);
                        while ( have_posts() ) : the_post(); ?>
                        <li>
                            <a class="experience-title"><?php the_title(); ?></a>
                            <h4 class="experience-company"><?php the_field( 'company' ); ?></h4>
                            <span class="dates"><a class=""><?php the_field( 'start_date' ); ?></a>-<a class=""><?php the_field( 'end_date' ); ?></a></span>
                            <div class="experience-description"><?php the_content(); ?></div>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </div>
    </div>

    <div id="skills" class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-10">
                <h2 class="subtitle-fpage">Skills</h2>
            </div>
        </div>

        <div id="skill-bar-wrapper">
            <div class="row align-items-center justify-content-center">
                <div class="col-10">
                    <div class="row align-items-center justify-content-center">
                        <?php
                        $args = array(
                            'post_type'=>'skill',
                            'posts_per_page'=>20
                        );
                        query_posts($args);
                        while ( have_posts() ) : the_post(); ?>

                        <div class="col-10 col-md-8 col-lg-4">
                            <?php the_title(); ?><span class="percent" style="float:right;"><?php the_field( 'percentage' ); ?>%</span>
                            <div class="skillbar-container clearfix" data-percent="<?php the_field( 'percentage' ); ?>%">
                                <div class="skills" style="width: <?php the_field( 'percentage' ); ?>%" data-aos="fade-right" data-aos-duration="1000" data-aos-offset="35" data-aos-delay="20"></div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonials" class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-10">
                <h2 class="subtitle-fpage">Testimonials</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-10">
                <?php echo do_shortcode("[testimonial_view id=\"1\"]"); ?>
            </div>
        </div>
    </div>

    <div id="contact" class="container-fluid">
        <div class="row justify-content-center text-center contact-text">
            <div class="col-10">
                <h2 class="subtitle-fpage">Do you have a project in mind?</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center text-center contact-button">
            <div class="col-12">
                <button type="button" class="btn button-contact">Contact me</button>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>

 	<script>
        AOS.init();
    </script>

<?php } ?>