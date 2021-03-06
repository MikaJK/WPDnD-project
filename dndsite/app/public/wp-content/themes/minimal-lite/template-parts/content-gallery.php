<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Minimal_Lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (is_single()) {
        $archive_div_class = "single-post";
    } else {
        $archive_div_class = "panel-wrapper";
    } ?>
    <div class="<?php echo esc_attr($archive_div_class); ?>">
    <?php
    if(is_singular()){
        $image_option = minimal_lite_get_image_option();
        if ( 'no-image' != $image_option ){
            if (has_post_thumbnail()) { ?>
                <div class="thememattic-featured-image post-thumb">
                    <?php echo (get_the_post_thumbnail(get_the_ID(), $image_option)); ?> 
                <?php $pic_caption = get_the_post_thumbnail_caption(); 
                if ($pic_caption) { ?>
                    <div class="img-copyright-info">
                        <p><?php echo esc_html($pic_caption); ?></p>
                    </div>
                <?php
                } ?>
                </div>
            <?php }
        }
        $raw_content = get_the_content();
        $final_content = apply_filters( 'the_content', $raw_content );

        /*Get first word of content*/
        $first_word = substr($raw_content, 0, 1);
        /*only allow alphabets*/
        if(preg_match("/[A-Za-z]+/", $first_word) != TRUE){
            $first_word = '';
        }

        echo '<div class="entry-content" data-initials="'.esc_attr($first_word).'">';
        /*Excerpt*/
        global $post;
        if(!empty($post->post_excerpt)){
            echo '<div class="prime-excerpt">'.esc_html($post->post_excerpt).'</div>';
        }
        /**/
        echo $final_content;
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimal-lite' ),
            'after'  => '</div>',
        ) );
        echo '</div>';
    }else{
        echo '<div class="entry-content">';
        if (!is_singular()): ?>
            <header class="entry-header">
                <?php if( true == minimal_lite_get_archive_meta_option() ){
                    minimal_lite_entry_category();
                } ?>
                <!-- posted coment -->
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            </header>
            <?php if( true == minimal_lite_get_archive_meta_option() ){ ?>
                <div class = "entry-meta-wrap">
                    <?php minimal_lite_posted_date_only();
                    minimal_lite_posted_comment(); ?>
                </div>
            <?php } ?>
        <?php endif;
        // If not a single post, highlight the gallery.
        if ( function_exists('has_block') && has_block('gallery', $post->post_content) ) {

            $post_blocks = parse_blocks($post->post_content);
            if( $post_blocks ){
                foreach( $post_blocks as $post_block ){

                    if( isset( $post_block['blockName'] ) && 
                        isset( $post_block['innerHTML'] ) && 
                        $post_block['blockName'] == 'core/gallery' ){

                        echo '<div class="entry-gallery">';
                        echo $post_block['innerHTML'];
                        echo '</div>';
                        break;

                    }

                }
            }

        }else{

            if( get_post_gallery() ){
                echo '<div class="entry-gallery">';
                echo get_post_gallery();
                echo '</div>';
            }
        }
        echo '</div>';
    }
    ?>

    <?php
    if (is_single()) { ?>
        <footer class="entry-footer">
            <div class="entry-meta">
                <?php minimal_lite_entry_footer(); ?>
            </div>
        </footer><!-- .entry-footer -->
    <?php } ?>
    </div>
</article>