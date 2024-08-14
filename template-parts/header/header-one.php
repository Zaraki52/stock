<?php
	$store_location = cs_get_option('store_location'); 
	$store_link = cs_get_option('store_location_link'); 
	$track_order = cs_get_option('track_order'); 
	$track_link = cs_get_option('track_order_link'); 
	$call_us = cs_get_option('call_us'); 
	$call_us_phone = cs_get_option('call_us_phone'); 
	$welcome_text = cs_get_option('welcome_text'); 
	$topbar_enable = cs_get_option('topbar_enable'); 
?>

<!-- header start -->
<header class="header header__style-one">
	<?php if($topbar_enable == true):?>
	<div class="header__top-info-wrap d-none d-lg-block">
		<div class="container">
			<div class="header__top-info ul_li_between mt-none-10">
				<ul class="ul_li mt-10">

					<?php if(!empty($store_location)):?>
						<li><a href="<?php if(!empty($store_link)){echo esc_url($store_link);}?>"><i class="far fa-map-marker-alt"></i><?php echo wp_kses( $store_location, true );?></a></li>
					<?php endif;?>

					<?php if(!empty($track_order)):?>
						<li><a href="<?php if(!empty($track_link)){echo esc_url($track_link);}?>"><i class="far fa-truck"></i> <?php echo wp_kses( $track_order, true );?></a></li>
					<?php endif;?>

					<?php if(!empty($call_us)):?>
						<li><a href="tel:<?php if(!empty($call_us_phone)){echo esc_url($call_us_phone);}?>"> <i class="fas fa-phone"></i><?php echo wp_kses( $call_us, true );?> </a></li>
					<?php endif;?>

					<?php if(!empty($welcome_text)):?>
						<li><i class="fas fa-heart"></i><?php echo wp_kses( $welcome_text, true );?></li>
					<?php endif;?>
					
				</ul>
				<div class="header__top-right ul_li mt-10">
					<div class="date">
						<i class="fal fa-calendar-alt"></i> <?php echo date(get_option('date_format')); ?>
					</div>
					<div class="header__social ml-25">
						<?php radios_top_bar_social();?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<div class="container">
		<div class="header__middle ul_li_between justify-content-xs-center">
			<div class="header__logo">
				<?php radios_logo();?>
			</div>
			<?php radios_product_search();?>
			
			<div class="header__lang ul_li">
				<div class="header__language mr-15">
					<?php radios_currency_name();?>
				</div>
				<div class="header__language">
					<?php radios_languages_name();?>
				</div>
			</div>
			<div class="header__icons ul_li">
				<div class="icon">
					<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/user.svg" alt="<?php esc_attr_e( 'User', 'radios' );?>"></a>
				</div>
				<div class="icon wishlist-icon">
					<?php echo yith_wcwl_get_items_count();?>
				</div>				
				<?php 
                if ( class_exists('WooCommerce') ) { ?>
                <div class="icon">
                    <div class="icon shopping-bag">
                        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) );?>">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/shopping_bag.svg" alt="">
                            <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                            <span class="count" id="mini-cart-count"><?php echo esc_html($items_count) ? $items_count : '0'; ?></span>
                        </a>                        
                    </div>
                </div>
                <?php }?>
			</div>
		</div>
	</div>
	<div class="header__cat-wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
		<div class="container">
			<div class="header__wrap ul_li_between">
				<div class="header__cat ul_li" >
					<div class="hamburger_menu">
						<a href="javascript:void(0);" class="active">
							<div class="icon bar">
								<span><i class="fal fa-bars"></i></span>
							</div>
						</a>
					</div>
					<?php raidos_category_menu();?>
				</div>
				<div class="login-sign-btn">
					<a class="thm-btn " href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );?>">
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
</header>
<!-- header end -->
<div class="body-overlay"></div>
<?php radios_mobile_menu();?>