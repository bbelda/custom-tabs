<?php

require_once( __DIR__ . '/carbon-fields/vendor/autoload.php' );

add_action( 'plugins_loaded', array( 'Carbon_Fields\\Carbon_Fields', 'boot' ) );

Carbon_Fields\Carbon_Fields::boot();
use Carbon_Fields\Field;
use Carbon_Fields\Container;

Container::make( 'post_meta', 'Home Page Components' )
->where( 'post_type', '=', 'services' )
->add_tab('CUSTOMS TABS', array(
    Field::make('text', 'tab_heading', 'Heading')->set_width(33),
    Field::make('text', 'tab_subhead', 'Subheading')->set_width(33),
    Field::make('rich_text', 'tab_content', 'Content')->set_width(100),
    Field::make( 'complex', 'tab_items', __( 'Items' ) )->set_layout('tabbed-horizontal')
    ->add_fields( array(
        Field::make('image', 'tab_items_image', 'Background Image')->set_width(33)->set_value_type('url'),
		Field::make('text', 'tab_items_heading', 'Heading')->set_width(33),
		Field::make('text', 'tab_items_subhead', 'Subheading')->set_width(33),
		Field::make('rich_text', 'tab_items_content', 'Content')->set_width(100),
    ))
));
