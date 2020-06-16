<?php
add_shortcode('services_tabs', 'show_services_links_icons');
function show_services_links_icons($atts) {
    ob_start();
    $post_id = $atts['id'];
    $args = array( 'post_type' => 'services' , 'p' => $post_id );
    $the_query = new WP_Query( $args ); 
    
    while ( $the_query->have_posts() ) { $the_query->the_post();
    ?>
    <div class="custom-tabs">
        <div class="custom-tab-nav">
            <div class="custom-tabs-intro">
                <h4>
                    <?php 
                        if(!empty(carbon_get_the_post_meta('tab_subhead'))) {
                            echo carbon_get_the_post_meta('tab_subhead'); 
                        } else {
                            echo 'Default Subheading';
                        }
                    ?>
                </h4>
                <h2>
                    <?php 
                        if(!empty(carbon_get_the_post_meta('tab_heading'))) {
                            echo carbon_get_the_post_meta('tab_heading'); 
                        } else {
                            echo 'Default Heading';
                        }
                    ?>
                </h2>
                <?php 
                        if(!empty(carbon_get_the_post_meta('tab_content'))) {
                            echo wpautop(carbon_get_the_post_meta('tab_content')); 
                        } else {
                            echo wpautop('Sample Content Paragraph');
                        }
                    ?>
            </div>
            <ul>
                <?php $items = carbon_get_the_post_meta('tab_items'); $counter = 1;
                if(!empty(carbon_get_the_post_meta('tab_items'))) {
                foreach($items as $item): 
                    if($counter == 1):?>
                    <li class="active">
                        <a href="#" rel="tab-<?php echo $counter;?>"><?php echo $counter.'. '.$item['tab_items_heading']; ?></a>
                    </li>
                    <?php else:?>
                    <li>
                        <a href="#" rel="tab-<?php echo $counter;?>"><?php echo $counter.'. '.$item['tab_items_heading']; ?></a>
                    </li>
                    <?php endif;?>
                <?php  $counter++; endforeach; 
                } else { ?>
                    <li class="active">
                        <a href="#" rel="tab-1">1. Sample Link</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="custom-tab-content">
            <div class="custom-tab-body-content">
                <?php $items = carbon_get_the_post_meta('tab_items'); $counters = 1;
                if(!empty(carbon_get_the_post_meta('tab_items'))) {
                    foreach($items as $item): 
                        if($counters == 1):?>
                        <div class="custom-tab-item active" id="tab-<?php echo $counters;?>" style="background-image:url(<?php echo $item['tab_items_image']; ?>)">
                            <div class="custom-tab-details">
                                <h5><?php echo $item['tab_items_subhead']; ?></h5>
                                <?php echo wpautop($item['tab_items_content']); ?>
                            </div>
                        </div>
                        <?php else:?>
                        <div class="custom-tab-item" id="tab-<?php echo $counters;?>">
                            <div class="custom-tab-details">
                                <h5><?php echo $item['tab_items_subhead']; ?></h5>
                                <?php echo wpautop($item['tab_items_content']); ?>
                            </div>
                        </div>
                        <?php endif;?>
                    <?php $counters++; endforeach; 
                } else { ?>
                     <div class="custom-tab-item active default-tab" id="tab-1" style="background-image:url(none)">
                        <div class="custom-tab-details">
                            <h5>Sample Heading</h5>
                            <p>Sample content paragraph</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
    
<?php

    wp_reset_postdata();
    $content = ob_get_clean();
    return $content;
}


add_filter( 'manage_services_posts_columns', 'set_custom_edit_services_columns' );
function set_custom_edit_services_columns($columns) {
    $columns['services_shortcode'] = __( 'Shortcode');

    return $columns;
}
// Add the data to the custom columns for the services post type:
add_action( 'manage_services_posts_custom_column' , 'custom_services_column', 10, 2 );
function custom_services_column( $column, $post_id ) {
    switch ( $column ) {
        
        case 'services_shortcode' :
            $shortcode_name = 'services_tabs';
            echo '['.$shortcode_name.' id="'.$post_id.'"]';
            break;
    }
}

