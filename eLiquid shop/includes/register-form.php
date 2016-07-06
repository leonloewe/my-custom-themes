<?php
ob_start();
/* Add Billing fields for WooCommerce registration.
/* ---------------------------------------------------------------------- */
if(!is_admin()) {
// Function to check starting char of a string
    function startsWith($haystack, $needle) {
        return $needle === '' || strpos($haystack, $needle) === 0;
    }
// Custom function to display the Billing Address form to registration page
    function my_custom_function() {
        global $woocommerce;
        $checkout = $woocommerce->checkout();
        ?>
        <h3 style="text-decoration: underline; padding:15px 0; clear: both;font-size: 14px; font-weight: bold"><?php _e( 'Billing Information', 'woocommerce' ); ?></h3>
        <?php
        foreach ($checkout->checkout_fields['billing'] as $key => $field) :
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        endforeach;
    }

    add_action('register_form','my_custom_function');

/* Custom function to save Usermeta or Billing Information of registered user
/* ---------------------------------------------------------------------- */
    function save_address($user_id) {
        global $woocommerce;
        $address = $_POST;
        foreach ($address as $key => $field) :
            if(startsWith($key,'billing_')) {
                // Condition to add firstname and last name to user meta table
                if($key == 'billing_first_name' || $key == 'billing_last_name') {
                    $new_key = explode('billing_',$key);
                    update_user_meta( $user_id, $new_key[1], $_POST[$key] );
                }
                update_user_meta( $user_id, $key, $_POST[$key] );
            }
        endforeach;
    }

    add_action('woocommerce_created_customer','save_address');

/* Registration page billing address form Validation
/* ---------------------------------------------------------------------- */
    function custom_validation() {
        global $woocommerce;
        $address = $_POST;
        foreach ($address as $key => $field) :
            // Validation: Required fields
            if(startsWith($key,'billing_')) {
                if($key == 'billing_country' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please select a country.', 'woocommerce' ) );
                }
                if($key == 'billing_first_name' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter first name.', 'woocommerce' ) );
                }
                if($key == 'billing_last_name' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter last name.', 'woocommerce' ) );
                }
                if($key == 'billing_address_1' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter address.', 'woocommerce' ) );
                }
                if($key == 'billing_city' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter city.', 'woocommerce' ) );
                }
                if($key == 'billing_state' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter state.', 'woocommerce' ) );
                }
                if($key == 'billing_postcode' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter a postcode.', 'woocommerce' ) );
                }
                if($key == 'billing_email' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter billing email address.', 'woocommerce' ) );
                }
                if($key == 'billing_phone' && $field == '') {
                    $woocommerce->add_error( '' . __( 'ERROR', 'woocommerce' ) . ': ' . __( 'Please enter phone number.', 'woocommerce' ) );
                }
            }
        endforeach;
    }

    add_action('register_post','custom_validation');
}

/* Add and remove fields in Billing form
/* ---------------------------------------------------------------------- */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {

    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);

    $fields['billing']['billing_credit_card_no'] = array(
        'label'         => __('Credit Card No', 'woocommerce'),
        'placeholder'   => _x('Credit Card No', 'placeholder', 'woocommerce'),
        'required'      => true,
        'class'         => array('form-row-wide'),
        'clear'         => true,
    );
    $fields['billing']['billing_credit_card_type'] = array(
        'label'         => __('Credit Card Type', 'woocommerce'),
        'placeholder'   => _x('Credit Card Type', 'placeholder', 'woocommerce'),
        'required'      => true,
        'class'         => array('form-row-wide'),
        'clear'         => true,
        'type'          => 'select',
        'options'       => array(
            'VISA'              => __('VISA', 'woocommerce' ),
            'MasterCard'        => __('MasterCard', 'woocommerce' ),
            'DISCOVER'          => __('DISCOVER', 'woocommerce' ),
            'American-Express' => __('American Express', 'woocommerce' ),
        )
    );
    $fields['billing']['billing_appers_name'] = array(
        'label'         => __('Name as appers on card:', 'woocommerce'),
        'placeholder'   => _x('Name as appers on card', 'placeholder', 'woocommerce'),
        'required'      => true,
        'class'         => array('form-row-wide'),
        'clear'         => true,
    );
    $fields['billing']['billing_expires'] = array(
        'label'         => __('Expires:', 'woocommerce'),
        'placeholder'   => _x('Expires', 'placeholder', 'woocommerce'),
        'required'      => true,
        'class'         => array('form-row-wide'),
        'clear'         => true,
    );
    $fields['billing']['billing_cvv'] = array(
        'label'         => __('CVV:', 'woocommerce'),
        'placeholder'   => _x('CVV', 'placeholder', 'woocommerce'),
        'required'      => true,
        'class'         => array('form-row-wide'),
        'clear'         => true,
    );

    return $fields;
}

