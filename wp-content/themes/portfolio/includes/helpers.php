<?php


add_image_size('naviguation', 420, 420);
add_image_size('text-image', 650, 650);
add_image_size('related', 650, 650);

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

function my_own_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'my_own_mime_types');

add_theme_support('post-thumbnails', ['project']);


function dw_get_page_title(): string
{
    if (is_front_page()) {
        $pageTitle = __hepl('Développeur full stack');
    } else {
        $pageTitle = get_the_title();
    }

    return $pageTitle;
}

function is_project_page()
{
    return str_contains($_SERVER['REQUEST_URI'], __hepl('projets'));
}

function dw_url_to_page_title($link): string
{
    if ($link) {
        $post_id = url_to_postid($link);
        if ($post_id) {
            return get_the_title($post_id);
        } else {
            return __hepl('Il n’y pas de page pour ce lien');
        }
    }
    return __hepl('Il n’y pas de lien');
}

function dwGenerateUniqueGridPositions($count, $maxCols = 15, $maxRows = 10)
{
    $used = [];
    $positions = [];

    while (count($positions) < $count) {
        $x = rand(1, $maxCols - 1);
        $y = rand(1, $maxRows - 1);

        $isFree = true;
        for ($dx = 0; $dx < 2; $dx++) {
            for ($dy = 0; $dy < 2; $dy++) {
                if (isset($used[($x + $dx) . '-' . ($y + $dy)])) {
                    $isFree = false;
                    break 2;
                }
            }
        }

        if ($isFree) {
            for ($dx = 0; $dx < 2; $dx++) {
                for ($dy = 0; $dy < 2; $dy++) {
                    $used[($x + $dx) . '-' . ($y + $dy)] = true;
                }
            }

            $positions[] = "pos-{$x}-{$y}";
        }
    }

    return $positions;
}
