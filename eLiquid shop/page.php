<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container title">
        <div class="row">
            <div class="col-sm-12">

                <h2 class="title-color"><?php the_title() ?></h2>
            </div>
        </div>
    </div>
    <div class="container cart-list">
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif; ?>

<?php get_footer(); ?>