/* Add new register fields for WooCommerce registration.
 /* ---------------------------------------------------------------------- */
function wooc_extra_register_fields() {
    ?>
    <div class="clearfix"></div>
    <!-- Text input-->
    <div class="form-group col-sm-12">
        <div style="text-decoration: underline; padding:15px 0;"><b>Business Information</b></div>
        <!-- Name of usiness-->
        <label class="col-sm-2 control-label" for="reg_billing_business"><?php _e('Name of Business:', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_business" name="billing_business_name" type="text" placeholder="Enter Name of Business:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_business_name'])) esc_attr_e($_POST['billing_business_name']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_billing_business_license"><?php _e('', 'woocommerce'); ?>License/Resale #:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_business_license" name="billing_business_license" type="text" placeholder="Enter License/Resale #:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_business_license'])) esc_attr_e($_POST['billing_business_license']); ?>"/>
        </div>
    </div>
    <!-- Type of business-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_business_type"><?php _e('', 'woocommerce'); ?>Type of Business:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_business_type" name="billing_business_type" type="text" placeholder="Enter Type of Business:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_business_type'])) esc_attr_e($_POST['billing_business_type']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_billing_annual"><?php _e('', 'woocommerce'); ?>Annual Sales:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_annual" name="billing_annual" type="text" placeholder="Enter Annual Sales:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_annual'])) esc_attr_e($_POST['billing_annual']); ?>"/>
        </div>
    </div>
    <!-- Name of Owner(s)-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_owner"><?php _e('', 'woocommerce'); ?>Name of Owner(s):<span class="required">*</span></label>
        <div class="col-sm-10">
            <input id="reg_billing_owner" name="billing_owner" type="text" placeholder="Enter Name of Owner(s):" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_owner'])) esc_attr_e($_POST['billing_owner']); ?>"/>
        </div>
    </div>
    <!-- Business Address:-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_baddress"><?php _e('', 'woocommerce'); ?>Business Address:<span class="required">*</span></label>
        <div class="col-sm-10">
            <input id="reg_billing_baddress" name="billing_baddress" type="text" placeholder="Enter Business Address:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_baddress'])) esc_attr_e($_POST['billing_baddress']); ?>"/>
        </div>
    </div>
    <!-- City, State, Zip-->
    <div class="form-group col-sm-12">
        <label class="col-md-1 control-label" for="reg_billing_city"><?php _e('', 'woocommerce'); ?>City:<span class="required">*</span></label>
        <div class="col-md-3">
            <input id="reg_billing_city" name="billing_businnes_city" type="text" placeholder="Enter your City:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_businnes_city'])) esc_attr_e($_POST['billing_businnes_city']); ?>"/>
        </div>
        <label class="col-md-1 control-label" for="reg_billing_business_state"><?php _e('', 'woocommerce'); ?>State:<span class="required">*</span></label>
        <div class="col-md-3">
            <input id="reg_billing_business_state" name="billing_business_state" type="text" placeholder="Enter your State:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_business_state'])) esc_attr_e($_POST['billing_business_state']); ?>"/>
        </div>
        <label class="col-md-1 control-label" for="reg_billing_zip"><?php _e('', 'woocommerce'); ?>Zip:<span class="required">*</span></label>
        <div class="col-md-3">
            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="reg_billing_zip" name="billing_zip" type="text" placeholder="Enter your Zip:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_zip'])) esc_attr_e($_POST['billing_zip']); ?>"/>
        </div>
    </div>
    <!-- Business Phone, Web-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_bphone"><?php _e('', 'woocommerce'); ?>Business Phone:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="reg_billing_bphone" name="billing_bphone" type="text" placeholder="Enter your Business Phone:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_bphone'])) esc_attr_e($_POST['billing_bphone']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_billing_bweb"><?php _e('', 'woocommerce'); ?>Web:</label>
        <div class="col-sm-4">
            <input id="reg_billing_bweb" name="billing_bweb" type="text" placeholder="Enter Web:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_bweb'])) esc_attr_e($_POST['billing_bweb']); ?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Primary Contact, Position-->
    <div class="form-group col-sm-12">
        <div style="text-decoration: underline; padding:15px 0;"><b>Contact Information</b></div>
        <label class="col-sm-2 control-label" for="reg_billing_pcontact"><?php _e('', 'woocommerce'); ?>Primary Contact:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_pcontact" name="billing_pcontact" type="text" placeholder="Enter Primary Contact:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_pcontact'])) esc_attr_e($_POST['billing_pcontact']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_billing_pposition"><?php _e('', 'woocommerce'); ?>Position:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_billing_pposition" name="billing_pposition" type="text" placeholder="Enter Position:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_pposition'])) esc_attr_e($_POST['billing_pposition']); ?>"/>
        </div>
    </div>
    <!-- Phone, Email input-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_phone"><?php _e('', 'woocommerce'); ?>Phone:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="reg_billing_phone" name="billing_phone" type="text" placeholder="Enter your Phone:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_phone'])) esc_attr_e($_POST['billing_phone']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_email"><?php _e('', 'woocommerce'); ?>Email:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input id="reg_email" name="email" type="email" placeholder="Enter your Email:" class="form-control input-md"
                   value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>"/>
        </div>
    </div>
    <!--Alternate Contact, Position-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_acontact"><?php _e('', 'woocommerce'); ?>Alternate Contact:</label>
        <div class="col-sm-4">
            <input id="reg_billing_acontact" name="billing_acontact" type="text" placeholder="Enter Alternate Contact:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_acontact'])) esc_attr_e($_POST['billing_acontact']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_billing_aposition"><?php _e('', 'woocommerce'); ?>Position:</label>
        <div class="col-sm-4">
            <input id="reg_billing_aposition" name="billing_aposition" type="text" placeholder="Enter Position:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_aposition'])) esc_attr_e($_POST['billing_aposition']); ?>"/>
        </div>
    </div>
    <!-- Phone, Email -->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_billing_aphone"><?php _e('', 'woocommerce'); ?>Phone:</label>
        <div class="col-sm-4">
            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="reg_billing_aphone" name="billing_aphone" type="text" placeholder="Enter your Phone:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_aphone'])) esc_attr_e($_POST['billing_aphone']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="aemail"><?php _e('', 'woocommerce'); ?>Email:</label>
        <div class="col-sm-4">
            <input id="reg_billing_pemail" name="billing_aemail" type="email" placeholder="Enter your Email:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_aemail'])) esc_attr_e($_POST['billing_aemail']); ?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <div style="text-decoration: underline; padding:15px 0;"><b>Shipping Information</b></div>
    <!-- First name, Last name-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_shipping_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-4">
            <input type="text" placeholder="First Name" class="form-control input-text" name="shipping_first_name" id="reg_shipping_first_name"
                   value="<?php if (!empty($_POST['shipping_first_name'])) esc_attr_e($_POST['shipping_first_name']); ?>"/>
        </div>
        <label class="col-sm-2 control-label" for="reg_shipping_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-4">
            <input type="text" placeholder="Last Name" class="form-control input-text" name="shipping_last_name" id="reg_shipping_last_name"
                   value="<?php if (!empty($_POST['shipping_last_name'])) esc_attr_e($_POST['shipping_last_name']); ?>"/>
        </div>
    </div>
    <div class="clear"></div>
    <!-- First name, Last name-->
    <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="reg_shipping_address_1"><?php _e('Shipping Address', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-10">
            <input type="text" placeholder="Shipping Address" class="form-control input-text" name="shipping_address_1" id="reg_shipping_address_1"
                   value="<?php if (!empty($_POST['shipping_address_1'])) esc_attr_e($_POST['shipping_address_1']); ?>"/>
        </div>
    </div>
    <div class="clear"></div>
    <!-- First name, Last name-->
    <div class="form-group col-sm-12">
        <label class="col-sm-1 control-label" for="reg_shipping_city"><?php _e('City', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-3">
            <input type="text" placeholder="City" class="form-control input-text" name="shipping_city" id="reg_shipping_city"
                   value="<?php if (!empty($_POST['shipping_city'])) esc_attr_e($_POST['shipping_city']); ?>"/>
        </div>
        <label class="col-sm-1 control-label" for="reg_shipping_state"><?php _e('State', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-3">
            <input type="text" placeholder="State" class="form-control input-text" name="shipping_state" id="reg_shipping_state"
                   value="<?php if (!empty($_POST['shipping_state'])) esc_attr_e($_POST['shipping_state']); ?>"/>
        </div>
        <label class="col-sm-1 control-label" for="reg_shipping_postcode"><?php _e('Zip', 'woocommerce'); ?><span class="required">*</span></label>
        <div class="col-sm-3">
            <input type="text" placeholder="State" class="form-control input-text" name="shipping_postcode" id="reg_shipping_postcode"
                   value="<?php if (!empty($_POST['shipping_postcode'])) esc_attr_e($_POST['shipping_postcode']); ?>"/>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Person(s) authorized to submit orders-->
    <div class="form-group col-sm-12">
        <label class="col-sm-4 control-label" for="reg_billing_order"><?php _e('', 'woocommerce'); ?>Person(s) authorized to submit orders:<span class="required">*</span></label>
        <div class="col-sm-8">
            <input id="reg_billing_order" name="billing_order" type="text" placeholder="Enter Person(s) authorized to submit orders:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_order'])) esc_attr_e($_POST['billing_order']); ?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- NAME OF PREPARER-->
    <div class="form-group col-sm-12">
        <label class="col-sm-3 control-label" for="reg_billing_nameofp"><?php _e('', 'woocommerce'); ?><b>NAME OF PREPARER:</b><span class="required">*</span></label>
        <div class="col-sm-9">
            <input id="reg_billing_nameofp" name="billing_nameofp" type="text" placeholder="Enter NAME OF PREPARER:" class="form-control input-md"
                   value="<?php if (!empty($_POST['billing_nameofp'])) esc_attr_e($_POST['billing_nameofp']); ?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- PREPARER'S SIGNATURE-->
    <div class="form-group col-sm-12">
        <label class="col-sm-3 control-label" for="reg_billing_signature"><?php _e('', 'woocommerce'); ?><b>PREPARER'S SIGNATURE:</b><span class="required">*</span></label>
        <div class="col-sm-5">
            <input id="signature" name="signature" type="hidden" class=""
                   value="<?php if (!empty($_POST['signature'])) esc_attr_e($_POST['signature']); ?>"/>
            <div id="sig"></div>

            <p style="clear: both;"><button type="button" id="clear">Clear</button>
        </div>

        <label class="col-sm-1 control-label" for="reg_billing_sdate"><?php _e('', 'woocommerce'); ?>DATE:<span class="required">*</span></label>
        <div class="col-sm-3">
            <input id="reg_billing_my_date" name="billing_sdate"  type="date" class="form-control input-md
                         value="<?php if (!empty($_POST['billing_sdate'])) esc_attr_e($_POST['billing_sdate']); ?>"/>
        </div>
    </div>
    <div class="form-group col-sm-12">
        <label class="col-sm-2 for="mainLogo">Resellers Permit</label>
        <div class="col-sm-3">
            <input id="resellers" name="resellers" type="file" placeholder="Choose File" class="" />
        </div>
        <label class="col-sm-2 for="mainLogo">Business License</label>
        <div class="col-sm-3">
            <input id="business_license" name="business_license" type="file" placeholder="Choose File" class="" />
        </div>
    </div>
    <?php }

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/* Validate the extra register fields.
/* ---------------------------------------------------------------------- */
function wooc_validate_extra_register_fields($username, $email, $validation_errors){
    //shipping information
    if (isset($_POST['shipping_first_name']) && empty($_POST['shipping_first_name'])) {
        $validation_errors->add('shipping_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['shipping_last_name']) && empty($_POST['shipping_last_name'])) {
        $validation_errors->add('shipping_last_name_error', __('<strong>Error</strong>: Ladt name is required!', 'woocommerce'));
    }
    if (isset($_POST['shipping_address_1']) && empty($_POST['shipping_address_1'])) {
        $validation_errors->add('shipping_address_1_error', __('<strong>Error</strong>: Shipping address is required!', 'woocommerce'));
    }
    if (isset($_POST['shipping_city']) && empty($_POST['shipping_city'])) {
        $validation_errors->add('shipping_city_error', __('<strong>Error</strong>: City is required!', 'woocommerce'));
    }
    if (isset($_POST['shipping_state']) && empty($_POST['shipping_state'])) {
        $validation_errors->add('shipping_state_error', __('<strong>Error</strong>: State is required!', 'woocommerce'));
    }
    if (isset($_POST['shipping_postcode']) && empty($_POST['shipping_postcode'])) {
        $validation_errors->add('shipping_postcode_error', __('<strong>Error</strong>: Zip code is required!', 'woocommerce'));
    }
    //business information
    if (isset($_POST['billing_business_name']) && empty($_POST['billing_business_name'])) {
        $validation_errors->add('billing_business_name_error', __('<strong>Error</strong>: Business name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_business_license']) && empty($_POST['billing_business_license'])) {
        $validation_errors->add('billing_business_license_error', __('<strong>Error</strong>: Business license is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_business_type']) && empty($_POST['billing_business_type'])) {
        $validation_errors->add('billing_business_type_error', __('<strong>Error</strong>: Business type is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_annual']) && empty($_POST['billing_annual'])) {
        $validation_errors->add('billing_annual_error', __('<strong>Error</strong>: Annul Sales is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_owner']) && empty($_POST['billing_owner'])) {
        $validation_errors->add('billing_owner_error', __('<strong>Error</strong>: Name of owner(s) is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_baddress']) && empty($_POST['billing_owner'])) {
        $validation_errors->add('billing_baddress_error', __('<strong>Error</strong>: Business address is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_businnes_city']) && empty($_POST['billing_businnes_city'])) {
        $validation_errors->add('billing_businnes_city_error', __('<strong>Error</strong>: Business City is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_business_state']) && empty($_POST['billing_business_state'])) {
        $validation_errors->add('billing_business_state_error', __('<strong>Error</strong>: Business State is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_zip']) && empty($_POST['billing_zip'])) {
        $validation_errors->add('billing_zip_error', __('<strong>Error</strong>: Business zip code is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_bphone']) && empty($_POST['billing_zip'])) {
        $validation_errors->add('billing_bphone_error', __('<strong>Error</strong>: Business phone is required!', 'woocommerce'));
    }
    /*if (isset($_POST['billing_bweb']) && empty($_POST['billing_bweb'])) {
        $validation_errors->add('billing_bweb_error', __('<strong>Error</strong>: Business web site is required!', 'woocommerce'));
    }*/
    //contact information
    if (isset($_POST['billing_pcontact']) && empty($_POST['billing_pcontact'])) {
        $validation_errors->add('billing_pcontact_error', __('<strong>Error</strong>: Primary Contact is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_pposition']) && empty($_POST['billing_pposition'])) {
        $validation_errors->add('billing_pposition_error', __('<strong>Error</strong>: Primary position is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
        $validation_errors->add('billing_phone_error', __('<strong>Error</strong>: Primary Contact phone is required!', 'woocommerce'));
    }
    /*if (isset($_POST['billing_acontact']) && empty($_POST['billing_acontact'])) {
        $validation_errors->add('billing_acontact_error', __('<strong>Error</strong>: Alternate Contact is required!', 'woocommerce'));
    }*/
    /*if (isset($_POST['billing_aposition']) && empty($_POST['billing_aposition'])) {
        $validation_errors->add('billing_aposition_error', __('<strong>Error</strong>: Alternate position is required!', 'woocommerce'));
    }*/
   /* if (isset($_POST['billing_aphone']) && empty($_POST['billing_aphone'])) {
        $validation_errors->add('billing_aphone_error', __('<strong>Error</strong>: Alternate Contact phone is required!', 'woocommerce'));
    }*/
   /* if (isset($_POST['billing_aemail']) && empty($_POST['billing_aphone'])) {
        $validation_errors->add('billing_aemail_error', __('<strong>Error</strong>: Alternate Contact email is required!', 'woocommerce'));
    }*/
    if (isset($_POST['billing_order']) && empty($_POST['billing_order'])) {
        $validation_errors->add('billing_order_error', __('<strong>Error</strong>: Person(s) authorized to submit orders is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_nameofp']) && empty($_POST['billing_nameofp'])) {
        $validation_errors->add('billing_nameofp_error', __('<strong>Error</strong>: Name of preparer is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_signature']) && empty($_POST['billing_signature'])) {
        $validation_errors->add('billing_signature_error', __('<strong>Error</strong>: Preparer`s signature is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_sdate']) && empty($_POST['billing_sdate'])) {
        $validation_errors->add('billing_sdate_error', __('<strong>Error</strong>: Preparer`s signature date is required!', 'woocommerce'));
    }
    if (isset($_POST['resellers']) && empty($_POST['resellers'])) {
        $validation_errors->add('resellers_error', __('<strong>Error</strong>: Resellers permit is required!', 'woocommerce'));
    }
    if (isset($_POST['business_license']) && empty($_POST['business_license'])) {
        $validation_errors->add('business_license_error', __('<strong>Error</strong>: Business license is required!', 'woocommerce'));
    }
    if (isset($_POST['signature']) && empty($_POST['signature'])) {
        $validation_errors->add('signature_error', __('<strong>Error</strong>: Business license is required!', 'woocommerce'));
    }
}
add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);

/* Save the extra register fields.
/* ---------------------------------------------------------------------- */
function wooc_save_extra_register_fields($customer_id){
    //shipping information
    if (isset($_POST['shipping_first_name'])) {
        // WooCommerce shipping first name.
        update_user_meta($customer_id, 'shipping_first_name', sanitize_text_field($_POST['shipping_first_name']));
    }
    if (isset($_POST['shipping_last_name'])) {
        // WooCommerce shipping last name.
        update_user_meta($customer_id, 'shipping_last_name', sanitize_text_field($_POST['shipping_last_name']));
    }
    if (isset($_POST['shipping_address_1'])) {
        // WooCommerce shipping address.
        update_user_meta($customer_id, 'shipping_address_1', sanitize_text_field($_POST['shipping_address_1']));
    }
    if (isset($_POST['shipping_city'])) {
        // WooCommerce shipping city.
        update_user_meta($customer_id, 'shipping_city', sanitize_text_field($_POST['shipping_city']));
    }
    if (isset($_POST['shipping_state'])) {
        // WooCommerce shipping state.
        update_user_meta($customer_id, 'shipping_state', sanitize_text_field($_POST['shipping_state']));
    }
    if (isset($_POST['shipping_postcode'])) {
        // WooCommerce shipping postcode.
        update_user_meta($customer_id, 'shipping_postcode', sanitize_text_field($_POST['shipping_postcode']));
    }
    //business information
    if (isset($_POST['billing_business_name'])) {
        // WordPress Name of Business.
        update_user_meta($customer_id, 'business_name', sanitize_text_field($_POST['billing_business_name']));
    }
    if (isset($_POST['billing_business_license'])) {
        // WordPress License/Resale.
        update_user_meta($customer_id, 'business_license_name', sanitize_text_field($_POST['billing_business_license']));
    }
    if (isset($_POST['billing_business_type'])) {
        // WordPress Type of Business.
        update_user_meta($customer_id, 'billing_business_type', sanitize_text_field($_POST['billing_business_type']));
    }
    if (isset($_POST['billing_annual'])) {
        // WordPress Annual Sales.
        update_user_meta($customer_id, 'annual_name', sanitize_text_field($_POST['billing_annual']));
    }
    if (isset($_POST['billing_owner'])) {
        // WordPress Name of Owner(s).
        update_user_meta($customer_id, 'owner_name', sanitize_text_field($_POST['billing_owner']));
    }
    if (isset($_POST['billing_baddress'])) {
        // WordPress Business Address.
        update_user_meta($customer_id, 'baddress_name', sanitize_text_field($_POST['billing_baddress']));
    }
    if (isset($_POST['billing_businnes_city'])) {
        // WordPress City.
        update_user_meta($customer_id, 'businnes_city_name', sanitize_text_field($_POST['billing_businnes_city']));
    }
    if (isset($_POST['billing_business_state'])) {
        // WordPress State.
        update_user_meta($customer_id, 'business_state_name', sanitize_text_field($_POST['billing_business_state']));
    }
    if (isset($_POST['billing_zip'])) {
        // WordPress Zip.
        update_user_meta($customer_id, 'zip_name', sanitize_text_field($_POST['billing_zip']));
    }
    if (isset($_POST['billing_bphone'])) {
        // WordPress Business Phone.
        update_user_meta($customer_id, 'bphone_name', sanitize_text_field($_POST['billing_bphone']));
    }
    if (isset($_POST['billing_bweb'])) {
        // WordPress Web.
        update_user_meta($customer_id, 'bweb_name', sanitize_text_field($_POST['billing_bweb']));
    }
    //contact information
    if (isset($_POST['billing_pcontact'])) {
        // WordPress Primary Contact.
        update_user_meta($customer_id, 'pcontact_name', sanitize_text_field($_POST['billing_pcontact']));
    }
    if (isset($_POST['billing_pposition'])) {
        // WordPress Position.
        update_user_meta($customer_id, 'pposition_name', sanitize_text_field($_POST['billing_pposition']));
    }
    if (isset($_POST['billing_phone'])) {
        // WooCommerce Phone.
        update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
    if (isset($_POST['billing_acontact'])) {
        // WordPress Alternate Contact.
        update_user_meta($customer_id, 'acontact_name', sanitize_text_field($_POST['billing_acontact']));
    }
    if (isset($_POST['billing_aposition'])) {
        // WordPress Position.
        update_user_meta($customer_id, 'aposition_name', sanitize_text_field($_POST['billing_aposition']));
    }
    if (isset($_POST['billing_aphone'])) {
        // WordPress Phone.
        update_user_meta($customer_id, 'aphone_name', sanitize_text_field($_POST['billing_aphone']));
    }
    if (isset($_POST['billing_aemail'])) {
        // WordPress Email.
        update_user_meta($customer_id, 'aemail_name', sanitize_text_field($_POST['billing_aemail']));
    }
    if (isset($_POST['billing_order'])) {
        // WordPress default type name field.
        update_user_meta($customer_id, 'order_name', sanitize_text_field($_POST['billing_order']));
    }
    if (isset($_POST['billing_nameofp'])) {
        // WordPress default type name field.
        update_user_meta($customer_id, 'nameofp_name', sanitize_text_field($_POST['billing_nameofp']));
    }
    if (isset($_POST['billing_signature'])) {
        // WordPress default type name field.
        update_user_meta($customer_id, 'signature_name', sanitize_text_field($_POST['billing_signature']));
    }
    if (isset($_POST['billing_sdate'])) {
        // WordPress default type name field.
        update_user_meta($customer_id, 'sdate_name', sanitize_text_field($_POST['billing_sdate']));
    }
    if (isset($_POST['signature'])) {
        // WordPress default type name field.
        update_user_meta($customer_id, 'signature', sanitize_text_field($_POST['signature']));
    }
    if (isset($_FILES['resellers'])) {
         // WordPress default type name field.
         if ( ! function_exists( 'wp_handle_upload' ) ) {
             require_once( ABSPATH . 'wp-admin/includes/file.php' );
         }
         $uploadedfile = $_FILES['resellers'];
         $upload_overrides = array( 'test_form' => false );
         $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
         if ( $movefile && !isset( $movefile['error'] ) ) {
             update_user_meta($customer_id, 'resellers_file_url', $movefile['url']);
         } else {
             echo $movefile['error'];
         }
     }
     if (isset($_FILES['business_license'])) {
         // WordPress default type name field.
         if ( ! function_exists( 'wp_handle_upload' ) ) {
             require_once( ABSPATH . 'wp-admin/includes/file.php' );
         }
         $uploadedfile = $_FILES['business_license'];
         $upload_overrides = array( 'test_form' => false );
         $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
         if ( $movefile && !isset( $movefile['error'] ) ) {
             update_user_meta($customer_id, 'business_license_file_url', $movefile['url']);
         } else {
             echo $movefile['error'];
         }
     }
}

add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');

/* Extra fields for admin
/* ---------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'add_scripts_init');

function add_scripts_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js','', '', true);
    }
    wp_enqueue_script('jquery-jquery.signature.min', get_template_directory_uri() . '/js/jquery.signature.min.js', '', '', true);
    wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', '', '', true);
    wp_enqueue_style ('style-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css');
    wp_enqueue_style('jquery.signature', get_template_directory_uri() . '/css/jquery.signature.css');

    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }
}
add_action( 'edit_user_profile', 'extra_fields' );

function extra_fields( $user ) { ?>
    <?php $user_id = (int)$user->data->ID; ?>
    <h3>Business Information</h3>
    <table class="form-table">
        <tr>
            <th>Name of Business:</th>
            <td>
                <?php $business_name = get_user_meta($user_id, "business_name", true); ?>
                <input type="text" name="business_name" class="regular-text" value="<?php echo $business_name; ?>">
            </td>
        </tr>
        <tr>
            <th>License/Resale #:</th>
            <td>
                <?php $billing_business_license = get_user_meta($user_id, "billing_business_license", true); ?>
                <input type="text" name="billing_business_license" class="regular-text" value="<?php echo $billing_business_license; ?>">
            </td>
        </tr>
        <tr>
            <th>Type of Business:</th>
            <td>
                <?php $billing_business_type = get_user_meta($user_id, "billing_business_type", true); ?>
                <input type="text" name="billing_business_type" class="regular-text" value="<?php echo $billing_business_type; ?>">
            </td>
        </tr>
        <tr>
            <th>Annual Sales:</th>
            <td>
                <?php $billing_annual = get_user_meta($user_id, "billing_annual", true); ?>
                <input type="text" name="billing_annual" class="regular-text" value="<?php echo $billing_annual; ?>">
            </td>
        </tr>
        <tr>
            <th>Name of Owner(s):</th>
            <td>
                <?php $owner_name = get_user_meta($user_id, "owner_name", true); ?>
                <input type="text" name="owner" class="regular-text" value="<?php echo $owner_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Business Address:</th>
            <td>
                <?php $baddress_name = get_user_meta($user_id, "baddress_name", true); ?>
                <input type="text" name="baddress_name" class="regular-text" value="<?php echo $baddress_name; ?>">
            </td>
        </tr>
        <tr>
            <th>City:</th>
            <td>
                <?php $businnes_city_name = get_user_meta($user_id, "businnes_city_name", true); ?>
                <input type="text" name="businnes_city_name" class="regular-text" value="<?php echo $businnes_city_name; ?>">
            </td>
        </tr>
        <tr>
            <th>State:</th>
            <td>
                <?php $business_state_name = get_user_meta($user_id, "business_state_name", true); ?>
                <input type="text" name="business_state_name" class="regular-text" value="<?php echo $business_state_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Zip:</th>
            <td>
                <?php $zip_name = get_user_meta($user_id, "zip_name", true); ?>
                <input type="text" name="zip" class="regular-text" value="<?php echo $zip_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Business Phone:</th>
            <td>
                <?php $bphone_name = get_user_meta($user_id, "bphone_name", true); ?>
                <input type="text" name="bphone" class="regular-text" value="<?php echo $bphone_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Web:</th>
            <td>
                <?php $bweb_name = get_user_meta($user_id, "bweb_name", true); ?>
                <input type="text" name="bweb" class="regular-text" value="<?php echo $bweb_name; ?>">
            </td>
        </tr>
    </table>
    <h3>Contact Information</h3>
    <table class="form-table">
        <tr>
            <th>Primary Contact:</th>
            <td>
                <?php $pcontact_name = get_user_meta($user_id, "pcontact_name", true); ?>
                <input type="text" name="pcontact" class="regular-text" value="<?php echo $pcontact_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Position:</th>
            <td>
                <?php $pposition_name = get_user_meta($user_id, "pposition_name", true); ?>
                <input type="text" name="pposition" class="regular-text" value="<?php echo $pposition_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>
                <?php $billing_phone = get_user_meta($user_id, "billing_phone", true); ?>
                <input type="text" name="billing_phone" class="regular-text" value="<?php echo $billing_phone; ?>">
            </td>
        </tr>
        <!--<tr>
            <th>Email:</th>
            <td>
                <?php /*$billing_email = get_user_meta($user_id, "billing_email", true); */?>
                <input type="text" name="billing_email" class="regular-text" value="<?php /*echo $billing_email; */?>">
            </td>
        </tr>-->
        <tr>
            <th>Alternate Contact:</th>
            <td>
                <?php $acontact_name = get_user_meta($user_id, "acontact_name", true); ?>
                <input type="text" name="acontact" class="regular-text" value="<?php echo $acontact_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Position:</th>
            <td>
                <?php $aposition_name = get_user_meta($user_id, "aposition_name", true); ?>
                <input type="text" name="aposition" class="regular-text" value="<?php echo $aposition_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>
                <?php $aphone_name = get_user_meta($user_id, "aphone_name", true); ?>
                <input type="text" name="aphone" class="regular-text" value="<?php echo $aphone_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>
                <?php $aemail_name = get_user_meta($user_id, "aemail_name", true); ?>
                <input type="text" name="aemail" class="regular-text" value="<?php echo $aemail_name; ?>">
            </td>
        </tr>
        <tr>
            <th>Person(s) authorized to submit orders:</th>
            <td>
                <?php $order_name = get_user_meta($user_id, "order_name", true); ?>
                <input type="text" name="order" class="regular-text" value="<?php echo $order_name; ?>">
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th>NAME OF PREPARER</th>
            <td>
                <?php $nameofp_name = get_user_meta($user_id, "nameofp_name", true); ?>
                <input type="text" name="nameofp" class="regular-text" value="<?php echo $nameofp_name; ?>">
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th>PREPARER`S SIGNATURE</th>
            <td>
                <?php $signature_name = get_user_meta($user_id, "signature", true); ?>

                <div id="redrawSignature" class="kbw-signature"></div>
                <script>
                    var signatureJSON = '<?php echo $signature_name; ?>';
                </script>
            </td>
        </tr>
        <tr>
            <th>DATE</th>
            <td>
                <?php $sdate_name = get_user_meta($user_id, "sdate_name", true); ?>
                <input type="text" name="sdate" class="regular-text" value="<?php echo $sdate_name; ?>">
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th>Resellers</th>
            <td>
                <?php $resellers= get_user_meta($user_id, "resellers_file_url", true); ?>
                <input type="text" name="resellers" class="regular-text" value="<?php echo $resellers; ?>">
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th>Business License</th>
            <td>
                <?php $businessLicense= get_user_meta($user_id, "business_license_file_url", true); ?>
                <input type="text" name="$business_license" class="regular-text" value="<?php echo $businessLicense; ?>">
            </td>
        </tr>
    </table>

<?php } ?>

<?php add_action( 'edit_user_profile', 'extra_field_comfirm', 100 );
function extra_field_comfirm($user) {
    $userID = $user->ID; ?>
    <table class="form-table">
        <tr>
            <hr>
            <th><h3>Profile Comfirmation</h3></th>
            <td>
                <?php $profileComfirmation = get_user_meta($userID, "profileComfirmation", true); ?>
                <input type="checkbox" name="profileComfirmation" <?php if($profileComfirmation == "on") echo "checked"; else echo "unchecked"; ?>>
            </td>
        </tr>
        <tr>
            <th><h3>Minimum Wholesale Count</h3></th>
            <td>
                <?php $minCount = get_user_meta($userID, "minWholesaleCount", true); ?>
                <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="minWholesaleCount" value="<?php if($minCount == "") echo "50"; else echo $minCount; ?>"/>
            </td>
        </tr>
    </table>
<?php }

/* Save comfirmation field
/* ---------------------------------------------------------------------- */
add_action( 'edit_user_profile_update', 'save_extra_field_comfirm' );
function save_extra_field_comfirm($user) {
    if ( !current_user_can( 'edit_user', $user ) )
        return FALSE;
    update_user_meta( $user, 'profileComfirmation', sanitize_text_field($_POST['profileComfirmation']) );
    update_user_meta( $user, 'minWholesaleCount', sanitize_text_field($_POST['minWholesaleCount']) );
}

/*ob_end_flush();*/