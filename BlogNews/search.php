<?php get_header(); ?>

    <div id="MAIN_contentContainer">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <?php if ( have_posts() ) : ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </div><!-- .page-header -->
                <?php shape_content_nav( 'nav-above' ); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'search' ); ?>
                <?php endwhile; ?>
                <?php shape_content_nav( 'nav-below' ); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'search' ); ?>
            <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="blog-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>