<?php

// Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :

// Sans recadrage :
add_image_size('travel-side', 420, 420);
// Avec recadrage :
add_image_size('travel-header', 1920, 400, true);

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function dw_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/resources/scss/main.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/scss/main.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}

// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
    // Ajout du mime type pour les fichiers SVG
    $mimes['svg'] = 'image/svg+xml';

    // Retourne le tableau des types MIME mis à jour
    return $mimes;
}
// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['project']);