<?php

/* Downloadable scripts and styles
/* ---------------------------------------------------------------------- */
function load_style_script(){
    /*Stiles*/
    wp_enqueue_style('style-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css');
    wp_enqueue_style('style52', get_template_directory_uri() . '/css/style52.css');
    wp_enqueue_style('jquery.signature', get_template_directory_uri() . '/css/jquery.signature.css');

    /* Scripts */
    wp_enqueue_script('jquery-google', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
    wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
    wp_enqueue_script('jquery-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('jquery-angular.min', get_template_directory_uri() . '/js/angular.min.js');
    wp_enqueue_script('jquery-placeholders.min', get_template_directory_uri() . '/js/placeholders.min.js');
    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/js/custom.js');
    wp_enqueue_script('jquery-jquery.signature.min', get_template_directory_uri() . '/js/jquery.signature.min.js');
}

/* Load scripts and styles
/* ---------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'load_style_script');

/* Integration woocommerce
/* ---------------------------------------------------------------------- */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start(){
    echo '<section id="main" class="container">';
}

function my_theme_wrapper_end(){
    echo '</section>';
}

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support(){
    add_theme_support('woocommerce');
}

/* Woocommerce shop page pagination
/* ---------------------------------------------------------------------- */
add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'), 20);

/* Register menus
/* ---------------------------------------------------------------------- */
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'footer_menu' => 'Footer menu'
    ));
});

/* Thumbnail support
/* ---------------------------------------------------------------------- */
add_theme_support('post-thumbnails');

/* images size
/* ---------------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('small-thumb', 240, 180, true);
    add_image_size('medium-thumb', 360, 300, true);
    add_image_size('single-thumb', 652, 442, true);
    add_image_size('large-thumb', 800, 450, true);
}

/* Setings Copyright
/* ---------------------------------------------------------------------- */
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

add_action('admin_init', 'my_more_option_c');

function display_copy(){
    echo "<input class='regular-text ltr' type='text' name='my_copyright' value='" . get_option('my_copyright') . "'>  ";
}

/* Register sidebar
/* ---------------------------------------------------------------------- */
register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="col-sm-12 blog-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

