<footer>
    <div class="container-fluid">
        <div class="pull-left copyright">
            <p><?php echo get_option('my_copyright'); ?></p>
            <?php wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'container' => 'false',
                'menu_class' => 'nav-list effect',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'depth' => 1
            ));
            ?>
        </div>
        <div class="pull-right copyright">
            <?php $socials = get_option('BV_theme_options'); ?>
            <ul class="social-links">
                <li>
                    <?php $twitter_url = $socials['social']['twitter_url'];
                    if ($twitter_url != '') { ?>
                        <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                </li>
                <li>
                    <?php $googleplus_url = $socials['social']['googleplus_url'];
                    if ($googleplus_url != '') { ?>
                        <a href="<?php echo $googleplus_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <?php } ?>
                </li>
                <li>
                    <?php $pinterest_url = $socials['social']['pinterest_url'];
                    if ($pinterest_url != '') { ?>
                        <a href="<?php echo $pinterest_url; ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <?php } ?>
                </li>
                <li>
                    <?php $dribbble_url = $socials['social']['dribbble_url'];
                    if ($dribbble_url != '') { ?>
                        <a href="<?php echo $dribbble_url; ?>" target="_blank"><i class="icon-dribbble"></i></a>
                    <?php } ?>
                </li>
                <li>
                    <?php $facebook_url = $socials['social']['facebook_url'];
                    if ($facebook_url != '') { ?>
                        <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                </li>
                <li>
                    <?php $instagram_url = $socials['social']['instagram_url'];
                    if ($instagram_url != '') { ?>
                        <a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script>
    $(function () {
        $('#sig').signature();
        $('#clear').click(function () {
            $('#sig').signature('clear');
        });
        $("#sig").signature({syncField: "#signature"})
    });
</script>
<script>
    $(document).ready(function () {
        $("#txtboxToFilter").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: Ctrl+C
                (e.keyCode == 67 && e.ctrlKey === true) ||
                    // Allow: Ctrl+X
                (e.keyCode == 88 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>
</div>
<?php wp_footer(); ?>
    <style>
        /*header border color*/
        <?php $headerBorderColor = get_option('BV_theme_options');
        if($headerBorderColor['header']['header-border-color']){ ?>
            #home {
                border-top: 8px solid <?=$headerBorderColor['header']['header-border-color'];?>
            }
        <?php } ?>

        /*header color*/
        <?php $headerBGColor = get_option('BV_theme_options');
        if($headerBGColor['header']['header-bg-color']){ ?>
            .header-color {
                background-color: <?=$headerBGColor['header']['header-bg-color'];?>
            }
        <?php } ?>
        /*header image*/
        <?php if(get_option('BV_theme_options')['header']['header-bg-image']):
            $headerBGimage=get_option('BV_theme_options')['header']['header-bg-image'];?>
            .header-color {
                background: url(<?php bloginfo('template_directory');?>/images/<?=$headerBGimage;?>) !important;
            }
        <?php endif; ?>
        /*menu color*/
        <?php $menuColor = get_option('BV_theme_options');
        if($menuColor['colors']['menu-color']){ ?>
            .effect a {
                color: <?=$menuColor['colors']['menu-color'];?>
            }
        <?php } ?>
        /*Menu BG Hover Color*/
        <?php $menuHoverColor = get_option('BV_theme_options');
        if($menuHoverColor['colors']['menu-bg-hover-color']){ ?>
            .effect a:hover, .effect a:focus, .effect li.active a {
                background-color: <?=$menuHoverColor['colors']['menu-bg-hover-color'];?>
            }
        <?php } ?>
        /*Menu Text Hover Color*/
        <?php $menuTextHoverColor = get_option('BV_theme_options');
        if($menuTextHoverColor['colors']['menu-text-hover-color']){ ?>
            .effect a:hover, .effect a:focus, .effect li.active a {
                color: <?=$menuTextHoverColor['colors']['menu-text-hover-color'];?>
            }
        <?php } ?>
        /*footer color*/
        <?php $footerBGColor = get_option('BV_theme_options');
        if($footerBGColor['footer']['bgColor']){ ?>
            footer {
                background-color: <?=$footerBGColor['footer']['bgColor'];?>
            }
        <?php } ?>
        <?php if(get_option('BV_theme_options')['footer']['footer-bg-image']):
            $footerBGimage=get_option('BV_theme_options')['footer']['footer-bg-image'];?>
            footer {
                background: url(<?php bloginfo('template_directory');?>/images/<?=$footerBGimage;?>) !important;
            }
        <?php endif; ?>
        /*title color*/
        <?php $titleColor = get_option('BV_theme_options');
        if($titleColor['colors']['title-color']){ ?>
            .title-color {
                color: <?=$titleColor['colors']['title-color'];?>
            }
        <?php } ?>
        /*link color*/
        <?php $linkColor = get_option('BV_theme_options');
        if($linkColor['colors']['link-color']){ ?>
            a {
                color: <?=$linkColor['colors']['link-color'];?>
            }
        <?php } ?>
        /*link color BAG*/
        <?php $linkBagColor = get_option('BV_theme_options');
        if($linkBagColor['colors']['link-color']){ ?>
            .nav-header .badge {
                background-color: <?=$linkBagColor['colors']['link-color'];?>
            }
        <?php } ?>
        /*link hover color*/
        <?php $linkHoverColor = get_option('BV_theme_options');
        if($linkHoverColor['colors']['link-hover-color']){ ?>
            a:hover {
                color: <?=$linkHoverColor['colors']['link-hover-color'];?>
            }
        <?php } ?>
        /*buttons color*/
        <?php $buttonsColor = get_option('BV_theme_options');
        if($buttonsColor['colors']['buttons-color']){ ?>
            ul.social-links li a, .btn, a.cart {
                background: <?=$buttonsColor['colors']['buttons-color'];?>;
                border-color: <?=$buttonsColor['colors']['buttons-color'];?>;
            }
        <?php } ?>
        /*buttons text color*/
        <?php $buttonsTextColor = get_option('BV_theme_options');
        if($buttonsTextColor['colors']['buttons-text-color']){ ?>
            ul.social-links li a, .btn, a.cart {
                color: <?=$buttonsTextColor['colors']['buttons-text-color'];?>;
                border-color: <?=$buttonsTextColor['colors']['buttons-hover-color'];?>;
            }
        <?php } ?>
        /*buttons hover color*/
        <?php $buttonsHoverColor = get_option('BV_theme_options');
        if($buttonsHoverColor['colors']['buttons-hover-color']){ ?>
            ul.social-links li a:hover, .btn:hover, a.cart:hover {
                border-color: <?=$buttonsHoverColor['colors']['buttons-hover-color'];?>;
                background: <?=$buttonsHoverColor['colors']['buttons-hover-color'];?>
            }
        <?php } ?>
        /*buttons text hover color*/
        <?php $buttonsTextHoverColor = get_option('BV_theme_options');
        if($buttonsTextHoverColor['colors']['buttons-text-hover-color']){ ?>
            ul.social-links li a:hover, .btn:hover, a.cart:hover {
                color: <?=$buttonsTextHoverColor['colors']['buttons-text-hover-color'];?>;
            }
        <?php } ?>
        /*Custom CSS*/
        <?php echo get_option('BV_theme_options')['customscript']['css'];?>
    </style>
    <script>
        $(document).ready(function () {
            <?php echo get_option('BV_theme_options')['customscript']['js'];?>
        });
    </script>

</body>
</html>