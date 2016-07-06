<?php get_header(); ?>
    <div id="MAIN_contentContainer" class="container">

        <div class="col-md-8 col-sm-8 col-xs-12  no-padding">
            <h1 class="blog-title">Archive</h1>

            <?php  if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                <div class="col-md-12 col-sm-12  all-post-home no-padding">
                    <div class="post-all clearfix ">
                        <div class="col-md-4 col-sm-4 col-sx-12 no-padding">
                            <?php the_post_thumbnail('small-thumb', array( 'class'	=> "img-responsive")); ?>
                        </div>
                        <div class="col-md-8 col-sm-8 col-sx-12">
                            <h2 class="title">
                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="post-meta no-padding">
                                <span class="small">By</span>
                                <span class="author vcard">
                                    <span class="fn">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </span>
                                <span class="small">on</span>
                                <abbr class="date time published" title=""><?php the_time('d M Y'); ?></abbr>
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
                        </div>
                        <div class="entry col-md-8 col-sx-8 col-md-12 no-padding">
                            <span><?php the_excerpt(); ?></span>
                            <div class="post-more">
                                <span class="read-more">
                                    <a href="<?= get_post_permalink() ?>"> Read more</a>
                                    <span class="sep">•</span>
                                </span>
                                <span class="post-comments comments">
                                    <a href="<?= get_comments_pagenum_link() ?>"><?= comments_number() ?></a>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endwhile; ?>
            <?php endif; ?>

            <div class="col-md-12">
                <?php if (function_exists('pagination')) {pagination(); } ?>
            </div>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 no-padding">
            <div class="blog-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>