/* Pagination
/* ---------------------------------------------------------------------- */
function wp_corenavi(){
    global $wp_query, $wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0;
    $a['mid_size'] = 2;
    $a['end_size'] = 1;
    $a['prev_text'] = '&laquo;';
    $a['next_text'] = '&raquo;';

    if ($max > 1) echo '<div class="pager">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . '  ' . $max . '</span>' . "\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

/* Include register fields.
/* ---------------------------------------------------------------------- */
include_once('includes/register-form.php');

/* Hide product price
/* ---------------------------------------------------------------------- */
add_filter('woocommerce_get_price_html','hide_price');
function hide_price($price){
    if(is_user_logged_in()){
        $user_ID = get_current_user_id();
        $userComfirmed = get_user_meta($user_ID, "profileComfirmation", true);
        if($userComfirmed == "on" ){
            return $price;
        } else {
            //remove add to cart button
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        }
    }else{
        //remove add to cart button
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    }
}

/* comments
/* ---------------------------------------------------------------------- */
function leetpress_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="the-comment">
        <?php echo get_avatar($comment, $size = '60'); ?>
        <div class="comment-arrow"></div>
        <div class="comment-box">
            <div class="comment-author">
                <strong><?php echo get_comment_author_link() ?></strong>
                <small>
                    <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('Edit'), '  ', '') ?>
                    - <?php comment_reply_link(array_merge($args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </small>
            </div>
            <div class="comment-text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br/>
                <?php endif; ?>
                <?php comment_text() ?>
            </div>
        </div>
    </div>
<?php }

/* Add Log In/ Log Out button in header menu(Woocommerce)
/* ---------------------------------------------------------------------- */
add_filter('wp_nav_menu_items', 'add_loginout_link', 10, 2);
function add_loginout_link($items){
    if (is_user_logged_in()) {
        $items .= '<li><a href="' . wp_logout_url(get_permalink(woocommerce_get_page_id('myaccount'))) . '">Sign out</a></li>';
    } elseif (!is_user_logged_in()) {
        $items .= '<li><a href="' . get_permalink(woocommerce_get_page_id('myaccount')) . '">LogIn</a></li>';
    }
    return $items;
}

/* Pop up for site in all pages
/* ---------------------------------------------------------------------- */
$cookie_popupkey = "popupmodal";
$cookie_popupvalue = "on";
if(!isset($_COOKIE[$cookie_popupkey])) {
    setcookie($cookie_popupkey, $cookie_popupvalue, time() + (3600), "/");
    add_action( 'wp_footer', 'popup18' );
}

function popup18() { ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <style>
            /*content color*/
            <?php $modlaBGColor = get_option('BV_theme_options');
            if($modlaBGColor['popup']['popup-bg-color']){ ?>
            .modal-content{
                background-color: <?=$modlaBGColor['popup']['popup-bg-color'];?>
            }
            <?php } ?>

            <?php if(get_option('BV_theme_options')['popup']['popup-bg-image']):
                $popupBGimage=get_option('BV_theme_options')['popup']['popup-bg-image'];?>
            .modal-content{
                background: url(<?php bloginfo('template_directory');?>/images/<?=$popupBGimage;?>) !important;
            }
            <?php endif; ?>
        </style>
            <!-- Modal content-->
            <div class="modal-content" style="">
                <div class="modal-header" style="padding:20px 20px; text-align: center;">

                    <?php if(get_option('BV_theme_options')['popup']['popup-logo']):?>
                        <img src="<?php bloginfo('template_directory');?>/images/<?php echo get_option('BV_theme_options')['popup']['popup-logo'];?>" class="" data-id="41" title="" alt="popup-logo" draggable="false" width="350" style="border: 1px solid #000; padding: 10px 60px">
                    <?php else:?>
                        <img src="<?php bloginfo('template_directory');?>/images/logo-real.png" alt="logo" width="350" style="border: 1px solid #000; padding: 10px 60px">
                    <?php endif;?>

                </div>
                <div class="modal-body">

                    <style>
                        /*text color*/
                        <?php $textColor = get_option('BV_theme_options');
                        if($textColor['popup']['popup-text-color']){ ?>
                            .text-center{
                                color: <?=$textColor['popup']['popup-text-color'];?>
                            }
                        <?php } ?>
                    </style>

                    <h3 class="text-center">
                        <?php echo get_option('BV_theme_options')['popup']['popup-text'];?>
                    </h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left exit" data-dismiss="modal" style="<?php $buttonsColor ?>"><span>I am 18 or older</span> </button>
                    <button type="submit" class="btn btn-default pull-right enter" style="<?php $buttonsColor ?>"><span>I am under 18 years old</span></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#myModal').modal({backdrop: 'static', keyboard: false})
        });
    </script>
<?php }

/*   Simple products
/* ---------------------------------------------------------------------- */
add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 );
function jk_woocommerce_quantity_input_args( $args, $product ) {
    $current_user = wp_get_current_user();
    $userID = $current_user -> ID;
    $minValue = get_user_meta($userID, "minWholesaleCount", true);
    if($minValue == "") $minValue = 50;

    $args['input_value'] 	= $minValue;    // Starting value
    $args['max_value'] 		= 8000;        // Maximum value
    $args['min_value'] 		= $minValue;   // Minimum value
    $args['step'] 		    = 1;           // Quantity steps
    return $args;
}

/* Variations
/* ---------------------------------------------------------------------- */
add_filter( 'woocommerce_available_variation', 'jk_woocommerce_available_variation' );
function jk_woocommerce_available_variation( $args ) {
    $current_user = wp_get_current_user();
    $userID = $current_user -> ID;
    $minValue = get_user_meta($userID, "minWholesaleCount", true);
    if($minValue == "") $minValue = 50;

    $args['max_qty']    = 8000;        // Maximum value (variations)
    $args['min_qty']    = $minValue;   // Minimum value (variations)
    return $args;
}

/* Include theme options
/* ---------------------------------------------------------------------- */
require_once(TEMPLATEPATH . '/themeoptionspage/options.php');

/* Disable WP plugins update
/* ---------------------------------------------------------------------- */
/*remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');*/


/* Disable WP core update
/* ---------------------------------------------------------------------- */
/*add_action('after_setup_theme','remove_core_updates');
function remove_core_updates() {
    if(! current_user_can('update_core')){return;}
    add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
    add_filter('pre_option_update_core','__return_null');
    add_filter('pre_site_transient_update_core','__return_null');
}*/
