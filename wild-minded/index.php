<?php get_header(); ?>

    <body data-spy="scroll" data-target="#navbar-menu" class="layout-dark">
<!-- HOME -->
<section class="home" id="home">
    <!-- <div class="bg-overlay"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="home-wrapper text-center">
                    <!-- Mobile logo -->
                    <div class="animated fadeInDown wow header-logo mobile-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <!-- MENU -->
                    <ul class="nav navbar-nav menu-nav nav-custom-left">
                        <li class="fadeIn animated wow" data-wow-delay=".1s"><a href="#play">Interactive section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".2s"><a href="#story">Video section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".3s"><a href="#courses">Courses section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".4s"><a href="#atwork">Testimonial</a></li>
                        <li class="fadeIn animated wow myBtn" data-wow-delay=".5s" id="myBtn"><a href="#">Contact form </a></li>
                    </ul>
                    <div class="animated fadeInDown wow header-logo web-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <p class="animated fadeInDown wow text-muted" data-wow-delay=".2s">
                        <img src="<?php bloginfo('template_url'); ?>/images/WILD-TEXT-WHITE.png" class="img-responsive ply" alt="WILD-TEXT-WHITE"/>
                    </p>
                    <span class="header-note w-lg animated fadeInDown wow" data-wow-delay=".4s">FORGE A NEW DESTINY</span>
                    <div class="clearfix"></div>
                </div><!-- home wrapper -->

            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- END HOME -->

<!-- PLAY -->
<section class="section section-sec" id="play">
    <div class="container">

        <div class="row">
            <div class="col-sm-7 text-right">
                <div class="title-box clearfix">
                    <div class="service-item animated fadeInLeft wow web-cam" data-wow-delay=".1s">
<!--                        <img src="<?php /*bloginfo('template_url'); */?>/images/web-cam.png" id="capture" class="img-responsive web-cam" alt="web-cam">
-->                 <div id="capture_content"><i id="capture" class="fa fa-dot-circle-o"></i><p>WEB CAM</p></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 text-right">
                <div class="title-box">
                    <div class="service-item animated fadeInLeft wow web-cam" data-wow-delay=".1s">
                        <!--<img src="<?php /*bloginfo('template_url'); */?>/images/control-cam.png" class="img-responsive control-cam" alt="control-cam" />-->


                            <div class="col-lg-6">
                                <label for="hue">Hue</label>
                                <input id="hue" name="hue" type="range" min="0" max="300" value="0">
                                <label for="contrast">Contrast</label>
                                <input id="contrast" name="contrast" type="range" min="-20" max="20" value="0">
                            </div>




                    </div>
                </div>
            </div>
        </div> <!-- end row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="service-item animated fadeInLeft wow" data-wow-delay=".2s">
                    <img src="<?php bloginfo('template_url'); ?>/images/WILD-TEXT-WHITE1.png" id="cam_content_img" class="img-responsive" alt="WILD-TEXT-WHITE"/>

                    <div id="cam_content" class="booth">
                        <video id="video" width="400" height="300" autoplay></video>
                       <!-- <a href="#play" id="capture" class="booth-capture-button">Сфотографировать</a>-->
                        <canvas id="canvas" width="400" height="300"></canvas>
                      <!--  <canvas id="canvasn" width="400" height="300"></canvas>-->
<div id="cam_content_canvas"></div>
                     <!--   <img id="photo" style="display: inline-block;">-->

                    </div>
<style>
    .booth {
        width: 400px;
        margin: 0 auto;
    }

    .booth-capture-button {
        display: block;
        margin: 10px 0;
        padding: 10px 20px;
        background: cornflowerblue;
        color: #fff;
        text-align: center;
        text-decoration: none;
    }

    #canvas {
        display: none;
    }
</style>

                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center service-item animated fadeInLeft wow" data-wow-delay=".2s">
                    <a href="#play" id ="be_wild"  class="btn btn-primary btn-shadow w-md btn-rounded be-wild-btn">BE WILD</a>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="text-right service-item animated fadeInLeft wow" data-wow-delay=".3s">
                    <a href="#" class="btn btn-primary btn-shadow w-md btn-rounded be-wild-btn-one">SHARE</a>
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="text-left service-item animated fadeInLeft wow" data-wow-delay=".3s">

                    <nav class="filters">
                        <a id="cam_img_save" href="" class="btn btn-primary btn-shadow w-md btn-rounded be-wild-btn-one" download>SAVE</a>
                    </nav>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- end container -->
</section>
<!-- END FEATURES -->

