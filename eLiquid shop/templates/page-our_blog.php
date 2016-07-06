<?php
/* Template name:Our Blog */
get_header(); ?>

<div class="container title">
    <div class="row">
        <div class="col-sm-12">
            <h2><?php the_title() ?></h2>
        </div>
    </div>
</div>
<div class="container productlist">
    <div class="row">
        <div class="col-md-12">
            <?php $args = array('post_type' => 'post');
            query_posts($args); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post">
                    <div class="row blog_list">
                        <div class="col-md-6 col-xs-12">
                            <div class="thumbnail with-info">
                                <?php the_post_thumbnail(); ?>
                                <div class="info">
                                    <div class="align-vertical" style="padding-top: 13.25px;">
                                        <span><?php the_time('j') ?></span>
                                        <span><?php the_time('M') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="post-details">
                                <h2 class="page-title"><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-default">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>