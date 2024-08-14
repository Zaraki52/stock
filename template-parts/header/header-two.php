<?php 
    $call_us = cs_get_option('call_us'); 
    $call_us_phone = cs_get_option('call_us_phone'); 
    $top_wislist_link = cs_get_option('top_wislist_link');
    $top_checkout_link = cs_get_option('top_checkout_link');
    $email_address = cs_get_option('email_address');
    $store_location = cs_get_option('store_location'); 
    $track_order = cs_get_option('track_order'); 
    $track_link = cs_get_option('track_order_link'); 
    $add_img = cs_get_option('add_img'); 
    $add_img_link = cs_get_option('add_img_link'); 
    $topbar_enable = cs_get_option('topbar_enable'); 
    $header_cetogory_enable = cs_get_option('header_cetogory_enable'); 
    $vaindo_languages = cs_get_option('vaindo_languages');
?>
<!-- header start -->
<header class="header header__style-two">
    <?php if($topbar_enable == true):?>
    <div class="header__top-wrap">
        <div class="container mxw_1530">
            <div class="header__top-info ul_li_between mt-none-10">
                <ul class="header__top-left ul_li mt-10">
                    <?php if(!empty($store_location)):?>
						<li><a href="<?php if(!empty($store_link)){echo esc_url($store_link);}?>"><i class="far fa-map-marker-alt"></i><?php echo wp_kses( $store_location, true );?></a></li>
					<?php endif;?>

                    <?php if(!empty($call_us)):?>
                    <li><a href="tel:<?php if(!empty($call_us_phone)){echo esc_url($call_us_phone);}?>"></a>    <?php echo wp_kses($call_us, true)?></li>
                    <?php endif;?>
                    <?php if(!empty($email_address)):?>
                        <li><i class="fas fa-envelope"></i> <?php echo esc_html($email_address);?></li>
                    <?php endif;?>
                </ul>
                <ul class="header__top-right ul_li mt-10">
                    <?php if(!empty($track_order)):?>
						<li><a href="<?php if(!empty($track_link)){echo esc_url($track_link);}?>"><i class="far fa-truck"></i> <?php echo wp_kses( $track_order, true );?></a></li>
					<?php endif;?>
                    <?php if(!empty($top_wislist_link['text'])):?>
                        <li><a href="<?php echo esc_url($top_wislist_link['url']);?>"><?php echo esc_html($top_wislist_link['text']);?></a></li>
                    <?php endif;?>
                    <?php if(!empty($top_checkout_link['text'])):?>
                        <li><a href="<?php echo esc_url($top_checkout_link['url']);?>"><?php echo esc_html($top_checkout_link['text']);?></a></li>
                    <?php endif;?>
                    <li>
                        <div class="header__language currency">
                            <?php radios_currency_name();?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="container mxw_1530">
        <div class="header__middle ul_li_between">
            <div class="header__logo">
                <?php radios_logo();?>
            </div>
            <div class="header-date">
                <i class="far fa-calendar-alt"></i> <?php echo date(get_option('date_format')); ?>
            </div>
            <?php if(!empty($add_img['url'])):?>
            <div class="add">
                <a href="<?php if(!empty($add_img_link)){echo esc_url($add_img_link);}?>">
                    <img src="<?php echo esc_url($add_img['url']);?>" alt="<?php echo esc_attr($add_img['alt']);?>">
                </a>
            </div>
            <?php endif;?>
            <div class="d-none d-lg-block">
                <div class="ul_li">
                    <?php if(!empty($vaindo_languages)):?>
                        <div class="header__language style-2 mr-25">
                            <?php radios_languages_name();?>
                        </div>
                    <?php endif;?>
                    <div class="header__social">
                        <?php radios_top_bar_social();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
        <div class="container mxw_1530">
            <div class="header__main ul_li" >
                <div class="header__logo">
                    <?php radios_logo();?>
                </div>
                <?php if($header_cetogory_enable == true):?>
                <div class="header__category pos-rel">
                    <div class="vertical-menu">
                        <button class="header__category-nav">
                            <img class="bar" src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/bar.svg" alt="">
                            <?php esc_html_e('Browse Catetory', 'radios');?>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="vertical-menu-list category-nav">
                            <?php raidos_category_menu_two();?>
                        </div>
                        
                    </div>
                    
                </div>
                <?php endif;?>
                <div class="hamburger_menu d-lg-none">
                    <a href="javascript:void(0);" class="active">
                        <div class="icon bar">
                            <span><i class="fal fa-bars"></i></span>
                        </div>
                    </a>
                </div>
                <div class="main-menu navbar navbar-expand-lg">
                    <nav class="main-menu__nav collapse navbar-collapse">
                        <?php radios_menu_register();?>
                    </nav>
                </div>
                <div class="header__main-right ul_li">                    
                    <form class="header__search mr-30" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php if (class_exists('WooCommerce')): ?>
                         <input type="hidden" value="product" name="post_type">
                        <?php endif;?>
                        <input type="text"  name="search" placeholder="<?php esc_attr_e( 'Search........', 'radios' );?>" value="<?php the_search_query();?>">
                        <button><i class="far fa-search"></i></button>
                    </form>
                    <div class="header__icons ul_li mr-15">
                    <?php if ( class_exists('WooCommerce') ) {?>
                        <div class="icon">
                            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/user.svg" alt="<?php esc_attr_e( 'User', 'radios' );?>"></a>
                        </div>
                        <?php } ?>
                        <div class="icon wishlist-icon">
                            <?php echo yith_wcwl_get_items_count();?>
                        </div>
                        <?php 
                        if ( class_exists('WooCommerce') ) { ?>
                            <div class="icon">
                                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) );?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/shopping_bag.svg" alt="">
                                    <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                                    <span class="count" id="mini-cart-count"><?php echo esc_html($items_count) ? $items_count : '0'; ?></span>
                                </a> 
                            </div>
                        <?php }?>
                    </div>
                    <div class="login-sign-btn">
                        <a class="thm-btn thm-btn__2 text-black" href="<?php if(class_exists('WooCommerce')): echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); endif;?>">
                            <span class="btn-wrap">
                            <?php if(is_user_logged_in()){ 
                                $current_user = wp_get_current_user();
                            ?>
                                <span><?php echo esc_html($current_user->user_login); ?></span>
                                <span><?php echo esc_html($current_user->user_login); ?></span>
                                <?php } else { ?>
                                    <span><?php esc_html_e("login / Sign Up", 'radios')?></span>
                                    <span><?php esc_html_e("login / Sign Up", 'radios')?></span>
                                <?php } ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<div class="body-overlay"></div>
<?php radios_mobile_menu();?>