<!-- STORY -->
<section class="section bg-gray" id="story">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="home-wrapper-1 text-center">
                    <!-- Mobile logo -->
                    <div class="animated fadeInDown wow header-logo mobile-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <!-- MENU -->
                    <ul class="nav navbar-nav menu-nav nav-custom-left">
                        <li class="fadeIn animated wow" data-wow-delay=".1s"><a href="#play">Interactive section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".2s"><a href="#story">Video section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".3s"><a href="#courses">Courses section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".4s"><a href="#atwork">Testimonial</a></li>
                        <li class="fadeIn animated wow myBtn" data-wow-delay=".5s" id="myBtn"><a href="#">Contact form </a></li>
                    </ul>
                    <div class="animated fadeInDown wow header-logo web-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <div class="clearfix"></div>
                    <p class="animated fadeInDown wow text-muted" data-wow-delay=".2s">
                        <a href="#">
                            <img src="<?php bloginfo('template_url'); ?>/images/PLAY.png" class="img-responsive ply" alt="PLAY"/>
                        </a>
                    </p>
                    <div class="clearfix"></div>
                </div><!-- home wrapper -->
            </div> <!-- end col -->

        </div>
    </div>
</section>
<!-- END -->

<!-- COURSES -->
<section class="section bg-courses" id="courses">
    <div class="container">

        <div class="row">

            <div class="col-sm-12">
                <div class="home-wrapper-2 text-center">
                    <!-- Mobile logo -->
                    <div class="animated fadeInDown wow header-logo mobile-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <!-- MENU -->
                    <ul class="nav navbar-nav menu-nav nav-custom-left">
                        <li class="fadeIn animated wow" data-wow-delay=".1s"><a href="#play">Interactive section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".2s"><a href="#story">Video section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".3s"><a href="#courses">Courses section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".4s"><a href="#atwork">Testimonial</a></li>
                        <li class="fadeIn animated wow myBtn" data-wow-delay=".5s" id="myBtn"><a href="#">Contact form </a></li>
                    </ul>
                    <div class="animated fadeInDown wow header-logo web-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <div class="clearfix you-are-pad"></div>
                    <p class="animated fadeInDown wow text-muted" data-wow-delay=".6s">
                        <a data-wow-delay=".7s">
                            <img src="<?php bloginfo('template_url'); ?>/images/YOU-KNOW-WHO-YOU-ARE-copy.png" class="img-responsive ply" alt="YOU KNOW WHO YOU ARE"/>
                        </a>
                    </p>
                    <div class="pages-menu">
                        <ul class="nav navbar-nav nav-custom-left text-center">
                            <li class="fadeIn animated wow" data-wow-delay=".1s"><a >Graphics</a>
                                <div class="menu-drop-left">
                                    <h4>Where ideas and information are conveyed by graphic means.
                                        Enter a world of visual communication.</h4>
                                </div>
                            </li>
                            <li class="fadeIn animated wow" data-wow-delay=".2s"><a>Fashion</a>
                                <div class="menu-drop-left">
                                    <h4>Embrace the design and products for a brand and label.
                                        Learn the fascinating business of fashion</h4>
                                </div>
                            </li>
                            <li class="fadeIn animated wow" data-wow-delay=".3s"><a>Interiors</a>
                                <div class="menu-drop-left">
                                    <h4>Shape and influence the space in which we live.
                                        Take on the world as a creative interior designer</h4>
                                </div>
                            </li>

                            <li class="fadeIn animated wow" data-wow-delay=".4s"><a>3D & Animation</a>
                                <div class="menu-drop-right">
                                    <h4>Tell fantastic stories and to visualise the imaginary, the impossible,
                                        the future? Bring these characters and worlds to life</h4>
                                </div>
                            </li>
                            <li class="fadeIn animated wow" data-wow-delay=".5s"><a>UX & Web</a>
                                <div class="menu-drop-right">
                                    <h4>Deepen your design skills and knowledge by extending your
                                        understanding of design principles and user experience testing </h4>
                                </div>
                            </li>
                            <li class="fadeIn animated wow" data-wow-delay=".6s"><a>Film & Video</a>
                                <div class="menu-drop-right">
                                    <h4>Be part of a world of moving images
                                        Tell your story</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div><!-- home wrapper -->
            </div> <!-- end col -->

        </div><!-- end row -->

    </div> <!-- end container -->
</section>
<!-- END PRICING -->

