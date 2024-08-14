<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Radios
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tx-post-item tx-post format-standard mb-50'); ?>>
	<div class="post-thumb">
		<a href="<?php the_permalink();?>">
			<?php 
				if(has_post_thumbnail()){
					the_post_thumbnail('radios-image-size1');
				}        
			?>
        </a>
		<div class="post-date">
			<?php echo wp_kses( get_the_date('d'), true ); ?>
			<br> <span><?php echo wp_kses( get_the_date('M'), true ); ?></span>
		</div>
	</div>
	<div class="post-content mt-25">
		<?php if(function_exists('radios_entry_footer')):?>
		<ul class="post-tags post-tags--2 ul_li mb-15">        
			<?php radios_entry_footer();?>
		</ul>  
		<?php endif;?>  
		<h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		<ul class="post-meta post-meta--4 style-2 ul_li mt-10">
			<li>
				<div class="post-meta__author ul_li">
					<div class="avatar">
						<?php radios_main_author_avatars(22);?>
					</div>                
					<span><?php the_author()?> 
					<?php 
					if(function_exists('radios_ready_time_ago')){ ?>
						/ <span class="year"><?php echo radios_ready_time_ago();?></span>
					<?php }
					?>                
					</span>
				</div>
			</li>
			<li><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
			<li><i class="far fa-clock"></i><?php echo radios_reading_time();?></li>
		</ul>
		<?php the_excerpt();?>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
