<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Radios
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function radios_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'radios_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function radios_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'radios_pingback_header' );

/**
 * Product Image Size
 *
 * @param [type] $product
 * @param string $thumb_size
 * @return void
 */
function get_product_thumbnail( $product, $thumb_size = 'woocommerce_thumbnail' ) {
	$thumbnail   = $product->get_image( $thumb_size, array(), false );
	if ( !$thumbnail ) {
		$thumbnail = wc_placeholder_img( $thumb_size );
	}
	return $thumbnail;
}

/**
 * Product Thumbnil Link
 *
 * @param [type] $product
 * @param string $thumb_size
 * @return void
 */
function get_product_thumbnail_link( $product, $thumb_size = 'woocommerce_thumbnail' ) {
	return '<a href="'.esc_attr( $product->get_permalink() ).'">'. get_product_thumbnail( $product, $thumb_size ).'</a>';
}



function radios_add_to_wishlist_icon( $icon = true, $text = false ){
	if ( !defined( 'YITH_WCWL' ) ) {
		return false;
	}

	if ( is_shop() ) {
		return false;
	}

	if ( is_product() ) {
		return false;
	}
	RADIOS_THEME_DRI . '/woocommerce/wishlist-icon.php';
}

function get_product_thumbnail_gallery($product, $thumb_size = 'woocommerce_thumbnail'){

	$attachment_ids = $product->get_gallery_image_ids();

	if ( empty( $attachment_ids ) ) {
		return get_product_thumbnail_link( $product, $thumb_size );
	}

	$thumb = $product->get_image_id();
	if ( $thumb ) {
		array_unshift( $attachment_ids, $thumb );
	}

	$data = array( 
		'slidesToShow' => 1,
		'prevArrow'    => '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		'nextArrow'    => '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
		'dots'         => false,
		'rtl'     		=> is_rtl() ? true : false,
	);
	$data = json_encode( $data );
	?>
	<div class="rt-slick-slider" data-slick="<?php echo esc_attr( $data );?>">
		<?php foreach ( $attachment_ids as $attachment_id ): ?>
			<a href="<?php echo esc_attr( $product->get_permalink() );?>"><?php echo wp_get_attachment_image( $attachment_id, $thumb_size )?></a>
		<?php endforeach; ?>
	</div>
<?php
}

/**
 * Authore Avater
 */
function radios_main_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}
  
add_action('genesis_entry_header', 'radios_post_author_avatars');

/**
 * Post Read Time
 */
function radios_reading_time() {	
	global $post;	
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
	$timer = esc_html(" min read");
	} else {
	$timer = esc_html(" min read");
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

/**z
 * Search Widget
 */
function radios_search_widgets( $form ) {
    $form = '<div class="search-widget"><form role="search" method="get" id="searchform" class="widget__search" action="' . home_url( '/' ) . '" >
    <input class="form_control" placeholder="' .esc_attr__( 'Search..', 'radios' ) . '" type="text"  value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="fal fa-search"></i></button>
    </form></div>';

    return $form;
}
add_filter( 'get_search_form', 'radios_search_widgets', 100 );

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span id="mini-cart-count" class="count"><?php echo esc_html($items_count) ? $items_count : '0'; ?></span>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}


/**
 * radios Category Search
 *
 * @return void
 */
function radios_product_search(){ ?>
	<form name="myform" method="GET" class="header__search-box" action="<?php echo esc_url(home_url('/'));?>">
		<?php if (class_exists('WooCommerce')): ?>
			<div class="select-box">
				<?php
				if (isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat'])) {
					$optsetlect = $_REQUEST['product_cat'];
				} else {
					$optsetlect = 0;
				}
				$args = array(
					'show_option_all' => esc_html__('All Categories', 'radios'),
					'hierarchical' => 1,
					'class' => 'cat',
					'echo' => 1,
					'value_field' => 'slug',
					'selected' => $optsetlect,
				);
				$args['taxonomy'] = 'product_cat';
				$args['name'] = 'product_cat';
				$args['class'] = 'cate-dropdown hidden-xs';
				wp_dropdown_categories($args);
			
				?>
			</div>
		
			<input type="hidden" value="product" name="post_type">
			<?php endif;?>
			<input type="text"  name="s" class="searchbox" maxlength="128" value="<?php echo get_search_query();?>" placeholder="<?php esc_attr_e('Search For Product', 'radios');?>">
		
			<button type="submit"><i class="far fa-search"></i></button>	
  </form>
  <?php 
}


