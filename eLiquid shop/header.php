<!doctype html>
<html>
<head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="eLiquidShop - Elegant E-Commerce Theme">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body id="home" >
    <div class="container-fluid header-color">
        <div class="menu-wrapper">
            <a href="#" class="close-menu visible-xs"><i class="icon-close"></i></a>
            <h3 class="visible-xs">Navigation</h3>
            <?php wp_nav_menu(array(
                'theme_location' => 'header_menu',
                'container' => 'false',
                'menu_class' => 'nav-list text-center effect',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'depth' => 1
            ));
            ?>
        </div>
    </div>
    <?php if(get_option('BV_theme_options')['general']['general-background']):
        $mainBG=get_option('BV_theme_options')['general']['general-background'];?>
        <div id="wrap" style="background: url(<?php bloginfo('template_directory');?>/images/<?=$mainBG;?>);  background-size: cover;">
            <?php endif; ?>
        <div id="main-nav" class="">
            <div class="container-fluid">
                <div class="nav-header">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-brand">
                        <?php if(get_option('BV_theme_options')['general']['general-logo']):?>
                            <img src="<?php bloginfo('template_directory');?>/images/<?php echo get_option('BV_theme_options')['general']['general-logo'];?>" class="" data-id="41" title="" alt="logo" draggable="false" style="padding: 10px 60px" class="img-responsive">
                        <?php else:?>
                            <img src="<?php bloginfo('template_directory');?>/images/logo-real.png" style="padding: 10px 60px" alt="logo" class="img-responsive">
                        <?php endif;?>
                    </a>
                    <a class="nav-icon pull-right visible-xs menu-link" href="#"><i class="icon-menu2"></i></a>
                    <?php global $woocommerce;
                        // get cart quantity
                        $qty = $woocommerce->cart->get_cart_contents_count();
                        // get cart total
                        $total = $woocommerce->cart->get_cart_total();
                        // get cart url
                        $cart_url = $woocommerce->cart->get_cart_url();
                        // if multiple products in cart
                        ($qty>1);
                        echo  '<a class="nav-icon-outline cart pull-right" href="'.$cart_url.'">' . '<i class="fa fa-shopping-cart"></i>'.'<span class="badge">' . $qty. '</span>' . '</a>';
                    ?>
                </div>
            </div>
        </div>
