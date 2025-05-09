<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<header class="header" role="banner">
    <a class="header__title" href="<?= home_url() ?>" title="Vers la page d'accueil"><?= get_bloginfo('name') ?></a>
    <h1 class="page__title"><?= dw_get_page_title() ?></h1>
    <nav class="nav">
        <h2 class="sro"><?= __hepl('Navigation principale') ?></h2>
        <label class="sro" for="burger">Burger menu</label>
        <input type="checkbox" name="burger" id="burger">
        <div class="burger__wrapper">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav__container">
            <li class="nav__sublist__container--projects">
                <ul class="nav__list nav__list--projects">
                    <?php
                    $projectIndex = 0;
                    foreach (dw_get_navigation_links('header') as $link):
                        if (str_contains($link->href, 'projets')):
                            $projectIndex++;
                            ?>
                            <li class="nav__item nav__item--project nav__item--project--<?= $projectIndex ?>">
                                <a href="<?= $link->href; ?>" class="nav__link">
                                    <?php
                                    $post_id = url_to_postid($link->href);
                                    if ($post_id && get_post_type($post_id) === 'project'): ?>
                                        <figure class="project__figure">
                                            <?= get_the_post_thumbnail($post_id, 'medium', ['class' => 'project__figure__img']) ?>
                                            <figcaption class="project__label"><?= $link->label; ?></figcaption>
                                        </figure>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endif;
                    endforeach; ?>
                </ul>
            </li>
            <li class="nav__sublist__container">
                <ul class="nav__list nav__list--links">
                    <?php
                    $linkIndex = 0;
                    foreach (dw_get_navigation_links('header') as $link):
                        if (!str_contains($link->href, 'projets')):
                            ?>
                            <li class="nav__item nav__item--link">
                                <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
                            </li>
                        <?php endif;
                    endforeach; ?>
                    <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                        <li class="languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                            <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                               class="nav__link"><?= $lang['locale'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<main>