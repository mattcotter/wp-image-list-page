<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YOUR_PACKAGE_NAME_HERE
 */

get_header();

// tool for finding rebel images that won't conform
$args = array( 
    'depth' => 0,
);

$images = get_pages($args);

echo '<ul>';

foreach ($images as $key => $image) {
    // Find image resolution
    $url      = get_the_post_thumbnail_url( $image->ID, 'medium' ); // remove 'medium' for default size
    $open     = getimagesize($url); // getimagesize() is a PHP function: http://php.net/manual/en/function.getimagesize.php
    // Find Mime-type
    $thumb_id = get_post_thumbnail_id($image->ID);
    $mime     = get_post_mime_type($thumb_id);
    // to list by file type, use -> if (($mime == 'image/pdf') && ($open)) { ... }

    // $open creates array, open[3] returns "width=x height=x"
    if (!($open[3] == 'width="300" height="300"') && ($open)) {
        echo '
            <li>' . get_the_title($image->ID) . '
                <ul>
                    <li><strong>Dimensions:</strong> ' . $open[3] . '</li>
                    <li><strong>Image URL:</strong> ' . $url . '</li>
                    <li><strong>Mime-type:</strong> ' . $mime . '</li>
                </ul>
            </li>
        ';
        // TODO: SMITE THEM
    }
}

echo '</ul>';
            
get_footer();