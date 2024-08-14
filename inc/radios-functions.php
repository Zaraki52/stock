<?php 

/**
 * Undocumented function
 *
 * @return void
 */
function radios_menu_register(){
    echo str_replace(['sub-menu'], ['submenu'], wp_nav_menu( array( 
        'echo'           => false,
        'theme_location' => 'main_menu', 
        'container'=>false,
        'fallback_cb'    => 'Radios_Bootstrap_Navwalker::fallback',
    )) );	
}

function radios_menu_two_register(){
    echo str_replace(['menu-item-has-children'], ['dropdown'], wp_nav_menu( array( 
        'echo'           => false,
        'theme_location' => 'main_menu', 
        'menu_class' => 'navigation clearfix', 
        'container'=>false,
        'fallback_cb'    => 'Radios_Bootstrap_Navwalker::fallback',
    )) );	
}

/**
 * radios Mobile Menu
 *
 * @return void
 */
function radios_mobile_menu_register(){
    echo str_replace(['menu-item-has-children'], ['dropdown'], wp_nav_menu( array( 
        'echo'           => false,
        'theme_location' => 'main_menu', 
        'menu_id' => 'mobile-menu-active', 
        'container'=>false,
        'fallback_cb'    => 'Radios_Bootstrap_Navwalker::fallback',
    )) );	
}

/**
 * radios Header
 */

function radios_header_option(){
    if('header-style-one' === radios_site_header()){
        get_template_part('template-parts/header/header', 'one');
    }elseif('header-style-two' === radios_site_header()){
        get_template_part('template-parts/header/header', 'two');
    }elseif('header-style-three' === radios_site_header()){
        get_template_part('template-parts/header/header', 'three');
    }else{
        get_template_part('template-parts/header/header', 'two');
    }
}
/**
 * Footer function
 *
 * @return void
 */
function radios_footer_option(){
    if('footer-style-one' === radios_site_footer()){
        get_template_part('template-parts/footer/footer', 'one');
    }elseif('footer-style-two' === radios_site_footer()){
        get_template_part('template-parts/footer/footer', 'two');
    }elseif('footer-style-three' === radios_site_footer()){
        get_template_part('template-parts/footer/footer', 'three');
    }else{
        get_template_part('template-parts/footer/footer', 'one');
    }
    
}

/**
 * Social Icon
 *
 * @return  [type]  [return description]
 */
function radios_top_bar_social(){ 
    $top_bar_social = cs_get_option('top_bar_social'); 
    if(!empty($top_bar_social)){
?>
	<?php foreach($top_bar_social as $item):?>
	<a href="<?php echo esc_url($item['social_link']);?>"><i class="<?php echo esc_attr($item['icon']);?>"></i></a>
	<?php endforeach;?>
<?php 
    }
}

function radios_top_bar_two_social(){ 
    $top_bar_social = cs_get_option('top_bar_social'); 
    if(!empty($top_bar_social)){
?>
    <ul class="header-top_socials">
        <?php foreach($top_bar_social as $item):?>
            <li><a href="<?php echo esc_url($item['social_link']);?>" class="<?php echo esc_attr($item['icon']);?>"></a></li>        
        <?php endforeach;?>
    </ul>
<?php 
    }
}

 /**
  * Single Post Loop
  *
  * @return void
  */
 function radios_single_post_loop(){
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		radios_single_post_pagination();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
 }

/**
 * Radios Blog Breadcrumb
 */
function radios_get_breadcrumb(){ ?>
	<section id="vd-breadcrumb" class="vd-breadcrumb-section">
		<div class="container">
			<div class="vd-breadcrumb-content ul-li">
				<?php 
                if(function_exists('bcn_display')){
                    bcn_display();
                }else{ ?>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'radios' );?></a></li>
                        <li class="active"><?php esc_html_e( 'Blog', 'radios' );?></li>
                    </ul>
                <?php }
                ?>
			</div>
		</div>
	</section>
    <?php 
}
/**
 * Page Breadcrumb function
 *
 * @return void
 */
function radios_page_breadcrumb(){ ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <?php echo radios_the_breadcrumb();?>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <?php 
}


/**
 * radios Post Loop
 *
 * @return void
 */
function radios_post_loop(){
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
            * Include the Post-Type-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
            */
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;?>
        <div class="pagination_wrap pt-50">
            <?php radios_pagination();?>
        </div>
        

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}

function radios_archive_loop(){
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_type() );

        endwhile;?>

        <div class="pagination_wrap pt-50">
            <?php radios_pagination();?>
        </div>

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}

/**
 * Undocumented function
 *
 * @return void
 */
function radios_search_loop(){
     if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'search' );

        endwhile;?>

        <div class="pagination_wrap pt-50">
            <?php radios_pagination();?>
        </div>

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}


/**
 * 404 Error
 *
 * @return void
 */
