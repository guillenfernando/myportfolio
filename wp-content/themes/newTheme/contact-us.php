<?php /* Template Name: Contact Us */ ?>

<?php

//response generation function
$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('your website enguillenfernando.com');
$headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

        //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            my_contact_form_generate_response("error", $email_invalid);
        else //email is valid
        {
            //validate presence of name and message
            if(empty($name) || empty($message)){
                my_contact_form_generate_response("error", $missing_content);
            }
            else //ready to go!
            {
                $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
                else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
            }
        }

?>

<?php get_header(); ?>

    <div class="container">
    <div id="primary" class="site-content">
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="entry-header">
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>

                        <style type="text/css">
                            .error{
                                padding: 5px 9px;
                                border: 1px solid red;
                                color: red;
                                border-radius: 3px;
                            }

                            .success{
                                padding: 5px 9px;
                                border: 1px solid green;
                                color: green;
                                border-radius: 3px;
                            }

                            form span{
                                color: red;
                            }
                        </style>

                        <div id="respond">
                            <form action="<?php the_permalink(); ?>" method="post">
                                <div class="form-row justify-content-center">
                                    <div class="col-xs-12 col-md-8 col-lg-10">
                                        <h3>Get in Touch</h3>
                                        <p>Whether you would like my services for a project, get extra information on any of my work, ask me about this site or just say hello then I would love to hear from you.</p>
                                    </div>
                                </div>

                                <div class="form-row justify-content-center">
                                    <div class="col-xs-12 col-md-8 col-lg-10">
                                        <div class="form-row response">
                                            <div class="col-xs-6 col-12">
                                                <?php echo $response; ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-xs-6 col-12">
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" value="<?php echo esc_attr($_POST['message_name']); ?>" name="message_name" placeholder="Name" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-plus"></i></span>
                                            </div>
                                            <input type="email" class="form-control" value="<?php echo esc_attr($_POST['message_email']); ?>" name="message_email" placeholder="Email" />
                                        </div>
                                        <div class="form-group input-group">
                                            <textarea class="form-control" name="message_text" rows="4" placeholder="Message (required)"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                                        </div>

                                        <div class="form-row justify-content-start">
                                            <button type="submit" name="btncontact" class="button target contact-button" >Send Message</button>
                                            <input type="hidden" name="submitted" value="1" />
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>

                    </div><!-- .entry-content -->

                </article><!-- #post -->

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
    </div>