function radios_add_to_cart_icon( $icon = true, $text = true ){
	global $product;
	$quantity = 1;
	$class = implode( ' ', array_filter( array(
		'action-cart button product_type_variable rtwpvs_add_to_cart rtwpvs_ajax_add_to_cart ',
		'product_type_' . $product->get_type(),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
	) ) );

	$html = '';

	if ( $icon ) {
		$html .= '<i class="far fa-shopping-basket"></i>';
	}

	if ( $text ) {
		$html .= '<span>' . $product->add_to_cart_text() . '</span>';
	}
	$html .= '<span class="custom-tooltip">'.esc_html('Add To Cart', 'radios').'</span>';

	echo sprintf( '<a rel="nofollow" title="%s" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">' . $html . '</a>',			
		esc_attr( $product->add_to_cart_text() ),
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'action-cart' )
	);
}


function radios_compayer(){
	global $product;
	
			if ( ! class_exists( 'YITH_Woocompare' ) ) {
				return;
			}
	
			$button_text = get_option( 'yith_woocompare_button_text', esc_html__( '', 'radios' ) );
			$product_id  = $product->get_id();
			$url_args    = array(
				'action' => 'yith-woocompare-add-product',
				'id'     => $product_id,
			);
			$lang        = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
			if ( $lang ) {
				$url_args['lang'] = $lang;
			}
	
			$css_class   = 'compare';
			$cookie_name = 'yith_woocompare_list';
			if ( function_exists( 'is_multisite' ) && is_multisite() ) {
				$cookie_name .= '_' . get_current_blog_id();
			}
			$the_list = isset( $_COOKIE[ $cookie_name ] ) ? json_decode( $_COOKIE[ $cookie_name ] ) : array();
			if ( in_array( $product_id, $the_list ) ) {
				$css_class          .= ' added';
				$url_args['action'] = 'yith-woocompare-view-table';
				$button_text        = apply_filters( 'yith_woocompare_compare_added_label', esc_html__( '', 'radios' ) );
			}
	
			$url = esc_url_raw( add_query_arg( $url_args, site_url() ) );
			echo '<div class="compare-button radios-compare-button">';
			printf( '<a href="%s" class="%s" title="%s" data-product_id="%d"><i class="far fa-compress-alt"></i><span class="text">%s</span></a>', esc_url( $url ), esc_attr( $css_class ), esc_attr( $button_text ), $product_id, $button_text );
			echo '</div>';
	}

/**
 * Product Per Page Count
 *
 * @param [type] $per_page
 * @return void
 */ 
function radios_prouducts_per_page( $per_page ) {
	$product_count = cs_get_option('product_count');
  $per_page = $product_count;
  return $per_page;
}
add_filter( 'loop_shop_per_page', 'radios_prouducts_per_page', 9999 );


/**
 * @snippet       CSS to Move Gallery Columns @ Single Product Page
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 */
 
add_filter ( 'storefront_product_thumbnail_columns', 'radios_change_gallery_columns_storefront' );
 
function radios_change_gallery_columns_storefront() {
     return 1; 
}

function get_product_search_form(){ ?>
	<form role="search" method="get" class="woocommerce-product-search widget__search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
		<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'radios' ); ?></label>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'radios' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e('Search...', 'radios' ); ?>" />		
		<button type="submit"><i class="far fa-search"></i></button>
		<input type="hidden" name="post_type" value="product" />
	</form>
<?php 
}

/**
 * post Pagination
 */
function radios_pagination() {
    global $wp_query;
    $links = paginate_links( array(
    'current'   => max( 1, get_query_var( 'paged' ) ),
    'total'     => $wp_query->max_num_pages,
    'type'      => 'list',
    'mid_size'  => 3,
    'prev_text' => '<i class="fal fa-angle-double-left"></i>',
    'next_text' => '<i class="fal fa-angle-double-right"></i>',
    ) );

    echo wp_kses_post( $links );
}

/**
 * Comment Message Box
 */
function radios_comment_reform( $arg ) {

	$arg['title_reply']   = esc_html__( 'Leave a comment', 'radios' );
	$arg['comment_field'] = '<div class="comments-form"><div class="col-md-12"><div class="field-item"><textarea id="comment" class="form_control" name="comment" cols="77" rows="3" placeholder="' . esc_attr__( "Comment", "radios" ) . '" aria-required="true"></textarea></div></div></div>';

	return $arg;

}
add_filter( 'comment_form_defaults', 'radios_comment_reform' );
/**
 * Comment Form Field
 */

