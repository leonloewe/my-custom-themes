<?php
/* Creating Theme Options Page
/* ---------------------------------------------------------------------- */
function theme_options($param){
    if (get_option('irny_theme_options')) {
        $irny_theme_options = get_option('irny_theme_options');
    } else {
        add_option('irny_theme_options', array(
            'social' => array(
                'facebook_url'      => '',
                'twitter_url'       => '',
                'googleplus_url'    => '',
                'pinterest_url'     => '',
                'linkedin_url'      => ''
            ),
            'theme_layout'      => '',
            'logo'              => '',
            'background_image'  => '',
            'bgColor'           => ''
        ));
        $irny_theme_options = get_option('irny_theme_options');
    }
    if (isset($_POST['submit'])) {
        if (isset($_POST['layout'])) {
            $layout = 'default';
        }
        $updated_options = array(
            'social' => array(
                'facebook_url'      => $_POST['facebook_url'],
                'twitter_url'       => $_POST['twitter_url'],
                'googleplus_url'    => $_POST['googleplus_url'],
                'pinterest_url'     => $_POST['pinterest_url'],
                'instagram_url'     => $_POST['instagram_url'],
                'dribbble_url'      => $_POST['dribbble_url'],
            ),
            'theme_layout'  => $layout,
            'logo'          => $_POST['mainLogo'],
            'background'    => $_POST['background'],
            'bgColor'       => $_POST['bgColor']
        );
        update_option('irny_theme_options', $updated_options);
        $irny_theme_options = $updated_options;
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
                                    <input type="text" name="facebook_url" placeholder="https://" id="facebook_url"
                                           value="<?php echo $irny_theme_options['social']['facebook_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="twitter_url">Twitter URL</label>
                                </td>
                                <td>
                                    <input type="text" name="twitter_url" placeholder="https://" id="twitter_url"
                                           value="<?php echo $irny_theme_options['social']['twitter_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pinterest_url">Pinterest URL</label>
                                </td>
                                <td>
                                    <input type="text" name="pinterest_url" placeholder="https://" id="pinterest_url"
                                           value="<?php echo $irny_theme_options['social']['pinterest_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="googleplus_url">Google Plus URL</label>
                                </td>
                                <td>
                                    <input type="text" name="googleplus_url" placeholder="https://" id="googleplus_url"
                                           value="<?php echo $irny_theme_options['social']['googleplus_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="instagram_url">Instagram URL</label>
                                </td>
                                <td>
                                    <input type="text" name="instagram_url" placeholder="http://" id="instagram_url"
                                           value="<?php echo $irny_theme_options['social']['instagram_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="linkedin_url">Dribbble URL</label>
                                </td>
                                <td>
                                    <input type="text" name="dribbble_url" placeholder="https://" id="dribbble_url"
                                           value="<?php echo $irny_theme_options['social']['dribbble_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="mainLogo">Content Background Image</label>
                                </td>
                                <td>
                                    <?php $logoImg = $irny_theme_options['logo'];
                                    if($logoImg){ ?>
                                        <img id="logoImg" height="80" src="<?php echo $logoImg; ?>" />
                                    <?php } else { ?>
                                        <img id="logoImg" height="80" src="<?php bloginfo("template_url"); ?>/images/no_img.jpg" />
                                    <?php } ?>
                                    <input type="text" name="mainLogo" id="mainLogo" value="<?php echo $logoImg; ?>">
                                    <button id="logoUpload">Upload</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="bgColor">Content Background Color</label>
                                </td>
                                <td>
                                    <input type="color" name="bgColor" id="bgColor" value="<?php echo $irny_theme_options['bgColor']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Save Changes"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }

add_action('admin_menu', 'irny_theme_options_create');
function irny_theme_options_create(){
    add_submenu_page('themes.php', 'Theme Options', 'Theme Options', 8, 'themeoptions', 'theme_options');
}

add_action('admin_enqueue_scripts', 'add_scripts_Products');

function add_scripts_Products() {
    wp_enqueue_script('jquery_', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
    wp_enqueue_script('jquery-bootstrap.min', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
    wp_enqueue_script('product_gallery', get_template_directory_uri() . '/js/bg_uploud.js');
    wp_enqueue_style('style-bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');

    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }
}

// End of Theme Options
