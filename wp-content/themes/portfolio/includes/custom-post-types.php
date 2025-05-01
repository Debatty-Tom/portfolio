<?php

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":
function create_projects()
{
    register_post_type('project', [
        'label' => 'Projets',
        'description' => 'Les projets que nous avons réalisés',
        'menu_position' => 6,
        'menu_icon' => 'dashicons-hammer',
        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'projets',
        ],
        'supports' => ['title','excerpt','editor','thumbnail'],
    ]);
}
add_action('init', 'create_projects');

function create_language_taxonomy()
{
    register_taxonomy('language', ['project'], [
        'labels' => [
            'name' => 'Langage de programmation',
            'singular_name' => 'Langage'
        ],
        'description' => 'Quel sont les langage de programmation utilisé pour ce projet ?',
        'public' => true,
        'hierarchical' => true,
        'show_tagcloud' => false,
    ]);
}
add_action('init', 'create_language_taxonomy');

function create_contact_form()
{
    register_post_type('contact_message', [
        'label' => 'Messages de contact',
        'description' => 'Les envois de formulaire via la page de contact',
        'menu_position' => 10,
        'menu_icon' => 'dashicons-email',
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor'],
    ]);
}

add_action('init', 'create_contact_form');