function radios_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );

	$fields['author'] = '<div class="comments-form"><div class="row"><div class="col-md-6"><div class="field-item"><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( "Name", "radios" ) . '" size="22" tabindex="1"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control" /></div></div>';

	$fields['email'] = '<div class="col-md-6"><div class="field-item"><input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( "Email", "radios" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control"  /></div></div>';

	$fields['url'] = '<div class="col-md-12"><div class="field-item"><input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( "Website", "radios" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="false"' : '' ) . ' class="form_control"  /></div></div></div></div>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'radios_modify_comment_form_fields' );

// comment Move Field
function radios_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'radios_move_comment_field_to_bottom' );


/**
 * Comment List Modification
 */
function radios_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;?>

	<li <?php comment_class('comment');?> id="comment-<?php comment_ID()?>">
        <div class="comments-box">
            <?php if ( get_avatar( $comment ) ) {?>
                <div class="comments-avatar">
                    <?php echo get_avatar( $comment, 100 ); ?>
                </div>
            <?php }?>

            <div class="comments-text">
				<div class="avatar-name">
					<h5 class="name"><?php comment_author_link()?></h5>
					<span class="comment-date"><?php echo esc_html( get_comment_date( 'dS M Y' ) ); ?></span>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => wp_kses('<i class="fal fa-reply"></i> Reply', true) ) ) );?>
				</div>  
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'radios' );?></em></p>
                <?php endif;?>
                <?php comment_text();?>
            </div>
        </div>
	</li>


<?php
}


/**
 * radios Single Post Nav
 */
