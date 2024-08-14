<div class="blog-post-wrap mt-50">
    <article id="post-<?php the_ID(); ?>"  <?php post_class('post-details'); ?>>
        <?php if(has_post_thumbnail()){ ?>
            <figure class="post-thumb mb-30">
                <?php 
                    the_post_thumbnail('radios-image-size4');       
                ?>
            </figure>
        <?php } ?>
        <?php if(function_exists('radios_entry_footer')):?>
        <ul class="post-tags ul_li mb-20">            
            <?php radios_entry_footer();?>
        </ul>
        <?php endif;?>
        <h2><?php the_title();?></h2>
        <ul class="post-meta meta-bottom-border ul_li mt-25">
            <li>
                <div class="post-meta__author ul_li">
                    <div class="avatar">
                        <?php radios_main_author_avatars(22);?>
                    </div>
                    <span><?php the_author()?><?php 
                            if(function_exists('radios_ready_time_ago')){ ?>
                                / <span class="year"><?php echo radios_ready_time_ago();?></span>
                            <?php }
                            ?> </span>
                </div>
            </li>
            <li><i class="far fa-comment"></i><?php echo esc_html(get_comments_number());?></li>
            <li><i class="far fa-clock"></i><?php echo radios_reading_time();?></li>
        </ul>
        <div class="entry-content">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'radios' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'radios' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->
    </article>
    <div class="post-footer">
        <div class="post-tags-share mb-55">
            <?php if(function_exists('radios_entry_footer_two')):?>
            <div class="tags ul_li mt-30">
                <h5 class="title"><?php esc_html_e('Tags:', 'radios' );?></h5>
                <ul class="list-unstyled ul_li">
                    <?php radios_entry_footer_two();?>
                </ul>
            </div>
            <?php endif;?>
            <?php if(function_exists('radios_post_share')):?>
            <div class="social-share ul_li mt-30">
                <?php radios_post_share()?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>