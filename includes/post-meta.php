<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Page Settings
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Page Settings'))
    ->where('post_type', '=', 'page')
    ->set_priority('high')
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
    ->set_priority('high')
    ->add_fields(array(
        Field::make('text', 'client', 'Client'),
        Field::make('text', 'project', 'Project'),
        Field::make('text', 'location', 'Location'),
        Field::make('text', 'value', 'Value'),
        Field::make('text', 'services', 'Services'),
        Field::make('complex', 'key_facts', __('Key Facts'))
            ->add_fields(array(
                Field::make('image', 'photo', __('Icon')),
                Field::make('text', 'title', __('Text')),
            ))
    ));
