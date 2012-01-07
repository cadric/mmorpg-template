<?php
//Some simple code for our widget-enabled sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'before_widget' => '<div class="aside">',
    'after_widget' => '</div>',
    'before_title' => ' <div class="aside-title"><h3>',
    'after_title' => '</h3></div>',
));

/**
 * Replacing the default WordPress search form with an HTML5 version
 *
 */
function html5_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" placeholder="'.__("Enter term...").'" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'html5_search_form' );

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );

//Register area for custom menu
function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

//Code for custom background support
add_custom_background();

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);
?>
<?php
class MV_Cleaner_Walker_Nav_Menu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
}
?>