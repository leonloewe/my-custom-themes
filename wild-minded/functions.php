<?php
add_action('after_switch_theme', 'createTables');
function createTables() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'registred_users';

    $sql = "CREATE TABLE $table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      name varchar(255) DEFAULT NULL,
      phone varchar(255) DEFAULT NULL,
      email varchar(255) DEFAULT NULL,
      UNIQUE KEY id (id)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

/* Downloadable scripts and styles
/* ====================================================================== */
function load_style_script(){
    /*Stiles*/
    wp_enqueue_style('style-bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style-material-design-iconic-font.min', get_template_directory_uri() . '/css/material-design-iconic-font.min.css');
    wp_enqueue_style('style-animate', get_template_directory_uri() . '/css/animate.css');

    /* Scripts */
    wp_enqueue_script('jquery-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');
    wp_enqueue_script('jquery-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('jquery-jquery.easing.1.3.min', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', '', '', true);
    wp_enqueue_script('jquery-wow.min', get_template_directory_uri() . '/js/wow.min.js', '', '', true);
    wp_enqueue_script('jquery-jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', '', '', true);
    wp_enqueue_script('jquery-jquery.app', get_template_directory_uri() . '/js/jquery.app.js', '', '', true);
    wp_enqueue_script('jquery-key.scripts', get_template_directory_uri() . '/js/my.scripts.js', '', '', true);
    wp_enqueue_script('jquery-CamVideo', get_template_directory_uri() . '/js/CamVideo.js', '', '', true);
/*    wp_enqueue_script('jquery-caman', get_template_directory_uri() . '/js/caman.full.js', '', '', true);*/
}

/* Load scripts and styles
/* ====================================================================== */
add_action('wp_enqueue_scripts', 'load_style_script');

/* Thumbnail support
/* ====================================================================== */
add_theme_support('post-thumbnails');

/* Testimonials costum post
/* ====================================================================== */
function testimonial_posts(){
    $labels = array(
        'name' => 'testimonials',
        'singular_name' => 'testimonials',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonial',
        'not_found' => 'Testimonial not found',
        'not_found_in_trash' => 'Testimonial not found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-quote',
        'register_meta_box_cb' => 'add_testimonial',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('Testimonials', $args);

    function add_testimonial(){
        add_meta_box('wpt_testimonial', 'Add Background', 'wpt_testimonial', 'Testimonials', 'normal', 'default');
    }

    function save_testimonial_metaboxes($post_id){
        if (isset($_POST['testimonial_shortcode'])) {
            $encode = $_POST['testimonial_shortcode'];
            update_post_meta($post_id, 'wpt_testimonial', $encode);
        }
    }

    add_action('save_post', 'save_testimonial_metaboxes');

    function wpt_testimonial(){
        global $post;

        $testimonial = get_post_meta($post->ID, 'wpt_testimonial', true);
        echo '<div>';
        echo '<input type="text" name="testimonial_shortcode" id="testimonial_shortcode" class="regular-text" value="' . $testimonial . '">';
        echo '<input type="button" name="testimonial-btn" id="testimonial_btn" class="button-secondary" value="Add Background">';
        echo '</div>';
    }
}

add_action('init', 'testimonial_posts');

add_action('admin_enqueue_scripts', 'add_scripts_Testimonials');

function add_scripts_Testimonials(){
    wp_enqueue_script('jquery_', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');
    wp_enqueue_script('testimonial', get_template_directory_uri() . '/js/testimonial.js');

    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }
}

/* Disable auto-format in the full post
/* ====================================================================== */
remove_filter( 'the_content', 'wpautop' );

/* Pop up Contact Form
/* ====================================================================== */
/*$cookie_popupkey = "popupmodal";
$cookie_popupvalue = "on";
if(!isset($_COOKIE[$cookie_popupkey])) {
    setcookie($cookie_popupkey, $cookie_popupvalue, time() + (3600), "/");
    add_action( 'wp_footer', 'popupContact' );
}*/

/* Ajax User fields
/* ====================================================================== */
add_action('wp_ajax_save_user_data', 'save_user_data');
add_action('wp_ajax_nopriv_save_user_data', 'save_user_data');

function save_user_data() {
    $userName = $userPhone = $userEmail = '';

    $userName = test_data($_POST['user_name']);
    $userPhone = test_data($_POST['user_phone']);
    $userEmail = test_data($_POST['user_email']);

    if($userName && $userPhone && $userEmail) {
        global $wpdb;
        $tableName = $wpdb->prefix . 'registred_users';

        $emails = $wpdb->get_results('SELECT `email` FROM ' . $tableName . ' WHERE `email`="' . $userEmail . '"');
        if($emails){
            echo "User Exists";
        } else {
            $wpdb->insert(
                $tableName,
                array(
                    'name'      => $userName,
                    'phone'     => $userPhone,
                    'email'     => $userEmail
                )
            );

            echo 'Success';
        }
    }

    exit;
}

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

add_action( 'admin_menu' , 'Add_User_Page' );
function Add_User_Page(){
    add_menu_page('UsersPage', 'Registred Users', 'manage_options', 'users_page', 'Create_Users_Page', 'dashicons-groups', 30);
}
function Create_Users_Page() {
    global $wpdb;
    $tableName = $wpdb->prefix . 'registred_users';
    $users = $wpdb->get_results('SELECT * FROM ' . $tableName);

    $N = 0;
    if($users) { ?>
        <div class="container">
            <table class="table table-bordered" style="margin: 30px 0;">
                <thead>
                <tr>
                    <th>N</th>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <th><?php echo ++$N; ?></th>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td><?php echo $user->email; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    <?php }
}

add_action('admin_enqueue_scripts', 'add_users_page_script');

function add_users_page_script() {
    wp_enqueue_script('jquery-jquery1', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');
    wp_enqueue_script('jquery-bootstrap1.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_style('style-bootstrap1.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');

    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }
}
