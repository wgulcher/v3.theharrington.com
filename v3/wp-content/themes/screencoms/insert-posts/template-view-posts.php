<?php
/**
 * Template Name: View Posts
 */

get_header(); ?>

<?php
$query = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => '-1',
    'post_status' => array(
        'publish',
        'pending',
        'draft',
        'private',
        'trash'
    )
) );
?>

<table>
   <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
<tr>
    <td><?php echo get_the_title(); ?></td>
    <td><?php the_excerpt(); ?></td>
    <td><?php echo get_post_status( get_the_ID() ) ?></td>
    <td><?php
$edit_post = add_query_arg( 'post', get_the_ID(), get_permalink( 8538 + $_POST['_wp_http_referer'] ) );
?><a href="<?php echo $edit_post; ?>">Edit</a> 

<?php if( !(get_post_status() == 'trash') ) : ?>
    <a onclick="return confirm('Are you sure you wish to delete post: <?php echo get_the_title() ?>?')"href="<?php echo get_delete_post_link( get_the_ID() ); ?>">Delete</a>
<?php endif; ?>
</td>
</tr>
<?php endwhile; endif; ?>
</table>

<?php get_footer(); ?>