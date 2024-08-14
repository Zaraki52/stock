<?php 
	$footer_bg_img = cs_get_option('footer_bg_img'); 
	$shortabout = cs_get_option('shortabout'); 
	$footer_apps = cs_get_option('footer_apps'); 
	$add_payment_supprt = cs_get_option('add_payment_supprt'); 
	$radios_copywrite_text = cs_get_option('radios_copywrite_text'); 
	$footer_social = cs_get_option('footer_social'); 
	$footer_contact_info = cs_get_option('footer_contact_info'); 
?>
<!-- footer start -->
<footer class="footer footer-three">
	<?php radios_footer_newsletter();?>
	<div class="container">
		<?php if(is_active_sidebar('radios-footer-1') && is_active_sidebar('radios-footer-2') && is_active_sidebar('radios-footer-3')):?>
		<div class="footer__main pt-90 pb-90">
			<div class="row mt-none-40">
				<div class="footer__widget col-lg-3 col-md-6 mt-40">
					<div class="footer__logo mb-20">
						<?php radios_logo_v2();?>
					</div>
					<?php if(!empty($shortabout)):?>
						<p><?php echo wp_kses($shortabout, true);?></p>
					<?php endif;?>
					<?php if(!empty($footer_contact_info)):?>
					<ul class="footer__info mt-30">
						<?php foreach($footer_contact_info as $info):?>
							<li><i class="<?php echo esc_attr($info['icon']);?>"></i><?php echo wp_kses($info['contact_title'], true)?></li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
					<?php if(!empty($footer_apps)):?>
					<div class="apps-img mt-15 ul_li">
						<?php foreach($footer_apps as $app):?>
							<div class="app mt-15">
								<a href="<?php echo esc_url($app['app_link']);?>"><img src="<?php echo esc_url($app['app_logo_img']['url'])?>" alt="<?php echo esc_attr($app['app_logo_img']['alt'])?>"></a>
							</div>
						<?php endforeach;?>
					</div>
					<?php endif;?>
				</div>
				<?php if(is_active_sidebar('radios-footer-1')):?>
					<div class="footer__widget col-lg-3 col-md-6 mt-40">
						<?php dynamic_sidebar('radios-footer-1');?>
					</div>
				<?php endif;?>
				
				<?php if(is_active_sidebar('radios-footer-2')):?>
					<div class="footer__widget col-lg-3 col-md-6 mt-40">
						<?php dynamic_sidebar('radios-footer-2');?>
					</div>
				<?php endif;?>

				<?php if(is_active_sidebar('radios-footer-3')):?>
					<div class="footer__widget col-lg-3 col-md-6 mt-40">
						<?php dynamic_sidebar('radios-footer-3');?>
					</div>
				<?php endif;?>
			</div>
		</div>
		<?php endif;?>		
	</div>
    <div class="footer__bottom-wrap">
        <div class="container">
            <div class="footer__bottom ul_li_center">
                <div class="footer__copyright mt-15">
                    <?php 
                        if(!empty($radios_copywrite_text)){
                            echo wp_kses( $radios_copywrite_text, true );
                        }else{
                            esc_html_e( '&copy; 2022 radios - Ecommerce Technology. All Rights Reserved.', 'radios' );
                        }
                    ?> 
                </div>
                
                <?php if(!empty($footer_social)):?>
                    <div class="footer__social mt-15">
                        <?php foreach($footer_social as $social):?>
                            <a href="<?php echo esc_url($social['link']);?>"><i class="<?php echo esc_attr($social['icon']);?>"></i></a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                <?php if(!empty($add_payment_supprt)):?>
                    <div class="payment_method mt-15">
                        <img src="<?php echo esc_url($add_payment_supprt['url']);?>" alt="<?php echo esc_attr($add_payment_supprt['alt']);?>">
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->