<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Page Settings
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Page Settings'))
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->set_priority('high')
    ->set_context('side')
    ->add_fields(array(
        Field::make('select', 'top_background_style', 'Top Background Style')
            ->set_options(array(
                'background-style-default' => 'Default',
                'background-style-1' => 'Style 1',
                'background-style-2' => 'Style 2',
                'background-style-3' => 'Style 3',
                'background-none' => 'None',
            )),
    ));


/*-----------------------------------------------------------------------------------*/
/* Page Settings
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Case Study Settings'))
    ->where('post_type', '=', 'post')
    ->where('post_term', '=', array(
        'field' => 'slug',
        'value' => 'case-studies',
        'taxonomy' => 'category',
    ))
    ->set_priority('high')

    ->add_fields(array(
        Field::make('text', 'client', 'Client')->set_width(50),
        Field::make('text', 'project', 'Project')->set_width(50),
        Field::make('text', 'location', 'Location')->set_width(50),
        Field::make('text', 'value', 'Value')->set_width(50),
        Field::make('text', 'services', 'Services')->set_width(50),
        Field::make('complex', 'key_facts', __('Key Facts'))
            ->add_fields(array(
                Field::make('image', 'icon', __('Icon')),
                Field::make('text', 'title', __('Text')),
            ))

            /*
            ->set_default_value(array(
                array(
                    'icon' => 988740,
                    'title' => 'Lorem ipsum dolor sit',
                ),
                array(
                    'icon' => 988739,
                    'title' => 'Lorem ipsum dolor sit',
                ),
                array(
                    'icon' => 988738,
                    'title' => 'Lorem ipsum dolor sit',
                ),
                array(
                    'icon' => 988737,
                    'title' => 'Lorem ipsum dolor sit',
                ),
              
            ))*/
            ->set_layout('tabbed-vertical')
            ->set_header_template('<%- title %>')
    ));


    .