function radios_single_post_pagination(){ 
    $radios_prev_post = get_previous_post();
    $radios_next_post = get_next_post();
?>
<div class="row post-nav">
	<div class="col-lg-6 col-md-6">
		<div class="post-nav__wrap left-post">
			<a class="post-nav__link" href="<?php echo esc_url(get_the_permalink($radios_prev_post));?>">
				<i class="far fa-angle-left"></i>
			</a>
			<div class="post-nav__item tx-post ul_li">
				<?php if(has_post_thumbnail($radios_prev_post)):?>
				<div class="post-thumb">
					<a href="<?php echo esc_url(get_the_permalink($radios_prev_post));?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($radios_prev_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>"></a>
				</div>
				<?php endif;?>
				<div class="post-content">
					<h2 class="post-title border-effect-2"><a href="<?php echo esc_url(get_the_permalink($radios_prev_post));?>"><?php echo esc_html(wp_trim_words( get_the_title($radios_prev_post), 5, '' ));?></a></h2>
					<div class="post-meta post-meta--2 ul_li mt-6">
						
						<span class="date"><i class="far fa-calendar-alt"></i><?php echo wp_kses( get_the_date('M j, Y', $radios_prev_post), true ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="post-nav__wrap right-post">
			<a class="post-nav__link" href="<?php echo esc_url(get_the_permalink($radios_next_post));?>">
				<i class="far fa-angle-right"></i>
			</a>
			<div class="post-nav__item tx-post ul_li">
				<?php if(has_post_thumbnail($radios_next_post)):?>
				<div class="post-thumb">
					<a href="<?php echo esc_url(get_the_permalink($radios_next_post));?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($radios_next_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>"></a>
				</div>
				<?php endif;?>
				<div class="post-content">
					<h2 class="post-title border-effect-2"><a href="<?php echo esc_url(get_the_permalink($radios_next_post));?>"><?php echo esc_html(wp_trim_words( get_the_title($radios_next_post), 5, '' ));?></a></h2>
					<div class="post-meta post-meta--2 ul_li mt-6">
						<span class="date"><i class="far fa-calendar-alt"></i><?php echo wp_kses( get_the_date('M j, Y', $radios_next_post), true ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
}



/**
 * Get Breadcrumb
 *
 * @return void
 */
function radios_the_breadcrumb() {
	global $wp_query;
	$queried_object = get_queried_object();
	$breadcrumb     = '';
	$before         = '<li class="radiosbcrumb-item radiosbcrumb-begin">';
	$after          = '</li>';
	$breadcrumb .='<ul class="list-unstyled d-flex align-items-center">';
	if ( ! is_front_page() ) {
		$breadcrumb .= $before . '<a href="' . home_url( '/' ) . '">' . esc_html__( 'Home', 'radios' ) . ' &nbsp;</a>' . $after;
		/** If category or single post */
		if ( is_category() ) {
			$cat_obj       = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );
			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb      .= get_category_parents( $parent_category, true, $delimiter );
			}
			$breadcrumb .= $before . '<a href="' . get_category_link( get_query_var( 'cat' ) ) . '">' . single_cat_title( '', false ) . '</a>' . $after;
		} elseif ( $wp_query->is_posts_page ) {
			$breadcrumb .= $before . $queried_object->post_title . $after;
		} elseif ( is_tax() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . $queried_object->name . '</a>' . $after;
		} elseif ( is_page() ) /** If WP pages */ {
			global $post;
			if ( $post->post_parent ) {
				$anc = get_post_ancestors( $post->ID );
				foreach ( $anc as $ancestor ) {
					$breadcrumb .= $before . '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . ' &nbsp;</a>' . $after;
				}
				$breadcrumb .= $before . '' . get_the_title( $post->ID ) . '' . $after;
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_singular() ) {
			if ( $category = wp_get_object_terms( get_the_ID(), array( 'category', 'location', 'tax_feature' ) ) ) {
				if ( ! is_wp_error( $category ) ) {
					$breadcrumb .= $before . '<a href="' . get_term_link( radios_set( $category, '0' ) ) . '">' . radios_set( radios_set( $category, '0' ), 'name' ) . '&nbsp;</a>' . $after;
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				} else {
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				}
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_tag() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . single_tag_title( '', false ) . '</a>' . $after;
		} /**If tag template*/
		elseif ( is_day() ) {
			$breadcrumb .= $before . '<a href="#">' . esc_html__( 'Archive for ', 'radios' ) . get_the_time( 'F jS, Y' ) . '</a>' . $after;
		} /** If daily Archives */
		elseif ( is_month() ) {
			$breadcrumb .= $before . '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . __( 'Archive for ', 'radios' ) . get_the_time( 'F, Y' ) . '</a>' . $after;
		} /** If montly Archives */
		elseif ( is_year() ) {
			$breadcrumb .= $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . __( 'Archive for ', 'radios' ) . get_the_time( 'Y' ) . '</a>' . $after;
		} /** If year Archives */
		elseif ( is_author() ) {
			$breadcrumb .= $before . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '">' . __( 'Archive for ', 'radios' ) . get_the_author() . '</a>' . $after;
		} /** If author Archives */
		elseif ( is_search() ) {
			$breadcrumb .= $before . '' . esc_html__( 'Search Results for ', 'radios' ) . get_search_query() . '' . $after;
		} /** if search template */
		elseif ( is_404() ) {
			$breadcrumb .= $before . '' . esc_html__( '404 - Not Found', 'radios' ) . '' . $after;
			/** if search template */
		} elseif ( is_post_type_archive( 'product' ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			if ( get_option( 'page_on_front' ) !== $shop_page_id ) {
				$shop_page = get_post( $shop_page_id );
				$_name     = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name             = $product_post_type->labels->singular_name;
				}
				if ( is_search() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'radios' ) . get_search_query() . '&rdquo;' . $after;
				} elseif ( is_paged() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $after;
				} else {
					$breadcrumb .= $before . $_name . $after;
				}
			}
		} else {
			$breadcrumb .= $before . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . $after;
		}
		/** Default value */
	}
	$breadcrumb .='</ul>';

	return $breadcrumb;
}

/**
 * Ajax wishlist Count
 */

function yith_wcwl_get_items_count() {
	ob_start();
	if(function_exists('YITH_WCWL')):
	?>
	  <a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
	  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/heart.svg" alt="">
		<span class="yith-wcwl-items-count count">
			<?php echo esc_html( yith_wcwl_count_all_products() ); ?>
		</span>
	  </a>
	<?php
	return ob_get_clean();
	endif;
  }
  
  if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
	function yith_wcwl_ajax_update_count() {
	  wp_send_json( array(
		'count' => yith_wcwl_count_all_products()
	  ) );
	}
  
	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  }
  
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
function yith_wcwl_enqueue_custom_script() {
	wp_add_inline_script(
	'jquery-yith-wcwl',
	"
		jQuery( function( $ ) {
		$( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
			$.get( yith_wcwl_l10n.ajax_url, {
			action: 'yith_wcwl_update_wishlist_count'
			}, function( data ) {
			$('.yith-wcwl-items-count').children('i').html( data.count );
			} );
		} );
		} );
	"
	);
}

add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}
