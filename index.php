<?php

/*
    Plugin Name: Company Gutenberg Blocks
    Description: Custom gutenberg blocks
    Author: Kirill Batomunkuev
    Author URI: https://freelance.ru/batomunkuevv
*/

//? Add blocks js

add_action('enqueue_block_editor_assets', 'add_company_blocks');

function add_company_blocks()
{
    $script_file_path = plugin_dir_url(__FILE__) . '/dist/index.js';
    $dependencies = ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components'];

    wp_enqueue_script(
        'company-blocks',
        $script_file_path,
        $dependencies,
        filemtime($script_file_path)
    );
}

//? Add blocks styles 

add_action('enqueue_block_editor_assets', 'add_company_blocks_styles');

function add_company_blocks_styles()
{
    $css_file_path = plugin_dir_url(__FILE__) . '/dist/main.css';

    wp_enqueue_style(
        'company-blocks',
        $css_file_path,
        [],
        filemtime($css_file_path)
    );
}

//? Custom categories 

add_filter('block_categories_all', 'add_blocks_category');

function add_blocks_category($categories)
{
    $category = array(
        'literallyanything' => array(
            'slug'  => 'custom-blocks',
            'title' => 'Кастомные блоки'
        )
    );

    $position = 0;

    $cats = array_slice($categories, 0, $position, true) + $category + array_slice($categories, $position, null, true);

    $cats = array_values($cats);

    return $cats;
}
