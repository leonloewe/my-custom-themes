<?php

/**
 * downloadable scripts and styles
 */
function load_style_script(){

    wp_enqueue_script('jquery-google', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
/*    wp_enqueue_script('jquery-modernizr', get_template_directory_uri() . '/js/modernizr.custom.17475.js');*/
    wp_enqueue_script('jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js');
    wp_enqueue_script('jquery-owl-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('font-awesome6', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap2', get_template_directory_uri() . '/css/bootstrap.css');
   /* wp_enqueue_style('elastislide', get_template_directory_uri() . '/css/elastislide.css');*/
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('owl.theme', get_template_directory_uri() . '/css/owl.theme.css');
    wp_enqueue_style('owl.transitions', get_template_directory_uri() . '/css/owl.transitions.css');
}

/**
 * load scripts and styles
 */
add_action('wp_enqueue_scripts', 'load_style_script');

/**
 * register menus
 **/
register_nav_menus(array(
    'header_menu' => 'Main menu',
    'footer_menu' => 'Footer Menu'
));

/**
* thumbnail support
**/
add_theme_support('post-thumbnails');
/**
* Footer
**/
register_sidebar(array(
				'name' => 'Footer',
				'id' => 'footer',
				'description' => 'Add links to social networks via the text widget',
				'before_widget' => '',
				'after_widget' => ''));




register_sidebar(array(
                'name' => 'Header Logo',
                'id' => 'header_logo',
                'description' => 'Change Logo In Header',
                'before_widget' => '',
                'after_widget' => ''));


register_sidebar(array(
                'name' => 'Footer Logo',
                'id' => 'footer_logo',
                'description' => 'Change Logo In Footer',
                'before_widget' => '',
                'after_widget' => ''));

register_sidebar(array(
    'name' => 'Footer Social Icons',
    'id' => 'social_icons',
    'description' => 'Change or Add Social Icons In Footer',
    'before_widget' => '',
    'after_widget' => ''));



/**
* Slider bottom Start
*/


function Slider_img(){
    $labels = array(
        'name' => 'Slider', 
        'singular_name' => 'Carousel Slider Bottom', 
        'add_new' => 'Add New',
        'menu_name' => 'Our satisfied customers'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail'),
        'menu_icon'   => 'dashicons-images-alt2'
    );
    register_post_type('Sliders', $args);

}
add_action('init', 'Slider_img');
add_action('save_post', 'link_details');
function link_cb(){
    global $post;
    $custom = get_post_custom($post->ID);
    $id = $custom["link"][0];
    echo "<input type='url' name='link' value='".$id."' style='width: 100%'/>";
}

function link_details(){
    global $post;

    if(isset($_POST["link"])){
        update_post_meta($post->ID, "link", $_POST["link"]);
    }

}
add_action('admin_init', 'link_meta');

function link_meta(){
    add_meta_box("link", "link to", "link_cb", "Sliders", "normal", "high");
}

/**
* Slider bottom End
*/

/* Option Start */

  function my_more_options(){
      add_settings_field(
          'a_title',
          'Address Title',
          'display_add_title',
          'general'
      );

      register_setting(
          'general',
          'my_a_title'
      );
  }

  add_action('admin_init','my_more_options');

  function display_add_title(){
      echo "<input class='regular-text ltr' type='text' name='my_a_title' value='".get_option('my_a_title')."'>  "  ;
  }







function my_more_option(){
    add_settings_field(
        'addres',
        'Address',
        'display_address',
        'general'
    );

    register_setting(
        'general',
        'my_address'
    );
}

add_action('admin_init','my_more_option');

function display_address(){
    echo "<input class='regular-text ltr' type='text' name='my_address' value='".get_option('my_address')."'>  "  ;
}



function my_more_option_c(){
    add_settings_field(
        'copyright',
        'Copyright',
        'display_copy',
        'general'
    );

    register_setting(
        'general',
        'my_copyright'
    );
}

add_action('admin_init','my_more_option_c');

function display_copy(){
    echo "<input class='regular-text ltr' type='text' name='my_copyright' value='".get_option('my_copyright')."'>  "  ;
}



/* Option End  */










/**
* comments
*/
if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 40 ); ?>
                <?php printf( __( '%s<span class="says"></span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s в %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Редактировать)', 'twentyten' ), ' ' );
                ?>
            </div><!-- .comment-meta .commentmetadata -->

            <div class="comment-body"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </div><!-- #comment-##  -->

    <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
    <?php
            break;
    endswitch;
}
endif;




//Creating Theme Options Page
function theme_options($param) {
    if(get_option('irny_theme_options')){
        $irny_theme_options=get_option('irny_theme_options');
    }
    else{
        add_option('irny_theme_options',array(
            'social'=>array(
                'facebook_url'=>'',
                'twitter_url'=>'',
                'googleplus_url'=>'',
                'pinterest_url'=>'',
                'linkedin_url'=>''
            ),
            'theme_layout'=>'',
            'logo'=>'',
            'background_image'=>'',

        ));
        $irny_theme_options=get_option('irny_theme_options');

    }
    if(isset($_POST['submit'])){
        if(isset($_POST['layout'])){
            $layout='default';
        }
        $updated_options=array(
            'social'=>array(
                'facebook_url'=>$_POST['facebook_url'],
                'twitter_url'=>$_POST['twitter_url'],
                'googleplus_url'=>$_POST['googleplus_url'],
                'pinterest_url'=>$_POST['pinterest_url'],
                'linkedin_url'=>$_POST['linkedin_url'],
            ),
            'theme_layout'=>$layout,
            'logo'=>$_POST['logo'],
            'background'=>$_POST['background']
        );
        update_option('irny_theme_options',$updated_options);
        $irny_theme_options=$updated_options;
    }


    ?>
    <div class="wrap theme_options_panel">
        <div class="aside">
            <h2>Theme Options</h2>
        <div class="main">

            <div class="main_body">
                <form action="themes.php?page=themeoptions" method="post" enctype="multipart/form-data">
                    <table class="form-table">
                        <tr>
                            <td>
                                <label for="facebook_url">Facebook URL</label>
                            </td>
                            <td>
                                <input type="text" name="facebook_url" placeholder="https://" id="facebook_url" value="<?php echo $irny_theme_options['social']['facebook_url']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="twitter_url">Twitter URL</label>
                            </td>
                            <td>
                                <input type="text" name="twitter_url" placeholder="https://"  id="twitter_url" value="<?php echo $irny_theme_options['social']['twitter_url']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pinterest_url">Pinterest URL</label>
                            </td>
                            <td>
                                <input type="text" name="pinterest_url" placeholder="https://"  id="pinterest_url" value="<?php echo $irny_theme_options['social']['pinterest_url']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="googleplus_url">Google Plus URL</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus_url" placeholder="https://"  id="googleplus_url" value="<?php echo $irny_theme_options['social']['googleplus_url']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="linkedin_url">LinkedIn URL</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin_url" placeholder="https://"  id="linkedin_url" value="<?php echo $irny_theme_options['social']['linkedin_url']; ?>">
                            </td>
                        </tr>





                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Save Changes"/>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>




                </form>
            </div>
        </div>
    </div>
    <?php



}
add_action('admin_menu','irny_theme_options_create');
function irny_theme_options_create(){
    add_submenu_page('themes.php','Theme Options','Theme Options',8,'themeoptions','theme_options');
}
// End of Theme Options
