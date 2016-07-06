<?php
/* Downloadable scripts and styles
/* ---------------------------------------------------------------------- */
function theme_options_panel_scripts(){
    wp_enqueue_script('jquery',"http://code.jquery.com/jquery-1.10.2.js",array());
    wp_enqueue_script('jquery-ui',"http://code.jquery.com/ui/1.11.4/jquery-ui.js",array('jquery'));
    wp_enqueue_script('optionspagejs', get_template_directory_uri() .'/themeoptionspage/functionality.js',array('jquery','jquery-ui','colorpicker'));

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

    wp_enqueue_style("http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
    wp_enqueue_style('optionspagecss', get_template_directory_uri() .'/themeoptionspage/style.css');
}
add_action( 'admin_enqueue_scripts', 'theme_options_panel_scripts' );

/* Creating Theme Options Page
/* ---------------------------------------------------------------------- */
function theme_options($param) {

    if(get_option('BV_theme_options')){
        $BV_theme_options=get_option('BV_theme_options');
    }
    else{
        add_option('BV_theme_options',array(
            'general'=>array(
                'general-logo'=>'',
                'general-background'=>''
            ),
            'header'=>array(
                'header-border-color'=>'#EBEBEB',
                'header-bg-image'=>'',
                'header-bg-color' => ''
            ),
            'footer'=>array(
                'footer-bg-image' =>'',
                'bgColor'=>'#4d4d4d'
            ),
            'colors'=>array(
                'menu-color'=>'',
                'menu-bg-hover-color'=>'',
                'menu-text-hover-color'=>'',
                'title-color'=>'',
                'link-color'=>'',
                'link-hover-color'=>'',
                'buttons-color'=>'',
                'buttons-text-color'=>'',
                'buttons-hover-color'=>'',
                'buttons-text-hover-color'=>''
            ),
            'social'=>array(
                'facebook_url'=>'',
                'twitter_url'=>'',
                'googleplus_url'=>'',
                'pinterest_url'=>'',
                'instagram_url' => '',
                'dribbble_url' => '',
            ),
            'popup'=>array(
                'popup-logo'=>'',
                'popup-bg-color'=>'',
                'popup-bg-image' =>'',
                'popup-text'=>'',
                'popup-text-color'=>'',
            ),
            'customscript'=>array(
                'css'=>'',
                'js'=>''
            ),
        ));
        $BV_theme_options=get_option('BV_theme_options');
    }

    if(isset($_POST['submit'])) {
        if (strpos($_POST['js'], 'document.ready')) {
            $error_message = "Please do not wrap your JS code in document.ready";
        } else { $error_message='';}
        $uploads_dir = get_stylesheet_directory() . '/images';
        foreach ($_FILES as $key => $file) {

            $pre = explode('-', $key)[0];
            if ($file['name'] == '') {

                if($_POST[$key.'-del']=="true"){
                    $_FILES[$key]['name'] = get_option('BV_theme_options')[$pre][$key];
                }else{
                    $_FILES[$key]['name'] = '';
                }

            } else {
            }

            $tmp_name = $_FILES[$key]["tmp_name"];
            $name = $_FILES[$key]['name'];
            move_uploaded_file($tmp_name, $uploads_dir . '/' . $name);
        }
        if (isset($_POST['layout'])) {
            $layout = 'default';
        }

        $clean_shortcode=str_replace('\"','',$_POST['form_shortcode']);
        $clean_shortcode=str_replace('\"','',$clean_shortcode);
        $updated_options = array(
            'general' => array(
                'general-logo' => $_FILES['general-logo']['name'],
                'general-background' => $_FILES['general-background']['name']
            ),
            'header' => array(
                'header-border-color' => $_POST['header-border-color'],
                'header-bg-image' => $_FILES['header-bg-image']['name'],
                'header-bg-color' => $_POST['header-bg-color']
            ),
            'footer' => array(
                'footer-bg-image' => $_FILES['footer-bg-image']['name'],
                'bgColor' => $_POST['footer-bg-color']
            ),
            'colors' => array(
                'menu-color'=> $_POST['menu-color'],
                'menu-bg-hover-color'=> $_POST['menu-bg-hover-color'],
                'menu-text-hover-color'=> $_POST['menu-text-hover-color'],
                'header-menu-color' => $_POST['header-menu-color'],
                'title-color' => $_POST['title-color'],
                'link-color' => $_POST['link-color'],
                'link-hover-color' => $_POST['link-hover-color'],
                'buttons-color'=> $_POST['buttons-color'],
                'buttons-text-color'=> $_POST['buttons-text-color'],
                'buttons-hover-color'=> $_POST['buttons-hover-color'],
                'buttons-text-hover-color' => $_POST['buttons-text-hover-color']
            ),
            'social' => array(
                'facebook_url' => $_POST['facebook_url'],
                'twitter_url' => $_POST['twitter_url'],
                'googleplus_url' => $_POST['googleplus_url'],
                'pinterest_url' => $_POST['pinterest_url'],
                'instagram_url' => $_POST['instagram_url'],
                'dribbble_url' => $_POST['dribbble_url']
            ),
            'popup'=>array(
                'popup-logo' => $_FILES['popup-logo']['name'],
                'popup-bg-image' => $_FILES['popup-bg-image']['name'],
                'popup-bg-color' => $_POST['popup-bg-color'],
                'popup-text'=> $_POST['popup-text'],
                'popup-text-color' => $_POST['popup-text-color']
            ),
            'customscript' => array(
                'css' => $_POST['css'],
                'js' => $_POST['js'],
            ),
        );
        update_option('BV_theme_options', $updated_options);
        $BV_theme_options = $updated_options;
    } ?>

    <div class="wrap theme_options_panel">
        <div class="">
            <h4 style="color:red"><?=$error_message;?></h4>
            <h2>Bora Vapes Theme Options</h2>
            <form action="themes.php?page=themeoptions" method="post" enctype="multipart/form-data">
                <div class="aside " id="tabs">
                    <ul class="menu aside_body ">
                        <li><a href="#general" class="general-tab">General</a></li>
                        <li><a href="#header" class="header-tab">Header</a></li>
                        <li><a href="#footer" class="footer-tab">Footer</a></li>
                        <li><a href="#colors" class="colors-tab">Colors</a></li>
                        <li><a href="#social" class="social-tab">Social</a></li>
                        <li><a href="#popup" class="popup-tab">Popup</a></li>
                        <li><a href="#customcssjs" class="script-tab">Custom CSS/JS</a></li>
                    </ul>

                    <!-- general tab -->
                    <div id="general" class="main">
                        <h2>General</h2>
                        <table class="form-table">
                            <tr>
                                <td><label for="general-logo">Website Logo</label></td>
                                <td>
                                    <input type="file" name="general-logo" id="general-logo" style="display:none;">

                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>
                                    <?php if(get_option('BV_theme_options')['general']['general-logo']):?>
                                        <img id="background_image" class="theme_img general-logo-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['general']['general-logo']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="general-logo-del" id="general-logo-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='general-logo' class="file-delete pull-right"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="background">Background Image</label></td>
                                <td>
                                    <input type="file" name="general-background" id="general-background" style="display:none;">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>

                                    <?php if(get_option('BV_theme_options')['general']['general-background']):?>
                                        <img id="background_image" class="theme_img general-background-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['general']['general-background']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="general-background-del" id="general-background-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='general-background' class="file-delete pull-right"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end general tab -->

                    <!-- header tab-->
                    <div id="header" class="main">
                        <h2>Header</h2>
                        <table class="form-table">
                            <tr>
                                <td><h3>Header Border Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="header-border-color" value="<?=($BV_theme_options['header']['header-border-color'])?$BV_theme_options['header']['header-border-color'] : '#EBEBEB';?>" class="color">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="background">Header Image</label></td>
                                <td>
                                    <input type="file" name="header-bg-image" id="header-bg-image" style="display:none;">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>

                                    <?php if(get_option('BV_theme_options')['header']['header-bg-image']):?>
                                        <img id="background_image" class="theme_img header-bg-image-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['header']['header-bg-image']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="header-bg-image-del" id="header-bg-image-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='header-bg-image' class="file-delete pull-right"/>
                                </td>

                            </tr>

                            <tr>
                                <td><h3>Header Background Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="header-bg-color" value="<?=($BV_theme_options['header']['header-bg-color'])?$BV_theme_options['header']['header-bg-color'] : '';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- header tab end -->

                    <!-- footer tab -->
                    <div id="footer" class="main">
                        <h2>Footer</h2>
                        <table class="form-table">
                            <tr>
                                <td><label for="background">Footer Image</label></td>
                                <td>
                                    <input type="file" name="footer-bg-image" id="footer-bg-image" style="display:none;">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>

                                    <?php if(get_option('BV_theme_options')['footer']['footer-bg-image']):?>
                                        <img id="background_image" class="theme_img footer-bg-image-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['footer']['footer-bg-image']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="footer-bg-image-del" id="footer-bg-image-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='footer-bg-image' class="file-delete pull-right"/>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Footer Background Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="footer-bg-color" value="<?=($BV_theme_options['footer']['bgColor'])?$BV_theme_options['footer']['bgColor'] : '';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- footer tab end -->

                    <!-- color tab -->
                    <div id="colors" class="main">
                        <h2>Colors</h2>
                        <table>
                            <tr>
                                <td><h3>Menu Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="menu-color" value="<?=($BV_theme_options['colors']['menu-color'])?$BV_theme_options['colors']['menu-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Menu BG Hover Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="menu-bg-hover-color" value="<?=($BV_theme_options['colors']['menu-bg-hover-color'])?$BV_theme_options['colors']['menu-bg-hover-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Menu Text Hover Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="menu-text-hover-color" value="<?=($BV_theme_options['colors']['menu-text-hover-color'])?$BV_theme_options['colors']['menu-text-hover-color'] : '#fff';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Title Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="title-color" value="<?=($BV_theme_options['colors']['title-color'])?$BV_theme_options['colors']['title-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Link Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="link-color" value="<?=($BV_theme_options['colors']['link-color'])?$BV_theme_options['colors']['link-color'] : '#20b7d6';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Link Hover Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="link-hover-color" value="<?=($BV_theme_options['colors']['link-hover-color'])?$BV_theme_options['colors']['link-hover-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Buttons Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="buttons-color" value="<?=($BV_theme_options['colors']['buttons-color'])?$BV_theme_options['colors']['buttons-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Buttons Text Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="buttons-text-color" value="<?=($BV_theme_options['colors']['buttons-text-color'])?$BV_theme_options['colors']['buttons-text-color'] : '#fff';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Buttons Hover Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="buttons-hover-color" value="<?=($BV_theme_options['colors']['buttons-hover-color'])?$BV_theme_options['colors']['buttons-hover-color'] : '#fff';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Buttons Text Hover Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="buttons-text-hover-color" value="<?=($BV_theme_options['colors']['buttons-text-hover-color'])?$BV_theme_options['colors']['buttons-text-hover-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- color tab end -->

                    <!-- social icons tab-->
                    <div class="main" id="social">
                        <h2>Social</h2>
                        <table class="form-table">
                            <tr>
                                <td><label for="facebook_url">Facebook URL</label></td>
                                <td>
                                    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $BV_theme_options['social']['facebook_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="twitter_url">Twitter URL</label></td>
                                <td>
                                    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $BV_theme_options['social']['twitter_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pinterest_url">Pinterest URL</label></td>
                                <td>
                                    <input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo $BV_theme_options['social']['pinterest_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="googleplus_url">Google Plus URL</label></td>
                                <td>
                                    <input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo $BV_theme_options['social']['googleplus_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="instagram_url">Instagram URL</label></td>
                                <td>
                                    <input type="text" name="instagram_url" id="instagram_url" value="<?php echo $BV_theme_options['social']['instagram_url']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="dribbble_url">Dribbble URL</label></td>
                                <td>
                                    <input type="text" name="dribbble_url" id="dribbble_url" value="<?php echo $BV_theme_options['social']['dribbble_url']; ?>">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end social icons tab -->

                    <!-- popup tab -->
                    <div class="main" id="popup">
                        <h2>Popup Setings</h2>
                        <table class="form-table">
                            <tr>
                                <td><h3>Popup BG Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="popup-bg-color" value="<?=($BV_theme_options['popup']['popup-bg-color'])?$BV_theme_options['popup']['popup-bg-color'] : '#F7F7F7';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="popup-background">Popup BG Image</label></td>
                                <td>
                                    <input type="file" name="popup-bg-image" id="popup-bg-image" style="display:none;">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>

                                    <?php if(get_option('BV_theme_options')['popup']['popup-bg-image']):?>
                                        <img id="background_image" class="theme_img popup-bg-image-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['popup']['popup-bg-image']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="popup-bg-image-del" id="popup-bg-image-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='popup-bg-image' class="file-delete pull-right"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="popup-logo">Popup Logo</label></td>
                                <td>
                                    <input type="file" name="popup-logo" id="popup-logo" style="display:none;">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/upload.png" class="file-uploader pull-left"/>
                                    <?php if(get_option('BV_theme_options')['popup']['popup-logo']):?>
                                        <img id="background_image" class="theme_img popup-logo-img" src="<?php bloginfo('template_directory') ?>/images/<?php echo get_option('BV_theme_options')['popup']['popup-logo']; ?>">
                                    <?php endif;?>
                                </td>
                                <td>
                                    <input type="hidden" name="popup-logo-del" id="popup-logo-del" value="true">
                                    <img src="<?php bloginfo('template_directory') ?>/themeoptionspage/images/file_delete.png" data-img_cl='popup-logo' class="file-delete pull-right"/>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Text</h3></td>
                                <td>
                                    <textarea name="popup-text" id="popup-text" rows="10">
                                        <?php echo $BV_theme_options['popup']['popup-text'];?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>Popup text Color</h3></td>
                                <td>
                                    <div class="color-wrapper">
                                        <input type="text" name="popup-text-color" value="<?=($BV_theme_options['popup']['popup-text-color'])?$BV_theme_options['popup']['popup-text-color'] : '#000';?>" class="color">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end custom script tab -->

                    <!-- custom script tab -->
                    <div class="main" id="customcssjs">
                        <h2>Custom CSS/JS</h2>
                        <table class="form-table">
                            <tr>
                                <td><h3>CSS</h3></td>
                                <td>
                                    <textarea name="css" id="css" rows="10">
                                        <?php echo $BV_theme_options['customscript']['css'];?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><h3>JavaScript</h3></td>
                                <td>
                                    <textarea name="js" id="js" rows="10">
                                        <?php echo $BV_theme_options['customscript']['js'];?>
                                    </textarea>
                                    <b><br>Please DO NOT wrap your JS code in $document.ready(function(){...})</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end custom script tab -->
                </div><!-- end accordion  -->
                <div class="text-right submit-container">
                    <input type="submit" name="submit" value="Save Changes"/>
                </div>
            </form>
        </div>

    </div>
<?php }

add_action('admin_menu','BV_theme_options_create');
function BV_theme_options_create(){
    add_submenu_page('themes.php','Theme Options','Theme Options',8,'themeoptions','theme_options');
}
// End of Theme Options

?>