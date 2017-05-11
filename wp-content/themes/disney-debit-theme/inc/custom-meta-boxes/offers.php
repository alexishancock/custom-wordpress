<?php
add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
add_filter('rwmb_meta_boxes', 'disney_debit_offer_meta_boxes');

function disney_debit_offer_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Offer Details', 'textdomain' ),
        'post_types' => 'offer',
        'fields'     => array(
            array(
                'id'   => 'offer',
                'name' => __( 'Offer', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'HTML',
                'name' => __( 'Custom HTML', 'textdomain' ),
                'type' => 'wysiwyg',
            ),
        ),
    );
    return $meta_boxes;
}