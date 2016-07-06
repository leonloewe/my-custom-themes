<?php get_header(); ?>
<!--SLIDER START-->
<div class="container-fluid ">

	<div class="row">
        <div class="col-md-12 no_padding">
            <?php echo do_shortcode('[metaslider id=106]'); ?>

            <div id="clear"></div>
        </div>
    </div>
</div>
<!--SLIDER END-->

<!--START BANNER-->
<div class="container no_padding">
    <div class="col-md-12 banner-div">
        <div class="col-md-12 banner-div">
            <div class="banner clearfix">
                <div class="col-md-7">
                    <?php $request = new WP_Query( array('post_type' => 'request', 'order' => 'ASC','posts_per_page'=>1) ); ?>
                    <?php if ($request->have_posts()) :  while ($request->have_posts()) : $request->the_post(); ?>
                    <ul>
                        <li><i class="fa fa-circle"></i></li>
                        <li><h5><?php the_content(); ?></h5></li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul>
                        <li class="banner-btn"><a href=""><?php the_title(); ?></a></li>
                    </ul>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="pntik"></div>
        </div>
    </div>
<!--BANNER END-->

<!--Start CONTENT-->
    <div class="container">
        <div class="row">
            <div class="content">

            <?php $index_product = new WP_Query( array('post_type' => 'index_product', 'order' => 'ASC','posts_per_page'=>16) ); ?>
                    <?php if ($index_product->have_posts()) :  while ($index_product->have_posts()) : $index_product->the_post(); ?>

                <div class="col-md-3 col-sm-6 ">
                    <div class="prod">
                      <?php the_post_thumbnail(); ?>
                        <div class="content-text">
                            <h1><?php the_title(); ?></h1>
                            <span class="tec"></span>
                        </div>
                        <div class="list">
                            <ul>
                            <?php $mykey_values = get_post_custom_values( 'wpcf-product-list' );
                               foreach ( $mykey_values as $key => $value ) {     ?>

                                       <?php  if ($key == 0) {
                                         continue;
                                        }else{ ?>

                                  <li>   <?php echo  $value;?> </li>

                                    <?php  }; ?>

                             <?php  }; ?>
                             
                            </ul>
                        </div>
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-plus-circle"></i>INFO</a>
                    </div>
                </div>
                <?php endwhile; ?>
                    <?php endif; ?>
                    <script type="text/javascript">
                        jQuery( document ).ready(function() {
                               jQuery('.content .col-md-3.col-sm-6:nth-child(5n+5) ').before('<div class="clearfix"> </div>')             
                        });
                    </script>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="customer">
            <div class="pntik_2"></div>
            <span>Our Satisfied Customers</span>
        </div>
    </div>
</div>
<div class="container-fluid"> 
    <div class="row">

        <!--Start Share RydgesMoments part -->
        <div id="RydgesMoments" style="background-image:url('<?php echo get_stylesheet_directory_uri()."/assets/images/social-back.jpg"; ?>')">
            <!-- Start  RydesMoments carousel slider -->

                <div id="rydgesmoments-offer" class="owl-carousel owl-theme">
                    <?php $Sliders = new WP_Query( array('post_type' => 'Sliders', 'order' => 'ASC','posts_per_page'=>16) ); ?>
                    <?php if ($Sliders->have_posts()) :  while ($Sliders->have_posts()) : $Sliders->the_post(); ?>
                    <div class="item"><a target="_blank" href="<?php echo $meta_values = get_post_meta(get_the_id(), 'link', true); ?>">  <?php the_post_thumbnail(); ?></a></div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
            <!-- End RydesMoments carousel slider -->

    </div>
</div>
<?php get_footer(); ?>





