<?php
add_filter( 'cmb2_meta_boxes' , 'disney_debit_offer_meta_boxes' );

function disney_debit_offer_meta_boxes( $meta_boxes ) {
    $prefix = 'debit_';
    $meta_boxes[] = array(
        'id' => 'offer-details',
        'title'      => 'Offer Details',
        'object_types' => array( 'offer' ),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => TRUE,
        'fields'     => array(
            array(
                'id'   => 'offer',
                'name' => 'Offer',
                'type' => 'text_small',
                'sanitization_cb' => false
            ),
            array(
                'id'   => 'HTML',
                'name' => 'Custom HTML',
                'type' => 'wysiwyg'
            ),
        ),
    );

    return $meta_boxes;
}