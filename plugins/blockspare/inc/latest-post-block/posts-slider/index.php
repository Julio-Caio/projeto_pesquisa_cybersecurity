<?php
    
    if(!function_exists('blockspare_slider_render_block_core_latest_posts_list')){
    function blockspare_slider_render_block_core_latest_posts_list($attributes)
    {
        
        ob_start();
        $unq_class = mt_rand(100000,999999);
        $blockuniqueclass = '';
        
        if(!empty($attributes['uniqueClass'])){
            $blockuniqueclass = $attributes['uniqueClass'];
        }else{
            $blockuniqueclass = 'blockspare-posts-block-list-'.$unq_class;
        }
        
        
        
        if ( isset( $attributes['categories'] ) && ! empty( $attributes['categories'] ) && is_array( $attributes['categories'] ) ) {
            $categories = array();
            $i = 1;
            foreach ( $attributes['categories'] as $key => $value ) {
                $categories[] = $value['value'];
            }
        } else {
            $categories = array();
        }
    
        if ( isset( $attributes['tags'] ) && ! empty( $attributes['tags'] ) && is_array( $attributes['tags'] ) ) {
            $tags = array();
            $i = 1;
            foreach ( $attributes['tags'] as $key => $value ) {
                $tags[] = $value['value'];
            }
        } else {
            $tags = array();
        }
        
        /* Setup the query */
    
        $query_args = array(
            'posts_per_page' => $attributes['postsToShow'],
            'post_status' => 'publish',
            'order' => $attributes['order'],
            'orderby' => $attributes['orderBy'],
            'offset' => $attributes['offset'],
            'post_type' => $attributes['postType'],
            'ignore_sticky_posts' => 1,
        );
    
        if($attributes['taxType'] =='category'){
            $query_args['category__in']  =$categories;
            
        }
        if($attributes['taxType'] =='post_tag'){
            $query_args['tag__in']  =$tags;
            
        }
       
       
        if($attributes['taxType'] !='category' && $attributes['taxType'] != 'post_tag'){
                   
            $tax_type = $attributes['taxType'];
            if ( $tax_type ) {
                $query_args['tax_query'][] = array(
                    'taxonomy' => ( isset( $tax_type ) ) ? $tax_type : 'category',
                    'field'    => 'id',
                    'terms'    => $categories,
                    'operator' =>  'IN' ,
                );
            }
        }

        $grid_query = new WP_Query($query_args);
    
        $next = $attributes['carouselNextIcon'];
        $prevstr = str_replace("-right", "-left",$attributes['carouselNextIcon']);
    
        $centermode =  false;

        
          
        
        $responsivelayoutTab = 1;
        $responsivelayoutMobile = 1;
    
        
        
            if($attributes['numberofSlide']>3){
                $responsivelayoutTab = 2;
                $responsivelayoutMobile =1;
            }else{
                $responsivelayoutTab = $attributes['numberofSlide'];
            }
    
        
        $carousel_args = array(
    
            'dots'=>$attributes['showDots'],
            'loop'=>true,
            'autoplay'=> $attributes['enableAutoPlay'],
            'speed'=>$attributes['carouselSpeed'],
            'arrows'=>$attributes['showsliderNextPrev'],
            'slidesToShow'=> 1,
            'centerMode'=>$centermode,
            'responsive' => array(
                array(
                    'breakpoint' => 900,
                    'settings' => array(
                        'slidesToShow' => $responsivelayoutTab,
                        'slidesToScroll' => 1,
                        'infinite' => true,
                        'centerMode'=>false,
                    ),
                ),
                array(
                    'breakpoint' => 600,
                    'settings' => array(
                        'slidesToShow' => $responsivelayoutTab,
                        'slidesToScroll' => 1,
                        'centerMode'=>false,
                    ),
                ),
                array(
                    'breakpoint' => 480,
                    'settings' => array(
                        'slidesToShow' => $responsivelayoutMobile,
                        'slidesToScroll' => 1,
                        'centerMode'=>false,
                    ),
                ),
            ),
        );
        $carousel_args_encoded = wp_json_encode($carousel_args);
        
        
        
        /* Start the loop */
        if ($grid_query->have_posts()) {
            $alignclass = blockspare_checkalignment($attributes['align']);
            
            /* Build the block classes */
            $class = "wp-block-blockspare-posts-block-blockspare-posts-block-latest-posts blockspare-posts-block-post-wrap align".$alignclass;
            
            if (isset($attributes['className'])) {
                $class .= ' ' . $attributes['className'];
            }
             $list_layout_class = $attributes['slider'];
           
    
            $hoverNavClass ='';
            if($attributes['enableNavInHover']){
                $hoverNavClass ='nav-on-hover';
            }

            $animation_class  = '';
            if( $attributes['animation']){
                $animation_class='blockspare-block-animation';
            }
            //$list_layout_class = $attributes['design'];
            $listgridClass = 'blockspare-posts-block-is-carousel' . " blockspare-posts-block-carousel-full " . "column-" . $attributes['columns'].' '.$attributes['navigationSize'].' '.$attributes['navigationShape'].' '.$hoverNavClass;
            
            
            /* Layout orientation class */
            $grid_class = $blockuniqueclass . '  blockspare-posts-block-latest-post-carousel-wrap '.' '  . $listgridClass . ' ' . $list_layout_class. ' has-gutter-space-'.$attributes['gutterSpace']." ".$animation_class." ".$attributes['blockHoverEffect'];
            
            $category_class = 'blockspare-posts-block-post-category';
            
            if($attributes['categoryLayoutOption'] =='none'){
                $category_class .= ' has-no-category-style';
            }
            
            ?>

<section class="<?php echo esc_attr($class);?>">
    <div class="<?php echo esc_attr($grid_class);?>" blockspare-animation=<?php echo esc_attr( $attributes['animation'] )?>>
        <div class="latest-post-carousel" data-slick="<?php echo esc_attr($carousel_args_encoded); ?>"
            data-next="<?php echo esc_attr($next);?>" data-prev="<?php echo esc_attr($prevstr);?>">
            <?php while ($grid_query->have_posts()) {
                        $grid_query->the_post();
                        
                        /* Setup the post ID */
                        $post_id = get_the_ID();
                        
                        /* Setup the featured image ID */
                        $post_thumb_id = get_post_thumbnail_id($post_id);
                        
                        $has_img_class = '';
                        
                        if (!$post_thumb_id) {
                            $has_img_class = "post-has-no-image";
                        }

                        $contentOrderClass ='';
                        if($attributes['contentOrder']=='content-order-1'){
                            $contentOrderClass .= 'contentorderone';
                        }
                        if( $attributes['contentOrder']=='content-order-2'){
                            $contentOrderClass .= 'contentordertwo';
                        }
                        
                        
                        /* Setup the post classes */
                        $post_classes = 'blockspare-posts-block-post-single blockspare-hover-item '.$contentOrderClass." ".$attributes['contentOrder'];
                       
                        if($attributes['enableEqualHeight'] == true){
                            $post_classes .=' bs-has-equal-height';
                        }

                        if($attributes['slider'] == 'blockspare-posts-block-full-layout-6'){
                            $post_classes .=' blockspare-hover-child';
                        }
                        
                        /* Add sticky class */
                        if (is_sticky($post_id)) {
                            $post_classes .= ' sticky';
                        } else {
                            $post_classes .= null;
                        }
                        
                        
                        
                        if ($attributes['enableBackgroundColor']) {
                            $post_classes .= ' has-background';
                        }
                      
                        ?>

            <div id="<?php echo esc_attr($post_id);?>"
                class="<?php echo esc_attr($post_classes).' '.$has_img_class; ?>">
                <?php
                   
                         if (!empty($attributes['imageSize'])) {
                            $post_thumb_size = $attributes['imageSize'];
                        }
                                    
                    ?>
                                <figure class="blockspare-posts-block-post-img">
                                    <a href="<?php echo esc_url(get_permalink($post_id));?>" rel="bookmark" aria-hidden="true"
                                        tabindex="-1">
                                        <?php
                                            if(has_post_thumbnail($post_id)){
                                            echo wp_kses_post(wp_get_attachment_image($post_thumb_id,$post_thumb_size));
                                            }else{?>
                                                    <div class="bs-no-thumbnail-img"> </div>
                                        <?php  } ?>
                                    </a>
                                    <?php 
                                    if ($attributes['displayPostCategory'] ) {?>
                                    <div class="<?php echo esc_attr($category_class);?>">
                                    <?php  
                                            if($attributes['postType']=='post'){
                                                    $categories_list = get_the_category_list(' ', '', $post_id);
                                                        if ( $categories_list ) {
                                                                        /* translators: 1: list of categories. */
                                                                printf(  esc_html__( '%1$s', 'blockspare' ), $categories_list ); // WPCS: XSS OK.
                                                            }
                                            }
                                            if($attributes['postType']!='post'){
                                                    $terms = get_the_terms($post_id , $attributes['taxType'] );
                                                        if($terms){
                                                                foreach($terms  as $trem){?>
                                                                            <a herf= ><?php echo $trem->name; ?></a> 
                                                                        <?php }
                                                                    }
                                            }?>
                                    </div>

                                    <?php }?>
                                </figure>
                
                <div
                    class="blockspare-posts-block-post-content hover-child <?php echo esc_attr($attributes['contentOrder']); ?> <?php echo esc_attr($attributes['titleOnHover'])?>">
                    <div class="blockspare-posts-block-bg-overlay"></div>
                    <header class="blockspare-posts-block-post-grid-header">
                        <?php
                         if ($attributes['displayPostCategory']) {  ?>
                        <div class="<?php echo esc_attr($category_class);?>">
                                <?php  
                                    if($attributes['postType']=='post'){
                                            $categories_list = get_the_category_list(' ', '', $post_id);
                                                if ( $categories_list ) {
                                                                /* translators: 1: list of categories. */
                                                        printf(  esc_html__( '%1$s', 'blockspare' ), $categories_list ); // WPCS: XSS OK.
                                                    }
                                    }
                                    if($attributes['postType']!='post'){
                                            $terms = get_the_terms($post_id , $attributes['taxType'] );
                                                if($terms){
                                                        foreach($terms  as $trem){?>
                                                                    <a herf= ><?php echo $trem->name; ?></a> 
                                                                <?php }
                                                            }
                                    }?>
                        </div>
                        <?php }
                                $title = get_the_title($post_id);
                                 if (!$title) {
                                            $title = __('Untitled', 'blockspare');
                                 }?>
                        <h4 class="blockspare-posts-block-post-grid-title">
                            <a href="<?php echo esc_url(get_permalink($post_id)); ?>"
                                class="blockspare-posts-block-title-link" rel="bookmark">
                                <span><?php echo esc_html($title); ?></span></a>
                        </h4>

                        <?php
                                        if(isset($attributes['postType']) && ($attributes['postType'] === 'post') && (isset($attributes['displayPostAuthor']) || isset($attributes['displayPostDate']))) {?>
                        <div class="blockspare-posts-block-post-grid-byline">
                            <?php
                                                    if (isset($attributes['displayPostAuthor']) && $attributes['displayPostAuthor']) {?>
                            <div class="blockspare-posts-block-post-grid-author">
                                <a class="blockspare-posts-block-text-link"
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"
                                    itemprop="url" rel="author">
                                    <span itemprop="name"><i
                                            class="<?php echo esc_attr($attributes['authorIcon']);?>"></i><?php echo esc_html(get_the_author_meta('display_name', get_the_author_meta('ID')));?></span>
                                </a>
                            </div>
                            <?php }
                                                    
                                                    if(isset($attributes['displayPostDate']) && $attributes['displayPostDate']) {?>
                            <time datetime="<?php echo esc_attr(get_the_date('c', $post_id));?>"
                                class="blockspare-posts-block-post-grid-date" itemprop="datePublished"><i
                                    class="<?php echo esc_attr($attributes['dateIcon']);?>"></i><?php echo esc_html(get_the_date('', $post_id));?></time>
                            <?php
                                                    }
                                                    if($attributes['enableComment']){?>

                            <span class="comment_count"><i
                                    class='<?php echo esc_attr($attributes['commentIcon']);?>'></i>
                                <?php echo esc_html(get_comments_number($post_id)); ?>
                            </span>
                            <?php }?>
                        </div>

                        <?php }?>

                    </header>

                    <?php
                                   /* Get the excerpt */
                                    
                                   $excerpt = get_post_field(
                                    'post_excerpt',
                                    $post_id,
                                    'display'
                                );
                                
                                if ( empty( $excerpt ) ) {
                                    $excerpt = preg_replace(
                                        array(
                                            '/\<figcaption>.*\<\/figcaption>/',
                                            '/\[caption.*\[\/caption\]/',
                                        ),
                                        '',
                                        get_the_content()
                                    );
                                }
                                
                                        // Trim the excerpt if necessary.
                                    if ( isset( $attributes['excerptLength'] ) ) {
                                        $excerpt = wp_trim_words(
                                            $excerpt,
                                            $attributes['excerptLength']
                                        );
                                    }

                                        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- This is a WP core filter.
                    $excerpt = apply_filters( 'the_excerpt', $excerpt );
                    if ($attributes['displayPostExcerpt'] && $excerpt != null) { ?>
                    <div class="blockspare-posts-block-post-grid-excerpt">
                        <?php if (isset($attributes['displayPostExcerpt']) && $attributes['displayPostExcerpt']) { ?>
                        <div class="blockspare-posts-block-post-grid-excerpt-content"><?php echo wp_kses_post($excerpt); ?>
                        </div>
                        <?php } ?>


                        <?php 
        
                    if (isset($attributes['displayPostLink']) && $attributes['displayPostLink']) { ?>
                        <p>
                            <a class="blockspare-posts-block-post-grid-more-link blockspare-posts-block-text-link"
                                href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="bookmark">
                                <span><?php echo esc_html($attributes['readMoreText']); ?></span></a>
                        </p>

                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>

            </div>
            <?php }?>
        </div>
    </div>
</section>
<?php wp_reset_postdata();
            $data_content =  latest_posts_style_control_slider($blockuniqueclass ,$attributes);
            $data_content .= ob_get_clean();
            return   $data_content;
        }
    }
}
    
    /**
     * Registers the post grid block on server
     */
    if(!function_exists('blockspare_slider_register_block_core_latest_posts_list')){
    function blockspare_slider_register_block_core_latest_posts_list()
    {
    
        if (!function_exists('register_block_type')) {
            return;
        }
    
    
        ob_start();
       include BLOCKSPARE_PLUGIN_DIR . 'inc/latest-post-block/posts-slider/block.json';

        $metadata = json_decode(ob_get_clean(), true);
    
        /* Block attributes */
        register_block_type(
            'blockspare/blockspare-posts-block-slider',
            array(
                'attributes' =>$metadata['attributes'],
                'render_callback' => 'blockspare_slider_render_block_core_latest_posts_list',
            )
        );
    }
    
    add_action('init', 'blockspare_slider_register_block_core_latest_posts_list');
}
    
    
   
    if(!function_exists('latest_posts_style_control_slider')){
    function latest_posts_style_control_slider($blockuniqueclass ,$attributes)
    {
    
    
        $block_content = '';
        $block_content .= '<style type="text/css">';
        
    //Navigation
        $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-is-carousel span:before, .blockspare-posts-block-latest-post-carousel-wrap ul li button{
                    color:' . $attributes['navigationColor'] . ';
            }';
    
        $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-is-carousel .slick-slider .slick-dots > li button{
                background-color:'. $attributes['navigationColor']. '
        }';
        
            if($attributes['navigationShape'] == 'lpc-navigation-1' ||  $attributes['navigationShape'] == 'lpc-navigation-2'){
                $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-is-carousel .slick-slider .slick-arrow:after{
                    background-color:'. $attributes['navigationShapeColor']. '
            }';
            }elseif($attributes['navigationShape'] == 'lpc-navigation-3' ||  $attributes['navigationShape'] == 'lpc-navigation-4'){
                $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-is-carousel .slick-slider .slick-arrow{
                    border-color:'. $attributes['navigationShapeColor']. '
            }';
            }else{
                $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-is-carousel .slick-slider .slick-arrow{
                    border-color:transparent ;
                    background-color:transparent
            }';
            
            }
        
       



        $block_content .= ' .' . $blockuniqueclass . '.blockspare-posts-block-latest-post-carousel-wrap{
            margin-top:' . $attributes['marginTop'] . 'px;
            margin-bottom:' . $attributes['marginBottom'] . 'px;
            margin-left:' . $attributes['marginLeft'] . 'px;
            margin-right:' . $attributes['marginRight'] . 'px;
            }';

    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-content{
            padding-top:' . $attributes['contentPaddingTop'] . 'px;
            padding-right:' . $attributes['contentPaddingRight'] . 'px;
            padding-bottom:' . $attributes['contentPaddingBottom'] . 'px;
            padding-left:' . $attributes['contentPaddingLeft'] . 'px;
            }';


    if($attributes['slider']=='blockspare-posts-block-full-layout-5'){
        $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-single > .blockspare-posts-block-post-grid-excerpt{
            padding-top:' . $attributes['contentPaddingTop'] . 'px;
            padding-right:' . $attributes['contentPaddingRight'] . 'px;
            padding-bottom:' . $attributes['contentPaddingBottom'] . 'px;
            padding-left:' . $attributes['contentPaddingLeft'] . 'px;
            }';
    }

    if($attributes['slider']=='blockspare-posts-block-full-layout-4'){
        //Title Hover
    
        if($attributes['titleOnHover']=='lpc-title-hover') {
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-content .blockspare-posts-block-title-link:hover span{
                color: ' . $attributes['tileTitleOnHoverColor'] . ';
                
                }';
            }

        if($attributes['titleOnHover']=='lpc-title-border') {
            $block_content .= ' .' . $blockuniqueclass . ' .lpc-title-border .blockspare-posts-block-post-grid-title .blockspare-posts-block-title-link span:hover{
                box-shadow: inset 0 -2px 0 0 ' . $attributes['tileTitleOnHoverColor'] . ';
                
                }';
        }

        if ($attributes['categoryLayoutOption'] == 'solid') {
            
            
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['tileCategoryTextColor'] . "!important" . ';
                background-color:' . $attributes['tileCategoryBackgroundColor'] . "!important" . ';
                border-radius:' . $attributes['categoryBorderRadius'] . "px" . ';
            }';
        
        } else if ($attributes['categoryLayoutOption'] == 'border') {

            
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['tileCategoryTextColor'] . "!important" . ';
                background-color:' . "transparent" . ';
                border:' . "1px solid" . $attributes['tileCategoryBorderColor'] . ';
                border-radius:' . $attributes['categoryBorderRadius'] . "px" . ';
                border-width:' . $attributes['categoryBorderWidth'] . "px" . ';
            }';
            
        } else {
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['tileCategoryTextColor'] . "!important" . ';
                }';
        }
    } else {
        //Title Hover
    
        if($attributes['titleOnHover']=='lpc-title-hover') {
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-content .blockspare-posts-block-title-link:hover span{
                color: ' . $attributes['titleOnHoverColor'] . ';
                
                }';
            }

        if($attributes['titleOnHover']=='lpc-title-border') {
            $block_content .= ' .' . $blockuniqueclass . ' .lpc-title-border .blockspare-posts-block-post-grid-title .blockspare-posts-block-title-link span:hover{
                box-shadow: inset 0 -2px 0 0 ' . $attributes['titleOnHoverColor'] . ';
                
                }';
        }

        if ($attributes['categoryLayoutOption'] == 'solid') {
            
            
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['categoryTextColor'] . "!important" . ';
                background-color:' . $attributes['categoryBackgroundColor'] . "!important" . ';
                border-radius:' . $attributes['categoryBorderRadius'] . "px" . ';
            }';
        
        } else if ($attributes['categoryLayoutOption'] == 'border') {

            
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['categoryTextColor'] . "!important" . ';
                background-color:' . "transparent" . ';
                border:' . "1px solid" . $attributes['categoryBorderColor'] . ';
                border-radius:' . $attributes['categoryBorderRadius'] . "px" . ';
                border-width:' . $attributes['categoryBorderWidth'] . "px" . ';
            }';
            
        } else {
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category a{
                color:' . $attributes['categoryTextColor'] . "!important" . ';
                }';
        }
    }


    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-category{
            margin-top:' . $attributes['categoryMarginTop'] . 'px' . ';
            margin-bottom:' . $attributes['categoryMarginBottom'] . 'px' . ';
            margin-left:' . $attributes['categoryMarginLeft'] . 'px' . ';
            margin-right:' . $attributes['categoryMarginRight'] . 'px' . ';
            }';


    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-byline{
            
             margin-top:' . $attributes['metaMarginTop'] . 'px' . ';
            margin-bottom:' . $attributes['metaMarginBottom'] . 'px' . ';
            margin-left:' . $attributes['metaMarginLeft'] . 'px' . ';
            margin-right:' . $attributes['metaMarginRight'] . 'px' . ';
            }';


    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-more-link{
             margin-top:' . $attributes['moreLinkMarginTop'] . 'px' . ';
            margin-bottom:' . $attributes['moreLinkMarginBottom'] . 'px' . ';
            margin-left:' . $attributes['moreLinkMarginLeft'] . 'px' . ';
            margin-right:' . $attributes['moreLinkMarginRight'] . 'px' . ';
            }';

    
        if($attributes['slider']==='blockspare-posts-block-full-layout-6' ) {
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-single .blockspare-posts-block-post-content{
                    background-color:' . $attributes['backGroundColor'] . ';
                 
                    }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
                color: ' . $attributes['postTitleColor'] . ';
                
                 }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-author a span{
                color:' . $attributes['linkColor'] . ';
                }';
        
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-more-link span{
                color:' . $attributes['linkColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-date{
                color:' . $attributes['generalColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-excerpt-content, '.' .' . $blockuniqueclass . ' .comment_count{
                color:' . $attributes['generalColor'] . ';
              
                }';
        }else if($attributes['slider']==='blockspare-posts-block-full-layout-4'){
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
                color: ' . $attributes['fullPostTitleColor'] . ';
              
                 }';
        
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-author a span{
                color:' . $attributes['fullPostLinkColor'] . ';
                }';
        
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-more-link span{
                color:' . $attributes['fullPostLinkColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-date{
                color:' . $attributes['fullPostGeneralColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-excerpt-content, '.' .' . $blockuniqueclass . ' .comment_count{
                color:' . $attributes['fullPostGeneralColor'] . ';
              
                }';
        
        }else{
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-single{
                    background-color:' . $attributes['backGroundColor'] . ';
                 
                    }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
                color: ' . $attributes['postTitleColor'] . ';
                
                 }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-author a span{
                color:' . $attributes['linkColor'] . ';
                }';
        
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-more-link span{
                color:' . $attributes['linkColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-date{
                color:' . $attributes['generalColor'] . ';
                }';
        
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-excerpt-content, '.' .' . $blockuniqueclass . ' .comment_count{
                color:' . $attributes['generalColor'] . ';
              
                }';
        }
    
    

    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title{
            margin-top:' . $attributes['titleMarginTop'] . 'px' . ';
            margin-bottom:' . $attributes['titleMarginBottom'] . 'px' . ';
            margin-left:' . $attributes['titleMarginLeft'] . 'px' . ';
            margin-right:' . $attributes['titleMarginRight'] . 'px' . ';
        }';


    $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-excerpt-content{
           margin-top:' . $attributes['exceprtMarginTop'] . 'px' . ';
            margin-bottom:' . $attributes['exceprtMarginBottom'] . 'px' . ';
            margin-left:' . $attributes['exceprtMarginLeft'] . 'px' . ';
            margin-right:' . $attributes['exceprtMarginRight'] . 'px' . ';
            }';

    
        if($attributes['slider']!='blockspare-posts-block-full-layout-6') {
            if ($attributes['enableBoxShadow']) {
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-single{
                box-shadow: ' . $attributes['xOffset'] . 'px ' . $attributes['yOffset'] . 'px ' . $attributes['blur'] . 'px ' . $attributes['spread'] . 'px ' . $attributes['shadowColor'] . ';
               border-radius:' . $attributes['borderRadius'] . 'px' . ';
                }';
            }
            
                $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-single{
               border-radius:' . $attributes['borderRadius'] . 'px' . ';
                }';
            
        }else{
            $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-content{
                box-shadow: ' . $attributes['xOffset'] . 'px ' . $attributes['yOffset'] . 'px ' . $attributes['blur'] . 'px ' . $attributes['spread'] . 'px ' . $attributes['shadowColor'] . ';
               border-radius:' . $attributes['borderRadius'] . 'px' . ';
                }';
        }

    
    

   
    //Font Settings

       $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
          
            font-size: ' . $attributes['postTitleFontSize'] . $attributes['titleFontSizeType'] . ';
            '.bscheckFontfamily($attributes['titleFontFamily']).';
            font-weight: ' . $attributes['titleFontWeight'] . ';
            line-height: ' . $attributes['lineHeight'] . ';
             }';
    
        $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-content .blockspare-posts-block-post-grid-excerpt .blockspare-posts-block-post-grid-excerpt-content{
            font-size:' . $attributes['descriptionFontSize'] . $attributes['descriptionFontSizeType'] . ';
            '.bscheckFontfamily($attributes['descriptionFontFamily']).';
            font-weight: ' . $attributes['descriptionFontWeight'] . ';
            }';
    
        $block_content .= '@media (max-width: 1025px) { ';
        $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
            font-size: ' . $attributes['titleFontSizeTablet'] . $attributes['titleFontSizeType'] . ';
            }';
        $block_content .= ' .' .  $blockuniqueclass .' .blockspare-posts-block-post-content .blockspare-posts-block-post-grid-excerpt{
            font-size:' . $attributes['descriptionFontSizeTablet'].$attributes['descriptionFontSizeType'].'
            }';
        $block_content .= '}';
    
    
        $block_content .= '@media (max-width: 767px) { ';
        $block_content .= ' .' . $blockuniqueclass . ' .blockspare-posts-block-post-grid-title a span{
            font-size: ' . $attributes['titleFontSizeMobile'] . $attributes['titleFontSizeType'] . ';
            }';
        $block_content .= ' .' .  $blockuniqueclass .' .blockspare-posts-block-post-content .blockspare-posts-block-post-grid-excerpt{
        font-size:' . $attributes['descriptionFontSizeMobile'].$attributes['descriptionFontSizeType'].'
        }';
        $block_content .= '}';
        
        
    
        $block_content .= '</style>';
        return $block_content;
    }
}
    
    