<!-- ABOUT -->
<section class="section bg-gray" id="about">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="home-wrapper-1 text-center">
                    <!-- Mobile logo -->
                    <div class="animated fadeInDown wow header-logo mobile-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <!-- MENU -->
                    <ul class="nav navbar-nav menu-nav nav-custom-left">
                        <li class="fadeIn animated wow" data-wow-delay=".1s"><a href="#play">Interactive section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".2s"><a href="#story">Video section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".3s"><a href="#courses">Courses section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".4s"><a href="#atwork">Testimonial</a></li>
                        <li class="fadeIn animated wow myBtn" data-wow-delay=".5s" id="myBtn"><a href="#">Contact form </a></li>
                    </ul>
                    <div class="animated fadeInDown wow header-logo web-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <div class="clearfix"></div>
                    <div class="animated fadeInDown wow" data-wow-delay=".5s">
                        <img src="<?php bloginfo('template_url'); ?>/images/ABOUT.png" class="img-responsive ply about-img" alt="ABOUT">
                    </div>
                    <div class="clearfix ply-pad"></div>
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <p class="about-text animated fadeInDown wow" data-wow-delay=".6s">
                            Who is wild minded? Does a maverick know who they are?<br>
                            Maybe not but they sure know what they are. A wild mind is always at work,
                            <br>never stopping not even for a moment.<br>
                            <br>
                            We are condemned to wanting more, to want change,<br>
                            to pursue the impossible.<br>
                            Taking risks is easy for us, we wan't don't want to wait around.<br>
                            Be what you are, be a maverick.<br>
                        </p>
                    </div>
                </div><!-- home wrapper -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</section>
<!-- END TEAM -->

<!-- TESTIMONIAL -->
<section class="section atwork-color" id="atwork">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="home-wrapper-3 text-center">
                    <!-- Mobile logo -->
                    <div class="animated fadeInDown wow header-logo mobile-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>
                    <!-- MENU -->
                    <ul class="nav navbar-nav menu-nav nav-custom-left">
                        <li class="fadeIn animated wow" data-wow-delay=".1s"><a href="#play">Interactive section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".2s"><a href="#story">Video section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".3s"><a href="#courses">Courses section</a></li>
                        <li class="fadeIn animated wow" data-wow-delay=".4s"><a href="#atwork">Testimonial</a></li>
                        <li class="fadeIn animated wow myBtn" data-wow-delay=".5s" id="myBtn"><a href="#">Contact form </a></li>
                    </ul>
                    <div class="animated fadeInDown wow header-logo web-logo" data-wow-delay=".1s">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="img-responsive" alt="logo">
                    </div>

                    <div class="clearfix ply-pad"></div>

                    <!-- Testimonial slider -->
                    <div class="animated fadeInDown wow" data-wow-delay=".3s">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <div class="carousel-inner" role="listbox">

                                <?php
                                $testimonials = new WP_Query( array('post_type' => 'testimonials') );
                                $i = 0;
                                ?>
                                <?php if ($testimonials->have_posts()) :  while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                                    <!-- Wrapper for slides -->
                                    <div class="item <?php if($i == 0) {echo 'active';} $i++; ?>">
                                        <div class="col-sm-4 no-padding">
                                            <?php the_post_thumbnail(array(391, 392)); ?>
                                        </div>
                                        <div class="col-sm-8 no-padding">
                                            <?php $testimonial = get_post_meta($post->ID, 'wpt_testimonial', true); ?>
                                            <img src="<?php echo $testimonial; ?>" alt="" width="100%" height="392" >
                                            <p class="testimonial-text">
                                                <?php the_content(); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php else: ?>
                                    <p>Place for a Testimonial slider</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div><!-- home wrapper -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</section>
<!-- END FAQ -->

<!-- POPUP -->
<div class="container">

    <!-- Modal -->
    <?php /*  function popupContact() { */?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg " >
            <div class="modal-body clearfix no-paddong-2" >
                <div class="col-sm-7 left-div no-paddong">
                    <h1>CHANGE<br>YOUR<br>FUTURE</h1>
                </div>
                <div class="col-sm-5  right-div clearfix" style="background-color: rgba(0, 87, 255,.8); text-align: center;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="popup-text"><h5>BECOME A DESIGN LEADER</h5></div>

                    <form  class="user-form" role="form" id="Forma">

                        <div class="form-group">
                            <input type="text" class="form-control" id="user-name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user-phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="user-email" placeholder="Email">
                        </div>
                        <span id="error-msg" class="error-msg"></span>
                        <button type="submit" id="f-o-more" class="f-o-more">FIND OUT MORE</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /*}*/?>
<script>
    $(document).ready(function(){
        $(".myBtn").click(function(){
            $("#myModal").modal();
        });
        $("#myModal").modal();
    });
</script>


<script>
    $(document).ready(function () {
        $("#snap").on("click", function () {
            context.drawImage(video, 0, 0, 640, 480);
        });
    });
</script>
<script>
    $(function() {

    });
</script>

<?php get_footer(); ?>