function radios_error_page(){ 
    $error_code = cs_get_option('error_code');    
    $error_title = cs_get_option('error_title');    
    $error_info_title = cs_get_option('error_info_title');  
    $error_button = cs_get_option('error_button');  
    ?>
    <!-- error page start -->
	<section class="error__page pb-90">
		<div class="container">
			<div class="error__text text-center">
				<h1>
                    <?php 
                        if(!empty($error_code)){
                            echo esc_html($error_code);
                        }else{
                            esc_html_e( '404', 'radios' );
                        }
                    ?>
                </h1>
				<h3>
                    <?php 
                        if(!empty($error_title)){
                            echo esc_html($error_title);
                        }else{
                            esc_html_e( 'Oops... It looks like you ‘re lost !', 'radios' );
                        }
                    ?>
                </h3>
				<p>
                    <?php 
                        if(!empty($error_info_title)){
                            echo esc_html($error_info_title);
                        }else{
                            esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'radios' );
                        }
                    ?>
                </p>
				<div class="go-back-btn mt-50">
					<a class="thm-btn thm-btn__2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <span class="btn-wrap">
                        <span>
                            <?php 
                                if(!empty($error_button)){
                                    echo esc_html($error_button);
                                }else{
                                    esc_html_e( 'Go Back Home', 'radios' );
                                }
                            ?> 
                        </span>
                        <span>
                            <?php 
                                if(!empty($error_button)){
                                    echo esc_html($error_button);
                                }else{
                                    esc_html_e( 'Go Back Home', 'radios' );
                                }
                            ?> 
                        </span>
                    </span>                    
                    <i class="far fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- error page end -->
    <?php 
}

function raidos_category_menu(){ 
    wp_nav_menu( array( 
        'theme_location' => 'cate-menu', 
        'menu_class' => 'category ul_li', 
        'container'=>false,
        'fallback_cb'    => 'Radios_Bootstrap_Navwalker::fallback',
    ));	
}
function raidos_category_menu_two(){ 
    wp_nav_menu( array( 
        'theme_location' => 'cate-menu2', 
        'menu_class' => 'category-nav__list list-unstyled', 
        'container'=>false,
        'fallback_cb'    => 'Radios_Bootstrap_Navwalker::fallback',
    ));	
}

/**
 * radios Mobile Menu
 *
 * @return void
 */
function radios_mobile_menu(){ ?>
    <aside class="slide-bar">
        <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
    </div>
    <nav class="side-mobile-menu">
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if (class_exists('WooCommerce')): ?>
                    <input type="hidden" value="product" name="post_type">
                <?php endif;?>
                <input type="text"  name="search" placeholder="<?php esc_attr_e( 'Search Keywords', 'radios' );?>" value="<?php the_search_query();?>">
                <button><i class="far fa-search"></i></button>
            </form>
        </div>
        <?php radios_mobile_menu_register();?>
    </nav>
</aside>
<?php 
}


/**
 * radios Languages Name
 *
 * @return void
 */
function radios_languages_name(){ 
    $active_languages = cs_get_option('active_languages');
    $active_languages_link = cs_get_option('active_languages_link');
    $vaindo_languages = cs_get_option('vaindo_languages');
    if(!empty($vaindo_languages)):
?>
    <ul>
        <li><a href="<?php echo esc_url($active_languages_link);?>" class="lang-btn"><?php echo esc_html($active_languages);?> <i class="far fa-chevron-down"></i></a>
            <ul class="lang_sub_list">
                <?php foreach($vaindo_languages as $lang):?>
                <li><a href="<?php echo esc_url($lang['link']);?>"><?php echo esc_html($lang['language_name']);?></a></li>
                <?php endforeach;?>
            </ul>
        </li>
    </ul>
<?php 
endif;
}
/**
 * radios Languages Name
 *
 * @return void
 */
function radios_languages_two_name(){ 
    $active_languages = cs_get_option('active_languages');
    $active_languages_link = cs_get_option('active_languages_link');
    $vaindo_languages = cs_get_option('vaindo_languages');
    if(!empty($vaindo_languages)):
?>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
        <?php foreach($vaindo_languages as $lang):?>
            <li><a href="<?php echo esc_url($lang['link']);?>"><?php echo esc_html($lang['language_name']);?></a></li>
        <?php endforeach;?>
    </ul>
<?php 
endif;
}

/***
 * 
 */

/**
 * radios Languages Name
 *
 * @return void
 */
function radios_currency_name(){ 
    $active_currency = cs_get_option('active_currency');
    $active_currency_link = cs_get_option('active_currency_link');
    $vaindo_currencys = cs_get_option('vaindo_currencys');
    if(!empty($vaindo_currencys)):
?>
    <ul>
        <li><a href="<?php echo esc_url($active_currency_link);?>" class="lang-btn"><?php echo esc_html($active_currency);?> <i class="far fa-chevron-down"></i></a>
            <ul class="lang_sub_list">
                <?php foreach($vaindo_currencys as $curr):?>
                    <li><a href="<?php echo esc_url($curr['link']);?>"><?php echo esc_html($curr['currency_name']);?></a></li>
                <?php endforeach;?>
            </ul>
        </li>
    </ul>
<?php 
endif;
}


function radios_footer_newsletter(){ 
    $newsl_title = cs_get_option('newsl_title');     
    $newsl_text = cs_get_option('newsl_text');     
    $newsl_shortcode = cs_get_option('newsl_shortcode');     
    $newsletter_enable = cs_get_option('newsletter_enable');    

    $newsletter_cls = '';
    if(radios_site_footer() == 'footer-style-two'){
        $newsletter_cls = 'bg-primary-3 text-white';
    }
    if($newsletter_enable == true): 
?>
<div class="newslater newslater__border pt-30 pb-30">
    <div class="container">
        <div class="newslater__two ul_li">
            <div class="newslater__content">
                <?php if(!empty($newsl_title)):?>
                    <h2 class="title"><?php echo wp_kses($newsl_title, true)?></h2>
                <?php endif;?>
                <?php if(!empty($newsl_text)):?>
                    <p><?php echo wp_kses($newsl_text, true)?></p>
                <?php endif;?>
            </div>
            <div class="newslater__form">
                <?php if(!empty($newsl_shortcode)):?>
                    <?php echo do_shortcode($newsl_shortcode);?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php 
    endif;
}