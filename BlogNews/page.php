<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="MAIN_contentContainer">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="col-md-12 col-sm-12 post-first post">
                <h2 class="title-color"><?php the_title() ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="blog-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
    <!-- post navigation -->
<?php else: ?>
    <!-- no posts found -->
<?php endif; ?>

<?php get_footer(); ?>
