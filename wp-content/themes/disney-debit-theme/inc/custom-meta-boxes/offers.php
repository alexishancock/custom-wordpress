<?php
add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
add_filter('rwmb_meta_boxes', 'disney_debit_offer_meta_boxes');

function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Test Meta Box', 'textdomain' ),
        'post_types' => 'post',
        'fields'     => array(
            array(
                'id'   => 'name',
                'name' => __( 'Name', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'      => 'gender',
                'name'    => __( 'Gender', 'textdomain' ),
                'type'    => 'radio',
                'options' => array(
                    'm' => __( 'Male', 'textdomain' ),
                    'f' => __( 'Female', 'textdomain' ),
                ),
            ),
            array(
                'id'   => 'email',
                'name' => __( 'Email', 'textdomain' ),
                'type' => 'email',
            ),
            array(
                'id'   => 'bio',
                'name' => __( 'Biography', 'textdomain' ),
                'type' => 'textarea',
            ),
        ),
    );
    return $meta_boxes;
}

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