<?php get_header(); ?>

    <div class="container cart-list">
        <div class="row">
            <div class="col-sm-12 blog-content">
                <article>
                    <header>
                        <h1><a href="#"><?php the_title(); ?></a></h1>
                    </header>
                    <div class="post-date">
                        <?php the_time('M jS, Y') ?>  <a href="#"><?php the_author(); ?></a>
                    </div>
                    <div class="content">
                        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                            <div class="container-fluid productlist">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <a href="<?php the_permalink(); ?>">
                                             <?php if(has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail(); ?>
                                             <?php else: ?>
                                               <img src="<?php bloginfo('template_url'); ?>/images/no_img.jpg" alt="no-img" />
                                             <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <!--<div class=" paging clearfix">
                        <?php /*$socials = get_option('irny_theme_options'); */?>
                        <ul class="social-links outline text-center">
                            <li>
                                <?php /*$facebook_url = $socials['social']['facebook_url'];
                                if ($facebook_url != '') { */?>
                                    <a href="<?php /*echo $facebook_url; */?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <?php /*} */?>
                            </li>
                            <li>
                                <?php /*$twitter_url = $socials['social']['twitter_url'];
                                if ($twitter_url != '') { */?>
                                    <a href="<?php /*echo $twitter_url; */?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                <?php /*} */?>
                            </li>
                            <li>
                                <?php /*$googleplus_url = $socials['social']['googleplus_url'];
                                if ($googleplus_url != '') { */?>
                                    <a href="<?php /*echo $googleplus_url; */?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <?php /*} */?>
                            </li>
                            <li>
                                <?php /*$pinterest_url = $socials['social']['pinterest_url'];
                                if ($pinterest_url != '') { */?>
                                    <a href="<?php /*echo $pinterest_url; */?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                                <?php /*} */?>
                            </li>
                            <li>
                                <?php /*$instagram_url = $socials['social']['instagram_url'];
                                if ($instagram_url != '') { */?>
                                    <a href="<?php /*echo $instagram_url; */?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                <?php /*} */?>
                            </li>
                            <li>
                                <?php /*$dribbble_url = $socials['social']['dribbble_url'];
                                if ($dribbble_url != '') { */?>
                                    <a href="<?php /*echo $dribbble_url; */?>" target="_blank"><i class="icon-dribbble"></i></a>
                                <?php /*} */?>
                            </li>
                        </ul>
                    </div>-->
                </article>
                <div class="row">
                    <div class="col-sm-6 col-xs-6 paging clearfix">
                        <?php $prev_post = get_previous_post();
                        if (!empty( $prev_post )) : ?>
                            <a class="btn btn-outline pull-left" href="<?php echo get_permalink($prev_post->ID); ?>">
                                <i class="icon-arrow-left2 left"></i>
                                <span>Older</span>
                                <span class="hidden-xs"> Posts</span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6 col-xs-6 paging next-link clearfix">
                        <?php $next_post = get_next_post();
                        if (!empty($next_post)) : ?>
                            <a class="btn btn-outline pull-left" href="<?php echo get_permalink($next_post->ID); ?>">
                                <span>New</span>
                                <span class="hidden-xs"> Posts</span>
                                <i class="icon-arrow-right2 right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php comments_template( '', true ); ?>
            </div>
            <?php /*get_sidebar(); */?>
        </div>
    </div>
</div>

<?php get_footer(); ?>