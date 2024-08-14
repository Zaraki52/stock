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
$email_h_address = cs_get_option('email_h_address');
$phone_h_address = cs_get_option('phone_h_address');
?>
<header class="main-header">

    <?php if($topbar_enable == true):?>
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box d-flex align-items-center">
                    <div class="header-top_date"><?php echo date(get_option('date_format')); ?></div>
                    <!-- Social Box -->
                    <?php radios_top_bar_two_social();?>
                </div>
                <div class="right-box">
                    <div class="language dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false"><span class="flag"></span>Eng &nbsp;<span class="fa fa-angle-down"></span></button>
                        <?php radios_languages_two_name();?>
                    </div>
                    <?php if(!empty($track_order)):?>
                        <a href="<?php if(!empty($track_link)){echo esc_url($track_link);}?>" class="header-order_track"><?php echo wp_kses( $track_order, true );?></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- header Top -->
    <?php endif;?>
    
    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
                
                <!-- Logo -->
                <div class="logo"><?php radios_logo();?></div>
                
                <!-- Search Box -->
                <div class="search-box">
                    <form method="post" action="<?php echo esc_url(home_url('/'));?>">
                        <div class="form-group">
                            <input type="hidden" value="product" name="post_type">
                            <input type="text"  name="s" value="<?php echo get_search_query();?>" placeholder="<?php esc_attr_e('Search For Product', 'radios');?>" required>
                            <button type="submit"><span class="icon fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
                
                <!-- Options Box -->
                <?php if(!empty($email_h_address) || !empty($phone_h_address)):?>
                <div class="options-box">
                    <div class="header-phone_box">
                        <div class="header-phone_box-inner">
                            <span class="header-phone_icon fa-solid fa-phone fa-fw"></span>
                            <?php echo wp_kses($email_h_address, true);?>
                            <?php echo wp_kses($phone_h_address, true);?>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
            
        </div>
    </div>
    <!-- End Header Upper -->

    <!-- Header Lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="inner-container d-flex justify-content-between align-items-center">
                <div class="nav-outer clearfix">
                    <!-- Mobile Navigation Toggler -->
                    
                    <div class="header__cat ul_li" >
                        <div class="hamburger_menu">
                            <a href="javascript:void(0);" class="active">
                                <div class="icon bar">
                                    <span><i class="fal fa-bars"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Main Menu -->
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <?php radios_menu_two_register();?>
                        </div>
                        
                    </nav>
                    <!-- Main Menu End-->
                    
                </div>
                
                <!-- Outer Box -->
                <?php if ( class_exists('WooCommerce') ) {?>
                <div class="outer-box d-flex align-items-center justify-content-between">
                    
                    <!-- Header Options List -->
                    <ul class="header-options_list">
                        <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );?>" class="fa-solid fa-user fa-fw"></a></li>
                        <li><?php echo yith_wcwl_get_items_count();?></li>
                        <li>
                            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) );?>">
                                <i class="fa-solid fa-cart-plus fa-fw"></i>
                                <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                                <span class="count" id="mini-cart-count"><?php echo esc_html($items_count) ? $items_count : '0'; ?></span>
                            </a>
                        </li>
                    </ul>

                </div>
                <?php }?>
                <!-- End Outer Box -->
                
            </div>
            
        </div>
    </div>
    <!-- End Header Lower -->

</header>
<div class="body-overlay"></div>
<?php radios_mobile_menu();?>