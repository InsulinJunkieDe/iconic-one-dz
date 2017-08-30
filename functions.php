<?php

if ( ! function_exists( 'themonic_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Iconic One 1.0
 */
function themonic_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<div class="assistive-text"><?php _e( 'Seiten Navigation', 'themonic' ); ?></div>
			<?php wp_pagenavi(); ?>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo "<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>\n";
  echo "<style>body#tinymce { font-family: Roboto; \n";
}



remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function PREFIX_remove_scripts() {
    wp_dequeue_style( 'themonic-fonts' );
    // Now register your styles and scripts here
}
add_action( 'wp_enqueue_scripts', 'PREFIX_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'theme-font', '//fonts.googleapis.com/css?family=Architects+Daughter|Ubuntu:400,700&#038;subset=latin,latin-ext');
    wp_enqueue_style( 'awesome-font', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

   /* wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );*/
}

  function tweakjp_custom_twitter_site( $og_tags ) {
    $og_tags['twitter:site'] = '@insulinjunkiede';
    $og_tags['twitter:card'] = 'summary';
    return $og_tags;
  }
  add_filter( 'jetpack_open_graph_tags', 'tweakjp_custom_twitter_site', 11 );
    

  function add_default_image( $tags ) {
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    
    
    if(is_array($tags['og:image'])){
      $ogimage = array_reverse($tags['og:image']);
      array_push($ogimage, wp_get_attachment_image_src( get_post_thumbnail_id(), '')[0]);
      $ogimage = array_reverse($ogimage);
      $tags['og:image'] = $ogimage;
    }else{
    	$tags['og:image'] = wp_get_attachment_image_src( get_post_thumbnail_id(), '')[0];
    
    }
      $tags['twitter:image'] = wp_get_attachment_image_src( get_post_thumbnail_id(),'large')[0];
    }
    // replace blank Jetpack default image with site header
    if ( $tags['og:image'][0] == "http://wordpress.com/i/blank.jpg" ) {
      unset( $tags['og:image'][0] );
      $tags['og:image'][0] = 'http://insulinjunkie.de/wp-content/uploads/2014/08/og_image.png';
    }
    // always remove useless HTTPS image tags
    unset( $tags['og:image:secure_url'] );
    return $tags;
  }
  
  add_filter( 'jetpack_open_graph_tags', 'add_default_image' );
  

  add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );
    function wpsites_child_theme_posts_formats(){
   add_theme_support(
    'post-formats',
    array('quote')
    );
  }


  function dz_excerpt_more($more) {
   global $post;
   return '… <span class="read-more"><a href="'. get_permalink($post->ID) . '"><span class="ir irib">&rsaquo;'.$post->post_title.'&lsaquo; </span>Weiterlesen &raquo;</a></span>';
  }
    
  add_action( 'after_setup_theme', function() {
    remove_filter('excerpt_more', 'io_excerpt_more'); 
    add_filter('excerpt_more', 'dz_excerpt_more'); 
  }, 12 );



function d4_head() {
echo '<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">'."\n";
echo '<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">'."\n";
echo '<link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">'."\n";
echo '<link rel="icon" type="image/png" href="/favicons/favicon-194x194.png" sizes="194x194">'."\n";
echo '<link rel="icon" type="image/png" href="/favicons/favicon-96x96.png" sizes="96x96">'."\n";
echo '<link rel="icon" type="image/png" href="/favicons/android-chrome-192x192.png" sizes="192x192">'."\n";
echo '<link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">'."\n";
echo '<link rel="manifest" href="/favicons/manifest.json">'."\n";
echo '<meta name="msapplication-TileColor" content="#2b5797">'."\n";
echo '<meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">'."\n";
echo '<meta name="theme-color" content="#ffffff">';
}
add_action('wp_head', 'd4_head');


if ( ! function_exists( 'dz_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own themonic_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Iconic One 1.0
 */
function dz_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'themonic' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Bearbeiten', 'themonic' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 30,"","Gravatar: ".get_comment_author());
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// Adds Post Author to comments posted by the article writer
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'themonic' ) . '</span>' : ''
					);
					printf( '<time datetime="%1$s">%2$s</time>',
						get_comment_time( 'c' ),
						/* translators: 1: date */
						sprintf( __( '%1$s', 'themonic' ), get_comment_date() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themonic' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Bearbeiten', 'themonic' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Antworten', 'themonic' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/* Adding Logo for AMP */


add_filter( 'amp_post_template_metadata', 'dz_amp_modify_json_metadata', 10, 2 );

function dz_amp_modify_json_metadata( $metadata, $post ) {
    //$metadata['@type'] = 'NewsArticle';

    $metadata['publisher']['logo'] = array(
        '@type' => 'ImageObject',
        'url' => 'http://insulinjunkie.de/wp-content/uploads/2015/03/InsulinJunkieLogo-660x225.png',
        'height' => "225px",
        'width' => "660px",
    );

    return $metadata;
}


?>