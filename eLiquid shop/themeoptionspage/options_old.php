<?php


function theme_options_panel_scripts(){
    wp_enqueue_style('optionspagecss', get_template_directory_uri() .'/themeoptionspage/style.css');
    wp_enqueue_style("http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
    wp_enqueue_script('jquery',"http://code.jquery.com/jquery-1.10.2.js",array());
    wp_enqueue_script('jquery-ui',"http://code.jquery.com/ui/1.11.4/jquery-ui.js",array('jquery'));
    wp_enqueue_script('optionspagejs', get_template_directory_uri() .'/themeoptionspage/functionality.js',array('jquery','jquery-ui'));
    wp_enqueue_style("http://resources/demos/style.css");
}
add_action( 'admin_enqueue_scripts', 'theme_options_panel_scripts' ); 



//Creating Theme Options Page
function theme_options($param) {
    if(get_option('amc_theme_options')){
        $amc_theme_options=get_option('amc_theme_options');
    }
    else{
        add_option('amc_theme_options',array(
            'social'=>array(
                'facebook_url'=>'',
                'twitter_url'=>'',
                'googleplus_url'=>'',
                'pinterest_url'=>'',
                'linkedin_url'=>''
                ),
            'contact'=>array(
                'freephone'=>'',
                'telephone'=>'',
                'email'=>'',
                'fax'=>'',
                'company_address'=>''
                ),
            'pages'=>array(
                'home'=>array(
                    'latest-projects'=>'',
                ),
                'about'=>array(
                ),
                'services'=>array(
                ),
                'projects'=>array(
                ),
                'contacts'=>array(
                ),
            ),  
            'theme_layout'=>'',
            'logo'=>'',
            'background_image'=>'',
            'top_slider_id'=>'',
            'map_iframe'=>'',
            'footer_text'=>''
        ));
        $amc_theme_options=get_option('amc_theme_options');
        
    }
    if(isset($_POST['submit'])){
        $uploads_dir = get_stylesheet_directory().'/images';
        foreach($_FILES as $key=>$file){
            
            if($file['name']==''){
                $_FILES[$key]['name']=get_option('amc_theme_options')[$key];
            }
            else {
                
            }


            $tmp_name = $_FILES[$key]["tmp_name"];
            $name = $_FILES[$key]['name'];
            move_uploaded_file($tmp_name, $uploads_dir.'/'.$name);

        }
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
        'contact'=>array(
                'freephone'=>$_POST['freephone'],
                'telephone'=>$_POST['telephone'],
                'email'=>$_POST['email'],
                'fax'=>$_POST['fax'],
                'company_address'=>$_POST['company_address']
        ),
        'pages'=>array(
                'home'=>array(
                    'latest-projects'=>$_POST['latest-projects'],
                ),
        ),    
        'theme_layout'=>$layout,
        'logo'=>$_FILES['logo']['name'],
        'background'=>$_FILES['background']['name'],
        'top_slider_id'=>$_POST['top_slider'],
        'map_iframe'=>$_POST['map_iframe'],
        'footer_text'=>$_POST['footer_text']
            
        );
        update_option('amc_theme_options',$updated_options);
        $amc_theme_options=$updated_options;
    }
    
    
?>
<div class="wrap theme_options_panel">
    <div class="">
        <h2>Theme Options</h2>
        <form action="themes.php?page=themeoptions" method="post" enctype="multipart/form-data">
            <div class="aside " id="tabs">
                <ul class="menu aside_body ">
                    <li>
                        <a href="#general">General</a>
                    </li>
                    <li>
                        <a href="#social">Social</a>
                    </li>
                    <li class="">
                        <a href="#pages">Pages</a>
                    </li>
                    <li>
                        <a href="#customcssjs">Custom CSS/JS</a>
                    </li>
                    <li>
                        <a href="#contact">Contact Us</a>
                    </li>
                </ul>
                
                <div id="general" class="main">
                    <h2>General</h2>
                    <table class="form-table">
                    <tr>
                        <td>
                            <label for="layout">Website Layout</label>
                        </td>
                        <td>
                            <input type="checkbox" name="layout" id="layout" value="default" <?php if(isset($_POST['layout'])) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="logo">Website Logo</label>
                        </td>
                        <td>
                            <input type="file" name="logo" id="logo">
                            <?php if(get_option('amc_theme_options')['logo']):?>
                            <img id="background_image" class="theme_img" src="<?php bloginfo('template_directory') ?>/img/<?php echo get_option('amc_theme_options')['logo']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="background">Background Image</label>
                        </td>
                        <td>
                            <input type="file" name="background" id="background">
                            <?php if(get_option('amc_theme_options')['background']):?>
                            <img id="background_image" class="theme_img" src="<?php bloginfo('template_directory') ?>/img/<?php echo get_option('amc_theme_options')['background']; ?>">
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="top_slider">Top Slider</label>
                        </td>
                        <td>
                            <select name="top_slider" >
                                <?php $sliders=new WP_Query(array(
                                    'post_type'=>'slider'
                                ));
                                    while($sliders->have_posts()){
                                        $sliders->the_post();
                                        if($amc_theme_options['top_slider_id']==get_the_ID()){ 
                                            $selected='selected';

                                        }
                                        else {
                                            $selected='';

                                        }
                                        echo '<option value="'.get_the_ID().'" '.$selected.'>'.get_the_title().'</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="map_iframe">Map Iframe Source</label>
                        </td>
                        <td>
                            <input type="text" name="map_iframe" id="map_iframe" value="<?php echo $amc_theme_options['map_iframe']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="footer_text">Footer Text</label>
                        </td>
                        <td>
                            <input type="text" name="footer_text" id="footer_text" value="<?php echo $amc_theme_options['footer_text']; ?>">
                        </td>
                    </tr>
                </table>
                </div>
                
                <div class="main" id="social">
                    <h2>Social</h2>
                    <table class="form-table">
                    <tr>
                        <td>
                            <label for="facebook_url">Facebook URL</label>
                        </td>
                        <td>
                            <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $amc_theme_options['social']['facebook_url']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="twitter_url">Twitter URL</label>
                        </td>
                        <td>
                            <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $amc_theme_options['social']['twitter_url']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pinterest_url">Pinterest URL</label>
                        </td>
                        <td>
                            <input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo $amc_theme_options['social']['pinterest_url']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="googleplus_url">Google Plus URL</label>
                        </td>
                        <td>
                            <input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo $amc_theme_options['social']['googleplus_url']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="linkedin_url">LinkedIn URL</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo $amc_theme_options['social']['linkedin_url']; ?>">
                        </td>
                    </tr>
                    </table>
                </div>
                
                <div class="main" id="pages">
                    <h2>Pages</h2>
  
                        <div id="accordion">
                            <h3>Home</h3>
                            <div>
                              <input type="text" name="latest-projects" id="latest-projects" value="<?php echo $amc_theme_options['pages']['home']['latest-projects']; ?> " placeholder="Latest Projects Text">
                              
                            </div>
                            
                            <h3>About</h3>
                            <div>
                              
                            </div>
                            
                            <h3>Services</h3>
                            <div>
                              
                            </div>
                            
                            <h3>Projects</h3>
                            <div>
                              
                            </div>
                            
                            <h3>Contacts</h3>
                            <div>
                              
                            </div>

                          
                        </div>
                </div>
                
                <div class="main" id="customcssjs">
                    <h2>Custom CSS/JS</h2>
                    <table class="form-table">
                    <tr>
                        <td>
                            <label for="css_js">CSS/JS</label>
                        </td>
                        <td>
                            <textarea name="css_js" id="css_js""></textarea>
                        </td>
                    </tr>
                    </table>
                </div>
                
                <div class="main" id="contact">
                    <h2>Contact Us</h2>
                    <table class="form-table">
                    <tr>
                        <td>
                            <label for="freephone">Freephone:</label>
                        </td>
                        <td>
                             <input type="text" name="freephone" id="freephone" value="<?php echo $amc_theme_options['contact']['freephone']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telephone">Telephone:</label>
                        </td>
                        <td>
                             <input type="text" name="telephone" id="telephone" value="<?php echo $amc_theme_options['contact']['telephone']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>
                        <td>
                             <input type="email" name="email" id="email" value="<?php echo $amc_theme_options['contact']['email']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fax">Fax:</label>
                        </td>
                        <td>
                             <input type="text" name="fax" id="fax" value="<?php echo $amc_theme_options['contact']['fax']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="company_address">Company Address:</label>
                        </td>
                        <td>
                             <input type="text" name="company_address" id="company_address" value="<?php echo $amc_theme_options['contact']['company_address']; ?>">

                        </td>
                    </tr>
                    </table>
                </div>

            </div>
            <div class="text-right submit-container">
                            <input type="submit" name="submit" value="Save Changes"/>
            </div>
        </form>
    </div>
    
</div>
<?php
    
    
    
}



add_action('admin_menu','amc_theme_options_create');
function amc_theme_options_create(){
    add_submenu_page('themes.php','Theme Options','Theme Options',8,'themeoptions','theme_options');
}
// End of Theme Options 



?>