<?php
/* Downloadable scripts and styles
/* ---------------------------------------------------------------------- */
function load_style_script(){
    /*Stiles*/
    wp_enqueue_style('style-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style-fonts', get_template_directory_uri() . '/css/fonts.css');

    /* Scripts */
    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script('jquery-js.min', get_template_directory_uri() . '/js/js.min.js');
    wp_enqueue_script('jquery-jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js');
}

/* Load scripts and styles
/* ---------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'load_style_script');


function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* Register menus
/* ---------------------------------------------------------------------- */
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'footer_menu' => 'Footer menu'
    ));
});

/* Thumbnail support
/* ---------------------------------------------------------------------- */
add_theme_support('post-thumbnails');

/* images size
/* ---------------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('small-very-thumb', 130, 100, true);
    add_image_size('small-thumb', 180, 140, true);
    add_image_size('medium-thumb', 360, 300, true);
    add_image_size('single-thumb', 652, 442, true);
    add_image_size('large-thumb', 800, 450, true);
}


/* Register sidebar
/* ---------------------------------------------------------------------- */
register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="col-sm-12 blog-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

/* Pagination
/* ---------------------------------------------------------------------- */
function pagination($pages = '', $range = 2) {
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }
    if(1 != $pages) {
        echo '<div class="pagination">';
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'">&laquo;</a>';
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                echo ($paged == $i)? '<span>'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" >'.$i.'</a>';
            }
        }
        if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'">&rsaquo;</a>';
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'">&raquo;</a>';
        echo '</div>';
    }
}

/* comments
/* ---------------------------------------------------------------------- */
function leetpress_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="the-comment">
        <?php echo get_avatar($comment, $size = '60'); ?>
        <div class="comment-arrow"></div>
        <div class="comment-box">
            <div class="comment-author">
                <strong><?php echo get_comment_author_link() ?></strong>
                <small>
                    <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('Edit'), '  ', '') ?>
                    - <?php comment_reply_link(array_merge($args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </small>
            </div>
            <div class="comment-text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br/>
                <?php endif; ?>
                <?php comment_text() ?>
            </div>
        </div>
    </div>
<?php }

/* breadcrumbs WordPress
/* ---------------------------------------------------------------------- */
function dimox_breadcrumbs() {

    /* === Options === */
    $text['home'] = 'Home';
    $text['category'] = 'Archive "%s"';
    $text['search'] = 'Search results for "%s"';
    $text['tag'] = 'Entries Tagged with "%s"';
    $text['author'] = 'Article author %s';
    $text['404'] = 'Error 404';
    $text['page'] = 'Page %s';
    $text['cpage'] = 'Comments page %s';

    $wrap_before = '<div class="breadcrumbs">';
    $wrap_after = '</div><!-- .breadcrumbs -->';
    $sep = ' / ';
    $sep_before = '<span class="sep">';
    $sep_after = '</span>';
    $show_home_link = 1;
    $show_on_home = 0;
    $show_current = 1;
    $before = '<span class="breadEnd current">';
    $after = '</span>';
    /* === Option END === */

    global $post;
    $home_link = home_url('/');
    $link_before = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
    $link_after = '</span>';
    $link_attr = ' itemprop="url"';
    $link_in_before = '<span itemprop="title">';
    $link_in_after = '</span>';
    $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = $post->post_parent;
    $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

    if (is_home() || is_front_page()) {
        if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
    } else {
        echo $wrap_before;
        if ($show_home_link) echo sprintf($link, $home_link, $text['home']);
        if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }
        } elseif ( is_search() ) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }
        } elseif ( is_day() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;
        } elseif ( is_month() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;
        } elseif ( is_year() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ($show_home_link) echo $sep;
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
                if ( get_query_var('cpage') ) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }
            // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( get_query_var('paged') ) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }
        } elseif ( is_attachment() ) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;
        } elseif ( is_tag() ) {
            if ( get_query_var('paged') ) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }
        } elseif ( is_author() ) {
            global $author;
            $author = get_userdata($author);
            if ( get_query_var('paged') ) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }
        } elseif ( is_404() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string( get_post_format() );
        }
        echo $wrap_after;
    }
} // end of breadcrumbs()