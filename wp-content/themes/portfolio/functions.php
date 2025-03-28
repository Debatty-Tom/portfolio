<?php

// Charger les champs ACF exportés :
//include_once('acf.php');
if (!session_id()) {
    session_start();
}

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['project']);

// Import helpers files from /includes folder
require_once(get_template_directory() . '/includes/acf-site-option.php');
require_once(get_template_directory() . '/includes/clean-backend.php');
require_once(get_template_directory() . '/includes/clean-header.php');
require_once(get_template_directory() . '/includes/custom-post-types.php');
require_once(get_template_directory() . '/includes/helpers.php');
require_once(get_template_directory() . '/includes/navigation.php');

function hepl_trad_load_textdomain()
{
    load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $key, array $replacements = []): ?string
{
    $base = __($key, 'hepl-trad');

    foreach ($replacements as $key => $value) {
        $variable = ':'.$key;
        $base = str_replace($variable, $value, $base);
    }
    return $base;
}
























