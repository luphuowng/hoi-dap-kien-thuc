<?php
    /**
     * The template for displaying question pages
     *
     * @package QAEngine
     * @since QnA Engine 1.0
     */
    global $wp_query, $wp_rewrite;
    get_header();
?>
    <?php get_sidebar( 'left' ); ?>
    <div itemtype="http://schema.org/ItemList" class="col-md-8 main-content">
        <?php do_action( 'qa_top_questions_listing' ); ?>
        <div class="clearfix"></div>
        <div class="row select-category">
            <div class="col-md-6 col-xs-6 current-category">
                <?php
                    global $wp_query;
                    $term = $wp_query->get_queried_object();
                    $category = $term->name;
                    $category_name = sprintf(__("Question Cagtegory: %s", ET_DOMAIN), $category);
                ?>
                <span itemprop="name"><?php echo $category_name; ?></span>
            </div>
            <div class="col-md-6 col-xs-6">
                <?php qa_tax_dropdown() ?>
            </div>
        </div><!-- END SELECT-CATEGORY -->
        <?php qa_template_filter_questions() ?>
        <div class="main-questions-list">
            <ul id="main_questions_list">
                <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            get_template_part( 'template/question', 'loop' );
                        }
                    }
                    wp_reset_query();
                ?>
            </ul>
        </div><!-- END MAIN-QUESTIONS-LIST -->
        <div class="row paginations home">
            <div class="col-md-12">
                <?php
                    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                    echo paginate_links( array(
                        'base'      => str_replace('99999', '%#%', esc_url(get_pagenum_link( 99999 ))),
                        'format'    => $wp_rewrite->using_permalinks() ? 'page/%#%' : '?paged=%#%',
                        'current'   => max(1, $paged),
                        'total'     => $wp_query->max_num_pages,
                        'mid_size'  => 1,
                        'prev_text' => '<',
                        'next_text' => '>',
                        'type'      => 'list'
                    ) );
                ?>
            </div>
        </div><!-- END MAIN-PAGINATIONS -->
    </div>
    <?php get_sidebar( 'right' ); ?>
<?php get_footer() ?>