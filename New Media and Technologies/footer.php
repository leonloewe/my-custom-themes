<!--Start FOOTER-->
<div class="container">
    <div class="row">
        <div class="footer_top clearfix">
            <div class="col-md-4 col-sm-6">
                     <?php if(!dynamic_sidebar( 'footer_logo' )): ?>
                         <span style="color: #fff;">Insert Footer Logo Please!!</span>
                    <?php endif; ?> 
            </div>
            <div class="col-md-4 col-sm-6 add_res">
                <h2><?php echo get_option('my_a_title'); ?></h2>

                <table>
                    <tr>
                        <td style="text-align: center"><i class="fa fa-map-marker"></i></td>
                        <td><h4><?php echo  get_option('my_address'); ?></h4></td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-envelope-o"></i></td>
                        <td><h5><?php echo  get_option('admin_email'); ?></h5></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 col-sm-12">
                <!-- <?php /*dynamic_sidebar( 'social_icons' ); */?> -->

                <div class="il_f">
                    <ul class="il_inline-list">
                        <?php $facebook_url = get_option('irny_theme_options')['social']['facebook_url']; if($facebook_url!=''){ ?>
                            <li><a class="top_toggle" href="">Facebook</a><a href="<?php echo $facebook_url; ?>" class="fa-facebook" target="_blank"></a></li>
                        <?php } ?>
                        <?php $twitter_url = get_option('irny_theme_options')['social']['twitter_url']; if($twitter_url!=''){ ?>
                            <li><a class="top_toggle" href="">Twitter</a><a href="<?php echo $twitter_url; ?>" class="fa-twitter" target="_blank"></a></li>
                        <?php } ?>
                        <?php $linkedin_url = get_option('irny_theme_options')['social']['linkedin_url']; if($linkedin_url!=''){ ?>
                            <li><a class="top_toggle" href="">Linkedin</a><a href="<?php echo $linkedin_url; ?>" class="fa-linkedin" target="_blank"></a></li>
                        <?php } ?>
                        <?php $googleplus_url = get_option('irny_theme_options')['social']['googleplus_url']; if($googleplus_url!=''){ ?>
                            <li><a class="top_toggle" href="">Google</a><a href="<?php echo $googleplus_url; ?>" class="fa-google-plus" target="_blank"></a></li>
                        <?php } ?>
                        <?php $pinterest_url = get_option('irny_theme_options')['social']['pinterest_url']; if($pinterest_url!=''){ ?>
                            <li><a class="top_toggle" href="">Pinteres</a><a href="<?php echo $pinterest_url; ?>" class="fa-pinterest" target="_blank"></a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

        <div class="bottom_footer">
            <div class="container">
                <div class="col-md-6 col-sm-6">
                    <p><?php echo  get_option('my_copyright'); ?></p>
                </div>
                <div class="col-md-6 col-sm-6 footer_menu">
                    <!-- FOOTER MENU -->
					<?php wp_nav_menu( array( 
                        'theme_location' => 'footer_menu', 
                        'container'      => '',
                        'menu_class'     => '',
                        'after'          => '&nbsp;&nbsp;&nbsp;|',
                    ) ); ?>

					<!-- FOOTER MENU END-->
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function($) {
        $("#rydgesmoments-offer").owlCarousel({

            autoPlay: false, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3],
            // Navigation
            navigation : true,
            rewindNav : true,
            navigationText : ["prev","next"],
            pagination : false

        });

        $(".owl-pagination").addClass('container');

    });
</script>



<!--FOOTER END-->
<?php wp_footer(); ?>
</body>
</html>