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





/* Creating Theme Options Panel in Admin Menu */
add_action('admin_menu','amc_theme_options_create');
function amc_theme_options_create(){
    add_submenu_page('themes.php','Theme Options','Theme Options',8,'themeoptions','pu_theme_page');  
}

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */ 
function pu_theme_page()
{
?>
    <div class="section panel">
      <h1>Custom Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
        <?php 
          settings_fields('pu_theme_options'); 
        
          do_settings_sections('pu_theme_options.php');
        ?>
        <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
        </p>  
            
      </form>
      
    </div>
    <?php
}


/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'pu_register_settings' );

/**
 * Function to register the settings
 */
function pu_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'pu_theme_options', 'pu_theme_options', 'pu_validate_settings' );

    // Add settings section
    add_settings_section( 'pu_text_section', 'General', 'pu_display_section', 'pu_theme_options.php' );

    // Create textbox field
    add_settings_field( 'example_textbox', 'Example Textbox', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section',array(
      'type'      => 'text',
      'id'        => 'pu_textbox',
      'name'      => 'pu_textbox',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'pu_textbox',
      'class'     => 'css_class'
    ));
    
    // Create color field
    add_settings_field( 'example_color', 'Example Color', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', array(
      'type'      => 'number',
      'id'        => 'pu_color',
      'name'      => 'pu_color',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'pu_color',
      'class'     => 'css_class'
    ) );
    
    
}

/**
 * Function to add extra text to display on each section
 */
function pu_display_section($section){ 

}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function pu_display_setting($args)
{
    extract( $args );

    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );
    
    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text $class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
              break;  
          case 'number':
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text $class' type='number' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
              break; 
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function pu_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}