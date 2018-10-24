<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
include( get_home_template() );
} else { ?>


    <?php

    get_header(); ?>

    <div class="container-fluid hero-wrapper">

        <div class="row justify-content-start align-items-center">
            <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-4 offset-lg-2 col-xl-4 offset-xl-2">
                    <h1 class="main-title">Fernando Guillén</h1>
                    <p class="main-description">Freelance Web Developer based in Miami, Florida. Highly experienced in designing & developing custom Wordpress websites.</p>
            </div>
            <div class="col-lg-4 front-page-logo d-none d-lg-block">

            </div>
        </div>
    </div>

    <div class="container-fluid portfolio" data-aos="fade-left" data-aos-duration="2400">
        <div class="row justify-content-center text-center">
            <div class="col-6">
                <h2 class="subtitle-fpage">Portfolio</h2>
                <button type="button" class="btn btn-primary portfolio-button">View All</button>
            </div>
        </div>
            <div class="row portfolio-wrapper justify-content-center no-gutters">
                <div class="col-10">
                    <div class="row align-items-center justify-content-center no-gutters">
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

                            <div class="col-4 text-center project-wrapper">
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
                    </div>
                </div>
            </div>
    </div>

    <div id="resume" class="container timeline-section">
        <h2 class="subtitle-fpage">Resume</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline">
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-globe"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Full Stack Web Developer</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Web Developer Jr</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-globe"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Full Stack Web Developer</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Web Developer Jr</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-globe"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Full Stack Web Developer</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                    <a href="#" class="timeline">
                        <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                        <div class="timeline-content">
                            <h3 class="title">Web Developer Jr</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus officiis quod! Aperiam eveniet nam nostrum odit quasi ullam voluptatum.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid skills-section">
        <div class="row justify-content-center text-center">
            <div class="col-6">
                <h2 class="subtitle-fpage">Skills</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

            <div class="col-4">
                <p>HTML</p>
                <div class="skill-wrapper">
                    <div class="skills html">90%</div>
                </div>
            </div>

        </div>
    </div>



    <?php get_footer(); ?>

 	<script>
        AOS.init();
    </script>

    <script>
        $("li a").click(function() {
            $('html,body').animate({
                    scrollTop: $("#resume").offset().top},
                'slow');
        });
    </script>

<?php } ?>