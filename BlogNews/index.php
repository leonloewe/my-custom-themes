<?php get_header('blog'); ?>

<div id="MAIN_movingArea" class="movedup">
    <div id="MAIN_container">
        <div id="MAIN_nudgeArrow" class="up"></div>
        <div id="MAIN_breadcrumbContainer">
            <div id="MAIN_breadcrumbContent">
                <div id="breadcrumbs">
                    <div class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="https://www.msauk.org" itemprop="url">
                            <span itemprop="title">Home</span>
                        </a>
                        <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb">/
                            <a class="" href="https://www.msauk.org/News" itemprop="url">
                                <span itemprop="title">News &amp; publications</span>
                            </a>
                        </div>
                        <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb">/
                            <a class="breadEnd" href="https://www.msauk.org/News" itemprop="url">
                                <span itemprop="title">Blog</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="MAIN_contentContainer" class="container">

                <div class="col-md-8 col-sm-8 col-xs-12  no-padding">
                    <h1 class="blog-title">BLOG</h1>

                    <?php $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'paged'             => $paged,
                        'orderby'           => 'date',
                        'order'             => 'DESC'
                    );
                    query_posts($args);
                    $i = 0;
                    if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                        <?php if($i == 0) { ?>
                            <div class="col-md-12 col-sm-12  all-post-home no-padding">
                                <div class="post-all clearfix ">
                                    <div class="col-md-4 col-sm-4 col-sx-12 no-padding">
                                        <?php the_post_thumbnail('small-thumb', array( 'class'	=> "img-responsive")); ?>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-sx-12">
                                        <h2 class="title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
                                    <a href="<?php echo get_post_permalink(); ?>"> Read more</a>
                                    <span class="sep">•</span>
                                </span>
                                <span class="post-comments comments">
                                    <a href="<?php echo get_comments_pagenum_link(); ?>"><?php echo comments_number(); ?></a>
                                </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } else { ?>

                            <div class="col-md-6 col-sm-6  all-post-home no-padding">
                                <div class="post-all clearfix ">
                                    <div class="col-md-4 col-sm-4 col-sx-12 no-padding">
                                        <?php the_post_thumbnail('small-thumb', array( 'class'	=> "img-responsive")); ?>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-sx-12">
                                        <h2 class="title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
                                    <div class="entry col-md-12 no-padding">
                                        <span><?php the_excerpt(); ?></span>
                                        <div class="post-more">
                                            <span class="read-more">
                                                <a href="<?php echo get_post_permalink(); ?>"> Read more</a>
                                                <span class="sep">•</span>
                                            </span>
                                            <span class="post-comments comments">
                                                <a href="<?php echo get_comments_pagenum_link(); ?>"><?php comments_number(); ?></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } $i++; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="col-md-12 col-xs-12">
                        <?php if (function_exists('pagination')) {pagination(); } ?>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 no-padding">
                    <div class="blog-sidebar">
                       <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>



    </div>

<?php get_footer(); ?>