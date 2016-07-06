<!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
<div class="container-fluid header-bag">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="header clearfix">
                    <!--logo-->
                    <div class="col-md-3 logo">

                   <?php if(!dynamic_sidebar( 'header_logo' )): ?>
                         <span style="color: #fff;">Insert Logo Please!!</span>
                    <?php endif; ?> 
                    
                    </div>
                    <!--logo end-->

                    <!-- header menu -->
                    <?php if($estate_display_top): ?>
                        <div class="col-sm-9 top_menu">
                            <ul class="list-inline">
                                <li>
                                    <div class="input-group-btn currencyFilters filterGroup">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <span id="filterValue">&#36;</span> Currency
                                        </button>
                                    </div>
                                </li>
                                <li>
                                    <div class="input-group-btn languageFilters filterGroup">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <span id="filterValue2">en</span> language
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <nav class="navbar navbar-default navbar-static-top">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavigation">
                                    <i class="fa fa-bars"></i> Menu
                                </button>
                                <?php $estate_logo = $estatepro_options['opt-media-logo']['url']; ?>

                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="mainNavigation">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'header_menu',
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'fallback_cb' => 'get_default_menu',
                                    'container' => '',
                                ));
                                ?>
                            </div><!-- /.navbar-collapse -->

                    </nav>

                    <!-- header menu end-->

                </div>
            </div>
        </div>
    </div>
</div>