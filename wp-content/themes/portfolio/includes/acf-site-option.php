<?php

function create_site_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options du site', // titre de la page
            'menu_title' => 'Site informations', // titre dans le menu
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Company settings',
            'menu_title' => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Social networks',
            'menu_title' => 'Social networks',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'SEO settings',
            'menu_title' => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');
