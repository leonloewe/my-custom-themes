<?php get_header(); ?>

    <div id="MAIN_contentContainer">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="post">
                    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                        <h1 class="title"><?php the_title(); ?></h1>
                            <div class="post-meta">
                                <span class="small">By</span>
                                <span class="author vcard">
                                    <span class="fn">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </span>
                                <span class="small">on</span>
                                <abbr class="date time published"><?php the_time('d M Y'); ?></abbr>
                                <span class="small">in</span>
                                <span class="categories">
                                    <?php $categories = get_the_category();
                                    $separator = ' ';
                                    $output = '';
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a>,' . $separator;
                                        }
                                        echo trim($output, $separator);
                                    } ?>
                                </span>
                            </div>
                            <div class="entry">
                                <?php the_post_thumbnail('large-thumb', array( 'class'	=> "img-responsive")); ?>
                                <?php the_content();?>
                                <!-- Start Sociable -->
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

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
                            <a class="btn btn-outline pull-right" href="<?php echo get_permalink($next_post->ID); ?>">
                                <span>New</span>
                                <span class="hidden-xs"> Posts</span>
                                <i class="icon-arrow-right2 right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php comments_template( '', true ); ?>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="blog-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53fac0a06cf989e8"></script>-->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ec235a89-f0d8-4712-9ca8-63bb4a0c7a12", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php get_footer(); ?>